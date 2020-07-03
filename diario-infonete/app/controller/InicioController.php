<?php

class InicioController
{
    private $modelo;
    public function __construct(){
        include_once("model/InicioModel.php");
        $this->modelo = new InicioModel();
    }

    public function execute(){

        $this->modelo->executeBuscarRevistas();
        include_once("view/inicioView.php");
    }
    public function executeAdm(){

        include_once("view/adm/indexInternoView.php");
    }
    public function executePanelControl(){
        $this->modelo->executeBuscarUsuarios();
        include_once("view/adm/panelControl.php");
    }
    public function executeBorrarUsuario($idUsuario){
        $this->modelo->executeBorrarUsuario($idUsuario);
        header("Location: interno.php?page=panelControl");
    }

}