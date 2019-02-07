<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ContohController extends Controller
{
    //
    public function jenis(){
        $data = DB::table('jenis')->paginate(20);
        return response()->json([
            'model' => $data
        ]);
    }
}
