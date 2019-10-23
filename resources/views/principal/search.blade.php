@extends('layout.layout')
@section('title')
<title>SMIM Buscar</title>
@stop

@section('css')
<link href="{{asset('/Template/plugins/waitme/waitMe.css')}}" rel="stylesheet">
<style type="text/css">
	p {
	  width: 210px;
	  /*padding: 2px 5px;*/

	  /* BOTH of the following are required for text-overflow */
	  white-space: nowrap;
	  overflow: hidden;
	}
	.overflow-ellipsis {
  		text-overflow: ellipsis;
	}
</style>
@stop
@section('popUp')
@stop
@section('content')
	<div class="list-group">
	    <a class="list-group-item">
	        <span class="badge bg-cyan">{{$coin}}</span>Coincidencias para la busqueda : {{$palabra}}
	    </a>
	</div>
	<div class="row clearfix">
		<div class="list-group">
		<?php
		 	if( count($np) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/NombreProyecto" class="list-group-item">
                    <span class="badge bg-green">Resultados : {{$np->count()}}</span>Nombre de Proyecto
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($tp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/TiempoAnalisis" class="list-group-item">
                    <span class="badge bg-blue">Resultados : {{$tp->count()}}</span>Tiempo de Analisis
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($sp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/NumeroSerie" class="list-group-item">
                    <span class="badge bg-teal">Resultados : {{$sp->count()}}</span>Numero de Serie
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($ap) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/NombreAlumno" class="list-group-item">
                    <span class="badge bg-orange">Resultados : {{$ap->count()}}</span>Nombre del Usuario
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($gp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/GrupoAlumno" class="list-group-item">
                    <span class="badge bg-pink">Resultados : {{$gp->count()}}</span>Grupo del Usuario
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($tip) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/TipoProyecto" class="list-group-item">
                    <span class="badge bg-purple">Resultados : {{$tip->count()}}</span>Tipo de Proyecto
                </a>
        <?php 
    		endif; 
    	?>
		</div>
	</div>
@stop
@section('scripts')

@stop