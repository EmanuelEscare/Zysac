@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Agregar usuario</h1>
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

        <form action="{{route('agregarUsuario')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">
                
            </div>

            <div class="mb-3">
              <label class="form-label">Teléfono</label>
              <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('teléfono')}}" name="teléfono">
              
            </div>

            <div class="mb-3">
                <label class="form-label">Curp</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" value="{{old('curp')}}" name="curp">
                
            </div>

            <div class="mb-3">
                <label class="form-label">Seleccionar tipo de usuario</label>
                <select class="form-select form-control-lg" name="rol">
                    <option @if(old('rol') == 1)selected @endif value="1">Guardia</option>
                    <option @if(old('rol') == 0)selected @endif value="0">Administrador</option>
                </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" class="form-control form-control-lg" name="contraseña">
              
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control form-control-lg" name="confirmarContraseña">
                
            </div>

            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar usuario</button>
            </div>
        </form>
<br>
    </div>
</div>
@endsection
