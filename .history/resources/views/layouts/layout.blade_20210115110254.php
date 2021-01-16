<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">

            <a class="navbar-brand" href="#">TEST</a>
        
            <!--Button Toggler-->
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        
                <span class="navbar-toggler-icon"></span>
        
            </button>
        
            <!--Navbar Links-->
        
            <div class="collapse navbar-collapse" id="Div1">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
        
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Tutorials</a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link" href="#">Articles</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            @can('manage-users')
                            <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                User management
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">
                                Dashboard
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.games.index') }}">
                                Games
                            </a>
                            @endcan
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        
                    </li>
                </ul>
            </div>
        
        </nav>
@yield('content2')
        <main class="py-4">
            
            <div class="container-fluid">
                @include('partials.alerts')
                @yield('content')
            </div>

        </main>
    </div>
</body>

</html>