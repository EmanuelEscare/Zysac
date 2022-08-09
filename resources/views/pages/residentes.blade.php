@if (count($residentes))
@foreach ($residentes as $residente)

<tr>
    <th scope="row">{{$residente->id}}</th>
    <td>{{$residente->nombre}}</td>
    <td>{{$residente->email}}</td>
    <td>{{$residente->teléfono}}</td>
    <td> @if($residente->titular == 0)
      Titular
      @else
      Solo residente    
      @endif</td>
    <td>{{$residente->residencia->numero_casa}}</td>



    <td>
        <div class="d-grid gap-2">
        <!---EN EL HREF VA LA RUTA QUE MANDA EL PODER MODIFICAR UN RESIDENTE LA VISTA-->
        <a href="{{route('modificarResidenteVista',$residente->id)}} " class="btn btn-secondary btn-lg"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
    </td>
    <td>
        <div class="d-grid gap-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$residente->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>
    
  </tr>

@endforeach



@foreach ($residentes as $residente)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$residente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar residente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar al residente {{$residente->nombre}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarResidente',$residente->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif