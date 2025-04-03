<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable(); // Путь к аватарке
            $table->string('name'); // Имя пользователя
            $table->decimal('rating', 3, 1); // Оценка (например, 4.7)
            $table->text('review'); // Текст отзыва
            $table->string('source'); // Источник отзыва (например, "Яндекс карты")
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
