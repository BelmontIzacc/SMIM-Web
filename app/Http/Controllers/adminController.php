<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/*** 
    Funciones para el control de acceso y movimientos para la sesión administrador, donde se podra editar y borrar información del sistema SMIM para pc, la información que se puede editar: puntos de interes, numero de imagenes para procesar y duracion del video, y lo que se puede borrar : proyectos registrados en el sistema con su respectiva carpeta de archivos.
    @autor IBelmont
    @since 20/09/19
***/

class adminController extends Controller
{

    /*
        @Funcion que contruye autentificando el administrador
        @IBelmont
        @sice 20/09/19
    */    
    public function __construct()
    {

       $this->middleware('auth');

    }

    /*
        @Función que redireccionar la vista principal
        @IBelmont
        @sice 20/09/19
        @params $id = noSerie de un proyecto en espesifico
    */    
    public function index()
    {

        return redirect('/');

    }

    /*
        @Función que devuelve la vista con la información de la configuración para poder ser editada
        @IBelmont
        @sice 12/10/19
    */    
    public function editar()
    {

        $index = 2;
        $config = \App\config::where('id','=','1')->first();

        $tipo = \App\tipo::all();
        $nombre = $tipo->first();

        if( $nombre != null){
            $nombre = $tipo->first()->nombre;
        }else{
            $nombre = "";
        }
        
        $pVideo = explode(",",$config->procesamientoVid);

        $inicio = $this->validarActivo();

        return view('admin.editar', [

           'index' => $index,
           'config' => $config,
           'tipo'   =>  $tipo,
           'tipoN'  => $nombre,
           'dv' =>  $pVideo,
           'ini'    =>  $inicio,

        ]);

    }

    /*
        @Función para enviar los cambios a base de datos
        @IBelmont
        @sice 13/10/19
        @params Request $request = información a cambiar puntos de interes, duracion del video, duracion de imagenes
    */    
    public function editarPost(Request $request)
    {

        $this->validate($request, [
            'nInteres' => 'required',
            'nImagenes' => 'required',
            'nVideo' => 'required',
            'nTipo' => 'required',
            'nTipoBorrar' => 'required',
            'nTiempo'   =>  'required',
        ]);

        $config = \App\config::find(1);

        $coord = $config->numCoordenadas;
        $nInteres = $request->nInteres;

        if($nInteres != "-1"){
            if($coord != $nInteres){

                $this->guardar($config,'numCoordenadas', $nInteres);

            }
        }

        $images = $config->numImagenes;
        $nImages = $request->nImagenes;

        if($nImages != "-1"){
            if($images != $nImages){

                $this->guardar($config,'numImagenes', $nImages);

            }
        }

        $video = $config->duracionVideo;
        $nVideo = $request->nVideo;

        if($nImages != "-1"){
            if($video != $nVideo){

                $this->guardar($config,'duracionVideo', $nVideo);

            }
        }

        $nTipo = $request->nTipo;
        $nTipo = strtolower($nTipo);
        $nTipo = ucfirst($nTipo);
        $t = \App\tipo::where('nombre','=',$nTipo)->exists();

        if($nTipo != "-1"){
            if(!$t){

                $tipo = new \App\tipo;

                $tipo->nombre = $request->nTipo;

                $tipo->save();

            }
        }


        $tiempo = $config->procesamientoVid;
        $nTiempo = $request->nTiempo;

        if($nTiempo != "-1"){

            $pVideo = explode(",",$config->procesamientoVid);
            $existe = false;
            foreach ($pVideo as $p) {
                if($nTiempo == $p){
                    $existe = true;
                }
            }

            if($existe == false){
                $tiempo = $tiempo.",".$nTiempo;
                $this->guardar($config,'procesamientoVid', $tiempo);

            }
        }

        $ntb = $request->nTipoBorrar;

        if($ntb != "-1"){
            $tipoC = \App\tipo::find($ntb);
            $tipoC->delete();
        }

        $num = $request->nTiempoBorrar;

        if($num != "-1"){
            $pVideo = explode(",",$config->procesamientoVid);
            $existe = "";
            foreach ($pVideo as $p) {
                if($num != $p){
                    $existe = $existe."".$p.",";
                }
            }

            $existe = substr($existe, 0, -1);
            $this->guardar($config,'procesamientoVid', $existe);
        }

        return redirect('/configuracion/editar')
        ->withErrors([

            $request->clave => 'Se realizo la actualizacion correctamente',

        ]);

    }

    /*
        @Función para guardar cambios a base de datos tabla configuracion
        @IBelmont
        @sice 19/10/19
        @params $config = objeto de tipo configuracion, $columnaDB = columna a modificar de BD, $valor = entrada con la cual se actualizara
    */   
    public function guardar($config,$columnaDB, $valor)
    {
        $config->$columnaDB = $valor;

        $config->save();
    }

    /*
        @Función que da la vista para borrar los datos de la base de datos
        @IBelmont
        @sice 12/10/19
    */    
    public function borrar()
    {

        $index = 2;
        $proyecto = \App\proyecto::all();

        return view('admin.borrar', [

           'index' => $index,
           'proyecto' => $proyecto,

        ]);

    }

    /*
        @Función POST que recibe el id para borrar los datos de la base de datos
        @IBelmont
        @sice 12/10/19
        @params Request $request = recibe el numero de serie para borrar un proyecto
    */  
    public function borrarPost(Request $request)
    {

        $this->validate($request, [
            'borrar' => 'required',
        ]);

        $noSerie = $request->borrar;
        $proyecto = \App\proyecto::where('noSerie','=',$noSerie)->first();
        $nombre = $proyecto->nombreProyecto;
        $link = $proyecto->linkProyecto;

        $this->borrarDirectorio($link);
        $proyecto->delete();

        return redirect('/configuracion/borrar')
            ->withErrors([

                $request->clave => 'Se borro el proyecto '.$nombre.' correctamente',

            ]);

    }

    /*
        @Función para borrar un directorio y todo su contenido
        @IBelmont
        @sice 20/10/19
        @params $directorio = ruta para borrar toda una carpeta completa
    */  
    public function borrarDirectorio($directorio)
    {

        foreach (glob($directorio."/*") as $archivos_directorio) {
            
            if(is_dir($archivos_directorio)){

                $this->borrarDirectorio($archivos_directorio);

            }else{

                unlink($archivos_directorio);

            }

        }

        rmdir($directorio);

    }

    /*
        @Función para activar o desactivar botones en union a sus mensajes para editar el sistema SMIM-PC
        @IBelmont
        @sice 12/11/19
    */ 

    public function validarActivo()
    {

        $resultado = [];

        $activo = $this->crearArray();
        
        foreach ($activo as $k) {

            if($k[1] == "disabled"){
                
                $resultado[$k[0]]["cabezera"] = $this->mensajeNoDisponible()["cabezera"];
                $resultado[$k[0]]["cuerpo"] = $this->mensajeNoDisponible()["cuerpo"]; 
                $resultado[$k[0]]["status"] = $k[1];

            }else{

                $resultado[$k[0]]["cabezera"] = $this->mensajeDisponible();
                $resultado[$k[0]]["cuerpo"] = ""; 
                $resultado[$k[0]]["status"] = $k[1];

            }

        }
        
        return $resultado;
        
    }

    /*
        @Función para definir que se encuentra activado o desactivado
        @IBelmont
        @sice 12/11/19
    */ 

    public function crearArray()
    {
        $activar = $this->activar();

        $temporal = [

            0 => ["numImagenes",$activar["numImagenes"]],

            1 => ["duracionVideo",$activar["duracionVideo"]],

            2 => ["tipo",$activar["tipo"]],

            3 => ["tiempo",$activar["tiempo"]]

        ];

        return $temporal;
    }

    /*
        @Función para activar o desactivar botones para editar el sistema SMIM-PC
        @IBelmont
        @sice 12/11/19
    */ 

    public function activar()
    {

        $active = [

            "numImagenes" => "disabled", //Numero máximo de Imagenes a analizar por defecto 30

            "duracionVideo" => "disabled", //Duracion máxima del video en minutos por defecto 5 mins

            "tipo" => "disabled", //Tipo de proyecto por defecto : Soldadura , Maquinado , Fundicion

            "tiempo" => "disabled", //Tiempo del procesamiento de video por defecto : 10, 15 seg

        ];
        
        return $active;

    }

    /*
        @Función para mostrar el mensaje de no disponible en editar
        @IBelmont
        @sice 12/11/19
    */ 

    public function mensajeNoDisponible()
    {

        $mensaje = [

            "cabezera"  => "Aun no disponible ...",
            "cuerpo" => "Por el momento no se puede cambiar lo siguiente.",

        ];

        return $mensaje;

    }

    /*
        @Función para mostrar el mensaje de disponible en editar
        @IBelmont
        @sice 12/11/19
    */ 

    public function mensajeDisponible()
    {

        $mensaje = "Habilita la casilla para poder cambiar el valor.";

        return $mensaje;

    }

}
