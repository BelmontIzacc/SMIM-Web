<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

/*** 
    Funciones para el control general del sistema, contiene funciones para la muestra de información,
    Galería, vista principal, vista detallada de un solo proyecto, buscar proyectos en el sistema por palabras clave 
    Y mostrar todos los proyectos registrados.
    @autor IBelmont
    @since 20/09/19
***/

class welcomeController extends Controller
{
    /*
        @Devuelve la vista principal, enviando la información de los proyectos registrados
        Y si se esta logeado se envia la informacion del usuario a la vista.
        @IBelmont
        @sice 20/09/19
    */
    public function index()
    {
        if(Auth::user()){

            $pages = 6;
            $proyecto = \App\proyecto::paginate($pages);
            $total = count(\App\proyecto::all());
            $index = 2;
            $user = Auth::user();

            return view('principal.welcome', [
               'index' => $index,
               'pt' => $proyecto,
               'total' => $total,
               'pg' => $pages,
               'user'   => $user,
            ]);

        }else{

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
    }

    /*
        @Función para encontrar las coincidencias con la palabra clave en los proyectos registrados en base de datos en el sistema
        @IBelmont
        @sice 28/09/19
        @params Request $request -> Palabra clave a buscar
    */
    public function buscar(Request $request)
    {

        $this->validate($request, [

            'busqueda' => 'required'

        ]);

        $index = 1;
        $user = null;

        if(Auth::user()){
            $index = 2;
            $user = Auth::user();
        }

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
            'user'  => $user,

        ]);
        
    }

    /*
        @Función para mostrar el resultado de la busqueda de la palabra clave despues de elegir una categoria para la
        Muestra de proyectos relacionados.
        @IBelmont
        @sice 29/09/19
        @params $palabra = palabra clave a buscar, $t = categoria para mostrar el resultado
    */
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

        switch ($t) {
            case 'NombreProyecto':
                $objeto = $nombreProyecto;
                break;
            case 'TiempoAnalisis':
                $objeto = $tiempoProyecto;
                break;
            case 'NumeroSerie':
                $objeto = $serieProyecto;
                break;
            case 'NombreAlumno':
                $objeto = $alumnoProyecto;
                break;
            case 'GrupoAlumno':
                $objeto = $grupoProyecto;
                break;
            case 'TipoProyecto':
                $objeto = $tipoProyecto;
                break;
        }

        $user = null;

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

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
            'user'  => $user,

        ]);

    }

    /*
        @Función para mostrar la información desglosada de un proyecto en específico
        @IBelmont
        @sice 20/09/19
        @params $id = noSerie del proyecto
    */
    public function proyecto($id)
    {

        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();
        $nombre = $proyecto->linkProyecto;

        $directorio = opendir(''.$nombre."/img");
        $img = array();
        $img = $this->leerDirectorio($directorio);
        $totalImg = count($img);

        //Coordenadas
        $fp = fopen(''.$nombre."/coordenada/coordenada.txt", "r");
        $coord = array();
        $coord = $this->leerArchivo($fp,$coord);

        //estadistica por punto de interes
        $dEstadistica = opendir(''.$nombre."/estadistica");
        $est = array();
        $est = $this->leerMultipleArchivo($nombre,$dEstadistica,"/estadistica",$est);

        $tamEs = count($est);

        if($tamEs == 0){

            $est = null;

        }

        //promedio por imagen
        $dImagen = opendir(''.$nombre."/estadisticaXimagen");
        $ex = array();
        $ex = $this->leerMultipleArchivo($nombre,$dImagen,"/estadisticaXimagen",$ex);

        $tamEx = count($ex);

        if($tamEx == 0){

            $ex = null;

        }
        
        $user = null;

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

        }

        return view('card.individual', [

            'pt'    =>  $proyecto,
            'index' =>  $index,
            'img'   =>  $img, 
            'cord'  =>  $coord,
            'dImagen'   =>  $ex,
            'dEsta' =>  $est,
            'user'  => $user,
            'total' =>  $totalImg,

        ]);

    }

    /*
        @Función para mostrar las imagenes de un proyecto elegido en espesifico
        @IBelmont
        @sice 05/10/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function galeria($id)
    {

        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();

        $link = ''.$proyecto->linkProyecto.'/img';
        $directorio = opendir($link); 
        $img = array(); 
        $img = $this->leerDirectorio($directorio);
        $totalImg = count($img);

        $user = null;

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

        }

        return view('card.galeria', [

            'pt'    =>  $proyecto,
            'index' =>  $index,
            'img'   =>  $img, 
            'user'  =>  $user,
            'total' =>  $totalImg,

        ]);

    }


    /*
        @Función para mostrar todos los proyectos en específico del sistema
        @IBelmont
        @sice 06/10/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function biblioteca()
    {
        $index = 1;
        $proyecto = \App\proyecto::all();

        $user = null;

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

        }

        return view('biblioteca.biblioteca', [

            'index' =>  $index,
            'proyecto' => $proyecto,
            'user'  => $user,

        ]);

    }

    /*
        @Función que devuelve la vista de creditos
        @IBelmont
        @sice 12/10/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function creditos()
    {
        $index = 2;

        return view('principal.creditos', [

            'index' =>  $index,

        ]);

    }

/*
        @Función leer multiples archivos de un directorio
        @IBelmont
        @sice 20/10/19
        @params $nombre = nombre de carpeta principal, $arreglo = variable donde se almacenara las lineas del texto
        $directorio = subcarpeta que le leeran los archivos dentro, $carpeta = leer archivo por archivo del sub directorio
    */
    public function leerMultipleArchivo($nombre, $directorio, $carpeta,$arrelo)
    {
        while ($archivo = readdir($directorio))
        {

            if (is_dir($archivo))
            {
                
            }
            else
            {

                $fp = fopen(''.$nombre.$carpeta.""."/".$archivo, "r");
                
                $i = 0;

                while (!feof($fp)){

                    $linea = fgets($fp);

                    if($i>0){

                        $arrelo[] = $linea;

                    }

                    $i++;

                }

            }

        }

        return $arrelo;
    }

    /*
        @Función leer un archivo de un directorio
        @IBelmont
        @sice 20/10/19
        @params $fileOpen = direcion de la carpeta del txt, $arreglo = variable donde se almacenara las lineas del texto
    */
    public function leerArchivo($fileOpen,$arreglo)
    {
        $fp = $fileOpen;
        $i = 0;
        while (!feof($fp)){

            $linea = fgets($fp);

            if($i>0){

                $arreglo[] = $linea;

            }

            $i++;

        }

        fclose($fp);
        return $arreglo;
    }

    /*
        @Función leer las imagenes de un directorio
        @IBelmont
        @sice 20/10/19
        @params $directorio = direcion de la carpeta de imagenes
    */
    public function leerDirectorio($directorio)
    {
        $arreglo = array();

        while ($archivo = readdir($directorio)) 
        {

            if (is_dir($archivo))
            {
                
            }
            else
            {

                $arreglo[] = ''.$archivo;

            }

        }

        return $arreglo;
    }

    /*
        @Función que devuelve la vista del error 404
        @IBelmont
        @sice 20/09/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function error404()
    {

        return view('errors.404');

    }

    /*
        @Función que devuelve la pura vista del layout
        @IBelmont
        @sice 20/09/19
        @params Request $requiest
    */    
    public function store(Request $request)
    {

        user::create($request->all());
        return view('layout');

    }

    /*
        @Función que devuelve la vista de no encontrado
        @IBelmont
        @sice 20/09/19
    */        
    public function stop()
    {

        $index = 4;
        return view('errors.unavailable', ['index'=>$index]);

    }

}
