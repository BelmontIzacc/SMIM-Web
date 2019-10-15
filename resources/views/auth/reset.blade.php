@extends('layout.layoutAuth')
<?php
$index=1;
?>
@section('title')
<title>SMIM</title>
@stop

@section('css')
<style type="text/css">
    .login-page {
        background-color: #008080;
        padding-left: 0;
        max-width: 360px;
        margin: 5% auto;
        overflow-x: hidden;
    }
</style>
@stop

@section('popUp')
<body class="login-page ls-closed">
    <div class="login-box">
        <div class="logo">
            <a href="{{asset('/')}}">SMIM<b></b></a>
            <small>Sistema de Medición Infrarroja para Materiales</small>
        </div>
            @include('alerts.sessionAlert')
            @include('alerts.formError')
        <div class="card">
            <div class="body">
                <!-- <form id="sign_in" method="POST" novalidate="novalidate"> -->
                 {!!Form::open(array('url'=>'/password/reset', 'novalidate'=>'novalidate', 'method'=>'post'))!!}
                    {!! csrf_field() !!}
                    <div class="msg">
                        Ingrese su correo para confirmar y su nueva contraseña
                    </div>
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line error">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" aria-required="true" aria-invalid="true">
                        </div>
                        <label id="email-error" class="error" for="email">Campo Requerido.</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line error">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa contraseña" required="" autofocus="" aria-required="true" aria-invalid="true">
                        </div>
                        <label id="password-error" class="error" for="password">Campo Requerido.</label>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line error">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ingresa contraseña" required="" autofocus="" aria-required="true" aria-invalid="true">
                        </div>
                        <label id="password-error2" class="error" for="password_confirmation">Campo Requerido.</label>
                    </div>


                    <div class="row">
                        <div class="col-xs-8 p-t-5">

                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block btn-lg bg-cyan waves-effect" type="submit">Enviar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            
                        </div>
                        <div class="col-xs-6 align-right">
                            
                        </div>
                    </div>
                    {!!Form::close()!!}
                <!-- </form> -->
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