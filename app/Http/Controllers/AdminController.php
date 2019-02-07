<?php

namespace App\Http\Controllers;
use Auth;
 use Illuminate\Http\Request;
use App\User;
use App\Ekskul;
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
   
  
}