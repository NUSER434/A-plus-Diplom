<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // Общий пароль для всех тестовых пользователей
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'middle_name' => $this->faker->middleName(),
            'image' => 'https://via.placeholder.com/150', // Заглушка для аватара
        ];
    }
}
