<?php

namespace App\Services;

use App\Models\Order;
use App\Services\Interfaces\OrderServiceInterface;
use Illuminate\Support\Collection;

class OrderService implements OrderServiceInterface
{
    public function getOrders(): Collection
    {
        return Order::all();
    }

    public function getOrderById(string $id): Order
    {
        return Order::findOrFail($id);
    }

    public function createOrder(array $data): Order
    {
        return Order::create($data);
    }

    public function updateOrder(string $id, array $data): Order
    {
        $order = Order::findOrFail($id);
        $order->update($data);

        return $order;
    }

    public function deleteOrder(string $id): void
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }
}