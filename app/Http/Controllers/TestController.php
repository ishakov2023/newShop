<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(User $user)
    {
//        $first = DB::table('users')
//            ->whereNull('email','1@mail.ru');
//
//        $users = DB::table('users')
//            ->whereNull('password',123)
//            ->union($first)
//            ->get();
//        if ($users = true){
//            return "rererer";
//        }
        $email = '1@mail.ru';
        $password = 123;
        $users = DB::table('users')
            ->when($email, function ($query) use ($email, $password) {
                $query->where('email', $email)
                    ->when($password, function ($query) use ($password) {
                        $query->where('email', $password)
                            ->get();
                    });
            });
        dd($users->toArray());

    }
}
