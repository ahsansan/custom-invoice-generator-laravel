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
        Schema::create('config_apps', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->text('website_desc');
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('midtrans_server_key');
            $table->string('midtrans_client_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_apps');
    }
};
