<?php
class Ticket
{
    private $id;
    private $usuario_id;
    private $usuarioreportado_id;
    private $pregunta_id;
    private $respuesta_id;
    private $motivo;
    private $created_at;
    private $updated_at;

    public function __construct($ticket) {
        $this->id = $ticket['id'];
        $this->usuario_id = $ticket['usuario_id'];
        $this->usuarioreportado_id = $ticket['usuarioreportado_id'];
        $this->pregunta_id = $ticket['pregunta_id'];
        $this->respuesta_id = $ticket['respuesta_id'];
        $this->motivo = $ticket['motivo'];
        $this->created_at = $ticket['created_at'];
        $this->updated_at = $ticket['updated_at'];
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

    public function getUsuarioReportadoId() {
        return $this->usuarioreportado_id;
    }
    public function setUsuarioReportadoId($usuarioreportado_id) {
        $this->usuarioreportado_id = $usuarioreportado_id;
    }

    public function getPreguntaId() {
        return $this->pregunta_id;
    }
    public function setPreguntaId($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }

    public function getRespuestaId() {
        return $this->respuesta_id;
    }
    public function setRespuestaId($respuesta_id) {
        $this->respuesta_id = $respuesta_id;
    }

    public function getMotivo() {
        return $this->motivo;
    }
    public function setMotivo($motivo) {
        $this->motivo = $motivo;
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
