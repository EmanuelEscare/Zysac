<!DOCTYPE html>
<html lang="en">
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

<body class="bgError">
<div>
    <div class="container text-white">
        <div class="spaceError"></div>
        <h1 class="text-center titleError">404</h1>
        <p class="text-center">Página no encontrada</p>
        <br>
        <div class="text-center">
            <a href="{{URL::previous()}}" class="btn btn-secondary btn-lg shadow">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar
            </a>
        </div>
    </div>
</div>
</body>
</html>