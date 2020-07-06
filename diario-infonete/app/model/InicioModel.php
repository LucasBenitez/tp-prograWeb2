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
        return $this->conexion->queryBuscarContenidista();
    }
    public function executeBuscarLectores()
    {
        return $this->conexion->queryBuscarLector();
    }
    public function executeBorrarUsuario($idUsuario){
        $this->conexion->queryBorrarUsuario($idUsuario);
    }
    public function executeCambiarAConte($idUsuario){
        $this->conexion->queryCambiarAConte($idUsuario);
    }
    public function executeBuscarRevistas(){

        return $this->conexion->queryBuscarRevistas();
    }


}