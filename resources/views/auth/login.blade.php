@extends('layout.layoutAuth')
@section('title')
<title>SMIM Login</title>
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
                {!!Form::open(array('url'=>'/login', 'novalidate'=>'novalidate', 'method'=>'post'))!!}
                    <div class="msg">Inicia sesión</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            {!!Form::text('username', null, [ 'class'=>'form-control', 'required'=>'', 'autofocus'=>'', 'aria-required'=>'true', 'placeholder'=>'Username', 'id'=>'username' ])!!}
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            {!!Form::password('password', [ 'class'=>'form-control', 'placeholder'=>'Contraseña', 'id'=>'password', 'required'=>'', 'aria-required'=>'true' ])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">

                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-cyan waves-effect" type="submit">Iniciar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="{{asset('/password/email')}}">Forgot Password?</a>
                        </div>
                    </div>
                    {!!Form::close()!!}
                <!-- </form> -->
            </div>
        </div>
    </div>
</body>
@stop
@section('content')

@stop
@section('scripts')


@stop