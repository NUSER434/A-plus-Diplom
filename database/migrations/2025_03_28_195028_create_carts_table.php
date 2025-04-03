<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('service_name'); // Название услуги
            $table->json('options')->nullable(); // Выбранные параметры
            $table->integer('quantity'); // Количество
            $table->decimal('price', 8, 2); // Цена
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
