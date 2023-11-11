<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginRepository
{
    private $user;
    public function __construct(){
        $this->user = new User();
    }
    public function loginTest($userData)
    {
        $this->user->query()->where('email',$userData);
        redirect()->route('admin');
    }


}
