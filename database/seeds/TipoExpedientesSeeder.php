<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoExpedientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_expedientes')->insert([
            ['nombre_tipo_expediente' => 'Ordinario'],
            ['nombre_tipo_expediente' => 'Tramite'],
            ['nombre_tipo_expediente' => 'Convenio'],
            ['nombre_tipo_expediente' => 'Embargo Precautorio'],
            ['nombre_tipo_expediente' => 'Para Procesal'],
            ['nombre_tipo_expediente' => 'Tercerías'],
            ['nombre_tipo_expediente' => 'Laudos'],
            ['nombre_tipo_expediente' => 'Amparos Directos'],
            ['nombre_tipo_expediente' => 'Amparos Indirectos'],
            ['nombre_tipo_expediente' => 'Ejecución'],
            ['nombre_tipo_expediente' => 'Exhortos'],
        ]);
    }
}
