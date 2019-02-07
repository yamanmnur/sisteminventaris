<?php

namespace App\Http\Controllers;
use App\Inventaris;
use Illuminate\Http\Request;
use DB;
use App\Biodata;
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
    public function getAllInventaris(){
        $data = DB::table('tb_inventaris')->paginate(10);
        return response()->json([
            'items' => $data
        ]);
    }
    public function tambahPeminjaman(Request $request){
        $data           = new Biodata;
        $array          = json_decode($request->all());
        $data->nama     = $array[0]['nama'];
        $data->kelas    = "sd";
        $data->alamat   = "skjd";
        $data->save();
     /*   $det = new Peminjaman;
        $det->status_peminjaman = 'belum_dikembalikan';
        $det->kode_user = Auth::user()->id;
        $det->tanggal_pinjam = now();
        $det->tanggal_kembali = now();
        $det->save();
        $lastId = $det->id
        foreach ($variable as $key => $value) {
            # code...
        } */
    }
}
