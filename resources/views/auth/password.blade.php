@extends('layout.layoutAuth')
<?php
$index=1;
?>
@section('title')
<title>SMIM</title>
@stop

@section('css')
<style type="text/css">
    .fp-page {
        background-color: #008080;
        padding-left: 0;
        max-width: 360px;
        margin: 5% auto;
        overflow-x: hidden;
    }
</style>
@stop

@section('popUp')
<body class="fp-page ls-closed">
    <div class="fp-box">
        <div class="logo">
            <a href="{{asset('/')}}">SMIM<b></b></a>
            <small>Sistema de Medición Infrarroja para Materiales</small>
        </div>
        <div class="card">
            <div class="body">
                 <!-- <form id="forgot_password" method="POST" novalidate="novalidate"> -->
                    {!!Form::open(array('url'=>'/password/email', 'novalidate'=>'novalidate', 'method'=>'post'))!!}
                    {!! csrf_field() !!}
                    @if(count($errors) > 0)
                         <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                            <i class="font-icon font-icon-warning"></i>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @include('alerts.sessionAlert')
                    <div class="msg">
                        Ingrese su dirección de correo electrónico que utilizó para registrarse. Le enviaremos un correo electrónico con su nombre de usuario y un enlace para restablecer su contraseña.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line error">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required="" autofocus="" aria-required="true" aria-invalid="true">
                        </div>
                    <label id="email-error" class="error" for="email">Campo Requerido.</label></div>

                    <button class="btn btn-block btn-lg bg-cyan waves-effect" type="submit">Enviar</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{asset('/login')}}">Iniciar Sesion!</a>
                    </div>
                <!-- </form> -->
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</body>
@stop

@section('subHead')

@stop

@section('content')

@stop

@section('scripts')
<script src="{{asset('/Template/js/pages/examples/forgot-password.js')}}"></script>
@stop