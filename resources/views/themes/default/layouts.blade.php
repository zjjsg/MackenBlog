<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @yield('header')

    <link rel="stylesheet" href="{{ homeAsset('/vendor/primer-css/css/primer.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/primer-markdown/dist/user-content.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/globals/bootstrap-paper.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/octicons/octicons/octicons.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/fonts/font-awesome-4.2.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/sections/mini-repo-list.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/globals/reset.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/vendor/share.js/dist/css/share.min.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/globals/responsive.css') }}">
    <link rel="stylesheet" href="{{ homeAsset('/css/pages/index.css') }}">
    <script src="{{ homeAsset('/vendor/jquery/dist/jquery.min.js') }}"></script>
</head>
<body>
<!-- header -->
<nav class="navbar navbar-default">
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/">Macken Cabin</a>
  </div>

  <div class="navbar-collapse collapse" id="navbar-main">
    <ul class="nav navbar-nav">
        <li><a href="/" title="Home">主页</a></li>
        @if(!empty($navList))
            @foreach($navList as $nav)
                <li><a href="{{ $nav->url }}" title="{{ $nav->name }}">{{ $nav->name }}</a></li>
            @endforeach
        @endif
    </ul>
    <ul class="nav navbar-nav navbar-right">
         <form class="navbar-form navbar-left" role="search" action="{{url('search/keyword')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" placeholder="输入关键字 回车搜索">
            </div>
            <button type="submit" class="btn btn-default fa fa-search"></button>
        </form>
    </ul>
  </div>
</div>
</nav>
<!-- / header -->


@yield('content')


<footer class="site-footer">
        <div class="container">
            <div class="copyright pull-left mobile-block">
                © {{date('Y')}}
                <span >macken.cn</span>
            </div>
            <a class="pull-right mobile-hidden" href="javascript:window.scrollTo(0,0)" ><span class="fa fa-arrow-circle-up fa-3x"></span></a>
        </div>
</footer>
<!-- / footer -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ homeAsset('/vendor/share.js/dist/js/share.min.js') }}"></script>
<script src="{{ homeAsset('/vendor/share.js/dist/js/jquery.qrcode.min.js') }}"></script>
<script src="{{ homeAsset('/js/geopattern.js') }}"></script>
<script src="{{ homeAsset('/js/prism.js') }}"></script>
<link rel="stylesheet" href="{{ homeAsset('/css/globals/prism.css') }}">

<script>
    jQuery(document).ready(function($) {
        // geopattern
        $('.geopattern').each(function(){
            $(this).geopattern($(this).data('pattern-id'));
        });

        $("#open").mouseover(function(){
            $("#search_input").fadeIn(1).animate({width:'300px',opacity:'10'});
            $("#search_input")[0].focus();
            $("#open").fadeOut(10);
        });

        $("#search_input").blur(function(){
            $("#search_input").animate({width:'toggle',opacity:'0.1'}).fadeOut(2);
            $("#open").delay(400).fadeIn(100);
        });
        $('.share-bar').share();
    });
</script>

</body>
</html>
