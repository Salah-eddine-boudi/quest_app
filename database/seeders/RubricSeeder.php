<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubricSeeder extends Seeder
{
    public function run()
    {
        DB::table('rubrics')->insert([
            ['name' => 'Réseau'],
            ['name' => 'IA'],
            ['name' => 'Jeux'],
            ['name' => 'Réseaux sociaux'],
        ]);
    }
}
