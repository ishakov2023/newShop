<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
    return view('login.index');
    }
    public function store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        session(['alert'=>__('Мега харош')]);
        return redirect()->route('user.catalog');
    }
}
