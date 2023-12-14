<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;

class AdminController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    /**
     *
     * @return Application|Factory|View
     */
    public function index(){
        $user = Auth::user();
        return view('admin.loginAdmin',compact('user'));
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request){
        $userData = $request->only('email', 'password');
        if (Auth::attempt($userData) && Auth::user()->admin) {
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('admin');
        }
    }
    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('admin');
    }
}
