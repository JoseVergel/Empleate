<!DOCTYPE html>
<html lang="es">
	<head>
		<title>@yield('tittle')</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="windth=device-width,user-scalable=no,initial-scale=1.00,maximu-scale=1.0, minium-scale=1.0">
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		<script src="{{asset('js/jquery.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
		@yield('scripts')
	</head>
	<body>
		<!--<header>
			<div class="container">	
				<nav class="barra-nav">
					<div class="logo col-md-2">
						Empleate Ocaña
					</div>
					@yield('nav')
				</nav>						
				<div id="credentials">
					@yield('login')
				</div>
            </div>			
			
		</header>-->
		
		<header>
			<nav class="navbar"><!-- -->
				<div class="container-fluid">					
					<div class="navbar-header">
						<span  class="navbar-brand">Empleate Ocaña</span>
					</div>
					@yield('nav')
				</div>
			</nav>
		</header>
		

		<div id="container">
			@yield('content')
		</div>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
	</body>
</html>