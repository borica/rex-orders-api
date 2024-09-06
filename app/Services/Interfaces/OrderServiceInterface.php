<?php

namespace App\Services\Interfaces;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrderServiceInterface
{
    public function getOrders(): Collection;
    public function getOrderById(string $id): Order;
    public function createOrder(array $data): Order;
    public function updateOrder(string $id, array $data): Order;
    public function deleteOrder(string $id): void;
}