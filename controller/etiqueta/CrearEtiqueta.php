<?php
require_once __DIR__ . '../../../model/crud/etiqueta/CrearEtiquetaCRUD.php';

class CrearEtiqueta
{
    public static function crear($nombre){
        return CrearEtiquetaCRUD::crear($nombre);
    }
}
