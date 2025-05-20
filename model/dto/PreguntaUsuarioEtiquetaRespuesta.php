<?php

class PreguntaUsuarioEtiquetaRespuesta
{
    private $id_publicacion;
    private $titulo;
    private $contenido;
    private $estado;
    private $created_at;
    private $usuario_id;
    private $nombre;
    private $etiqueta_id;
    private $nombre_etiqueta;
    private $numero_comentarios;

    public function __construct($data)
    {
        $this->id_publicacion = $data['id_publicacion'] ?? null;
        $this->titulo = $data['titulo'] ?? null;
        $this->contenido = $data['contenido'] ?? null;
        $this->estado = $data['estado'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->usuario_id = $data['usuario_id'] ?? null;
        $this->nombre = $data['nombre'] ?? null;
        $this->etiqueta_id = $data['etiqueta_id'] ?? null;
        $this->nombre_etiqueta = $data['nombre_etiqueta'] ?? null;
        $this->numero_comentarios = $data['numero_comentarios'] ?? null;
    }

    // Getters y setters (reutiliza los anteriores)
    public function getIdPublicacion() { return $this->id_publicacion; }
    public function setIdPublicacion($id_publicacion) { $this->id_publicacion = $id_publicacion; }

    public function getTitulo() { return $this->titulo; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }

    public function getContenido() { return $this->contenido; }
    public function setContenido($contenido) { $this->contenido = $contenido; }

    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }

    public function getCreatedAt() { return $this->created_at; }
    public function setCreatedAt($created_at) { $this->created_at = $created_at; }

    public function getUsuarioId() { return $this->usuario_id; }
    public function setUsuarioId($usuario_id) { $this->usuario_id = $usuario_id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getEtiquetaId() { return $this->etiqueta_id; }
    public function setEtiquetaId($etiqueta_id) { $this->etiqueta_id = $etiqueta_id; }

    public function getNombreEtiqueta() { return $this->nombre_etiqueta; }
    public function setNombreEtiqueta($nombre_etiqueta) { $this->nombre_etiqueta = $nombre_etiqueta; }

    public function getNumeroComentarios() { return $this->numero_comentarios; }
    public function setNumeroComentarios($numero_comentarios) { $this->numero_comentarios = $numero_comentarios; }
}
