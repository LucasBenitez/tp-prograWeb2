<?php
include_once("helper/Database.php");

class InicioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeBuscarUsuarios(){
        $this->conexion->queryBuscarUsuarios();

    }
    public function executeBorrarUsuario($idUsuario){
        $this->conexion->queryBorrarUsuario($idUsuario);
    }
}