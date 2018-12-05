<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->


        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
        @stack('scripts')
    </head>
    <body>
        <style media="screen">
            .avatar{
                border-radius: 50%;
                position: relative;
                top: -7px;
                float: left;
                left: -8px;
            }
        </style>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/painel') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                            @else

                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{url(Auth::user()->avatar)}}" width="36" class="avatar"> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">                                    
                                    <a class="dropdown-item" href="{{ route('config') }}">
                                        Minha conta
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            @endguest
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="container">
                <div class="col-md-3">
                    <ul class="list-group">
                        <li class="list-group-item"><h4 class="text-center">Menu</h4></li>
                        @if(Auth::user()->level>=0)
                        <!--                        <li class="list-group-item text-center">Usuário: Leitor</li>-->
                        @endif
                        @if(Auth::user()->level>=1)
                        <!--                        <li class="list-group-item text-center">Usuário: Revisor</li>-->
                        <li class="list-group-item text-center"><h4>Posts</h4></li>
                        <li class="list-group-item"> <a href="{!! url('/painel/tags') !!}">-> Tags</a> </li>
                        <li class="list-group-item"> <a href="{!! url('/painel/categorias') !!}">-> Categorias</a> </li>
                        <li class="list-group-item"> <a href="{!! url('/painel/posts') !!}">-> Posts</a> </li>
                        <li class="list-group-item"> <a href="{!! url('/painel/comentarios') !!}">-> Comentários</a> </li>

                        @endif
                        @if(Auth::user()->level>=2)
                        <!--                        <li class="list-group-item text-center">Usuário: Admin</li>-->
                        <!--Usuarios-->
                        <li class="list-group-item text-center"><h4>Usuários</h4></li>
                        <li class="list-group-item"> <a href="{!! url('/painel/users/create') !!}">-> Criar Usuário</a> </li>
                        <li class="list-group-item"> <a href="{!! url('/painel/users') !!}">-> Listar Usuários</a> </li>

                        @endif
                    </ul>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>

        </div>
        <!-- Latest compiled and minified JavaScript -->

    </body>
</html>
