
<?php

    class LoginController{
    private $modelo;
        private $modelo2;

    public function __construct(){
        include_once("model/LoginModel.php");
        include_once("model/RevistaModel.php");
        $this->modelo = new LoginModel();
        $this->modelo2 = new RevistaModel();
    }

    public function execute($usuario,$clave){
        $userRol = $_SESSION["usuarioAlta"];
        $control =0;
        $this->modelo->verificarUsuario($usuario,$clave);


        if(isset($_SESSION["loginError"])){
            $control =1;
        }

        if($userRol =="Usuario"){
            header("Location:index.php?page=inicioLectorView");
        }else{
            if($control==1){
                header("Location: interno.php");
            }else{
                $usuario = $_SESSION["usuarioOK"];
                $pos = explode("-", $usuario);
                if($pos[2]==1){// codigo 1 Administrador
                    header("Location: interno.php?page=panelControl");
                }elseif($pos[2]==2){// codigo 2 Contenidista
                    header("Location: interno.php?page=admRevista");
                }else{
                        header("Location: interno.php");
                    }
            }
        }
    }
    public function executeInicioLectorView(){

        $resultadosRevistas=$this->modelo2->executeBuscarRevistas();
        //$resultadosRevistasPorLector=$this->modelo2->executeFiltrarRevistas();
        include_once ("view/lector/inicioLectorView.php");
    }
}
