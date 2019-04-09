<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;

use DB;
use Hash;
use App\Biodata;
use App\DetailPinjam;
use App\Peminjaman;
use App\UserSiswa;
use App\Ruang;
use App\Jenis;
use App\Operator;
use App\Inventaris;
use Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home-page');
        
    }

    public function getAllInventaris(Request $request){
        $search = $request->search;
        $data = DB::table('tb_inventaris')
        ->leftJoin('ruang','tb_inventaris.kode_ruang','=','ruang.kode_ruang')
        ->leftJoin('jenis','tb_inventaris.kode_jenis','=','jenis.kode_jenis')
        ->where('nama','LIKE',"%$search%")->paginate(5);
        $dataruang = DB::table('ruang')->get();
        $datajenis = DB::table('jenis')->get();
        return response()->json([
            'model' => $data,
            'model_ruang' => $dataruang,
            'model_jenis' => $datajenis
        ]);
        
    }
    public function tambahBarang(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        $user = new Inventaris;
        //$userSiswa = new UserSiswa;
        $kodeuser = str_random(5);
        $user->nama = $request->formdata['nama'];
        $user->kondisi = $request->formdata['kondisi'];
        $user->keterangan = $request->formdata['keterangan'];
        $user->jumlah = $request->formdata['jumlah'];
        $user->jumlah_asli = $request->formdata['jumlah'];
        $user->kode_jenis = $request->formdata['kode_jenis'];
        $user->kode_ruang = $request->formdata['kode_ruang'];
        $user->save();
         
        //echo "sdf";
     }
     public function editBarang(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        DB::table('tb_inventaris')
        ->where('id_inventaris','=',$request->formdata['id_inventaris'])

        ->update(['nama' => $request->formdata['nama'],'kondisi' =>$request->formdata['kondisi'],
        'kode_jenis'=> $request->formdata['kode_jenis'], 'keterangan' => $request->formdata['keterangan'],
        'jumlah' => $request->formdata['jumlah'],
        'kode_ruang' =>$request->formdata['kode_ruang']
        
        ]);
         
        //echo "sdf";
     }

     // kelola ruang
     public function getAllRuang(Request $request){
        $search = $request->search;
        $data = DB::table('ruang')
        
        ->where('nama_ruang','LIKE',"%$search%")->paginate(5);
        
        return response()->json([
            'model' => $data,
        ]);
        
    }
    public function tambahRuang(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        $user = new Ruang;
        //$userSiswa = new UserSiswa;
        $koderuang = str_random(5);
        $user->nama_ruang = $request->formdata['nama_ruang'];
        $user->kode_ruang = $koderuang;
        $user->keterangan_ruang = $request->formdata['keterangan'];
         
        $user->save();
         
        //echo "sdf";
     }
     public function editRuang(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        DB::table('ruang')
        ->where('kode_ruang','=',$request->formdata['kode_ruang'])

        ->update(['nama_ruang' => $request->formdata['nama_ruang'],
         'keterangan_ruang' => $request->formdata['keterangan']
        
        ]);
         
        //echo "sdf";
     }
     // kelola jenis
     public function getAllJenis(Request $request){
        $search = $request->search;
        $data = DB::table('jenis')
        
        ->where('nama_jenis','LIKE',"%$search%")->paginate(5);
        
        return response()->json([
            'model' => $data,
        ]);
        
    }
    public function tambahJenis(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        $user = new Jenis;
        //$userSiswa = new UserSiswa;
        $kode_jenis = str_random(5);
        $user->nama_jenis = $request->formdata['nama_jenis'];
        $user->kode_jenis = $kode_jenis;
        $user->keterangan_jenis = $request->formdata['keterangan'];
         
        $user->save();
         
        //echo "sdf";
     }
     public function editJenis(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        DB::table('jenis')
        ->where('kode_jenis','=',$request->formdata['kode_jenis'])

        ->update(['nama_jenis' => $request->formdata['nama_jenis'],
         'keterangan_jenis' => $request->formdata['keterangan']
        
        ]);
         
        //echo "sdf";
     }
 
     // kelola operator

     public function editOperator(Request $request){
        DB::table('tb_operator')
        ->where('kode_operator','=',$request->datadiri['kode_operator'])

        ->update(['nama' => $request->datadiri['nama'],'email' =>$request->datadiri['email'],
        'password'=> Hash::make($request->datadiri['password']) 
        , 'no_tlp' => $request->datadiri['no_tlp']
        ]);

        
        
    }
    public function tambahOperator(Request $request){
        // $this->validate($request,[
        //     'nama' => 'required|min:6',
            
        // ]);
        $user = new Operator;
         $kodeoperator = str_random(5);
        $user->kode_operator = $kodeoperator;
        $user->nama = $request->datadiri['nama'];
        $user->email = $request->datadiri['email'];
        $user->no_tlp = $request->datadiri['no_tlp'];
         
        //$user->jurusan = $request->datadiri['jurusan'];
        $user->password = Hash::make($request->datadiri['password']);
        $user->save();
        
         //echo "sdf";
     }
     public function getAllOperator(Request $request){
        $search = $request->search;
        $data = DB::table('tb_operator')
        
        ->where('nama','LIKE',"%$search%")->paginate(5);
        return response()->json([
            'model' => $data


        ]);
    }
}
