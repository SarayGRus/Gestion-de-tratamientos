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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src={{asset('gestiontratamiento.png')}} height="32px">{{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->userType == 'doctor')
                                        <a class="dropdown-item" href="{{route('treatments.showPatients')}}"
                                           onclick="event.preventDefault(); document.getElementById('treatments.showPatients-form').submit();">
                                            {{__('Mis pacientes')}}
                                        </a>
                                        <form id="treatments.showPatients-form" action="{{ route('treatments.showPatients') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{route('myPatientsTreatments')}}"
                                           onclick="event.preventDefault(); document.getElementById('myPatientsTreatments-form').submit();">
                                            {{__('Mis prescripciones')}}
                                        </a>
                                        <form id="myPatientsTreatments-form" action="{{ route('myPatientsTreatments') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{route('mySpecialty')}}"
                                           onclick="event.preventDefault(); document.getElementById('mySpecialty-form').submit();">
                                            {{__('Especialidad')}}
                                        </a>
                                        <form id="mySpecialty-form" action="{{ route('mySpecialty') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                        </form>
                                        <a class="dropdown-item" href="{{route('myClinic')}}"
                                           onclick="event.preventDefault(); document.getElementById('myClinic-form').submit();">
                                            {{__('Centro de salud')}}
                                        </a>
                                        <form id="myClinic-form" action="{{ route('myClinic') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{route('myPatientsDisease')}}"
                                           onclick="event.preventDefault(); document.getElementById('myPatientsDisease-form').submit();">
                                            {{__('Enfermedades')}}
                                        </a>
                                        <form id="myPatientsDisease-form" action="{{ route('myPatientsDisease') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{route('medicinesDoctor')}}"
                                           onclick="event.preventDefault(); document.getElementById('medicinesDoctor-form').submit();">
                                            {{__('Medicamentos')}}
                                        </a>
                                        <form id="medicinesDoctor-form" action="{{ route('medicinesDoctor') }}" method="GET" style="...">
                                            @csrf
                                        </form>



                                    @endif
                                    @if(Auth::user()->userType == 'patient')
                                        <a class="dropdown-item" href="{{ route('myTreatments') }}"
                                           onclick="event.preventDefault(); document.getElementById('myTreatments-form').submit();">
                                            {{ __('Mis tratamientos') }}
                                        </a>
                                        <form id="myTreatments-form" action="{{ route('myTreatments') }}" method="GET" style="...">
                                            @csrf
                                        </form>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
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
