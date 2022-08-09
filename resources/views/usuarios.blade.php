@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Usuarios</h1>
        <br>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            <div class="col-lg-3">
                <div class="d-grid gap-2">
                    <a href="{{route('agregarUsuarioVista')}}" class="btn btn-primary btn-lg"><i class="fa-solid fa-plus"></i> Agregar usuario</a>
                </div>
            </div>
        </div>

        <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                Se eliminó con éxito al usuario.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Curp</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">
    
                  @include('pages.usuarios')
  
              </tbody>
              </table>
        </div>

        <br>
        
        {{$usuarios->render()}}

    </div>
</div>

<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/usuarios/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script>
@endsection
