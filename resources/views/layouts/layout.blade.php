<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Zysac</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="{{ asset('font/css/all.css') }}">
    <script src="{{ asset('js/loadpage.js') }}"></script>
</head>

<body class="bg-body">
    <div id="loadPage" class="screenLoad">
        <div class="spaceLoad">

        </div>
        <div class="text-center">
            <i class="fa-solid fa-spinner fa-spin display-1" style="--fa-animation-duration: 1.6s;"></i>
        </div>
    </div>

    <div id="contentPage" class="contentBody">

        <div class="row row-menu">
            <div class="col-menu col-lg-2 menu-none">
                <div class="menu-sticky">
                    <div class="menu-zysac-menu">
                        <h3 class="text-center text-white">Zysac</h3>
                        <br>
                        <br>

                        <ul class="list-group list-group-flush rounded">
                            <a href="{{ route('panel_admin') }}"
                                class="@if (request()->route()->uri == 'panel_admin') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-chart-pie"></i> Inicio</a>
                            <a href="{{ route('usuarios') }}"
                                class="@if (request()->route()->uri == 'usuarios') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-users"></i> Usuarios</a>
                            <a href="{{ route('residentes') }}"
                                class="@if (request()->route()->uri == 'residentes') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-people-roof"></i> Residentes</a>
                            <a href="{{ route('residencias') }}"
                                class="@if (request()->route()->uri == 'residencias') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-house-chimney"></i> Residencias</a>
                            <a href=""
                                class="@if (request()->route()->uri == '') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-people-arrows-left-right"></i> Visitantes</a>
                            <a href=""
                                class="@if (request()->route()->uri == '') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-file-invoice-dollar"></i> Cuotas </a>
                            <a href="{{ route('actividades')}}"
                                class="@if (request()->route()->uri == 'actividades') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-list-check"></i> Registro de actividades</a>
                            <a href=""
                                class="@if (request()->route()->uri == '') selected @endif list-group-item item-menu text-white"><i
                                    class="fa-solid fa-gear"></i> Configuración</a>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-menu col-lg-10">
                <nav class="navbar navbar-expand-lg bg-white shadow-sm">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li> --}}
                            </ul>
                            <form class="d-flex" role="search">





                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                                    </button>
                                    <ul class="dropdown-menu drop-fix">
                                        <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="text-center">
                                            <a class="btn btn-danger" href="{{ route('logout') }}">
                                                <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
                <div class="container">
                    <br>
                    @section('content')

                    @show
                    <br>
                </div>
            </div>
        </div>

        {{-- -------------------------------------------------------------- --}}

        {{-- <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Zysac</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex" role="search">
                    


                    <a class="btn btn-outline-danger" href="{{route('logout')}}">
                        <i  class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                    </a>

            </form>
            </div>
        </div>
    </nav>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="menu-zysac shadow-sm">
                    <br>
                    <br>
                    <ul class="list-group list-group-flush rounded">
                        <a href="{{route('panel_admin')}}" class="@if (request()->route()->uri == 'panel_admin')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-chart-pie"></i> Inicio</a>
                        <a href="{{route('usuarios')}}" class="@if (request()->route()->uri == 'usuarios')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-users"></i> Usuarios</a>
                        <a href="{{route('residentes')}}" class="@if (request()->route()->uri == 'residentes')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-people-roof"></i> Residentes</a>
                        <a href="{{route('residencias')}}" class="@if (request()->route()->uri == 'residencias')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-house-chimney"></i> Residencias</a>
                        <a href="" class="@if (request()->route()->uri == '')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-people-arrows-left-right"></i> Visitantes</a>
                        <a href="" class="@if (request()->route()->uri == '')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-file-invoice-dollar"></i> Cuotas </a>
                        <a href="" class="@if (request()->route()->uri == '')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-list-check"></i> Registro de actividades</a>
                        <a href="" class="@if (request()->route()->uri == '')selected @endif list-group-item item-menu text-white"><i class="fa-solid fa-gear"></i> Configuración</a>
                    </ul>
    
                </div>
            </div>
            <div class="col-lg-10">

                @section('content')

                @show
                <br>
            </div>
        </div>
        

    </div> --}}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
