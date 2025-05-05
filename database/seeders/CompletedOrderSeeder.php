<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompletedOrder;
use App\Models\User;

class CompletedOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Убедитесь, что есть хотя бы один пользователь
        $user = User::first() ?? User::factory()->create();

        // Заказ в процессе
        CompletedOrder::create([
            'user_id' => $user->id,
            'service_type' => 'Визитки',
            'size' => '90x50 мм',
            'quantity' => 100,
            'price' => 1500.00,
            'status' => 'in_progress',
        ]);

        // Заказ на финальных этапах
        CompletedOrder::create([
            'user_id' => $user->id,
            'service_type' => 'Листовки',
            'size' => 'A5',
            'quantity' => 500,
            'price' => 4200.00,
            'status' => 'final_stages',
        ]);

        // Завершённый заказ
        CompletedOrder::create([
            'user_id' => $user->id,
            'service_type' => 'Брошюра',
            'size' => 'A4',
            'quantity' => 200,
            'price' => 8500.00,
            'status' => 'completed',
        ]);
    }
}
