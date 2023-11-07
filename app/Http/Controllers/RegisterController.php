<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(StorePostRequest $request)
    {
        $validate = $request->validated();
        $user = new User;
        $user->name = $validate['name'];
        $user->email = $validate['email'];
        $user->password = bcrypt($validate['password']);
        $user->save();


//        $agreement = $request->boolean('agreement');
//        if($agreement===true){
//            $email = $request->email;
//            $name = $request->name;
//            $password = $request->password;
//            session(['alert'=>__('Знаю что заебал, но давай еще раз логин и пароль')]);
//
//        }else{
//            return redirect()->back();
//        }
        return redirect()->route('login');
    }
}
