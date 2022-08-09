<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use Spatie\Activitylog\Models\Activity;

class UsuarioController extends Controller
{
    
        //VISTA PARA VER/MOSTRAR CON UN PAGINADO DE 3 LAS ACTIVIDADES DEL GUARDIA
        public function actividades(){
            $actividades = Activity::Paginate(4);
            return view('actividades', compact('actividades'));
        }
        
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'teléfono' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('panel_admin');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function agregarUsuario(Request $request){
        // return $request;

        $request->validate([
            'nombre' => 'required|max:255',
            'teléfono' => 'required|unique:users|max:10|min:10',
            'confirmarContraseña' => 'required|min:6',
            'contraseña' => 'required|min:6',
        ]);

        if ($request->contraseña != $request->confirmarContraseña) {
            return back()->withErrors([
                'contraseña' => 'Las contraseñas no son iguales.',
            ])->withInput();
        }
        

        $usuario = User::create([
            'name' => $request->nombre,
            'teléfono' => $request->teléfono,
            'rol' => $request->rol,
            'curp' => $request->curp,
            'password' => bcrypt($request->contraseña),
        ]);


        return redirect()->back()->with('mensaje', 'Se agrego con éxito al usuario "'.$usuario->name.'"');
    }

    public function usuarios(){
        $usuarios = User::paginate(10);

        return view('usuarios', compact('usuarios'));
    }

    public function buscarUsuarios(Request $request){
        $usuarios = User::where("name",'like',"%".$request->text."%")->take(3)->get();
        return view("pages.usuarios",compact("usuarios"));
    }

    public function eliminarUsuario($id){
        if (Auth::user()->id == $id) {
           return back();
        }
        User::find($id)->delete();

        return redirect()->back()->with('mensaje', '1');
    }

    public function modificarUsuario(Request $request){
                // return $request;
                $usuario = User::find($request->id);

                $request->validate([
                    'nombre' => 'required|max:255',
                ]);

                if ($request->teléfono != $usuario->teléfono) {
                    $request->validate([
                        'teléfono' => 'unique:users|max:10|min:10',
                    ]);

                    $usuario->update([
                        'teléfono' => $request->teléfono,
                    ]);
                }
        
                if ($request->contraseña != $request->confirmarContraseña) {
                    return back()->withErrors([
                        'contraseña' => 'Las contraseñas no son iguales.',
                    ])->withInput();
                }

                if($request->contraseña){
                    $request->validate([
                        'contraseña' => 'required|min:6',
                    ]);

                    $usuario->update([
                        'password' => bcrypt($request->contraseña),
                    ]);
                }
                
        
                $usuario->update([
                    'name' => $request->nombre,
                    'curp' => $request->curp,
                ]);
        
        
                return redirect()->back()->with('mensaje', 'Se modificó con éxito al usuario "'.$usuario->name.'"');

    }
}
