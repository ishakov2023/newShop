<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Serves\CategoryServiceCRUD;
use App\Serves\LoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private $user;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function index()
    {

        return view('login.index');
    }
    /**
     * Вход пользователя и проверка пользователя на права админа
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $userData = $request->only('email', 'password');
        $remember = $request->input('remember');
        if (Auth::guard('web')->attempt($userData, $remember) && !Auth::user()->admin)
        {
                return redirect()->route('user.catalog');
        } else
        {
            return redirect()->route('login');
        }
    }
    /**
     * Выход из аундефикации пользователя
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();

        return view('login/index');
    }
}
