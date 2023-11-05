<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
    return view('login.index');
    }
    public function store()
    {
        session(['alert'=>__('Мега харош')]);
        return redirect()->route('user.catalog');
    }
}
