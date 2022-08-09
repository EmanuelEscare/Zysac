<?php

function translate($event){
    if ($event == "deleted") {
        $message = "eliminado";
    }
    if ($event == "updated") {
        $message = "actualizado";
    }
    if ($event == "created") {
        $message = "creado";
    }
    return $message;
}