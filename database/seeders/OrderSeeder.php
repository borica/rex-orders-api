<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\MenuItem;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::factory()->count(20)->create()->each(function ($order) {
            $menuItem = MenuItem::factory()->create();
            $order->menuItem()->associate($menuItem);
            $order->save();
        });
    }
}