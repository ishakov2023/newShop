<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('admin.loginAdmin');
    }
    public function login(Request $request){
        $userData = $request->only('email', 'password');
        if (Auth::attempt($userData) && Auth::user()->admin) {
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('admin');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('admin');
    }
}
