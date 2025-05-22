<?php
require_once __DIR__ . '../../../Conexion.php';
require_once __DIR__ . '../../../entity/Etiqueta.php';
require_once __DIR__ . '../../etiqueta/BuscarEtiquetaPorNombre.php';

class CrearEtiquetaCRUD
{
    public static function crear($nombre){
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'INSERT INTO etiquetas(nombre) VALUES (:nombre)';
        $stmt = $conexion->prepare($query);
        $stmt->execute([':nombre' => $nombre]);

        return BuscarEtiquetaPorNombre::buscar($nombre);
    }
}

//crea una etiqueta - modelo 
