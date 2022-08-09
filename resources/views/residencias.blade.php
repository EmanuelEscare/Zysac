@extends('layouts.layout')
@section('content')

  <div class="card shadow-sm card-content">
    <div class="card-body">
      <h1>Residencias</h1>
      <br>
      <br>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            <div class="col-lg-3">
                <div class="d-grid gap-2">
                    <a href="{{route('agregarResidenciaVista')}}" class="btn btn-primary btn-lg"><i class="fa-solid fa-plus"></i> Añadir residencia</a>
                </div>
            </div>
        </div>

        <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                Se eliminó con éxito la residencia.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Numero de casa</th>
                    <th scope="col">Nombre del dueño</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Cuotas</th>
                    <th scope="col">Añadir residente</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                    @include('pages.residencias')

    
               <!-----------AQUI VA LA PURA TABLA DE RESIDENCIAS SIN EN EL ENCABEZADO---------------->
  
              </tbody>
              </table>
              
{{$residencias->render()}}

        </div>

        <br>
        

</div>
</div>


<script>
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
  </script>
@endsection
