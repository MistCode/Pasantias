<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cacique Maracay') }}</title>

    <script src="https://kit.fontawesome.com/47630105e1.js" crossorigin="anonymous"></script>


    <link  rel = " stylesheet "  href = " https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css " >
    <link  href = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/css/fileinput.min.css "  media = " all "  rel = " stylesheet "  type = " text/css " />
        <script  src =" https://code.jquery.com/jquery-3.3.1.min.js "> </script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/plugins/piexif.min.js "  type = " text / javascript "></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/plugins/sortable.min.js "  type = " text / javascript "></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/plugins/purify.min.js " text / javascript></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js "> </script>
    <script  src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js "  type = " text / javascript "> </script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.min.js "></script>
    <script  src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/fa/theme.js "></script>
    <script  src = " https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/locales/es.js "></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body background="{{ asset('images/wallhaven-0pej79.jpg') }}">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Cacique Maracay</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                <div class="navbar-nav mr-auto">
                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarGrupos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Grupos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarGrupos">
                          <a class="dropdown-item" href="{{ url('/grupos') }}">Mis Grupos</a>
                          <a class="dropdown-item" href="{{ url('/grupos/create') }}">Añadir</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarComunity" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comunidades</a>
                        <div class="dropdown-menu" aria-labelledby="navbarComunity">
                          <a class="dropdown-item" href="{{ url('/comunidades') }}">Mis Comunidades</a>
                          <a class="dropdown-item" href="{{ url('/comunidades/create') }}">Añadir</a>
                        </div>
                    </div>
                    <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                </div>
                    <!-- Right Side Of Navbar -->
                <div class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
         
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img width="30px" height="30px" class="rounded-circle" src="{{ asset('images/ae/'.Auth::user()->avatar) }}">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/profile') }}">
                                    <i class="far fa-user-circle"></i> Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i> 
                                        {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <main class="container">
                @yield('content')
                

        </main>
    </div>
    <script>
$(document).on('ready', function() {
    $("#input-b1").fileinput({
        showUpload: false,
        dropZoneEnabled: false,
        maxFileCount: 10
    });
});
</script>
</body>
</html>