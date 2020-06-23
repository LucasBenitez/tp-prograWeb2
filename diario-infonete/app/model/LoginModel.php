<?php
include_once("helper/Database.php");

class LoginModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }
    public function verificarUsuario($usuario,$clave){
        $this->conexion->query($usuario,$clave);
    }
}