@extends('layouts.layout')
@section('content')
<div class="card card-content shadow">
    <div class="card-body">
        <h1>Registro de actividades</h1>
        <br>
        <div class="row">
            <div class="col-lg-9">
            <br>
            </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Modulo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Evento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Ver mas</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                @include('pages.actividades')

    
               <!-----------AQUI VA LA PURA TABLA DE RESIDENCIAS SIN EN EL ENCABEZADO---------------->
  
              </tbody>
              </table>
              
{{$actividades->render()}}

        </div>

        <br>
        

    </div>
</div>

{{-- <script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/residencias/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script> --}}
@endsection
