<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            ['ID' => 1, 'nom' => 'Attente de traitement'],
            ['ID' => 2, 'nom' => 'Préparation'],
            ['ID' => 3, 'nom' => 'En cours de livraison'],
            ['ID' => 4, 'nom' => 'En retard'],
            ['ID' => 5, 'nom' => 'Livré'],
        ]);
    }
}
