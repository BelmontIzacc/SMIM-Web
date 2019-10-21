@extends('layout.layout')
@section('title')
<title>SMIM Galeria</title>
@stop
@section('css')
<link href="{{asset('/Template/plugins/light-gallery/css/lightgallery.css')}}" rel="stylesheet">
<style type="text/css">
a.nounderline:link
{
text-decoration:none;
}
</style>
@stop
@section('popUp')
@stop
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <p>Regresar a : <a class="nounderline" style="color:#7f99b1;" href="{{asset('/proyecto')}}/{{$pt->noSerie}}">{{$pt->nombreProyecto}}<p></a>
                    <small><p>Ver : <a class="nounderline" style="color:#7f99b1;" href="{{asset('/proyecto')}}/{{$pt->noSerie}}/galeria/graficas">Graficas<p></a></small>
                    <small>Tipo : {{$pt->tipo->nombre}}</small>
                    <small>Fecha : {{$pt->fecha()}}</small>
                    <small>Total de Imagenes : {{$total}}</small>
                </h2>
                
            </div>
            <div class="body">
                <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                    <?php $num = 1; ?>
                    @foreach($img as $i)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <a href="{{asset('/')}}/{{$pt->img($num)}}" data-sub-html="">
                            <img class="img-responsive thumbnail" src="{{asset('/')}}/{{$pt->img($num)}}">
                        </a>
                        <?php $num = $num+1; ?>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script src="{{asset('/Template/js/pages/examples/profile.js')}}"></script>
<script src="{{asset('/Template/js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('/Template/plugins/light-gallery/js/lightgallery-all.js')}}"></script>
@stop