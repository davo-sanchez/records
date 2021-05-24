<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('holders')->insert([
            ['name' => 'Julia'],
            ['name' => 'Trinidad'],
            ['name' => 'Ana'],
            ['name' => 'Samuel'],
            ['name' => 'Sebastian'],
            ['name' => 'Martin'],
            ['name' => 'Raúl'],
            ['name' => 'Archivo'],
            ['name' => 'Agustin'],
            ['name' => 'Rodrigo'],
            ['name' => 'Reina'],
        ]);
    }
}
