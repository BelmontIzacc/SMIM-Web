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
                    <span class="badge bg-green">{{$np->count()}}</span>Nombre de Proyecto
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($tp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/TiempoAnalisis" class="list-group-item">
                    <span class="badge bg-blue">{{$tp->count()}}</span>Tiempo de Analisis
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($sp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/NumeroSerie" class="list-group-item">
                    <span class="badge bg-teal">{{$sp->count()}}</span>Numero de Serie
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($ap) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/NombreAlumno" class="list-group-item">
                    <span class="badge bg-orange">{{$ap->count()}}</span>Nombre del Usuario
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($gp) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/GrupoAlumno" class="list-group-item">
                    <span class="badge bg-pink">{{$gp->count()}}</span>Grupo del Usuario
                </a>
        <?php 
    		endif; 
    	?>

		<?php 	
		 	if( count($tip) != 0):
		?>
		 		<a href="{{asset('/resultados/palabra=')}}{{$palabra}}/TipoProyecto" class="list-group-item">
                    <span class="badge bg-purple">{{$tip->count()}}</span>Tipo de Proyecto
                </a>
        <?php 
    		endif; 
    	?>
		</div>
	</div>

	<div class="row clearfix">
		@foreach($ob as $o)
	    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	        <div class="card"> 
	            <div class="header"  align="center">
	                <h2>
	                    <a href="{{asset('/proyecto')}}/{{$o->noSerie}}"><img aling='center' class="js-animating-object img-responsive animated zoomIn thumbnail" src="{{asset('/')}}/{{$o->imagen()}}" border='0' width='75%' height='75%'></a>
	                    <a href="{{asset('/proyecto')}}/{{$o->noSerie}}"><small>{{$o->nombreProyecto}}</small></a>
	                </h2>
	            </div>
	            <div class="body">
	            	<p class="overflow-ellipsis" >Folio : {{$o->noSerie}}</p>
	            	<p>Tipo : {{$o->tipo->nombre}}</p>
	            	<p class="overflow-ellipsis" >Usuario : {{$o->nombreAlumno}}</p>
	                <p>Fecha : {{$o->fecha()}}</p>
	               	<p>Tiempo de Analisis : {{$o->tiempoAnalisis}}</p>
	            </div>
	        </div>
	    </div>
		@endforeach
	</div>
	
@stop
@section('scripts')

@stop