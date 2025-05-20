<?php
class Usuario
{
    // atributos propios
    private $id;
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $email;
    private $password;
    private $estado;
    private $rol;
    private $created_at;
    private $updated_at;


    

    public function __construct($usuario) {
        $this->id = $usuario['id'];
        $this->nombre1 = $usuario['nombre1'];
        $this->nombre2 = $usuario['nombre2'];
        $this->apellido1 = $usuario['apellido1'];
        $this->apellido2 = $usuario['apellido2'];
        $this->email = $usuario['email'];
        $this->password = $usuario['password'];
        $this->estado = $usuario['estado'];
        $this->rol = $usuario['rol'];
        $this->created_at = $usuario['created_at'];
        $this->updated_at = $usuario['updated_at'];
    }

    function getId(){
        return $this->id;
    }
    function getNombre1(){
        return $this->nombre1;
    }
    function getNombre2(){
        return $this->nombre2;
    }
    function getApellido1(){
        return $this->apellido1;
    }
    function getApellido2(){
        return $this->apellido2;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }
    function getEstado(){
        return $this->estado;
    }
    function getRol(){
        return $this->rol;
    }
    function getCreateAt(){
        return $this->created_at;
    }
    function getUpdateAt(){
        return $this->updated_at;
    }

    function setID($id){
        $this->id = $id;
    }
    function setNombre1($nombre1){
        $this->nombre1 = $nombre1;
    }
    function setNombre2($nombre2){
        $this->nombre2 = $nombre2;
    }
    function setApellido1($apellido1){
        $this->apellido1 = $apellido1;
    }
    function setApellido2($apellido2){
        $this->apellido2 = $apellido2;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setPassword($password){
        $this->password = $password;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function setRol($rol){
        $this->rol = $rol;
    }

    function setUpdateAt($updated_at){
        $this->updated_at = $updated_at;
    }
}
