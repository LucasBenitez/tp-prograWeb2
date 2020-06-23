<?php

class InicioController
{
    public function __construct(){
    }

    public function execute(){
        //BUSCAR LAS NOTICIAS EN LAS BASE todas las que tengan estado SI
        //REDIRECIONES AL INICIO index.php?page=mostrar
        include_once("view/inicioView.php");
    }
    public function executeAdm(){
        include_once("view/adm/indexInternoView.php");
    }
    public function executePanelControl(){
        include_once("view/adm/panelControl.php");
    }

}