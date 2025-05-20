<?php
require_once  __DIR__ . '../../../Conexion.php';
require_once  __DIR__ . '../../../entity/Usuario.php';
require_once  __DIR__ . '../../../entity/Pregunta.php';
require_once  __DIR__ . '../../pregunta/BuscarPreguntaDe.php';
class Login
{

    public static function login($email, $password)
    {
        $conexionPDO = new Conexion();
        $conexion = $conexionPDO->getConexion();
        $query = 'SELECT * FROM usuarios WHERE email = :email';
        $stmt = $conexion->prepare($query);
        $stmt->execute([':email' => trim($email)]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado && password_verify(trim($password), $resultado['password'])) {
            $usuario = new Usuario($resultado);
            return $usuario;
        } else {
            return null; // Login fallido
        }
    }
}
