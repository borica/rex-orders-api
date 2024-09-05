<?php

// database/seeders/MenuItemSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\Menu;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        MenuItem::factory()->count(50)->create()->each(function ($menuItem) {
            $menu = Menu::factory()->create();
            $menuItem->menu()->associate($menu);
            $menuItem->save();
        });
    }
}