<?php
include_once("helper/Database.php");

class AltaUsuarioModel
{
    private $conexion;

    public function __construct(){
        $this->conexion = new Database();
    }

    public function executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser){
        $sql = "INSERT INTO Usuario(Nro_doc,Cod_doc,Nombre,Mail,Telefono,Cod_Usuario,Pass)
                value($nroDoc,1,'$usuario','$mail',$telefono,$codUser,'$clave')";
        $this->conexion->queryInsert($sql);
        $this->conexion->close();
    }
}