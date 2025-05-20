<?php
class ComentarioUsuarioReaccio
{
    private $nombre;
    private $id;
    private $contenido;
    private $created_at;
    private $estado;
    private $dislike;
    private $likes;
    private $usuario_id;

    public function __construct(array $data = [])
    {
        if (isset($data['nombre'])) $this->nombre = $data['nombre'];
        if (isset($data['id'])) $this->id = $data['id'];
        if (isset($data['contenido'])) $this->contenido = $data['contenido'];
        if (isset($data['created_at'])) $this->created_at = $data['created_at'];
        if (isset($data['estado'])) $this->estado = $data['estado'];
        if (isset($data['dislike'])) $this->dislike = $data['dislike'];
        if (isset($data['likes'])) $this->likes = $data['likes'];
        if (isset($data['usuario_id'])) $this->usuario_id = $data['usuario_id'];
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getDislike()
    {
        return $this->dislike;
    }

    public function setDislike($dislike)
    {
        $this->dislike = $dislike;
    }

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    public function getUsuarioId(){
        return $this->usuario_id;
    }
}

