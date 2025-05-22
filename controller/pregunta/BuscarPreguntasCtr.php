<?php
require_once __DIR__ . '../../../model/crud/pregunta/BuscarPreguntas.php';

class BuscarPreguntasCtr
{
    public static function buscarPreguntasCtr(){
        return BuscarPreguntas::buscar();
    }
}
//busca todas las preguntas 