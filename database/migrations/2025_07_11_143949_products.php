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
        Schema::create('products', function (Blueprint $table) {
            $table->id('ID');
            $table->string('nom', 1000);
            $table->string('description', 200)->default("Pas de description");
            $table->string('genre', 8)->default("Unisexe");
            $table->string('taille', 6)->default("Petit");
            $table->string('forme', 1000)->default("Non renseigné");
            $table->text('image');
            $table->integer('prix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
