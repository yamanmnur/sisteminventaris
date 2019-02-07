<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email'=> $request->email,'password' => $request->password], $request->remember)) {
            # code...
            return redirect()->intended(route('admin.dashboard'));
        } else {
            # code...
            return redirect()->back()->withInput($request->only('email','remember'));
        }
        
    }
    public function adminLogout(){
        Auth::guard('admin')->logout();

        return redirect('/');
    }

}
