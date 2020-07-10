<?php

class AdministradorController
{
    private $modelo;
    public function __construct(){
        include_once ("model/AltaUsuarioModel.php");
        $this->modelo = new AltaUsuarioModel();
    }

    public function execute(){
        include_once("view/registrarAdministradorView.php");
    }
    public function redirectCambiarClave($idUsuario){

            $resultadoUsuario=$this->modelo->executeBuscarUsuarioPorId($idUsuario);
            include_once("view/adm/editarUsuarioView.php");

    }
    public function executeCambiarClave($idUsuario,$claveNueva)
    {
        $this->modelo->executeCambiarClave($idUsuario,$claveNueva);
        header("Location: interno.php?page=panelControl");
    }
}