<?php
class PreguntausuarioEtiquetaComentario
{
    private $pregunta_id;
    private $titulo;
    private $contenido;
    private $estado;
    private $created_at;
    private $id_usuario;
    private $nombre;
    private $nombre_etiqueta;


    public function __construct($data)
    {
        $this->pregunta_id = $data['pregunta_id'] ?? null;
        $this->titulo = $data['titulo'] ?? null;
        $this->contenido = $data['contenido'] ?? null;
        $this->estado = $data['estado'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->id_usuario = $data['id_usuario'] ?? null;
        $this->nombre = $data['nombre'] ?? null;
        $this->nombre_etiqueta = $data['nombre_etiqueta'] ?? null;
    }

    public function getPreguntaId()
    {
        return $this->pregunta_id;
    }

    public function setPreguntaId($pregunta_id)
    {
        $this->pregunta_id = $pregunta_id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombreEtiqueta()
    {
        return $this->nombre_etiqueta;
    }

    public function setNombreEtiqueta($nombre_etiqueta)
    {
        $this->nombre_etiqueta = $nombre_etiqueta;
    }

}

