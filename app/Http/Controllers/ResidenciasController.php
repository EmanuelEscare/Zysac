<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Residencias;
use App\Models\Residentes;


class ResidenciasController extends Controller
{
    //VISTA PARA VER/MOSTRAR CON UN PAGINADO DE 10  LOS RESIDENTES GET
    public function residencias(){
        $residencias = Residencias::Paginate(3);

        return view('residencias', compact('residencias'));
    }
    //FUNCION PARA AGREGAR RESIDENCIAS
    public function agregarResidencia(Request $request){
        // return $request;

        $request->validate([
            'numero_casa' => 'required|max:10',
            'teléfono' => 'required|unique:residencias|max:10|min:10',
        ]);

        $residencia = Residencias::create([
            'numero_casa' => $request->numero_casa,
            'nombre_dueño' => $request->nombre_dueño,
            'teléfono' => $request->teléfono,
            'direccion' => $request->direccion,
        ]);

        return redirect()->back()->with('mensaje', 'Se agrego con éxito la residencia del propietario "'.$residencia->nombre_dueño.'"');
    }

    //FUNCION PARA BARRA DE BUSQUEDA POR NOMBRES 
    public function buscarResidencias(Request $request){
        $residencias = Residencias::where("nombre_dueño",'like',"%".$request->text."%")->take(3)->get();
        return view("pages.residencias",compact("residencias"));
    }

    //FUNCION PARA MODIFICAR ACTUALIZAR DATOS DE UNA RESIDENCIA
    public function modificarResidencia(Request $request){
        //return $request;
        $residencia = Residencias::find($request->id);

        $request->validate([
            'nombre_dueño' => 'required|max:255',
        ]);

        $request->validate([
            'numero_casa' => 'required|max:1000',
        ]);

        if ($request->teléfono != $residencia->teléfono) {
            $request->validate([
                'teléfono' => 'unique:residencias|max:10|min:10',
            ]);

            $residencia->update([
                'teléfono' => $request->teléfono,
            ]);
        }

        $request->validate([
            'direccion' => 'required|max:300',
        ]);

       
        $residencia->update([
            'nombre_dueño' => $request->nombre_dueño,
            'numero_casa' => $request->numero_casa,
            'direccion' => $request->direccion,
        ]);


        return redirect()->back()->with('mensaje', 'Se modificó con éxito al propietario "'.$residencia->nombre_dueño.'"');
}

//FUNCION PARA ELIMINAR UNA RESIDENCIA
public function eliminarResidencia($id){
    if (Auth::user()->id == $id) {
       return back();
    }
    Residencias::find($id)->delete();

    return redirect()->back()->with('mensaje', '1');
}



}
