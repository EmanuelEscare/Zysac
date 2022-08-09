@if (count($actividades))
@foreach ($actividades as $actividad)



<tr>
    <td>{{$actividad->subject_type}}</td>   <!--Modulo/Modelo-->
    <td>{{$actividad->log_name}}</td>       <!---Usuario Loggeado-->
    <td>{{$actividad->description}}</td>    <!---Descripcion-->
    <td>{{translate($actividad->event)}}</td>          <!--Evento-->
    <td>{{$actividad->created_at}}</td>     <!--Fecha-->
    <td>
      <div class="text-center">
        <a href="" class="btn btn-lg btn-secondary">
          <i class="fa-solid fa-eye text-white"></i>
        </a>
      </div>

    </td>     <!--Fecha-->


  </tr>

@endforeach



<br>

@endif

