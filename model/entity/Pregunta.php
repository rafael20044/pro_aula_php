<?php
class Pregunta
{
    private $id;
    private $usuario_id;
    private $etiqueta_id;
    private $titulo;
    private $contenido;
    private $estado;
    private $created_at;
    private $updated_at;

    private $comentarios;

    public function __construct($pregunta) {
        $this->id = $pregunta['id'];
        $this->usuario_id = $pregunta['usuario_id'];
        $this->etiqueta_id = $pregunta['etiqueta_id'];
        $this->titulo = $pregunta['titulo'];
        $this->contenido = $pregunta['contenido'];
        $this->estado = $pregunta['estado'];
        $this->created_at = $pregunta['created_at'];
        $this->updated_at = $pregunta['updated_at'];
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

public function getTitulo() {
    return $this->titulo;
}

public function setTitulo($titulo) {
    $this->titulo = $titulo;
}

public function getContenido() {
    return $this->contenido;
}

public function setContenido($contenido) {
    $this->contenido = $contenido;
}

public function getEstado() {
    return $this->estado;
}

public function setEstado($estado) {
    $this->estado = $estado;
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

public function getComentarios() {
    return $this->comentarios;
}

public function setComentarios($comentarios) {
    $this->comentarios = $comentarios;
}

}
