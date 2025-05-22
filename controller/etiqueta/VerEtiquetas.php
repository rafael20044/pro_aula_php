<?php
require_once __DIR__ . '../../../model/entity/Etiqueta.php';
require_once __DIR__ . '../../../model/crud/etiqueta/VerEtiqueta.php';
class VerEtiquetas
{
    public static function verEtiquetas(){
        return VerEtiqueta::verEtiquetas();
    }
}
//muestra las etiquetas en la base de datos 
