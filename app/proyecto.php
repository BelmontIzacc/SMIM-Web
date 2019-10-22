<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyecto extends Model
{
	protected $table = 'proyecto';

    protected $fillable = [
        'nombreProyecto',
        'tipo_id',
        'fechaCreacion',
        'tiempoAnalisis',
        'noSerie',
        'nombreAlumno',
        'grupoAlumno',
        'linkProyecto',
    ];
    
    public function tipo(){
        return $this->belongsTo(tipo::class, 'tipo_id');
    }
    
    public function imagen(){
        $imgDirectorio = opendir(''.$this->linkProyecto.'/img'); //ruta actual
        $img = array();

        while ($archivo = readdir($imgDirectorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio
            {
                //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
            else
            {
                //echo $archivo . "<br />";
                $img[] = ''.$archivo;
                break;
            }
        }

        $tam = count($img);
        if($tam == 0){
            return '/Template/images/imagenNo.png';
        }else{
            return '/'.$this->linkProyecto.'/img/'.$img[0];
        }
    }

    public function img($num){
        return '/'.$this->linkProyecto.'/img/'.$num.'.png';
    }

    public function graficas($nombre){
        return '/'.$this->linkProyecto.'/graficas/'.$nombre;
    }

    public function video(){
        $vidDirectorio = opendir(''.$this->linkProyecto.'/vid'); //ruta actual
        $vid = array();

        while ($archivo = readdir($vidDirectorio)) //obtenemos un archivo y luego otro sucesivamente
        {
            if (is_dir($archivo))//verificamos si es o no un directorio
            {
                //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
            }
            else
            {
                //echo $archivo . "<br />";
                $vid[] = ''.$archivo;
                break;
            }
        }

        $tam = count($vid);
        if($tam == 0){
            return null;
        }else{
            return '/'.$this->linkProyecto.'/vid/'.$vid[0];
        }
    }

    public function fecha()
    {
        $origDate = "".$this->fechaCreacion;
         
        $newDate = date("d-m-Y", strtotime($origDate));
        return $newDate;
    }
}
