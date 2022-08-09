<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ResidenciasController;
use App\Http\Controllers\ResidentesController;
use App\Models\User;
use App\Models\Residencias;
use App\Models\Residentes;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::post('/login', [UsuarioController::class, 'login'])->name('login');

//FUNCION PARA CERRAR LA SESION
Route::get('/logout', function () {
    Auth::logout();
    return view('index');
})->name('logout');


Route::get('/panel_admin', function () {
    return view('panel_admin');
})->name('panel_admin');

// USUARIOS ==========================================================================================

Route::group(['rol' => '0'], function()
{

Route::get('/agregarUsuarioVista', function () {
    return view('agregarUsuarioVista');
})->name('agregarUsuarioVista');

Route::post('/agregarUsuario', [UsuarioController::class, 'agregarUsuario'])->name('agregarUsuario');

Route::post('/modificarUsuario', [UsuarioController::class, 'modificarUsuario'])->name('modificarUsuario');

Route::get('/usuarios', [UsuarioController::class, 'usuarios'])->name('usuarios');

Route::get('/usuarios/search', [UsuarioController::class, 'buscarUsuarios']);

Route::get('/eliminarUsuario/{id}', [UsuarioController::class, 'eliminarUsuario'])->name('eliminarUsuario');

Route::get('/modificarUsuarioVista/{id}', function ($id) {
    $usuario = User::find($id);
    return view('modificarUsuario')->with('usuario', $usuario);

})->name('modificarUsuarioVista');

//RUTA VISTA/MOSTRAR ACTIVIDADES GUARDIA
Route::get('/actividades', [UsuarioController::class, 'actividades'])->name('actividades');

});
// RESIDENCIAS ========================================================================================
Route::group(['middleware' => 'admininistrador'], function () {
    
//RUTA VISTA/MOSTRAR RESIDENCIAS
Route::get('/residencias', [ResidenciasController::class, 'residencias'])->name('residencias');


//RUTA PARA VISTA DEL FORMULARIO AGREGAR RESIDENCIAS
Route::get('/agregarResidenciaVista', function () {
    return view('agregarResidenciaVista');
})->name('agregarResidenciaVista');




//RUTA PARA LA FUNCION DE AGREGAR RESIDENCIAS
Route::post('/agregarResidencia', [ResidenciasController::class, 'agregarResidencia'])->name('agregarResidencia');

//RUTA PARA FUNCION DEL BUSCADOR DE NOMBRES DE RESIDENCIAS
Route::get('/residencias/search', [ResidenciasController::class, 'buscarResidencias']);

//RUTA PARA VISTA DEL FORMULARIO DE MODIFICAR RESIDENCIAS
Route::get('/modificarResidenciaVista/{id}', function ($id) {
    $residencia = Residencias::find($id);
    return view('modificarResidenciaVista')->with('residencia', $residencia);

})->name('modificarResidenciaVista');

//RUTA PARA LA FUNCION MODIFICAR  RESIDENCIAS
Route::post('/modificarResidencia', [ResidenciasController::class, 'modificarResidencia'])->name('modificarResidencia');

//RUTA PARA LA FUNCION ELIMINAR RESIDENCIAS
Route::get('/eliminarResidencia/{id}', [ResidenciasController::class, 'eliminarResidencia'])->name('eliminarResidencia');



// RESIDENTES ==========================================================================================

//FUNCION VISTA DE IMPRESION DE RESIDENTES 
Route::get('/residentes', [ResidentesController::class, 'residentes'])->name('residentes');

//FUNCION VISTA PARA AGREGAR RESIDENTES A LAS RESIDENCIAS
Route::get('/agregarResidenteVista/{id}', function ($id) {
    $residencia = Residencias::find($id);
    return view('agregarResidenteVista')->with('residencia', $residencia);
})->name('agregarResidenteVista');

//FUNCION POST PARA PODER AGREGAR  RESIDENTES A LAS RESIDENCIAS
Route::post('/agregarResidente', [ResidentesController::class, 'agregarResidente'])->name('agregarResidente');

//RUTA PARA FUNCION DEL BUSCADOR DE NOMBRES DE RESIDENTES
Route::get('/residentes/search', [ResidentesController::class, 'buscarResidentes']);

//RUTA PARA VISTA DEL FORMULARIO DE MODIFICAR RESIDENCIAS
Route::get('/modificarResidenteVista/{id}', function ($id) {
    $residente = Residentes::find($id);
    return view('modificarResidenteVista')->with('residente', $residente);

})->name('modificarResidenteVista');

//RUTA PARA LA FUNCION MODIFICAR  RESIDENCIAS
Route::post('/modificarResidente', [ResidentesController::class, 'modificarResidente'])->name('modificarResidente');

//RUTA PARA LA FUNCION ELIMINAR RESIDENCIAS
Route::get('/eliminarResidente/{id}', [ResidentesController::class, 'eliminarResidente'])->name('eliminarResidente');


});


