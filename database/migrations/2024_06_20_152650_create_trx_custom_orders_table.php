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
        Schema::create('trx_custom_orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo');
            $table->string('email');
            $table->string('phone');
            $table->string('status');
            $table->bigInteger('price');
            $table->string('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_custom_orders');
    }
};
