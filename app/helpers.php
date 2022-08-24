<?php


//FUNCION PARA TRADUCIR LOS EVENTOS DE INGLES A ESPAÑOL
function translate($event){
    if ($event == "deleted") {
        $message = "Eliminar";
    }
    if ($event == "updated") {
        $message = "Actualizar";
    }
    if ($event == "created") {
        $message = "Crear";
    }
    return $message;
}

//------------------------------------------------------------
function translate_description($event){
    if ($event == "deleted") {
        $message_description = "eliminado";
    }
    if ($event == "updated") {
        $message_description = "actualizado";
    }
    if ($event == "created") {
        $message_description = "creado";
    }
    return $message_description;
}


function translate_modulo($subject_type){
    if ($subject_type == "App\Models\User") {
        $message_modulo = "Usuario";
    }
    if ($subject_type == "App\Models\Residentes") {
        $message_modulo = "Residentes";
    }
    if ($subject_type == "App\Models\Residencias") {
        $message_modulo = "Residencias";
    }
    return $message_modulo;
}