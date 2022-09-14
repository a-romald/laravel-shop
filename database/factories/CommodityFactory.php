<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CommodityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->text(30),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
        ];
    }
}
