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
//        $user = new User;
//        $user->name = $validate['name'];
//        $user->email = $validate['email'];
//        $user->password = bcrypt($validate['password']);
//        $user->save();

          $user = User::query()->create([
              'name' => $validate['name'],
              'email' => $validate['email'],
              'password' => bcrypt($validate['password']),
          ]);

        return redirect()->route('login');
    }
}
