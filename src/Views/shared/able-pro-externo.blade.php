<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title') {{isset($gTitle) ? $gTitle.' | ' : ''}} {{env('APP_NAME', 'Projetos - MOC Soluções')}}</title>
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description"
          content="{{isset($gDescription) ? $gDescription : (isset($gTitle) ? $gTitle.' | ' : env('APP_NAME', 'Projetos - MOC Soluções'))}}"/>
    <meta name="keywords"
          content="admin projetos, bootstrap admin projetos, bootstrap dashboard, admin theme, dashboard projetos, bootstrap dashboard projetos, bootstrap admin panel, dashboard theme, best admin projetos, dashboard theme, website projetos, bootstrap 4 admin projetos">
    <meta name="Author" content="Maike Oliveira Carvalho - MOC Soluções"/>

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset(elixir('module/shared/css/able.layout.externo.css'))}}" type="text/css"
          media="all">

    @yield('css')
</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper bg-theme1">
        <!-- [ Header ] start -->
        <nav class="navbar header-navbar pcoded-header bg-theme1">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#">
                        <i class="feather icon-toggle-right"></i>
                    </a>
                    <a href="#">
                        <img class="img-fluid" src="{{asset("images/logo.png")}}" width="110px"/>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    @include('Core::shared._nav-left')
                    @include('Core::shared._nav-right')
                </div>
            </div>
        </nav>
        <!-- [ Header ] end -->

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- Begin: Menu -->
            @include('shared._able-menu-externo')
            <!-- End: Menu -->

                <div class="pcoded-content">
                    <div class="page-header">
                        {{--
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8 text-black-50">
                                    <div class="page-header-title">
                                        <h4 class="m-b-10">Menu horizontal static</h4>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">
                                                <i class="feather icon-home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Page layout</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Horizontal</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Static layout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                         --}}
                    </div>

                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <!-- [ page content ] start -->
                                    <div class="row">
                                        <!-- project and updates start -->
                                        <div class="col-lg-12 col-md-12">
                                            @yield('content')
                                        </div>
                                    </div>
                                    <!-- [ page content ] end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer">
            <p class="text-center m-b-0 text-white">
                2014 &copy; <a target="_blank" class="text-white" href="https://mocsolucoes.com.br">MOC Soluções</a> -
                Todos os direitos reservados <br/>
                Vers&atilde;o 1.0.0
            </p>
        </div>
    </div>


</div>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->

<script type="text/javascript" src="{{asset(elixir('module/shared/js/able.layout.externo.js'))}}"></script>
<script async src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
</script>
<script async>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script',
        'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{env('GOOGLE_ANALYTICS')}}', 'auto');
    ga('send', 'pageview');

    (function (a, b, c) {
        var d = a.getElementsByTagName(b)[0];
        if (!a.getElementById(c)) a = a.createElement(b), a.id = c, a.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1", d.parentNode.insertBefore(a, d)
    })(document, "script", "facebook-jssdk");
</script>

@yield('js')
</body>
</html>
