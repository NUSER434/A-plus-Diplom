<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
        public function run()
        {
        // В файле DatabaseSeeder.php
        User::create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'middle_name' => 'Иванович',
            'phone' => '+79991234567',
            'image' => 'https://th.bing.com/th/id/OIP.rJF5rju8RUqWm7kKdm-5_wHaHa?rs=1&pid=ImgDetMain',
            'role' => 'admin', // Добавлено
        ]);

        User::create([
            'email' => 'guest@example.com',
            'password' => Hash::make('guest123'),
            'first_name' => 'Гость',
            'last_name' => 'Гостев',
            'middle_name' => null,
            'phone' => '+79997654321',
            'image' => 'https://th.bing.com/th/id/OIP.g-Qt7XhrQmsU38MDZ65kyAHaGE?rs=1&pid=ImgDetMain',
            'role' => 'user', // Добавлено
        ]);
        User::create([
            'email' => 'slava@example.com',
            'password' => Hash::make('slava123'),
            'first_name' => 'Слава',
            'last_name' => 'Горкин',
            'middle_name' => 'Иванович',
            'phone' => '+79991159221',
            'image' => 'https://th.bing.com/th/id/OIP.g-Qt7XhrQmsU38MDZ65kyAHaGE?rs=1&pid=ImgDetMain',
            'role' => 'user', // Добавлено
        ]);
        User::create([
            'email' => 'qurat@example.com',
            'password' => Hash::make('wete123'),
            'first_name' => 'Кирилл',
            'last_name' => 'Каримов',
            'middle_name' => null,
            'phone' => '+79934654211',
            'image' => 'https://th.bing.com/th/id/OIP.g-Qt7XhrQmsU38MDZ65kyAHaGE?rs=1&pid=ImgDetMain',
            'role' => 'user', // Добавлено
        ]);
        User::create([
            'email' => 'west12@example.com',
            'password' => Hash::make('terwdsfd23123'),
            'first_name' => 'Лиза',
            'last_name' => 'Шалинина',
            'middle_name' => 'Максимовна',
            'phone' => '+79297544391',
            'image' => 'https://th.bing.com/th/id/OIP.g-Qt7XhrQmsU38MDZ65kyAHaGE?rs=1&pid=ImgDetMain',
            'role' => 'user', // Добавлено
        ]);
    }
}
