<?php

use Illuminate\Database\Seeder;

class proyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $llevar = false;

        if( $llevar ){
            DB::table('proyecto')->insert([
                'nombreProyecto' => 'practica1',
                'tipo_id' => '1',
                'fechaCreacion' => '1994-12-09',
                'tiempoAnalisis' => '15',
                'noSerie' =>'5d9e552324a422811fe9728a876d',
                'nombreAlumno' => 'Izacc Belmont Belmont',
                'grupoAlumno' => '5CM1',
                'linkProyecto' => 'Temperaturas/Fundicion/5d9e552324a422811fe9728a876d',
            ]);

            $word = " abcdefghijklmnopqrstuvwxyz a e i o u";
            $nombres = ['Almeja','Alejandra','Belmont','Izacc','Beltran','Shizzu','Destroy','Jhon',' '];

            $ws = "abcdefghijklmnopqrstuvwxyz";
            $num = "123456789";

            $links = [
                'Temperaturas/Fundicion/5da24849a0210561a7d728a876d',
                'Temperaturas/Fundicion/5da2484a90c17951ae6728a876d',
                'Temperaturas/Maquinado/5da2484a473301c22b2728a876d',
                'Temperaturas/Maquinado/5da2484a7e77c1cd2117728a876d',
                'Temperaturas/Soldadura/5da2484a4e7c98bc211d728a876d',
                'Temperaturas/Soldadura/5da2484a3c5c8a0f1d8f728a876d',
                'Temperaturas/Soldadura/5da24a4b2ab7a1f41d2d728a876d',
            ];

            /*
                5da24849a0210561a7d728a876d
                5da2484a90c17951ae6728a876d
                5da2484a473301c22b2728a876d
                5da2484a7e77c1cd2117728a876d
                5da2484a4e7c98bc211d728a876d
                5da2484a3c5c8a0f1d8f728a876d
                5da24a4b2ab7a1f41d2d728a876d
            */

            for($i = 1; $i <= 59; $i++){

                $np = substr(str_shuffle($word), 0, rand (5 , 10));
                $t = rand (1 , 3);
                
                $d = rand (1 , 2);

                if($d==1){
                    $ta = 10;
                }else{
                    $ta = 15;
                }

                $d = rand (1 , 30);

                $inicio = substr(str_shuffle($word), 0, rand (5 , 10));
                $medio = substr(str_shuffle($word), 0, rand (5 , 10));      

                $nombre = $nombres[rand (0 , 8)];
                $apellido = $nombres[rand (0 , 8)];

                $f = substr(str_shuffle($ws), 0, rand (5 , 10));
                $o = substr(str_shuffle($num), 0, rand (5 , 7));
                $l = substr(str_shuffle($ws), 0, rand (3 , 7));
                $io = substr(str_shuffle($num), 0, rand (3 , 7));
                $o = substr(str_shuffle($ws), 0, rand (4 , 8));

                $pos = rand (0 , 4);
                $ruta = $links[$pos];

                DB::table('proyecto')->insert([
                    'nombreProyecto' => $np,
                    'tipo_id' => $t,
                    'tiempoAnalisis' => $ta,
                    'fechaCreacion' => '1994-12-'.$d,
                    'noSerie'=> ''.$f.''.$o.''.$l.''.$io.''.$o,
                    'nombreAlumno' => ''.$nombre.' '.$apellido,
                    'grupoAlumno' => $d.'CM'.$d,
                    'linkProyecto' => $ruta,
                ]);
            }
        }

    }
}