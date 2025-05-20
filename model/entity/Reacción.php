<?php
class Reaccion
{
    private $id;
    private $usuario_id;
    private $respuesta_id;
    private $tipo;
    private $created_at;
    private $updated_at;

    public function __construct($reaccion) {
        $this->id = $reaccion['id'];
        $this->usuario_id = $reaccion['usuario_id'];
        $this->respuesta_id = $reaccion['respuesta_id'];
        $this->tipo = $reaccion['tipo'];
        $this->created_at = $reaccion['created_at'];
        $this->updated_at = $reaccion['updated_at'];
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

    public function getRespuestaId() {
        return $this->respuesta_id;
    }
    public function setRespuestaId($respuesta_id) {
        $this->respuesta_id = $respuesta_id;
    }

    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
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
