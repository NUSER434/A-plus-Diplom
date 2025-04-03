<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable(); // Имя
            $table->string('last_name')->nullable(); // Фамилия
            $table->string('middle_name')->nullable(); // Отчество
            $table->string('email')->unique(); // E-mail
            $table->string('phone')->nullable(); // Телефон
            $table->string('password'); // Пароль
            $table->string('image')->nullable(); // Добавляем поле image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
