<?php
require_once __DIR__ . '../../../entity/Etiqueta.php';
require_once __DIR__ . '../../../Conexion.php';

class VerEtiqueta
{
    public static function verEtiquetas(){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'SELECT * FROM etiquetas';
        $stmt = $conexion->prepare($query);
        $stmt->execute();
        $etiquetas = [];
        $index = 0;
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $etiqueta = new Etiqueta($fila);
            $etiquetas[$index] = $etiqueta;
            $index++;
        }
        return $etiquetas;
    }
}
