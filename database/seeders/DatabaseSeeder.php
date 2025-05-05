<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(ThankSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(SearchItemsTableSeeder::class);
        $this->call(CompletedOrderSeeder::class);
    }
}
