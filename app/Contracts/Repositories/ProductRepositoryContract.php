<?php

namespace App\Contracts\Repositories;

interface ProductRepositoryContract
{
    public function getAll();
    public function getByCategoryId();
}
