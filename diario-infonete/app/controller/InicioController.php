<?php

class InicioController
{
    private $modelo;
    private $modelo2;
    public function __construct(){
        include_once("model/InicioModel.php");
        include_once("model/RevistaModel.php");
        $this->modelo = new InicioModel();
        $this->modelo2 = new RevistaModel();
    }

    public function execute(){


        $resultadosRevistas=$this->modelo->executeBuscarRevistas();

        include_once("view/inicioView.php");
    }
    public function executeAdm(){

        include_once("view/adm/indexInternoView.php");
    }
    public function executePanelControl(){

        $resultadosA=$this->modelo->executeBuscarAdmin();
        $resultadosC=$this->modelo->executeBuscarConte();
        $resultadosL=$this->modelo->executeBuscarLectores();

        include_once("view/adm/panelControl.php");
    }
    public function executeBuscarUsuarios()
    {
        $resultadosA=$this->modelo->executeBuscarAdmin();
        $resultadosC=$this->modelo->executeBuscarConte();
        $resultadosL=$this->modelo->executeBuscarLectores();
        include_once("view/adm/panelControl.php");
    }
    public function executeBorrarUsuario($idUsuario){

        $this->modelo->executeBorrarUsuario($idUsuario);
        header("Location: interno.php?page=panelControl");
    }
    public function executeCambiarAConte($idUsuario){

        $this->modelo->executeCambiarAConte($idUsuario);
        header("Location: interno.php?page=panelControl");
    }
    public function executeCambiarAAdmin($idUsuario){

        $this->modelo->executeCambiarAAdmin($idUsuario);
        header("Location: interno.php?page=panelControl");
    }
    public function executeCambiarALector($idUsuario){

        $this->modelo->executeCambiarALector($idUsuario);
        header("Location: interno.php?page=panelControl");
    }



}