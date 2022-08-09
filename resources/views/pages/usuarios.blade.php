@if (count($usuarios))
@foreach ($usuarios as $usuario)

<tr>
    <th scope="row">{{$usuario->id}}</th>
    <td>{{$usuario->name}}</td>
    <td>{{$usuario->teléfono}}</td>
    <td>
      @if ($usuario->rol == 0)
      Administrador
      @else
      Guardia    
      @endif
    </td>
    <td>{{$usuario->curp}}</td>
    <td>{{$usuario->created_at}}</td>

    <td>
        <div class="d-grid gap-2">
        <a href="{{route('modificarUsuarioVista',$usuario->id)}}" class="btn btn-secondary btn-lg"><i class="fa-solid fa-pen-to-square"></i></a>
        </div>
    </td>
    <td>
        <div class="d-grid gap-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$usuario->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>
    
  </tr>

@endforeach


<br>

@foreach ($usuarios as $usuario)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar al usuario {{$usuario->name}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarUsuario',$usuario->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif