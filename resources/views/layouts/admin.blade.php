<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow px-4">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{url('/') }}">Laravel-many-to-many</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav me-5">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.admin.dashboard' ? 'active' : '' }}" aria-current="page" href="{{ url('admin') }}">
                                <i class="fa-solid fa-gauge me-1"></i>
                                Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.projects.index' ? 'active' : '' }}" href="{{route('admin.projects.index')}}">
                                <i class="fa-solid fa-folder me-1"></i>                                   
                                Projects
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.types.index' ? 'active' : '' }}" href="{{route('admin.types.index')}}">
                                <i class="fa-solid fa-bookmark me-1"></i>                                    
                                Types
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
            @yield('content')
        </main>

    </div>
</body>

</html>

</html>


