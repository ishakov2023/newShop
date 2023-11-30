<?php

namespace App\Contracts\Repositories;

interface BasketRepositoryContract
{
        public function basket($userId);
        public function basketAmount($userId);
}
