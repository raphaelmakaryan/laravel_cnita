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
        Schema::create('personalized_glasses', function (Blueprint $table) {
            $table->id('ID');
            $table->unsignedBigInteger('idUser');
            $table->string('monture', 1000);
            $table->string('couleurmonture', 1000);
            $table->string('verre', 1000);
            $table->string('couleurverre', 1000);
            $table->string('boite', 1000);
            $table->string('couleurboite', 1000);
            $table->integer('prix');


            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalized_glasses');
    }
};
