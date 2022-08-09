@extends('layouts.layout')
@section('content')

<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Agregar residente con direccion  "{{$residencia->numero_casa}}" </h1>
        <br>
        <br>

        <div style="min-height: 70px;">
        @if (Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        </div>
        <form action="{{route('agregarResidente')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre del residente</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo Electronico</label>
                <input type="text" class="form-control form-control-lg" value="{{old('email')}}" name="email">
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('teléfono')}}" name="teléfono">
              </div>
  

              <div class="mb-3">
                <label class="form-label">¿Es titular de la casa?</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="titular" id="inlineRadio1" value="0">
                    <label class="form-check-label" for="inlineRadio1">Si</label>
                  </div>
                 
                  <br>

            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar residentes</button>
            </div>

            <input type="hidden" name="id" value="{{$residencia->id}}">
        </form>
<br>
    </div>
</div>


@endsection
