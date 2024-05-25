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

    <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @auth
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
             
                    <ul class="navbar-nav me-auto">
                        @if(Auth::user()->role == 'medecin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="patientsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Patients') }}</a>
                            <div class="dropdown-menu" aria-labelledby="patientsDropdown">
                                <a class="dropdown-item" href="{{ route('patients.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('patients.create') }}">{{ __('Create') }}</a>
                                <!-- Add edit link for patients -->
                                <a class="dropdown-item" href="{{ route('patients.edit', ['patient' => 1]) }}">{{ __('Edit') }}</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="medicalRecordsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Medical Records') }}</a>
                            <div class="dropdown-menu" aria-labelledby="medicalRecordsDropdown">
                                <a class="dropdown-item" href="{{ route('medical-records.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('medical-records.create') }}">{{ __('Create') }}</a>
                                <!-- Add edit link for medical records -->
                                <a class="dropdown-item" href="{{ route('medical-records.edit', ['medical_record' => 1]) }}">{{ __('Edit') }}</a>
                            </div>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'secretaire')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="doctorsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Doctors') }}</a>
                            <div class="dropdown-menu" aria-labelledby="doctorsDropdown">
                                <a class="dropdown-item" href="{{ route('doctors.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('doctors.create') }}">{{ __('Create') }}</a>
                                <!-- Add edit link for doctors -->
                                <a class="dropdown-item" href="{{ route('doctors.edit', ['doctor' => 1]) }}">{{ __('Edit') }}</a>
                            </div>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="hospitalsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Hospitals') }}</a>
                            <div class="dropdown-menu" aria-labelledby="hospitalsDropdown">
                                <a class="dropdown-item" href="{{ route('hospitals.index') }}">{{ __('List') }}</a>
                                <a class="dropdown-item" href="{{ route('hospitals.create') }}">{{ __('Create') }}</a>
                                <!-- Add edit link for hospitals -->
                                <a class="dropdown-item" href="{{ route('hospitals.edit', ['hospital' => 1]) }}">{{ __('Edit') }}</a>
                            </div>
                        </li>
                        @endif

                    </ul>
                    @endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            @yield('content')
        </main>
    </div>
</body>
</html>
