<?php

namespace App\Serves;

use App\Repositories\LoginRepository;

class LoginService
{
    private $loginRepository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }
    public function Auntifation($userData)
    {
        return $this->loginRepository->loginTest($userData);
    }
}
