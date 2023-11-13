<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if (Auth::guard('web')->attempt($userData, $remember) && !Auth::user()->admin)
        {
                return redirect()->route('user.catalog');
        } elseif (Auth::guard('admin')->attempt($userData, $remember) && Auth::user()->admin)
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();

        return view('login/index');
    }
}
