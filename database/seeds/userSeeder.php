<?php

use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'username' => '2016670126',
            'password' => bcrypt('admin'),
            'tipo' => '1',
            'email' => 'jisagiizacc@gmail.com'
        ]);
    }
}
