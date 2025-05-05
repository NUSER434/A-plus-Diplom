<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('search_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');     // Название ссылки (например, "Портфолио")
            $table->string('url');      // URL (например, "/portfolio")
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_items');
    }
};
