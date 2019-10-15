@extends('layout.layout')
@section('title')
<title>SMIM Biblioteca</title>
@stop

@section('css')
<link href="{{asset('/Template/css/themes/all-themes.css')}}" rel="stylesheet">
<link href="{{asset('/Template/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
<style type="text/css">
    p {
      width: 110px;
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
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"  align="center">
                <h2>
                    Biblioteca
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
                                                <th>Alumno</th>
                                                <th>Grupo</th>
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
                                                <th>Alumno</th>
                                                <th>Grupo</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $num = 1;?>
                                            @foreach($proyecto as $p)
                                            <tr>
                                                <td><?php echo $num;?></td>
                                                <td><p class="overflow-ellipsis" ><a class="font-bold color" href="{{asset('/proyecto')}}/{{$p->noSerie}}">{{$p->nombreProyecto}}</a></p></td>
                                                <td>{{$p->tipo->nombre}}</td>
                                                <td>{{$p->fecha()}}</td>
                                                <td>{{$p->tiempoAnalisis}}s</td>
                                                <td><p class="overflow-ellipsis" ><a class="font-bold color" href="{{asset('/proyecto')}}/{{$p->noSerie}}">{{$p->noSerie}}</a></p></td>
                                                <td><p class="overflow-ellipsis" >{{$p->nombreAlumno}}</p></td>
                                                <td>{{$p->grupoAlumno}}</td>
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