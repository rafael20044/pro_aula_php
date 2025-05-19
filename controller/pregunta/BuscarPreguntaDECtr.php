<?php
require_once __DIR__ . '../../../model/crud/pregunta/BuscarPreguntaDe.php';
class BuscarPreguntaDECtr
{
    public static function buscar($id){
        return BuscarPreguntaDe::buscarPreguntasDe($id);
    }
}
