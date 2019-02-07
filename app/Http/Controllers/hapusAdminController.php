<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Admin;
use Illuminate\Database\Eloquent\Model;
use DB;

class hapusAdminController extends Controller
{
    //
    public function hapusAdmin(){
      //$admin = new Admin;
        //$admin['admin'] = DB::table('tb_admin')->where("kode_admin","KDADM001")->first();
        $admin['admin'] = Admin::withTrashed()->get();
        //$admin->delete();
        //Admin::withTrashed()->where('kode_admin','KDADM001')->restore();
       // if($admin->trashed()){
         //   return "data dihapus";
        //}
        return view('demo-detail')->with($admin);
    }
}
