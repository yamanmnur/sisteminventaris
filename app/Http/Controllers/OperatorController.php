<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Arr;

 use Illuminate\Http\Request;
use App\User;
use App\Ekskul;
use Session;
use DB;
use Hash;
use App\Biodata;
use App\DetailPinjam;
use App\Peminjaman;
use App\UserSiswa;
 class OperatorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:operator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('operator.home-page');
        
    }
//     public function messages()
// {
//     return [
//         'title.required' => 'A title is required',
//         'body.required'  => 'A message is required',
//     ];
// }
    public function messages(){
        return [
            'nama.required' => 'masukan nama anda'
        ];
    }
    public function editUser(Request $request){
        DB::table('users')
        ->where('kode_user','=',$request->datadiri['kode_user'])

        ->update(['name' => $request->datadiri['nama'],'email' =>$request->datadiri['email'],
        'password'=> Hash::make($request->datadiri['password']), 'level' => $request->datadiri['level']]);

        if ($request->datadiri['level'] == 'siswa') {
            DB::table('user_siswa')
            ->where('kode_user','=',$request->datadiri['kode_user'])
            ->update([
                'kelas' => $request->datadiri['kelas']  ,
                'jurusan' =>    $request->datadiri['jurusan'],
                'no_id' =>  $request->datadiri['no_id']
            ]);
        }
        
    }
    public function tambahUser(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        $user = new User;
        $userSiswa = new UserSiswa;
        $kodeuser = str_random(5);
        $user->kode_user = $kodeuser;
        $user->name = $request->datadiri['nama'];
        $user->email = $request->datadiri['email'];
        $user->level = $request->datadiri['level'];
        if($request->datadiri['level'] == 'siswa'){
            $userSiswa->kode_user = $kodeuser;
            $userSiswa->kelas     = $request->datadiri['kelas'];
            $userSiswa->jurusan   = $request->datadiri['jurusan'];
            $userSiswa->no_id   = $request->datadiri['no_id'];
            $userSiswa->save();
        }
        //$user->jurusan = $request->datadiri['jurusan'];
        $user->password = Hash::make($request->datadiri['password']);
        $user->save();
        
        echo $request->datadiri['nama'];
        //echo "sdf";
     }
    public function setujuipeminjaman(Request $request){
        $data = DB::table('tb_detail_pinjam')
        ->join('tb_inventaris','tb_detail_pinjam.id_inventaris','=','tb_inventaris.id_inventaris')
        ->where('id_detail_pinjam','=',$request->id_peminjaman)
        ->select('tb_detail_pinjam.id_inventaris','tb_inventaris.jumlah as jumlah_inventaris','tb_detail_pinjam.jumlah')
        ->get();

        $array = [];
        
        $i = 0;
        foreach ($data as $key) {
            # code...
            if ($key->jumlah > $key->jumlah_inventaris) {
                
                array_push($array,['id_inventaris'=> $key->id_inventaris , 'error' => 'melebihi stok','stok' => $key->jumlah_inventaris]);
            }
        }
         
        if (count($array) > 0 ) {
            $response = ['res' => 'gagal'];
            return response()->json([
                'model' => $response,'detailnya' => $array
            ]);
        } else {
            $dt = date("Y-m-d");
            $dtkembali = date("Y-m-d",strtotime("$dt +7 day"));

            DB::table('tb_peminjaman')
            ->where('id_peminjaman','=',$request->id_peminjaman)

            ->update(['tanggal_pinjam' => $dt,'tanggal_kembali' =>$dtkembali,'status_pinjam'=>"sudah dipinjam",'kode_operator_menyetujui'=> Auth::user()->kode_operator]);
            
            
            
            DB::table('tb_detail_pinjam')->where('id_detail_pinjam','=',$request->id_peminjaman)
            ->update([
                'tanggal_pinjam' => $dt,'tanggal_kembali' =>$dtkembali,'status_pinjam'=>"sudah dipinjam",
                'kode_operator_menyetujui' => Auth::user()->kode_operator
                
        
            ]);

        

            foreach ($data as $key) {
                DB::table('tb_inventaris')->where('id_inventaris','=',$key->id_inventaris)
                ->decrement('jumlah', $key->jumlah)    ;
                

            }
            $response = ['res' => 'berhasil'];
            return response()->json([
                'model' => $response
            ]);
        }
        

        
        
    
    }
    public function kembalikanBarangSatuan(Request $request){
        $dt = date("Y-m-d");
        
        DB::table('tb_detail_pinjam')->where('id_detail_peminjaman','=',$request->detail['id_detail_peminjaman'])
        ->update([
           'tanggal_dikembalikan' =>$dt,'status_peminjaman'=>"sudah dikembalikan",
           'kode_operator_mengembalikan' => Auth::user()->kode_operator
            
       
        ])   ;
         
            DB::table('tb_inventaris')->where('id_inventaris','=',$request->detail['id_inventaris'])
            ->increment('jumlah', $request->detail['jumlah'])    ;
            

       
    }
    public function kembalikanBarang(Request $request){
        $pm = new Peminjaman;
        $dt = date("Y-m-d");
        DB::table('tb_peminjaman')
        ->where('id_peminjaman','=',$request->id_peminjaman)
        ->update(['status_peminjaman' => 'barang sudah dikembalikan',
        'tanggal_dikembalikan' => $dt, 'kode_operator_mengembalikan' => Auth::user()->kode_operator
        
        ]);
        $pm->where('id_peminjaman',$request->id_peminjaman)->delete();
        
        $data = DB::table('tb_detail_pinjam')
        //->join('tb_peminjaman','tb_detail_pinjam.id_detail_pinjam','=','tb_peminjaman.id_peminjaman')
        ->where('id_detail_pinjam','=',$request->id_peminjaman)
        ->where('status_peminjaman','=','belum dikembalikan')
        ->get();
        
        DB::table('tb_detail_pinjam')->where('id_detail_pinjam','=',$request->id_peminjaman)
        ->update([
           'tanggal_dikembalikan_semua' =>$dt,'status_peminjaman'=>"sudah dikembalikan",
            
       
        ])   ;
        
        foreach ($data as $key) {
            DB::table('tb_inventaris')->where('id_inventaris','=',$key->id_inventaris)
            ->increment('jumlah', $key->jumlah)    ;
            

        }
    }
     // motor , laptop,tanah,rumah,kuliah,gitar,
    public function listPeminjam($query = null){
        if ($query == null) {
            # code...
            $data = DB::table('tb_peminjaman')->get();
            return response()->json([
                'model' => $data
            ]);
        } else {
            # code...
            $data = DB::table('tb_peminjaman')->where('kode_user','LIKE',"%$query%")->get();
            return response()->json([
                'model' => $data
            ]);
            // $angka = 1;
            // $dt = date("Y-m-d");
            // echo $dt;
            // echo "<br>";
            // echo date("Y-m-d",strtotime("$dt +".$angka." day"));
        }
        
    }
    public function validasi(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }
    public function getDetailPeminjamanUser($id_peminjaman){
        $data = DB::table('tb_detail_pinjam')
        ->leftJoin('tb_inventaris','tb_detail_pinjam.id_inventaris','=','tb_inventaris.id_inventaris')
        ->leftJoin('tb_operator as tb_menyetujui','tb_detail_pinjam.kode_operator_menyetujui','=','tb_menyetujui.kode_operator')
        ->leftJoin('tb_operator as tb_mengembalikan','tb_detail_pinjam.kode_operator_mengembalikan','=','tb_mengembalikan.kode_operator')
        ->rightJoin('tb_peminjaman','tb_detail_pinjam.id_detail_pinjam','=','tb_peminjaman.id_peminjaman')
        ->where('tb_detail_pinjam.id_detail_pinjam','=',$id_peminjaman)
        ->select('tb_detail_pinjam.tanggal_kembali','tb_detail_pinjam.tanggal_dikembalikan','tb_mengembalikan.nama as nama_operator_mengembalikan','tb_menyetujui.nama as nama_operator_menyetujui','tb_inventaris.jumlah as jumlah_inventaris','tb_detail_pinjam.id_inventaris','tb_detail_pinjam.id_detail_peminjaman','tb_detail_pinjam.id_detail_pinjam','tb_detail_pinjam.jumlah','tb_inventaris.nama','tb_detail_pinjam.jumlah','tb_peminjaman.tanggal_pinjam','tb_detail_pinjam.status_pinjam','tb_detail_pinjam.status_peminjaman')
        ->get();
        $d = DB::table('tb_peminjaman')
        ->join('users','tb_peminjaman.kode_user','=','users.kode_user')
        ->leftJoin('tb_operator as tb_menyetujui','tb_peminjaman.kode_operator_menyetujui','=','tb_menyetujui.kode_operator')
        ->leftJoin('tb_operator as tb_mengembalikan','tb_peminjaman.kode_operator_mengembalikan','=','tb_mengembalikan.kode_operator')
        ->where('id_peminjaman','=',$id_peminjaman)
        ->select('users.name','users.level','tb_peminjaman.status_peminjaman'
        ,'tb_peminjaman.tanggal_pinjam'
        ,'tb_peminjaman.tanggal_kembali'
        ,'tb_peminjaman.status_pinjam'
        ,'tb_peminjaman.kode_peminjaman'
        ,'tb_peminjaman.tanggal_dikembalikan'
        ,'tb_menyetujui.nama as nama_operator_menyetujui'
        ,'tb_mengembalikan.nama as nama_operator_mengembalikan'
        )
        ->first();
        return response()->json([
            'model' => $data,'dd' =>$d
        ]);
    }
    
    public function getAllPeminjamanUser(Request $request){
        $search = $request->search;
        $data = DB::table('tb_peminjaman')->where('kode_peminjaman','LIKE',"%$search%")->orderBy('id_peminjaman','desc')->paginate(5);
        return response()->json([
            'model' => $data
        ]);
    }
     
    public function getAllUser(Request $request){
        $search = $request->search;
        $data = DB::table('users')
        ->leftJoin('user_siswa','user_siswa.kode_user','=','users.kode_user')
        ->select('users.kode_user','users.level','users.name','users.level','users.email','user_siswa.id','user_siswa.jurusan','user_siswa.kelas')
        ->where('name','LIKE',"%$search%")->paginate(5);
        return response()->json([
            'model' => $data


        ]);
    }
    public function batalkanPeminjaman(Request $request){
        $data = new Peminjaman;
        DB::table('tb_detail_pinjam')->where('id_detail_pinjam','=',$request->id_peminjaman)->delete();
        DB::table('tb_peminjaman')->where('id_peminjaman','=',$request->id_peminjaman)->delete();
     }
    public function tambahPesan(){

    }
    public function pengembalian(){
        
    }
     
    
}

