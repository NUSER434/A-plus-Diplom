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
        // Создаем тестового пользователя
        User::create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Пароль: password
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'middle_name' => 'Иванович',
            'phone' => '+79991234567',
            'image' => 'https://th.bing.com/th/id/OIP.rJF5rju8RUqWm7kKdm-5_wHaHa?rs=1&pid=ImgDetMain', // Заглушка для аватара
        ]);

        // Добавляем еще одного пользователя
        User::create([
            'email' => 'guest@example.com',
            'password' => Hash::make('guest123'), // Пароль: guest123
            'first_name' => 'Гость',
            'last_name' => 'Гостев',
            'middle_name' => null,
            'phone' => '+79997654321',
            'image' => 'https://th.bing.com/th/id/OIP.g-Qt7XhrQmsU38MDZ65kyAHaGE?rs=1&pid=ImgDetMain',
        ]);
    }
}
