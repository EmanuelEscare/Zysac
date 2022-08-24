@extends('layouts.layout')
@section('content')

<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Residentes</h1>
        <br>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            
        </div>

        <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                Se eliminó con éxito el residente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>


        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del residente</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Titular</th>
                    <th scope="col">N. de casa</th>

                    <!---<th scope="col">Añadir residente</th>--->
                    <th scope="col">Llamar Residente</th>
                    <th scope="col">SMS WhatsApp</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>

              <!----------------------------------------------------------------------------------->
                <tbody class="table-group-divider">

                    @include('pages.residentes')

    
               <!-----------AQUI VA LA PURA TABLA DE RESIDENCIAS SIN EN EL ENCABEZADO---------------->
  
              </tbody>
              </table>

<!--SI AGREGO EL PAGINADO, NO FUNCIONA EL BUSCADOR-->
{{$residentes->render()}}
            
        </div>

        <br>
        

    </div>
</div>

<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/residentes/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script>

@endsection
