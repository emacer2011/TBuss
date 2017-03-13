<html>
<head>
	<meta charset="UTF-8">
	<meta name="autor" content="Dominguez Cesar Emmanuel"/>
	<meta name="descripcion" content="">
	<meta name="copyright" content="Computos Municipalidad Trelew"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/template_base.css')}}">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/angular/angular.min.js')}}"></script>
    	
    <link rel="icon" href="{{asset('img/icon-bus.png')}}">
	<title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <nav class="navbar navbar-propio navbar-fixed-top">
        <div class="container text-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{asset('/')}}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="menuRegistrar"><a href="{{asset('nuevo/registro')}}">Registrar</a></li>
                    <li id="menuEliminar"><a href="{{asset('eliminar/registro')}}">Eliminar</a></li>
                    <li id="menuRegistros"><a href="{{asset('listar/registros')}}">Listar</a></li>
                    <li id="menuUsuarios"><a href="{{asset('ABM/usuarios')}}">ABM Usuarios</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="main-container">
      	@yield('content')
    </div>
    
    @yield('scripts')

  </body>
</html>
