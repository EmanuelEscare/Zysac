<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Residentes;
use App\Models\Residencias;

class ResidentesController extends Controller
{
    //FUNCIONES AGREGAR RESIDENTES A RESIDENCIAS

public function residentes(){   
    $residentes = Residentes::paginate(2);

    return view('residentes', compact('residentes'));
}


//FUNCION PARA BUSCAR A LOS RESIDENTES
public function buscarResidentes(Request $request){
    $residentes = Residentes::where("nombre",'like',"%".$request->text."%")->take(3)->get();
    return view("pages.residentes",compact("residentes"));
}

//FUNCION TIPO POST PARA AGREGAR LOS RESIDENTES EN LA RESIDENCIA
public function agregarResidente(Request $request){
     //return $request;

    $request->validate([
        'nombre' => 'required|max:100',
        'teléfono' => 'required|unique:residentes|max:10|min:10',
    ]);


    $residentes = Residentes::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'teléfono' => $request->teléfono,
        'titular' => $request->titular,
        'id_casa' => $request->id,
    ]);

    return redirect()->back()->with('mensaje', 'Se agrego el residente "'.$residentes->nombre.' a casa "'.$residentes->residencia->numero_casa.'"');
}

//FUNCION PARA MODIFICAR ACTUALIZAR DATOS DE UN RESIDENTE
public function modificarResidente(Request $request){
    //return $request;
    $residente = Residentes::find($request->id);

    $request->validate([
        'nombre' => 'required|max:255',
    ]);

    $request->validate([
        'email' => 'required|max:1000',
    ]);

    if ($request->teléfono != $residente->teléfono) {
        $request->validate([
            'teléfono' => 'unique:residentes|max:10|min:10',
        ]);

        $residente->update([
            'teléfono' => $request->teléfono,
        ]);
    }


   
    $residente->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
    ]);


    return redirect()->back()->with('mensaje', 'Se modificó con éxito el residente "'.$residente->nombre.'"');
}

//FUNCION PARA ELIMINAR UNA RESIDENCIA
public function eliminarResidente($id){
    if (Auth::user()->id == $id) {
       return back();
    }
    Residentes::find($id)->delete();

    return redirect()->back()->with('mensaje', '1');
}
}
