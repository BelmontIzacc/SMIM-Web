<?php

use Illuminate\Database\Seeder;

class paletaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paletaColores')->insert([
            'tonalidadRangoMax' => '-123456',
            'tonalidadRangoMin' => '-7891011',
            'tempRangoMax' => '304',
            'tempRangoMin' => '25',
            'NombrePaleta' => 'Arcoiris',
        ]);
    }
}
