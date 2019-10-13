<?php

use Illuminate\Database\Seeder;

class tipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo')->insert([
            'nombre' => 'Soldadura',
        ]);
        DB::table('tipo')->insert([
            'nombre' => 'Maquinado',
        ]);
        DB::table('tipo')->insert([
            'nombre' => 'Fundicion',
        ]);
    }
}
