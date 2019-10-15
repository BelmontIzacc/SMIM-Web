@extends('layout.layout')
@section('title')
<title>SMIM Proyecto</title>
@stop

@section('css')
<link href="{{asset('/Template/css/themes/all-themes.css')}}" rel="stylesheet">
<link href="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<style type="text/css">
	table td,th {
  		text-align: center;
	}
	.profile-card
	.profile-header {
    	background-color: #008080;
    	padding: 42px 0;
	}
	.profile-card .profile-body .image-area img {
	    border: 2px solid #008080;
	    padding: 2px;
	    margin: 2px;
	    -webkit-border-radius: 50%;
	    -moz-border-radius: 50%;
	    -ms-border-radius: 50%;
	    border-radius: 50%;
	}
</style>

@stop
@section('popUp')
@stop
@section('content')
<div class="row clearfix">
    <div class="col-xs-12 col-sm-3">

        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                	<img src="{{asset('/Template/images/user-lg.jpg')}}" alt="AdminBSB - Profile Image">
                </div>
                <div class="content-area">
                    <h3></h3>
                    <p>{{$pt->nombreAlumno}}</p>
                    <p>Grupo : {{$pt->grupoAlumno}}</p>
                    <p>Fecha : {{$pt->fecha()}}</p>
                    <p>Tiempo : {{$pt->tiempoAnalisis}}s</p>
                    <p></p>
                </div>
            </div>
        </div>

        <div class="card card-about-me" >
            <div class="header">
                <h2>Información</h2>
            </div>
            <div class="body">
                <ul>
                    <li>
                        <div class="title">
                            <i class="material-icons">gps_fixed</i>
                            Coordenadas
                        </div>
                        <div class="content">
                            <div class="row clearfix">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="card">
				                        <div class="body table-responsive">
				                            <table class="table table-striped">
				                                <thead>
				                                    <tr>
				                                        <th>#</th>
				                                        <th>X</th>
				                                        <th>Y</th>
				                                    </tr>
				                                </thead>
				                                <tbody>
				                                	@foreach($cord as $c)
				                                    <tr>
				                                    	<?php 
				                                    		list($id, $x, $y) = explode(',', $c);
				                                    	?>
				                                        <th scope="row"><?php echo $id; ?></th>
				                                        <td><?php echo $x; ?></td>
				                                        <td><?php echo $y; ?></td>
				                                    </tr>
				                                    @endforeach
				                                </tbody>
				                            </table>
				                        </div>
				                    </div>
				                </div>
				            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
        <div class="card">
            <div class="body">
                <div>


                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="home">
                            <div class="panel panel-default panel-post">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                                <img src="{{asset('/Template/images/user-lg.jpg')}}"> 
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a>{{$pt->nombreProyecto}}</a>
                                            </h4>
                                            Fecha - {{$pt->fecha()}}
                                        </br>Imagenes
                                        </div>
                                    </div>
                                </div>
								
								@if($img == null)
								<div class="panel-body">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								        <div class="card">
								            <div class="header"  align="center">
								                <h2>
								                    <img aling='center' class="js-animating-object img-responsive animated zoomIn thumbnail" src="{{asset('/Template/images/Imagen_no_disponible.svg')}}" border='0' width='35%' height='35%'>
								                </h2>
								            </div>
								        </div>
								    </div>
							    </div>
								@else
                                <div class="panel-body">
                                    <div class="post">
                                        <div class="post-content">
											<div class="card">
											    <div class="body">
											        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
											            <!-- Indicators -->
											            <ol class="carousel-indicators">
											            	<?php $num = 0; ?>
											                @foreach($img as $i)
											                	@if($num == 0)
											                		<li data-target="#carousel-example-generic" data-slide-to="".$num class="active"></li>
											                		<?php $num = $num+1; ?>
											                	@else
											                		<li data-target="#carousel-example-generic" data-slide-to="".$num class=""></li>
											                		<?php $num = $num+1; ?>
											                	@endif
											                @endforeach
											            </ol>

											            <!-- Wrapper for slides -->
											            <div class="carousel-inner" role="listbox">
															<?php $num = 1; ?>
											            	@foreach($img as $i)
											                	@if($num==1)
													                <div class="item active" align="center">
													                    <img src="{{asset('/')}}/{{$pt->img($num)}}" width='35%' height='35%' class="img-responsive">
													                    <?php $num = $num+1; ?>
													                </div>
													            @else
													                <div class="item" align="center">
													                    <img src="{{asset('/')}}/{{$pt->img($num)}}" width='35%' height='35%' class="img-responsive">
													                    <?php $num = $num+1; ?>
													                </div>
											                	@endif
															@endforeach
											            </div>

											            <!-- Controls -->
											            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
											                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
											                <span class="sr-only">Previous</span>
											            </a>
											            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
											                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
											                <span class="sr-only">Next</span>
											            </a>
											        </div>
											    </div>
											</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <ul>
                                        <li>

                                        </li>
                                        <li>

                                        </li>
                                        <li>
                                            <a href="{{asset('/proyecto/')}}/{{$pt->noSerie}}/galeria">
                                            	<i class="material-icons">photo_library</i>
                                                <span>Ir a Galeria</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
								@endif
                            </div>

                            <div class="panel panel-default panel-post">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#">
                                            	<img src="{{asset('/Template/images/user-lg.jpg')}}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a>{{$pt->nombreProyecto}}</a>
                                            </h4>
                                            Fecha - {{$pt->fecha()}}
                                            </br>Video
                                        </div>
                                    </div>
                                </div>
                                <?php $tam = $pt->video(); ?>
								@if($tam != null)
                                <div class="panel-body">
                                    <div class="post">
                                        <div class="post-content">
                                            <iframe width="100%" height="360" src="{{asset('/')}}/{{$pt->video()}}" frameborder="0" allowfullscreen="" autoplay="0" autostart="0" class="embed-responsive-item" ></iframe>
                                        </div>
                                    </div>
                                </div>
								@else
								<div class="panel-body">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								        <div class="card">
								            <div class="header"  align="center">
								                <h2>
								                    <img aling='center' class="js-animating-object img-responsive animated zoomIn thumbnail" src="{{asset('/Template/images/Video-no.jpg')}}" border='0' width='35%' height='35%'>
								                </h2>
								            </div>
								        </div>
								    </div>
							    </div>
								@endif
                            </div>

							<div class="panel panel-default panel-post">
							    <div class="panel-heading">
							        <div class="media">
							            <div class="media-left">
							                <a href="#">
							                	<img src="{{asset('/Template/images/user-lg.jpg')}}">
							                </a>
							            </div>
							            <div class="media-body">
							                <h4 class="media-heading">
							                    <a>{{$pt->nombreProyecto}}</a>
							                </h4>
							                Fecha - {{$pt->fecha()}}
							                </br>Estadistica por Coordenada.
							                </br>Se muestra estadistica del comportamiento de la temperatura en cada coordenada aplicada a todas las imagenes.
							            </div>
							        </div>
							    </div>

							    <div class="panel-body">
							        <div class="post">
							            <div class="post-content">
								            @if($dEsta == null)
											<div class="row clearfix">
								                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								                    <div class="card">
								                        <div class="header" align="center">
								                            <h2>
								                                Información No Disponible
								                            </h2>
								                        </div>
								                    </div>
								                </div>
								            </div>
								            @else
											<!-- Exportable Table -->
											<div class="row clearfix">
								                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								                        <div class="body">
								                            <div class="table-responsive">
								                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
								                                    <thead>
								                                        <tr>
								                                            <th>Coordenada</th>
								                                            <th>Mediana</th>
								                                            <th>Media</th>
								                                            <th>Varianza</th>
								                                            <th>Moda</th>
								                                            <th>Desviacion Estandar</th>
								                                        </tr>
								                                    </thead>
								                                    <tfoot>
								                                        <tr>
								                                            <th>Coordenada</th>
								                                            <th>Mediana</th>
								                                            <th>Media</th>
								                                            <th>Varianza</th>
								                                            <th>Moda</th>
								                                            <th>Desviacion Estandar</th>
								                                        </tr>
								                                    </tfoot>
								                                    <tbody>
								                                    	@foreach($dEsta as $des)
								                                    	<tr>
								                                    	<?php 
								                                    		//idCoordenada,mediana,media,varianza,moda,desviacionEstandar
				                                    						list($cor, $medi, $media, $var, $moda, $dE) = explode(',', $des);
				                                    					?>
								                                    		<td><?php echo $cor; ?></td>
								                                            <td><?php echo $medi; ?></td>
								                                            <td><?php echo $media; ?></td>
								                                            <td><?php echo $var; ?></td>
								                                            <td><?php echo $moda; ?></td>
								                                            <td><?php echo $dE; ?></td>
								                                        </tr>
								                                    	@endforeach
								                                    </tbody>
								                                </table>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								            <!-- #END# Exportable Table -->
								            @endif
							            </div>
							        </div>
							    </div>
							</div>

							<div class="panel panel-default panel-post">
							    <div class="panel-heading">
							        <div class="media">
							            <div class="media-left">
							                <a href="#">
							                	<img src="{{asset('/Template/images/user-lg.jpg')}}">
							                </a>
							            </div>
							            <div class="media-body">
							                <h4 class="media-heading">
							                    <a>{{$pt->nombreProyecto}}</a>
							                </h4>
							                Fecha - {{$pt->fecha()}}
							                </br>Estadistica promedio de las coordenadas en cada imagen.
							            	</br>Se muestra la temperatura en promedio de las coordendas seleccionadas en cada imagen.
							            </div>
							        </div>
							    </div>

							    <div class="panel-body">
							        <div class="post">
							            <div class="post-content">
								            @if($dImagen == null)
											<div class="row clearfix">
								                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								                    <div class="card">
								                        <div class="header" align="center">
								                            <h2>
								                                Información No Disponible
								                            </h2>
								                        </div>
								                    </div>
								                </div>
								            </div>
								            @else
											<!-- Exportable Table -->
											<div class="row clearfix">
								                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								                        <div class="body">
								                            <div class="table-responsive">
								                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
								                                    <thead>
								                                        <tr>
								                                            <th>Imagen</th>
								                                            <th>Celsius</th>
								                                            <th>Kelvin</th>
								                                            <th>Farenheit</th>
								                                        </tr>
								                                    </thead>
								                                    <tfoot>
								                                        <tr>
								                                            <th>Imagen</th>
								                                            <th>Celsius</th>
								                                            <th>Kelvin</th>
								                                            <th>Farenheit</th>
								                                        </tr>
								                                    </tfoot>
								                                    <tbody>
								                                    	<tr>
								                                    	@foreach($dImagen as $di)
								                                    	<?php 
								                                    		//nombreImagen,celsius,kelvin,farenheit
				                                    						list($nI, $celsius, $kelvin, $farenheit) = explode(',', $di);
				                                    					?>
								                                    		<td><?php echo $nI; ?></td>
								                                            <td><?php echo $celsius; ?></td>
								                                            <td><?php echo $kelvin; ?></td>
								                                            <td><?php echo $farenheit; ?></td>
								                                        </tr>
								                                    	@endforeach
								                                    </tbody>
								                                </table>
								                            </div>
								                        </div>
								                    </div>
								                </div>
								            <!-- #END# Exportable Table -->
								            @endif
							            </div>
							        </div>
							    </div>
							</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('scripts')

<script src="{{asset('/Template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('/Template/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('/Template/js/pages/examples/profile.js')}}"></script>
@stop