<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с пользователем
            $table->string('service_type'); // Тип услуги (например, "Визитки")
            $table->string('size')->nullable(); // Размер
            $table->string('color')->nullable(); // Цвет
            $table->string('paper_type')->nullable(); // Тип бумаги
            $table->string('paper_density')->nullable(); // Плотность бумаги
            $table->string('fabric_type')->nullable(); // Тип ткани (для одежды)
            $table->string('print_type')->nullable(); // Тип печати (для одежды)
            $table->integer('quantity')->default(1); // Количество
            $table->decimal('price', 8, 2)->default(0); // Итоговая цена
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
