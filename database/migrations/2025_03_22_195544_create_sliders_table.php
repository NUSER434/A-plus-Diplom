<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image_url'); // Ссылка на изображение
            $table->string('title'); // Первый текст
            $table->string('subtitle'); // Второй текст
            $table->string('button_text'); // Текст кнопки
            $table->string('button_link'); // Ссылка кнопки
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
