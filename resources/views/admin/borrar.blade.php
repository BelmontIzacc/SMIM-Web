@extends('layout.layout2')
@section('title')
<title>SMIM Borrar</title>
@stop

@section('css')
<link href="{{asset('/Template/css/themes/all-themes.css')}}" rel="stylesheet">
<link href="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<style type="text/css">
    p {
      width: 70px;
      padding: -5px 5px;

      /* BOTH of the following are required for text-overflow */
      white-space: nowrap;
      overflow: hidden;
    }
    .overflow-ellipsis {
        text-overflow: ellipsis;
    }
    table td,th {
        text-align: center;
    }
    a.nounderline:link
    {
        text-decoration:none;
    }

    .color{
        color : #008080;
    }
</style>
@stop
@section('popUp')

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Borrar</h5>
        </button>
      </div>
      <div class="modal-body">
			<div class="body">
                <ul class="list-group">
                    <li class="list-group-item" id="nombreP">Nombre Proyecto: </li>
                    <li class="list-group-item" id="folio">Folio: </li>
                    <li class="list-group-item" id="tipo">Tipo: </li>
                    <li class="list-group-item" id="usuario">Usuario: </li>
                    <li class="list-group-item" id="fecha">Fecha: </li>
                    <li class="list-group-item" id="ta">Tiempo de Analisis: </li>
                </ul>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="proyecto" onclick="borrar();">Borrar</button>
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
                    Borrar proyectos analizados
                </h2>
            </div>
            <div class="body">
            <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Proyecto</th>
                                                <th>Tipo</th>
                                                <th>Fecha</th>
                                                <th>Analisis</th>
                                                <th>Folio</th>
                                                <th>Usuario</th>
                                                <th>Grupo</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Proyecto</th>
                                                <th>Tipo</th>
                                                <th>Fecha</th>
                                                <th>Analisis</th>
                                                <th>Folio</th>
                                                <th>Usuario</th>
                                                <th>Grupo</th>
                                                <th>Accion</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $num = 1;?>
                                            @foreach($proyecto as $p)
                                            <tr>
                                                <td><?php echo $num;?></td>
                                                <td><p class="overflow-ellipsis" ><a class="font-bold color" href="{{asset('/proyecto')}}/{{$p->noSerie}}">{{$p->nombreProyecto}}</a></p></td>
                                                <td><p class="overflow-ellipsis" >{{$p->tipo->nombre}}</p></td>
                                                <td><p class="overflow-ellipsis" >{{$p->fecha()}}</p></td>
                                                <td>{{$p->tiempoAnalisis}}s</td>
                                                <td><p class="overflow-ellipsis" ><a class="font-bold color" href="{{asset('/proyecto')}}/{{$p->noSerie}}">{{$p->noSerie}}</a></p></td>
                                                <td><p class="overflow-ellipsis" >{{$p->nombreAlumno}}</p></td>
                                                <td>{{$p->grupoAlumno}}</td>
                                                <td><button type="button" class="btn bg-red btn-block btn-xs waves-effect" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="proyecto({{$p}});">Borrar</button></td>
                                                <?php $num = $num+1;?>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- #END# Exportable Table 
                    <p class="font-bold">Default text</p>
                -->
            </div>
        </div>
    </div>
</div>

{!!Form::open(array('url'=>'/configuracion/borrar', 'method'=>'post', 'id'=>'forms'))!!} 
    <input type="hidden" id="borrar" name="borrar">
{!!Form::close()!!}

@stop
@section('scripts')
<script src="{{asset('/Template/js/custom/modal.js')}}"></script>
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