@extends('layout.layout')
@section('title')
<title>SMIM</title>
@stop

@section('css')
<link href="{{asset('/Template/plugins/waitme/waitMe.css')}}" rel="stylesheet">
<style type="text/css">
	p {
	  width: 210px;
	  padding: -5px 5px;

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
<!-- {!! $pt->render() !!} {{URL::previous()}} --> 
	<div class="list-group">
	    <a href="{{asset('/biblioteca')}}" class="list-group-item">
	    	<?php $num=0; ?>
	    	<span class="badge bg-teal" id="total" name="total"> {!!$pt->count()!!} de {{$total}}</span>Proyectos
	    </a>	        	
			@if($total > 6)	    	
			<nav>
                <ul class="pager">
                    <li class="previous" id="prev" name="prev">
                        <a href="" onclick="url({{$total}},{{$pg}});" id="atras" name="atras" class="waves-effect"><span aria-hidden="true">←</span>&nbsp;Anterior</a>
                    </li>
                    <li class="next">
                        <a href="{!!$pt->nextPageUrl()!!}" class="waves-effect">Siguiente&nbsp;<span aria-hidden="true">→</span></a>
                    </li>
                </ul>
            </nav>
            @endif 
	</div>
	<div class="row clearfix">
		@foreach($pt as $p)
	    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	        <div class="card">
	            <div class="header"  align="center">
	                <h2>
	                    <a href="{{asset('/proyecto')}}/{{$p->noSerie}}"><img aling='center' class="js-animating-object img-responsive animated zoomIn thumbnail" src="{{$p->imagen()}}" border='0' width='75%' height='75%'></a>
	                    <a href="{{asset('/proyecto')}}/{{$p->noSerie}}"><small><p class="overflow-ellipsis">{{$p->nombreProyecto}}<p></small></a>
	                </h2>
	            </div>
	            <div class="body">
	            	<p class="overflow-ellipsis" >Folio : {{$p->noSerie}}</p>
	            	<p>Tipo : {{$p->tipo->nombre}}</p>
	            	<p class="overflow-ellipsis" >Usuario : {{$p->nombreAlumno}}</p>
	                <p>Fecha : {{$p->fecha()}}</p>
	               	<p>Tiempo de Analisis : {{$p->tiempoAnalisis}}</p>
	            </div>
	        </div>
	    </div>
	    @endforeach
	</div>
@stop
@section('scripts')
<script src="{{asset('/Template/js/pages/cards/basic.js')}}"></script>
<script src="{{asset('/Template/js/pages/ui/animation.js')}}"></script>
<script src="{{asset('/Template/js/custom/page.js')}}"></script>
@stop