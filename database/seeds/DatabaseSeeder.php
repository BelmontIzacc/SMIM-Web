<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(tipoSeeder::class);
        $this->call(confSeeder::class);
        $this->call(paletaSeeder::class);
        $this->call(userSeeder::class);
        $this->call(proyectoSeeder::class);

        Model::reguard();
    }
}
