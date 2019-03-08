<?php

namespace App\Http\Controllers;
use App\Inventaris;
use Illuminate\Http\Request;
use DB;
use App\Biodata;
use App\DetailPinjam;
use App\Peminjaman;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inven = new Inventaris;
        $data['barang'] = $inven->getAllInventaris();
        return view('home')->with($data);
    }
    public function getAllInventaris(Request $request){
        $search = $request->search;
        $data = DB::table('tb_inventaris')->where('nama','LIKE',"%$search%")->paginate(10);
        return response()->json([
            'items' => $data
        ]);
    }
    // public function getAllPeminjamanUser(Request $request){
        //     $search = $request->search;
        //     $data = DB::table('tb_peminjaman')->where('kode_user','LIKE',"%$search%")->get();
        //     return response()->json([
        //         'model' => $data
        //     ]);
        // }
    public function getAllPeminjamanUser(){
        $data = DB::table('tb_peminjaman')->where('kode_user','=',Auth::user()->kode_user)->get();
        return response()->json([
            'model' => $data
        ]);
    }
    public function getDetailPeminjamanUser($id_peminjaman){
        $data = DB::table('tb_detail_pinjam')
        ->leftJoin('tb_inventaris','tb_detail_pinjam.id_inventaris','=','tb_inventaris.id_inventaris')
        ->rightJoin('tb_peminjaman','tb_detail_pinjam.id_detail_pinjam','=','tb_peminjaman.id_peminjaman')
        ->where('id_detail_pinjam','=',$id_peminjaman,'and','tb_peminjaman.kode_user','=',Auth::user()->kode_user)
        ->select('tb_detail_pinjam.id_detail_pinjam','tb_detail_pinjam.jumlah','tb_inventaris.nama','tb_detail_pinjam.jumlah','tb_peminjaman.tanggal_pinjam')
        ->get();
        
        return response()->json([
            'model' => $data
        ]);
    }
    public function tambahPeminjaman(Request $request){
      //$dt = date("Y-m-d");
      //echo $dt;
      //echo date("Y-m-d",strtotime("$dt +7 day"));
      //return date('Y-m-d');
        //echo  $request->items[0]['nama'];//$array['items']['nama'][0];//dd($request->all());
        $dataPeminjaman           = new Peminjaman;

        //$array          = json_decode(json_encode($request->all()));

        $dataPeminjaman->status_peminjaman  = "belum dikembalikan";
       //  = $request->items[0]['nama'];
        $id = Auth::user()->kode_user;
        $dataPeminjaman->kode_user = $id;
        $dataPeminjaman->kode_peminjaman = str_random(10);
        //$dt = date("Y-m-d");
        //$dataPeminjaman->tanggal_pinjam   = $dt;
        //$dataPeminjaman->tanggal_kembali = date("Y-m-d",strtotime("$dt +".7." day"));
        $dataPeminjaman->save();
        $lastId = Peminjaman::all()->last()->id_peminjaman;
        //echo count($request->items);
        for ($i=0; $i < count($request->items); $i++) {
            $dataDetailPinjam = new DetailPinjam;

            $dataDetailPinjam->id_detail_pinjam = $lastId;
            $dataDetailPinjam->id_inventaris = $request->items[$i]['id_inventaris'];
            $dataDetailPinjam->jumlah = $request->items[$i]['jumlahqty'];
            $dataDetailPinjam->save();

            //echo $request->items[$i]['id_inventaris'];
        }


    }
}
