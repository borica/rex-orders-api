<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    protected $model = MenuItem::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'menu_id' => Menu::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image_url' => $this->faker->imageUrl,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'prep_time_minutes' => $this->faker->numberBetween(5, 60),
            'portion_size' => $this->faker->numberBetween(1, 10),
            'disabled' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}