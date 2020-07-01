<?php
class RevistaController{
    private $modelo;

        public function __construct(){
            include_once("model/RevistaModel.php");
            $this->modelo = new RevistaModel();
        }

        public function execute(){
            //include_once("view/guardarRevistaView.php");
           // $this->modelo->executeBuscarRevista();
            $this->modelo->executeBuscarSeccion();
            header("Location: interno.php?page=buscarNoticias");

        }

        public function executeGuardarRevista($titulo,$nroRevista,$descripcion){
            $this->modelo->executeGuardarRevista( $titulo, $nroRevista, $descripcion);
            header("Location: interno.php?page=admRevista");
        }

        public function executeBuscarNoticias(){
            $this->modelo->executeBuscarNoticias();
            include_once("view/revista/panelControlRevista.php");
        }

    public function executeBuscarSeccion(){
        $this->modelo->executeBuscarSeccion();
        include_once("view/revista/panelControlRevista.php");
    }
    public function executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$cod_seccion){
        $this->modelo->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista,$cod_seccion);
        header("Location: interno.php?page=admRevista");
    }
    public function executeGuardarSeccion($descripcion,$cod_revista){
        $this->modelo->executeGuardarSeccion($descripcion,$cod_revista);
        header("Location: interno.php?page=admRevista");
    }
    public function executeCambiarEstadoNoticia($idNoticia){
        $this->modelo->executeCambiarEstadoNoticia($idNoticia);
        header("Location: interno.php?page=admRevista");

    }
    public function executeEditarNoticia($idNoticia,$cuerpoNoticia,$titulo){
        $this->modelo->executeEditarNoticia($idNoticia,$cuerpoNoticia,$titulo);
        header("Location: interno.php?page=admRevista");
    }
    public function executeEditarRevista($idRevista,$titulo){
        $this->modelo->executeEditarRevista($idRevista,$titulo);
        header("Location: interno.php?page=admRevista");
    }
    public function executeEditarSeccion($idSeccion,$titulo){
        $this->modelo->executeEditarSeccion($idSeccion,$titulo);
        header("Location: interno.php?page=admRevista");
    }
    public function redirectEditarNoticia(){
        include_once("view/revista/editarNoticiaView.php");
    }
    public function redirectEditarRevista(){
        include_once("view/revista/editarRevistaView.php");
    }
    public function redirectEditarSeccion(){
        include_once("view/revista/editarSeccionView.php");
    }

    public function executeBorrarNoticia($idNoticia){
        $this->modelo->executeBorrarNoticia($idNoticia);
        header("Location: interno.php?page=admRevista");
    }
    public function executeBorrarRevista($idRevista){
        $this->modelo->executeBorrarRevista($idRevista);
        header("Location: interno.php?page=admRevista");
    }
    public function executeBorrarSeccion($idSeccion){
        $this->modelo->executeBorrarSeccion($idSeccion);
        header("Location: interno.php?page=admRevista");
    }

}