<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>麦肯博客</title>

	<link href="{{ asset('css/bootstrap-paper.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('/plugin/jquery-1.9.1.js ') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style>
        .table-top{
            margin-top: 20px;
        }
        .btn_form{
           float: right;
            margin-right: 5px;
        }
        .modal-dialog {
        	z-index:10000;
        }
    </style>
</head>
<body>
	
	@include('backend.partials.nav')

    <div class="container">

	    <div class="row">

	        @yield('content')

	    </div>
	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
