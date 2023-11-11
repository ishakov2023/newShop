<?php

namespace App\Http\Controllers;

use App\Serves\LoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private $user;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $userData = $request->only('email', 'password');
        $remember = $request->input('remember');
        if (Auth::attempt($userData, $remember)) {
            if (Auth::user()->admin) {
                return redirect()->route('admin');
            } else {
                return redirect()->route('user.catalog');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        return view('login/index');
    }
}
