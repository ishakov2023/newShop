<?php

namespace App\Contracts\Repositories;

interface OrderCRUDContract
{
    public function readOrder($id,$userId,$count);
    public function updateOrder($products,$userId);
    public function destroyOrder($userId);
}
