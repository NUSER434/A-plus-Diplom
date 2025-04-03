<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('category'); // Категория (например, "Бирка", "Бейджи")
            $table->string('image');    // Путь к изображению
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
};
