<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag.min.css')}}">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <style>
    .navbar-fixed {
      left: 0;
      width: 100%
    }
    </style>
</head>
<body class="bg-light">
<div class="container-fluid">
	<div class="row" >
		<div class="col col-lg-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed">
        <a class="nav-brand text-dark" href="{{route('index')}}"><i class="fas fa-home"></i></a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<!-- <ul class="navbar-nav">
						<li class="nav-item">
              <a class="nav-item nav-link" href="{{route('musica.index')}}">Musicas</a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="#">Textos <span class="sr-only">(current)</span></a>
						</li>
					</ul>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" /> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Procurar
						</button>
					</form> -->
					<ul class="navbar-nav ml-md-auto">
          @guest
        @if (Route::has('login'))
            <li class="nav-item">
              <a class="btn btn-light" href="{{ route('login') }}">{{ __('Login') }}</a>
           </li>
        @endif                  
        @if (Route::has('register'))
            <li class="nav-item">
              <a class="btn btn-light" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
        <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right bg-light" aria-labelledby="navbarDropdown">
        @if(Auth::user()->tipo_user == "admin")
          <a class="dropdown-item text-dark" href="{{route('home')}}">Painel</a>
        @endif 
            <a class="dropdown-item text-dark" href="{{route('perfil.index',['nome'=>Auth::user()->name])}}">Perfil</a>
            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
            </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
        
        </div>
        </li>
        @endguest
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>
<br>
@yield('conteudo')
<br>
</body>
</html>