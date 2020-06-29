<?php
class RevistaController{
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
            //include_once("view/guardarRevistaView.php");
            $this->modelo->executeBuscarRevista();
            header("Location: interno.php?page=buscarNoticias");
        }

        public function executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion){
            $this->modelo->executeGuardarRevista($idAdmin, $titulo, $nroRevista, $descripcion);
            header("Location: interno.php?page=admRevista");
        }

        public function executeBuscarNoticias(){
            $this->modelo->executeBuscarNoticias();
            include_once("view/revista/panelControlRevista.php");
        }
    public function executeBuscarRevista(){
        $this->modelo->executeBuscarRevista();
        include_once("view/revista/panelControlRevista.php");
    }
    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista){
        $this->modelo->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista);
        header("Location: interno.php?page=admRevista");
    }
    public function executeCambiarEstadoNoticia($idNoticia){
        $this->modelo->executeCambiarEstadoNoticia($idNoticia);
        header("Location: interno.php?page=admRevista");

    }
    public function executeEditarNoticia($idNoticia,$cuerpoNoticia){
        $this->modelo->executeEditarNoticia($idNoticia,$cuerpoNoticia);
        header("Location: interno.php?page=admRevista");


    }
    public function redirectEditarNoticia(){
        include_once("view/revista/editarNoticiaView.php");

    }

    public function executeBorrarNoticia($idNoticia){
        $this->modelo->executeBorrarNoticia($idNoticia);
        header("Location: interno.php?page=admRevista");
    }
    public function executeBorrarRevista($idRevista){
        $this->modelo->executeBorrarRevista($idRevista);
        header("Location: interno.php?page=admRevista");
    }

}