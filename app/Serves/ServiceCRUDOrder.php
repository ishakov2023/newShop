<?php

namespace App\Serves;

use App\Contracts\Repositories\OrderCRUDContract;

class ServiceCRUDOrder
{
    private $repositoryCRUDOrder;

    public function __construct(OrderCRUDContract $CRUDContract)
    {
        $this->repositoryCRUDOrder = $CRUDContract;
    }

    public function OrderRead($id, $userId, $count)
    {
        $this->repositoryCRUDOrder->readOrder($id, $userId, $count);
    }

    public function OrderUpdate($products, $userId)
    {
        $this->repositoryCRUDOrder->updateOrder($products, $userId);
    }

    public function OrderDestroy($userId)
    {
        $this->repositoryCRUDOrder->destroyOrder($userId);
    }
}
