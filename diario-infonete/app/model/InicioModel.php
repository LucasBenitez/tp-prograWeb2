<?php
include_once("helper/Database.php");

class InicioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeBuscarAdmin(){
        return $this->conexion->queryBuscarAdmin();
    }
    public function executeBuscarConte()
    {
        return $this->conexion->queryBuscarConte();
    }
    public function executeBuscarLectores()
    {
        return $this->conexion->queryBuscarLectores();
    }
    public function executeBorrarUsuario($idUsuario){
        $this->conexion->queryBorrarUsuario($idUsuario);
    }
    public function executeBuscarRevistas(){

        return $this->conexion->queryBuscarRevistas();
    }
}