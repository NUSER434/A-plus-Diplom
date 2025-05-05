<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('completed_orders', function (Blueprint $table) {
        $table->string('status')->default('in_progress'); // Возможные значения: in_progress, final_stages, completed
    });
}

public function down()
{
    Schema::table('completed_orders', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
