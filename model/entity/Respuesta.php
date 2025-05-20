<?php
final class Respuesta
{
    private $id;
    private $usuario_id;
    private $pregunta_id;
    private $contenido;
    private $created_at;
    private $updated_at;

    private $reacciones;

    public function __construct($respuesta) {
        $this->id = $respuesta['id'];
        $this->usuario_id = $respuesta['usuario_id'];
        $this->pregunta_id = $respuesta['pregunta_id'];
        $this->contenido = $respuesta['contenido'];
        $this->created_at = $respuesta['created_at'];
        $this->updated_at = $respuesta['updated_at'];
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

    public function getPreguntaId() {
        return $this->pregunta_id;
    }
    public function setPreguntaId($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }

    public function getContenido() {
        return $this->contenido;
    }
    public function setContenido($contenido) {
        $this->contenido = $contenido;
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

    public function getReacciones() {
        return $this->reacciones;
    }
    public function setReacciones($reacciones) {
        $this->reacciones = $reacciones;
    }
}
?>
