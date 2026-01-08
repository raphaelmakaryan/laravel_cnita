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
        Schema::create('cart_perso', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idProduct');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idProduct')->references('ID')->on('personalized_glasses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_perso');
    }
};
