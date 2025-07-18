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
        Schema::create('order_tracking_perso', function (Blueprint $table) {
            $table->id('ID');
            $table->integer("idOrder");
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idProduct');
            $table->integer("quantite");
            $table->float('prix');
            $table->unsignedTinyInteger('status');
            $table->date('date');

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idProduct')->references('ID')->on('personalized_glasses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tracking_perso');
    }
};
