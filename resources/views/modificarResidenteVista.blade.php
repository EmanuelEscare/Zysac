@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Modificar datos del residente "{{$residente->nombre}}" </h1>
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
            <form action="{{route('modificarResidente')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre del residente</label>
                    <input type="text" class="form-control form-control-lg" value="@if(!old('nombre')){{$residente->nombre}}@endif{{old('nombre')}}" name="nombre">
                </div>
    
    
                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('teléfono')){{$residente->teléfono}}@endif{{old('teléfono')}}" name="teléfono">
                  </div>
      
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control form-control-lg" value="@if(!old('email')){{$residente->email}}@endif{{old('email')}}" name="email">
                </div>
    
                <input type="hidden" name="id" value="{{$residente->id}}">
    
                <br>
                <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Modificar residente</button>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection
