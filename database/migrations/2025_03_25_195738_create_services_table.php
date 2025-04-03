<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Категория услуги (например, "Визитки", "Листовая полиграфия")
            $table->string('name'); // Название услуги (например, "Визитки - Квадратные")
            $table->text('description')->nullable(); // Поле для описания услуги
            $table->string('image'); // Путь к изображению
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};
