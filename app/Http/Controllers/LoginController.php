<?php

namespace App\Http\Controllers;

use App\Serves\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    return view('login.index');
    }
    public function login(Request $request)
    {
        $userData= $request->only('email', 'password');
        $remember = $request->input('remember');
        if (Auth::attempt($userData,$remember)) {
            return redirect()->route('user.catalog');
        }else{
            return redirect()->route('login');
        }
    }
    public function logout(){
        Auth::logout();

        redirect()->route('login');
    }
}
