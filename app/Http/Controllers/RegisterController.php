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
          $user = User::query()->create([
              'name' => $validate['name'],
              'email' => $validate['email'],
              'password' => bcrypt($validate['password']),
          ]);

        return redirect()->route('login');
    }
}
