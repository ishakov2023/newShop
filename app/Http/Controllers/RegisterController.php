<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {
        validator($request->all(),[
            'name'=>['required','string','max:100'],
            'email'=>['required','string','email'],/* unique:users*/
            'password'=>['required','string','confirmed','min:3'],
        ])->validated();
        $agreement = $request->boolean('agreement');
        if($agreement===true){
            $email = $request->email;
            $name = $request->name;
            $password = $request->password;
            session(['alert'=>__('Знаю что заебал, но давай еще раз логин и пароль')]);
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
