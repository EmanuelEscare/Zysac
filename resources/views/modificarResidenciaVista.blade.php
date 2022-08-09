@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Modificar residencia</h1>
            <br>
            <br>
            <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje')}}
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
            <form action="{{route('modificarResidencia')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre del propietario</label>
                    <input type="text" class="form-control form-control-lg" value="@if(!old('nombre_dueño')){{$residencia->nombre_dueño}}@endif{{old('nombre_dueño')}}" name="nombre_dueño">
                </div>
    
                <div class="mb-3">
                  <label class="form-label">Numero de casa</label>
                  <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('numero_casa')){{$residencia->numero_casa}}@endif{{old('numero_casa')}}"" name="numero_casa">
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('teléfono')){{$residencia->teléfono}}@endif{{old('teléfono')}}" name="teléfono">
                  </div>
      
                  <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" class="form-control form-control-lg" value="@if(!old('direccion')){{$residencia->direccion}}@endif{{old('direccion')}}" name="direccion">
                </div>
    
                <input type="hidden" name="id" value="{{$residencia->id}}">
    
                <br>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Modificar residencia</button>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection
