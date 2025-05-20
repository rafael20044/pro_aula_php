<?php
class Preferencia
{
    private $id;
    private $usuario_id;
    private $etiqueta_id;
    private $created_at;
    private $updated_at;

    public function __construct($preferencia) {
        $this->id = $preferencia['id'];
        $this->usuario_id = $preferencia['usuario_id'];
        $this->etiqueta_id = $preferencia['etiqueta_id'];
        $this->created_at = $preferencia['created_at'];
        $this->updated_at = $preferencia['updated_at'];
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }
    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getEtiquetaId() {
        return $this->etiqueta_id;
    }
    public function setEtiquetaId($etiqueta_id) {
        $this->etiqueta_id = $etiqueta_id;
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
