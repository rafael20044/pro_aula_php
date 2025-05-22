<?php
require_once __DIR__ . '../../../model/crud/pregunta/BuscarPreguntaPor.php';
require_once __DIR__ . '../../../model/crud/respuesta/BuscarRespuestaDepregunta.php';

class BuscarPreguntaPorCtrl
{
    public static function buscar($id){
        $pregunta = BuscarPreguntaPor::buscarPor($id);
        $respuestas = BuscarRespuestaDepregunta::buscar($id);
        $datos = [
            'pregunta' => $pregunta,
            'respuestas' => $respuestas
        ];
        return $datos;
    }
}
//busca todo lo relacionado con una pregunta 