<?php
class PreguntaEtiquetaRespuesta
{
    private $pregunta_id;
    private $titulo;
    private $contenido;
    private $estado;
    private $created_at;
    private $etiqueta_id;
    private $nombre_etiqueta;
    private $numero_comentarios;

        public function __construct($data)
    {
        $this->pregunta_id = $data['pregunta_id'] ?? null;
        $this->titulo = $data['titulo'] ?? null;
        $this->contenido = $data['contenido'] ?? null;
        $this->estado = $data['estado'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->etiqueta_id = $data['etiqueta_id'] ?? null;
        $this->nombre_etiqueta = $data['nombre_etiqueta'] ?? null;
        $this->numero_comentarios = $data['numero_comentario'] ?? null;
    }

    // Getters
    public function getPreguntaId() {
        return $this->pregunta_id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getEtiquetaId() {
        return $this->etiqueta_id;
    }

    public function getNombreEtiqueta() {
        return $this->nombre_etiqueta;
    }

    public function getNumeroComentarios() {
        return $this->numero_comentarios;
    }

    // Setters
    public function setPreguntaId($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setEtiquetaId($etiqueta_id) {
        $this->etiqueta_id = $etiqueta_id;
    }

    public function setNombreEtiqueta($nombre_etiqueta) {
        $this->nombre_etiqueta = $nombre_etiqueta;
    }

    public function setNumeroComentarios($numero_comentarios) {
        $this->numero_comentarios = $numero_comentarios;
    }
}
