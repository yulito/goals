<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/general/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
            <!---------------------- HOME ---------------------------->
                <a class="navbar-brand" href="{{ url('/home') }}">
                <span class="h1 fontitle">Goals</span>
                <span class="cont-font">    
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                </svg>               
                </span>
                </a>
            <!-------------------------------------------------------->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                            
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @auth                                                    

                            <li class="nav-item">
                                <a class="nav-link c-link-yellow {{ request()->is('pending') ? 'nav-link-act c-link-yellow-act' : '' }}" href="{{ url('/pending') }}" role="button">
                                    <span>Pendientes</span>
                                    @if(\app\Models\Project::where('id_status',1)->get())
                                        <span>{{ count(\app\Models\Project::where('id_status',1)->get()) }}</span>
                                    @endif                                    
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link c-link-green {{ request()->is('completed') ? 'nav-link-act c-link-green-act' : '' }}" href="{{ url('/completed') }}">
                                    <span>Completados</span>
                                    @if(\app\Models\Project::where('id_status',2)->get())
                                        <span>{{ count(\app\Models\Project::where('id_status',2)->get()) }}</span>
                                    @endif 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link c-link-red {{ request()->is('trashed') ? 'nav-link-act c-link-red-act' : '' }}" href="{{ url('/trashed') }}">
                                    <span>Papelera</span>
                                    @if(\app\Models\Project::where('id_status',3)->get())
                                        <span>{{ count(\app\Models\Project::where('id_status',3)->get()) }}</span>
                                    @endif 
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link c-link-profile dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="{{ route('deleteAccount') }}" style="color: red;">
                                        {{ 'Eliminar Cuenta' }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                    
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
