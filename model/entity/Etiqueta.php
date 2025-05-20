<?php
class Etiqueta
{
    private $id;
    private $nombre;
    private $created_at;
    private $updated_at;

    public function __construct($etiqueta) {
        $this->id = $etiqueta['id'];
        $this->nombre = $etiqueta['nombre'];
        $this->created_at = $etiqueta['created_at'];
        $this->updated_at = $etiqueta['updated_at'];
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}
?>
