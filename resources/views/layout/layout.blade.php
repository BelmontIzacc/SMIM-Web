<!DOCTYPE html>
<html class="chrome"><head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    @yield('title')

    <!-- Favicon-->
    <link rel="icon" href="{{asset('/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('/Template/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('/Template/plugins/node-waves/waves.css')}}" rel="stylesheet">

    <!-- Animation Css -->
    <link href="{{asset('/Template/plugins/animate-css/animate.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{asset('/Template/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('/Template/css/themes/all-themes.css')}}" rel="stylesheet">
    
    <style type="text/css">
        .sidebar .user-info {
            padding: 13px 15px 12px 15px;
            white-space: nowrap;
            position: relative;
            border-bottom: 1px solid #e9e9e9;
            background: url({{asset('/Template/images/upiiz-new.png')}}) no-repeat no-repeat;
            height: 135px;
        }

         /* Estilos barra (thumb) de scroll */
        .container::-webkit-scrollbar-thumb {
          background: #ccc;
          border-radius: 4px;
        }

        .container::-webkit-scrollbar-thumb:active {
          background-color: #999999;
        }

        .container::-webkit-scrollbar-thumb:hover {
          background: #b3b3b3;
          box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        }

         /* Estilos track de scroll */
        .container::-webkit-scrollbar-track {
          background: #e1e1e1;
          border-radius: 4px;
        }

        .container::-webkit-scrollbar-track:hover, 
        .container::-webkit-scrollbar-track:active {
          background: #d4d4d4;
        }

    </style>

    @yield('css')

</head>
@yield('popUp')

<body class="theme-teal">
    <!-- Page Loader -->
    <div class="page-loader-wrapper" style="display: none;">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay" style="display: none;"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Escribe la palabra clave..." id="search" onkeypress="search(event);">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    {!!Form::open(array('url'=>'/resultados', 'method'=>'post', 'id'=>'form'))!!} 
        <input type="hidden" id="busqueda" name="busqueda">
    {!!Form::close()!!}

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars" style="display: none;"></a>
                <a class="navbar-brand" href="{{asset('/')}}">Sistema de Medición Infrarroja para Materiales</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    
                    <!-- #END# Tasks -->
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{asset('/Template/images/perfil/mono.png')}}" width="48" height="48" alt="User">
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><p class="font-bold" style="color:black;">SMIM</p></div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons font-bold" data-toggle="dropdown" style="color:#008080;" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            @unless($index == 2)
                            <li><a href="{{asset('/login')}}" class=" waves-effect waves-block"><i class="material-icons">person</i>Sing In</a></li>
                            @endunless
							@unless($index == 1)
                            @unless($index == 2)
                            <li role="separator" class="divider"></li>
                            @endunless
                            <li><a href="{{asset('/logout')}}"" class=" waves-effect waves-block"><i class="material-icons">input</i>Sign Out</a></li>
							@endunless
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 539px;">
                	<ul class="list" style="overflow: hidden; width: auto; height: 539px;">
                    <li>
                        <a href="{{asset('/')}}" class=" waves-effect waves-block">
                            <i class="material-icons">home</i>
                            <span>Página principal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{asset('/biblioteca')}}" class=" waves-effect waves-block">
                            <i class="material-icons">folder</i>
                            <span>Biblioteca</span>
                        </a>
                    </li>
                    @unless($index == 1)
                    <li class="header">Configuración</li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">settings</i>
                            <span>Configuración</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="{{asset('/configuracion/borrar')}}" class=" waves-effect waves-block">
                                    <i class="material-icons">delete_sweep</i>
                                    <span>Borrar proyectos analizados</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{asset('/configuracion/editar')}}" class=" waves-effect waves-block">
                                    <i class="material-icons">cloud_upload</i>
                                    <span>Editar configuracion de SMIM-PC</span>
                                </a>
                            </li>
                        </ul>
                    </li>
					@endunless
                </ul><div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 184px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 754.898px;"></div><div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    © 2019 <a href="{{asset('/creditos')}}">SMIM - Sistema de Medición </br> Infrarroja para Materiales</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @include('alerts.sessionAlert')
            @include('alerts.formError')
            <h3 class="with-border text-center">@yield('subHead')</h3>
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="{{asset('/Template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('/Template/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('/Template/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('/Template/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('/Template/plugins/node-waves/waves.js')}}"></script>

	@yield('scripts')

    <!-- Custom Js -->
    <script src="{{asset('/Template/js/custom/search.js')}}"></script>
    <script src="{{asset('/Template/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('/Template/js/demo.js')}}"></script>



</body></html>