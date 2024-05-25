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

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* required for proper dropdown alignment */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Patients Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="patientsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Patients') }}</a>
                            <div class="dropdown-menu" aria-labelledby="patientsDropdown">
                                <a class="dropdown-item" href="{{ route('patients.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('patients.create') }}">{{ __('Create') }}</a>
                            </div>
                        </li>
                        
                        <!-- Doctors Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="doctorsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Doctors') }}</a>
                            <div class="dropdown-menu" aria-labelledby="doctorsDropdown">
                                <a class="dropdown-item" href="{{ route('doctors.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('doctors.create') }}">{{ __('Create') }}</a>
                            </div>
                        </li>

                        <!-- Medical Records Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="medicalRecordsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Medical Records') }}</a>
                            <div class="dropdown-menu" aria-labelledby="medicalRecordsDropdown">
                                <a class="dropdown-item" href="{{ route('medical-records.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('medical-records.create') }}">{{ __('Create') }}</a>
                            </div>
                        </li>

                        <!-- Hospitals Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="hospitalsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Hospitals') }}</a>
                            <div class="dropdown-menu" aria-labelledby="hospitalsDropdown">
                                <a class="dropdown-item" href="{{ route('hospitals.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('hospitals.create') }}">{{ __('Create') }}</a>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <button class="btn btn-primary">Test Button</button>
                <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                    Tooltip on top
                </button>
            </div>
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Initialize tooltips -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>
</html>
