<?php

namespace App\Http\Controllers;
use Auth;
 use Illuminate\Http\Request;
use App\User;
use App\Ekskul;
use Session;
use DB;
use App\Biodata;
use App\DetailPinjam;
use App\Peminjaman;
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
    public function setujuipeminjaman(Request $request){
        $dt = date("Y-m-d");
        $dtkembali = date("Y-m-d",strtotime("$dt +7 day"));

         DB::table('tb_peminjaman')
        ->where('id_peminjaman','=',$request->id_peminjaman)

        ->update(['tanggal_pinjam' => $dt,'tanggal_kembali' =>$dtkembali,'status_pinjam'=>"sudah dipinjam"]);
    }
    public function kembalikanBarang(Request $request){
        DB::table('tb_peminjaman')
        ->where('id_peminjaman','=',$request->id_peminjaman)
        ->update(['status_peminjaman' => 'barang sudah dikembalikan']);
    }
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
    public function getDetailPeminjamanUser($id_peminjaman){
        $data = DB::table('tb_detail_pinjam')
        ->leftJoin('tb_inventaris','tb_detail_pinjam.id_inventaris','=','tb_inventaris.id_inventaris')
        ->rightJoin('tb_peminjaman','tb_detail_pinjam.id_detail_pinjam','=','tb_peminjaman.id_peminjaman')
        ->where('id_detail_pinjam','=',$id_peminjaman)
        ->select('tb_detail_pinjam.id_detail_pinjam','tb_detail_pinjam.jumlah','tb_inventaris.nama','tb_detail_pinjam.jumlah','tb_peminjaman.tanggal_pinjam','tb_peminjaman.status_pinjam','tb_peminjaman.status_peminjaman')
        ->get();
        
        return response()->json([
            'model' => $data
        ]);
    }
    public function getAllPeminjamanUser(Request $request){
        $search = $request->search;
        $data = DB::table('tb_peminjaman')->where('kode_peminjaman','LIKE',"%$search%")->get();
        return response()->json([
            'model' => $data
        ]);
    }
    public function tambahUser(){

    }
    public function getAllUser(){

    }
    public function editUser(){

    }
    public function tambahPesan(){

    }
    public function pengembalian(){
        
    }
     
    
}
