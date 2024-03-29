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

        //imagenes
        $directorio = opendir(''.$nombre."/img");
        $img = array();
        $img = $this->leerDirectorio($directorio);
        $img = $this->validarTam($img);

        //Coordenadas
        //$fp = fopen(''.$nombre."/coordenada/coordenada.txt", "r");
        $fp = opendir(''.$nombre."/coordenada");
        $coord = array();
        //$coord = $this->leerArchivo($fp,$coord);
        $coord = $this->leerMultipleArchivo($nombre,$fp,"/coordenada",$coord);
        $coord = $this->validarTam($coord);

        //estadistica por punto de interes
        $dEstadistica = opendir(''.$nombre."/estadistica");
        $est = array();
        $est = $this->leerMultipleArchivo($nombre,$dEstadistica,"/estadistica",$est);
        $est = $this->validarTam($est);

        //promedio por imagen
        $dImagen = opendir(''.$nombre."/estadisticaXimagen");
        $ex = array();
        $ex = $this->leerMultipleArchivo($nombre,$dImagen,"/estadisticaXimagen",$ex);
        $ex = $this->validarTam($ex);

        //temperatura por coordenada
        $dcoord = opendir(''.$nombre."/txt");
        $txt = array();
        $txt = $this->leerTemperaturaAchivo($nombre,$dcoord,"/txt",$txt);
        $txt = $this->validarTam($txt);
        $tamTxT = count($txt[0]);
        $tcontador = array();

        for ($i=0; $i < $tamTxT ; $i++) { 
            $tcontador[] = " ".$i;
        }

        $txt = json_encode($txt);

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
            'txt'   => $txt,
            'nc'    => $tcontador,

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

        $linkGrafica = ''.$proyecto->linkProyecto.'/graficas';
        $direcGrafica = opendir($linkGrafica);
        $grafi = array();
        $grafi = $this->leerDirectorio($direcGrafica);
        $totalGrafica = count($grafi);

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
            'grafica'   =>  $grafi,
            'tg'    => $totalGrafica,

        ]);

    }

    /*
        @Función para descargar los datos de la temperatura de un proyecto elegido en espesifico
        @IBelmont
        @sice 21/10/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function descargar($id)
    {

        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();
        $nombre = $proyecto->linkProyecto;

        $link = ''.$proyecto->linkProyecto.'/txt';
        $user = null;

        //Coordenadas
        //$fp = fopen(''.$nombre."/coordenada/coordenada.txt", "r");
        $fp = opendir(''.$nombre."/coordenada");
        $coord = array();
        //$coord = $this->leerArchivo($fp,$coord);
        $coord = $this->leerMultipleArchivo($nombre,$fp,"/coordenada",$coord);
        $coord = $this->validarTam($coord);

        //temperatura por coordenada
        $dcoord = opendir(''.$nombre."/txt");
        $txt = array();
        $txt = $this->leerTemperaturaAchivo($nombre,$dcoord,"/txt",$txt);
        $txt = $this->validarTam($txt);
        $tamTxT = count($txt[0]);
        $tcontador = array();

        for ($i=0; $i < $tamTxT ; $i++) { 
            $tcontador[] = " ".$i;
        }

        $txt = json_encode($txt);

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

        }

        $direcGrafica = opendir($link);
        $numtxt = array();
        $numtxt = $this->leerDirectorio($direcGrafica);

        return view('card.descargar', [

            'index' =>  $index,
            'pt'    =>  $proyecto,
            'link'  =>  $link,
            'txt'   =>  $txt,
            'cord'  =>  $coord,
            'nc'    => $tcontador,
            'archivo'   => $numtxt,

        ]);

    }

    /*
        @Función para mostrar las imagenes de graficas de un proyecto elegido en espesifico
        @IBelmont
        @sice 20/10/19
        @params $id = noSerie de un proyecto en espesifico
    */
    public function graficas($id)
    {

        $index = 1;
        $proyecto = \App\proyecto::where('noSerie','like','%'.$id.'%')->first();

        $linkGrafica = ''.$proyecto->linkProyecto.'/graficas';
        $direcGrafica = opendir($linkGrafica);
        $grafi = array();
        $grafi = $this->leerDirectorio($direcGrafica);
        $totalGrafica = count($grafi);

        $user = null;

        if(Auth::user()){

            $index = 2;
            $user = Auth::user();

        }

        return view('card.graficas', [

            'pt'    =>  $proyecto,
            'index' =>  $index,
            'user'  =>  $user,
            'grafica'   =>  $grafi,
            'tg'    => $totalGrafica,

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
        @Función que el array contenga algo si no devuelve un null
        @IBelmont
        @sice 21/10/19
        @params $array = contenido a validar
    */    
    public function validarTam($array)
    {

        $tam = count($array);

        if( $tam == 0 ){
            return null;
        }

        return $array;

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

    /*
        @Función leer multiples archivos de un directorio de temperatura por coordenada
        @IBelmont
        @sice 21/10/19
        @params $nombre = nombre de carpeta principal, $arreglo = variable donde se almacenara las lineas del texto
        $directorio = subcarpeta que le leeran los archivos dentro, $carpeta = leer archivo por archivo del sub directorio
    */
    public function leerTemperaturaAchivo($nombre, $directorio, $carpeta,$arreglo)
    {
        while ($archivo = readdir($directorio))
        {

            if (is_dir($archivo))
            {
                
            }
            else
            {

                $fp = fopen(''.$nombre.$carpeta.""."/".$archivo, "r");

                $numero = explode(".txt", $archivo);
                $numero = $numero[0];

                $aux = array(); 
                
                $i = 0;

                while (!feof($fp)){

                    $linea = fgets($fp);

                    if($i>0){

                         $primer = explode(",", $linea);
                         $aux[$primer[0]] = $primer[1].','.$primer[2].','.$primer[3]; 

                    }

                    $i++;

                }

                $arreglo[$numero] = $aux;

            }

        }

        return $arreglo;
    }

}
