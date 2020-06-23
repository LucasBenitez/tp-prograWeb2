<?php
class AltaUsuarioController{
    private $modelo;

        public function __construct(){
            include_once("model/AltaUsuarioModel.php");
            $this->modelo = new AltaUsuarioModel();
        }

        public function execute()
        {
            include_once("view/registrarUsuarioView.php");
        }

    public function executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser){

        $this->modelo->executeRegistarUsuario($usuario,$clave,$nroDoc,$telefono,$mail,$codUser);

        if($_SESSION["usuarioAlta"] ==Usuario){
            header("Location: index.php");
        }else{
            header("Location: interno.php");
        }
    }
}
