@if (count($residencias))
@foreach ($residencias as $residencia)



<tr>
    <td>{{$residencia->numero_casa}}</td>
    <td>{{$residencia->nombre_dueño}}</td>
    <td>{{$residencia->teléfono}}</td>

    <td>
      <div class="d-grid gap-2">
      <!---EN EL HREF VA LA RUTA QUE MANDA EL PODER MODIFICAR UN RESIDENTE LA VISTA-->
      <a href="{{route('modificarResidenciaVista',$residencia->id)}} " class="btn btn-secondary btn-lg"><i class="fa-solid fa-pen-to-square"></i></a>
      </div>
  </td>
    <td>
      <div class="d-grid gap-2">
      <!---EN EL HREF VA LA RUTA QUE MANDA EL PODER MODIFICAR UN RESIDENTE LA VISTA-->
      <a href="{{route('agregarResidenteVista',$residencia->id)}} " class="btn btn-success btn-lg"><i class="fa-solid fa-house-chimney-user"></i></a>
      </div>
  </td>
    <td>
        <div class="d-grid gap-2">
        <!---EN EL HREF VA LA RUTA QUE MANDA EL PODER MODIFICAR UN RESIDENTE LA VISTA-->
        <a href="{{route('modificarResidenciaVista',$residencia->id)}} " class="btn btn-secondary btn-lg"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
    </td>
    <td>
        <div class="d-grid gap-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$residencia->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>
  </tr>

@endforeach



<br>


@foreach ($residencias as $residencia)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$residencia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar residencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar al propietario {{$residencia->nombre_dueño}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarResidencia',$residencia->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif

