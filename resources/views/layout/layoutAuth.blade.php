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

    @yield('css')

</head>
@yield('popUp')

<body class="theme-deep-purple">
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
</body>

    <section class="content">
        <div class="container-fluid">
            <h3 class="with-border text-center">@yield('subHead')</h3>
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script src="{{asset('/Template/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('/Template/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('/Template/plugins/node-waves/waves.js')}}"></script>

	@yield('scripts')

    <!-- Custom Js -->
    <script src="{{asset('/Template/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('/Template/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('/Template/js/pages/examples/sign-in.js')}}"></script>



</body></html>