<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\MenuItem;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        OrderItem::factory()->count(100)->create()->each(function ($orderItem) {
            $order = Order::factory()->create();
            $menuItem = MenuItem::factory()->create();
            $orderItem->order()->associate($order);
            $orderItem->menuItem()->associate($menuItem);
            $orderItem->save();
        });
    }
}