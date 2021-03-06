<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    @yield('header')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mini-repo-list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    @yield('styles')
    
    <script src="{{ asset('bower_components/jquery/jquery.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@include('partials.nav')

@yield('content')

<footer id="site-footer">
    <div class="container">
        <div class="copyright pull-left mobile-block">
            © {{ date('Y') }}
            <span >macken.me</span>
        </div>
        <a class="pull-right mobile-hidden" href="javascript:window.scrollTo(0,0)" ><span class="fa fa-arrow-circle-up fa-3x"></span></a>
    </div>
</footer>

<script src="{{ asset('js/all.js') }}"></script>

@yield('scripts')

<script>
    jQuery(document).ready(function($) {
        
        //geopattern
        $('.geopattern').each(function(){
            $(this).geopattern($(this).data('pattern-id'));
        });

        $('.navbar-form').submit(function (event) {
            event.preventDefault();
            var keyword = $('#search-keyword').val();
            if ($.trim(keyword) == '') {
                return false;
            }

            var host = $('.navbar-form').attr('action');
            window.location.href = host + '/' + keyword;
        });

        $('.share-bar').share();
    });
</script>

</body>
</html>
