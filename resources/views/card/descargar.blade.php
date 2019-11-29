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
	a.nounderline:link
    {
    	text-decoration:none;
    }
</style>

@stop
@section('popUp')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Coordenada </h5>
        </button>
      </div>
      <div class="modal-body">
			<div class="body">
				<!-- Exportable Table -->
				<div class="row clearfix">
	                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="body">
								<div class="body table-responsive">
								    <table class="table">
								        <thead>
								        	@if(count($nc) == 0)
								        		<tr>
								        			<th>Lo sentimos</th>
								        		</tr>
								        	@else
									            <tr>
									                <th>Imagen</th>
									                <th>Celsius</th>
									                <th>Kelvin</th>
									                <th>Farenheit</th>
									            </tr>
									        @endif
								        </thead>
								        <tfoot>
								        	@if(count($nc) == 0)
								        		<tr>
								        			<th>Lo sentimos</th>
								        		</tr>
								        	@else
									            <tr>
									                <th>Imagen</th>
									                <th>Celsius</th>
									                <th>Kelvin</th>
									                <th>Farenheit</th>
									            </tr>
									        @endif
								        </tfoot>
								        <tbody>
								            @if(count($nc) == 0)
			                                    <tr align="center">
													<td>Sin información disponible</td>
			                                    </tr>
		                                    @else
									            @foreach($nc as $c)
									            <tr>
									                
									                <?php $id = 'id'.$c;?>
									                <td id="<?php echo $id; ?>"></td>

									                <?php $cC = 'cC'.$c;?>
									                <td id="<?php echo $cC; ?>"></td>

									                <?php $cK = 'cK'.$c;?>
									                <td id="<?php echo $cK; ?>"></td>

									                <?php $cF = 'cF'.$c;?>
									                <td id="<?php echo $cF; ?>"></td>
									            </tr>
									            @endforeach
											@endif
								        </tbody>
								    </table>
								</div>
	                        </div>
	                    </div>
	                </div>
	            <!-- #END# Exportable Table -->
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-xs-12 col-sm-3">

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
                        	</br>
                            <small>Click en el numero de coordenada para mas información</small>
                        </div>
                        <div class="content">
                            <div class="row clearfix">
				                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                    <div class="card">
				                        <div class="body table-responsive">
				                            <table class="table table-striped">
				                                    @if(count($cord) == 0)
				                                    <thead>
					                                    <tr>
															<th>Sin información disponible</th>
					                                    </tr>
					                                </thead>
				                                    @else
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
						                                        <th scope="row"><button type="button" onclick="proyecto({{$txt}},{{$id}});" class="btn bg-teal btn-block btn-xs waves-effect" data-toggle="modal" data-target=".bd-example-modal-lg"><?php echo $id; ?></button></th>
						                                        <td><?php echo $x; ?></td>
						                                        <td><?php echo $y; ?></td>
						                                    </tr>
					                                    @endforeach
					                                </tbody>
				                                    @endif
				                            </table>
				                        </div>
				                    </div>
				                </div>
				            </div>
                        </div>
                    </li>
                </ul>
            </div> <!-- fin del body -->
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
                                            <a>
                                                <img src="{{asset('/Template/images/escala/NewLogof.png')}}"> 
                                            </a>
                                        </div>
                                        <div class="media-body">
	                                            <h4><p>Regresar a : <a class="nounderline" style="color:#008080;" href="{{asset('/proyecto')}}/{{$pt->noSerie}}">{{$pt->nombreProyecto}}<p></a></h4>
	                                            Fecha - {{$pt->fecha()}}
	                                        </br>Coordenadas y temperatura
	                                    	</br><small>Click en el numero de coordenada para mas información</small>
                                        </div>
                                    </div>
                                </div>
									<div class="panel-body">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									        <div class="card">
									            <div class="header"  align="center">
									                <h2>
														<div class="body table-responsive">
								                            <table class="table">
								                                <thead>
								                                	@if(count($archivo) == 0)
									                                    <tr>
									                                        <th>Lo sentimos</th>
									                                    </tr>
									                                @else
																		<tr>
									                                    	<th>#</th>
									                                        <th>Archivo</th>
									                                        <th>Link</th>
									                                    </tr>
									                                @endif
								                                </thead>
								                                <tbody>
								                                	@if(count($archivo) != 0)
									                                	<?php $num = 0; ?>
									                                	@foreach( $archivo  as $a)
									                                    <tr>
									                                        <th scope="row"> 
									                                        	<button type="button" onclick="proyecto({{$txt}},{{$num}});" class="btn bg-teal btn-block btn-xs waves-effect" data-toggle="modal" data-target=".bd-example-modal-lg"><?php echo $num; ?></button> 
									                                        </th>
									                                        <td>
									                                        	<?php echo "Coordenada ".$num; ?>
									                                        </td>
									                                        <td>
									                                        	<?php $l = $link."/".$a; ?>
									                                        	<a href="{{asset('')}}<?php echo $l;?>" style="color: #008080;" download="Temperatura_Coordenada<?php echo $num;?>.txt">Descargar</a>
									                                        </td>
									                                    </tr>
									                                    <?php $num = $num + 1; ?>
									                                    @endforeach
									                                @else
									                                	<tr align="center">
																			<td>Sin información disponible</td>
			                                    						</tr>
									                                @endif
								                                </tbody>
								                            </table>
								                        </div>
									                </h2>
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
    </div>
</div>

@stop
@section('scripts')
<script src="{{asset('/Template/js/custom/modalTemp.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('/Template/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('/Template/js/pages/examples/profile.js')}}"></script>
@stop