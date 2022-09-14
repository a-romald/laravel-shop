<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Category::factory(100)->create();

        \App\Models\City::factory(30)->create();

        \App\Models\Commodity::factory(50000)->create();

        $commodities = \App\Models\Commodity::all();

        // Populate the pivot table
        \App\Models\City::all()->each(function ($city) use ($commodities) { 
            $city->commodities()->attach(
                $commodities->random(rand(50, 200))->pluck('id')->toArray()
            ); 
        });
    }
}


// php artisan db:seed
