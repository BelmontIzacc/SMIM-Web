<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 6;
        $proyecto = \App\proyecto::paginate($pages);
        $total = count(\App\proyecto::all());
        $index = 1;

        return view('principal.welcome', [
           'index' => $index,
           'pt' => $proyecto,
           'total' => $total,
           'pg' => $pages,
        ]);
    }

    public function buscar(Request $request)
    {
        $this->validate($request, [
            'busqueda' => 'required'
        ]);

        //$medicalData = \App\medicalData::where('numSeguro', 'like', $request->busqueda)->get();

        $index = 1;
        $palabra = $request->busqueda;
        $pages = 6;
        
        $nombreProyecto = \App\proyecto::where('nombreProyecto','like','%'.$palabra.'%')->get();
        $tiempoProyecto = \App\proyecto::where('tiempoAnalisis','like','%'.$palabra.'%')->get();
        $serieProyecto = \App\proyecto::where('noSerie','like','%'.$palabra.'%')->get();
        $alumnoProyecto = \App\proyecto::where('nombreAlumno','like','%'.$palabra.'%')->get();
        $grupoProyecto = \App\proyecto::where('grupoAlumno','like','%'.$palabra.'%')->get();
        
        $tipo = \App\tipo::where('nombre','like','%'.$palabra.'%')->first();
        $tipoProyecto = null;
        if(count($tipo) != 0){
            $id = $tipo->id;
            $tipoProyecto = \App\proyecto::where('tipo_id','like','%'.$id.'%')->get();
        }
        

        $coin = 0;

        if(count($nombreProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($tiempoProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($serieProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($alumnoProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($grupoProyecto) != 0){
             $coin = $coin+1;
        }

        if($tipoProyecto != null || count($tipoProyecto) != 0){
             $coin = $coin+1;
        }

        return view('principal.search', [
            'index' => $index,
            'palabra' => $palabra,
            'coin'  => $coin,
            'np'    => $nombreProyecto,
            'tp'    => $tiempoProyecto,
            'sp'    => $serieProyecto,
            'ap'    => $alumnoProyecto,
            'gp'    => $grupoProyecto,
            'tip'   => $tipoProyecto,
        ]);
        
    }

    public function buscarIndi($palabra,$t)
    {
        $index = 1;
        $pages = 6;
        
        $nombreProyecto = \App\proyecto::where('nombreProyecto','like','%'.$palabra.'%')->get();
        $tiempoProyecto = \App\proyecto::where('tiempoAnalisis','like','%'.$palabra.'%')->get();
        $serieProyecto = \App\proyecto::where('noSerie','like','%'.$palabra.'%')->get();
        $alumnoProyecto = \App\proyecto::where('nombreAlumno','like','%'.$palabra.'%')->get();
        $grupoProyecto = \App\proyecto::where('grupoAlumno','like','%'.$palabra.'%')->get();
        
        $tipo = \App\tipo::where('nombre','like','%'.$palabra.'%')->first();
        $tipoProyecto = null;
        if(count($tipo) != 0){
            $id = $tipo->id;
            $tipoProyecto = \App\proyecto::where('tipo_id','like','%'.$id.'%')->get();
        }
        

        $coin = 0;

        if(count($nombreProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($tiempoProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($serieProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($alumnoProyecto) != 0){
             $coin = $coin+1;
        }

        if(count($grupoProyecto) != 0){
             $coin = $coin+1;
        }

        if($tipoProyecto != null || count($tipoProyecto) != 0){
             $coin = $coin+1;
        }

        $objeto = null;
        if($t == 'NombreProyecto'){
            $objeto = $nombreProyecto;
        }else if($t == 'TiempoAnalisis'){
            $objeto = $tiempoProyecto;
        }else if($t == 'NumeroSerie'){
            $objeto = $serieProyecto;
        }else if($t == 'NombreAlumno'){
            $objeto = $alumnoProyecto;
        }else if($t == 'GrupoAlumno'){
            $objeto = $grupoProyecto;
        }else if($t == 'TipoProyecto'){
            $objeto = $tipoProyecto;
        }

        return view('principal.searchRes', [
            'index' => $index,
            'palabra' => $palabra,
            'coin'  => $coin,
            'np'    => $nombreProyecto,
            'tp'    => $tiempoProyecto,
            'sp'    => $serieProyecto,
            'ap'    => $alumnoProyecto,
            'gp'    => $grupoProyecto,
            'tip'   => $tipoProyecto,
            'ob'    => $objeto,
        ]);

    }

    public function proyecto($id)
    {
        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();
        $nombre = $proyecto->linkProyecto;

        $directorio = opendir(''.$nombre."/img"); //ruta actual
        $img = array();

        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio
            {
                //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
            else
            {
                //echo $archivo . "<br />";
                $img[] = ''.$archivo;
            }
        }


        //Coordenadas
        $fp = fopen(''.$nombre."/coordenada/coordenada.txt", "r");
        $coord = array();
        $i = 0;
        while (!feof($fp)){
            $linea = fgets($fp);
            //echo $linea;
            if($i>0){
                $coord[] = $linea;
            }
            $i++;
        }
        fclose($fp);

        //print_r($coord);

        return view('card.individual', [
            'pt'    =>  $proyecto,
            'index' =>  $index,
            'img'   =>  $img, 
            'cord'  =>  $coord,
        ]);
    }

    public function galeria($id)
    {
        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();

        $link = ''.$proyecto->linkProyecto.'/img';
        $directorio = opendir($link); //ruta actual
        $img = array();

        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio
            {
                //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
            else
            {
                //echo $archivo . "<br />";
                $img[] = ''.$archivo;
            }
        }

        return view('card.galeria', [
            'pt'    =>  $proyecto,
            'index' =>  $index,
            'img'   =>  $img, 
        ]);
    }

    public function test()
    {
        $directorio = opendir("Temperaturas"); //ruta actual
        $cantidad = 0;

        $array = array();

        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio
            {
                echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
            else
            {
                echo $archivo . "<br />";
                $array[] = ''.$archivo;
            }
        }
        print_r($array);
    }


    public function error404()
    {
        return view('errors.404', [
           
        ]);
    }
    public function store(Request $request)
    {
        user::create($request->all());
        return view('layout');
    }
    public function stop()
    {
        $index = 4;
        return view('errors.unavailable', ['index'=>$index]);
    }

}
