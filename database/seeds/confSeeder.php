<?php

use Illuminate\Database\Seeder;

class confSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracion')->insert([
            'duracionVideo' => '5',
            'numImagenes' => '30',
            'numCoordenadas' => '5',
        ]);
    }
}
