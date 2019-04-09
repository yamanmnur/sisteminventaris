<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OperatorLoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest:operator')->except('operatorLogout');
    }

    public function showLoginForm(){
        return view('auth.operator-login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('operator')->attempt(['email'=> $request->email,'password' => $request->password], $request->remember)) {
            # code...
            return redirect()->intended(route('operator.dashboard'));
        } else {
            # code...
            return redirect()->back()->withInput($request->only('email','remember'));
        }
        
    }
    public function operatorLogout(){
        Auth::guard('operator')->logout();

        return redirect('/');
    }

}
