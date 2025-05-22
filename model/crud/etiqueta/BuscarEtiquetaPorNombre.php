<?php
require_once __DIR__ . '../../../entity/Etiqueta.php';
require_once __DIR__ . '../../../Conexion.php';

class BuscarEtiquetaPorNombre
{
    public static function buscar($nombre){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'SELECT * FROM etiquetas WHERE nombre = :nombre';
        $stmt = $conexion->prepare($query);
        $stmt->execute([':nombre' => $nombre]);
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
        $etiqueta = new Etiqueta($datos);
        return $etiqueta;
    }
}

//se busca una pregunta por el nombre de la etiqueta 
