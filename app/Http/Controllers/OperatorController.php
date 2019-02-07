<?php

namespace App\Http\Controllers;
use Auth;
 use Illuminate\Http\Request;
use App\User;
use App\Ekskul;
use Session;

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
   
     
    
}
