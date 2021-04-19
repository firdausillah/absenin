<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(Auth::check()){
            $data = Auth::user();
            return redirect()->intended(route($data->role));
        }
        return view('auth/login');
    }

    public function login(Request $request)
    {
        // dd('its work');
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd(Auth::user());
        if(Auth::attempt(['username'=>$request->username,
        'password'=>$request->password,'status'=>1])){
            $data = Auth::user();
            return redirect()->intended(route($data->role.'.dashboard'));
        }else return redirect()->back()->withInput()->withErrors('Username atau password salah. mohon periksa lagi.');
 
    }

    public function logout(){
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('/');
    }
}
