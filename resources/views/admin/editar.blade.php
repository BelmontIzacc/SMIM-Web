@extends('layout.layout2')
@section('title')
<title>SMIM Editar</title>
@stop

@section('css')
<link href="{{asset('/Template/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
<link href="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@stop
@section('popUp')

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar</h5>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea guardar los cambios?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="editar();" style="background-color: #008080; color: #FFFFFF;" type="button" class="btn">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<?php $num = count($errors); ?>
			@if($num != 0)
			<div class="alert  bg-green alert-fill alert-close alert-dismissible fade in" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		        </button>
		        <ul>
		            @foreach($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
			@endif
	    <div class="card">
	        <div class="header">
	            <h2>
	                Cambiar configuracion de SMIM para PC
	            </h2>
	        </div>
	        <div class="body" align="center">
	        	<h2 class="card-inside-title" align="center">
                    Numero máximo de Coordenadas o Puntos de Interes
                    <small>Habilita la casilla para poder cambiar el valor.</small>
                </h2>
	            <div class="row clearfix">
	            	<div class="col-md-5"></div>
	                <div class="col-md-2">
	                    <div class="input-group input-group-lg">
	                        <span class="input-group-addon">
	                            <input type="checkbox" class="filled-in" id="ig_checkbox1" name="campoInteres" onclick="interes('interes');">
	                            <label for="ig_checkbox1"></label>
	                        </span>
	                        <div class="form-line">
	                            {!!Form::number('interes', (int)$config->numCoordenadas, array('class'=>'form-control', 'id'=>'interes', 'placeholder'=>'5', 'disabled' => 'true', 'style'=>'text-align:center'))!!}
	                        </div>
	                    </div>
	                </div>
	            	<div class="col-md-5"></div>
	            </div>

				<?php if( $ini['numImagenes']['status'] == 'disabled' ) : ?>

	            <h2 class="card-inside-title" align="center">
                    {{$ini['numImagenes']['cabezera']}}
                    <small>{{$ini['numImagenes']['cuerpo']}}</small>
                </h2>

                <?php endif ?>

	            <h2 class="card-inside-title" align="center">
	            	Numero máximo de Imagenes a analizar
	            	<?php if( $ini['numImagenes']['status'] != 'disabled' ) : ?>
						<small> {{$ini['numImagenes']['cabezera']}} </small>
					<?php endif ?>
	            </h2>
				

	            <div class="row clearfix">
	            	<div class="col-md-5"></div>
	                <div class="col-md-2">
	                    <div class="input-group input-group-lg">
	                        <span class="input-group-addon">
	                            <input type="checkbox" class="filled-in" id="ig_checkbox2" name="campoImagenes" onclick="imagenes('imagenes');" {{$ini['numImagenes']['status']}}>
	                            <label for="ig_checkbox2"></label>
	                        </span>
	                        <div class="form-line">
	                            {!!Form::number('imagenes', (int)$config->numImagenes, array('class'=>'form-control', 'id'=>'imagenes', 'placeholder'=>'30', 'disabled' => 'true', 'style'=>'text-align:center'))!!}
	                        </div>
	                    </div>
	                </div>
	            	<div class="col-md-5"></div>
	            </div>


				<?php if( $ini['duracionVideo']['status'] == 'disabled' ) : ?>

	            <h2 class="card-inside-title" align="center">
                    {{$ini['duracionVideo']['cabezera']}}
                    <small>{{$ini['duracionVideo']['cuerpo']}}</small>
                </h2>

                <?php endif ?>

	            <h2 class="card-inside-title" align="center">
	            	Duracion máxima del video en minutos
	            	<?php if( $ini['duracionVideo']['status'] != 'disabled' ) : ?>
						<small> {{$ini['duracionVideo']['cabezera']}} </small>
					<?php endif ?>
	            </h2>

	            <div class="row clearfix">
	            	<div class="col-md-5"></div>
	                <div class="col-md-2">
	                    <div class="input-group input-group-lg">
	                        <span class="input-group-addon">
	                            <input type="checkbox" class="filled-in" id="ig_checkbox3" name="campoVideo" onclick="video('video');" {{$ini['duracionVideo']['status']}}>
	                            <label for="ig_checkbox3"></label>
	                        </span>
	                        <div class="form-line">
	                            {!!Form::number('video', (int)$config->duracionVideo, array('class'=>'form-control', 'id'=>'video', 'placeholder'=>'5', 'disabled' => 'true', 'style'=>'text-align:center'))!!}
	                        </div>
	                    </div>
	                </div>
	            	<div class="col-md-5"></div>
	            </div>
				

				<?php if( $ini['tipo']['status'] == 'disabled' ) : ?>

	            <h2 class="card-inside-title" align="center">
                    {{$ini['tipo']['cabezera']}}
                    <small>{{$ini['tipo']['cuerpo']}}</small>
                </h2>

                <?php endif ?>

	            <h2 class="card-inside-title" align="center">
	            	Tipo de proyecto
	            	<?php if( $ini['tipo']['status'] != 'disabled' ) : ?>
						<small> {{$ini['tipo']['cabezera']}} </small>
					<?php endif ?>
	            </h2>

	            <div class="row clearfix">
	            	<div class="col-md-2"></div>
	                <div class="col-md-4">
	                	<p>Lista de tipo de procesos agregados al sistema:</p>	
							<div class="body table-responsive">
	                            <table class="table">
	                                <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>Nombre</th>
	                                        <th>Accion</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	<?php $num = 1;?>
										@foreach($tipo as $t)
										<tr>
	                                        <th scope="row"><?php echo $num; ?></th>
	                                        <td>{{$t->nombre}}</td>
	                                        <td><button type="button" style="background-color: #00804A; color: #FFFFFF;" class="btn btn-block btn-xs waves-effect"  onclick="borrar({{$t}});" {{$ini['tipo']['status']}}>Eliminar</button></td>
	                                        <?php $num = $num+1;?>
	                                    </tr>
										@endforeach
	                                </tbody>
	                            </table>
	                        </div>
	                </div>

	            	<div class="col-md-4">
	            		<p>Agregar nuevo tipo:</p>
	                    <div class="input-group input-group-lg" style="line-height: 230px;">
	                        <span class="input-group-addon">
	                            <input type="checkbox" class="filled-in" id="ig_checkbox4" name="campoTipo" onclick="tipo('tipo');" {{$ini['tipo']['status']}}>
	                            <label for="ig_checkbox4"></label>
	                        </span>
	                        <div class="form-line">
	                            {!!Form::text('tipo', ''.$tipoN, array('class'=>'form-control', 'id'=>'tipo', 'placeholder'=>'Ingresa un tipo', 'disabled' => 'true', 'style'=>'text-align:center'))!!}
	                        </div>
	                    </div>
	            	</div>
	            	<div class="col-md-2"></div>
	            </div>

				<?php if( $ini['tiempo']['status'] == 'disabled' ) : ?>

	            <h2 class="card-inside-title" align="center">
                    {{$ini['tiempo']['cabezera']}}
                    <small>{{$ini['tiempo']['cuerpo']}}</small>
                </h2>

                <?php endif ?>

	            <h2 class="card-inside-title" align="center">
	            	Tiempo del procesamiento de video
	            	<?php if( $ini['tiempo']['status'] != 'disabled' ) : ?>
						<small> {{$ini['tiempo']['cabezera']}} </small>
					<?php endif ?>
	            </h2>

	            <div class="row clearfix">
	            	<div class="col-md-2"></div>
	                <div class="col-md-4">
	                	<p>Lista de tiempo para el proceso del video en el sistema:</p>	
							<div class="body table-responsive">
	                            <table class="table">
	                                <thead>
	                                    <tr>
	                                        <th>#</th>
	                                        <th>Tiempo</th>
	                                        <th>Accion</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	<?php $num = 1;?>
										@foreach($dv as $t)
										<tr>
	                                        <th scope="row"><?php echo $num; ?></th>
	                                        <td align="center">{{$t}}</td>
	                                        <td><button type="button" style="background-color: #00804A; color: #FFFFFF;" class="btn btn-block btn-xs waves-effect"  onclick="borrarTiempo({{$t}});" {{$ini['tiempo']['status']}}>Eliminar</button></td>
	                                        <?php $num = $num+1;?>
	                                    </tr>
										@endforeach
	                                </tbody>
	                            </table>
	                        </div>
	                </div>

	            	<div class="col-md-4">
	            		<p>Agregar nuevo tiempo:</p>
	                    <div class="input-group input-group-lg" style="line-height: 230px;">
	                        <span class="input-group-addon">
	                            <input type="checkbox" class="filled-in" id="ig_checkbox5" name="tiempoTipo" onclick="tiempo('tiempo');" {{$ini['tiempo']['status']}}>
	                            <label for="ig_checkbox5"></label>
	                        </span>
	                        <div class="form-line">
	                            {!!Form::number('tiempo', '10', array('class'=>'form-control', 'id'=>'tiempo', 'placeholder'=>'Ingresa el tiempo', 'disabled' => 'true', 'style'=>'text-align:center'))!!}
	                        </div>
	                    </div>
	            	</div>
	            	<div class="col-md-2"></div>


	            <button type="button" class="btn bg-teal btn-block waves-effect" data-toggle="modal" data-target=".bd-example-modal-sm">
	            Guardar</button>
	        </div>
	    </div>
	</div>
</div>

{!!Form::open(array('url'=>'/configuracion/editar', 'method'=>'post', 'id'=>'forms'))!!} 
    <input type="hidden" id="nInteres" name="nInteres">
    <input type="hidden" id="nImagenes" name="nImagenes">
    <input type="hidden" id="nVideo" name="nVideo">
    <input type="hidden" id="nTipo" name="nTipo">
    <input type="hidden" id="nTipoBorrar" name="nTipoBorrar">
    <input type="hidden" id="nTiempo" name="nTiempo">
    <input type="hidden" id="nTiempoBorrar" name="nTiempoBorrar">
{!!Form::close()!!}

@stop
@section('scripts')
<script src="{{asset('/Template/js/custom/validar.js')}}"></script>
<script src="{{asset('/Template/js/pages/ui/dialogs.js')}}"></script>
<script src="{{asset('/Template/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('/Template/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

<script src="{{asset('/Template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('/Template/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('/Template/js/pages/examples/profile.js')}}"></script>
@stop