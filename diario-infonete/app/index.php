<?php
include_once("view/partial/header.php");

$page = isset($_GET[ "page" ]) ? $_GET[ "page" ] : "inicio";
$_SESSION["usuarioAlta"] = "Usuario";
switch ($page){

    case "login":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        include_once("controller/LoginController.php");
        $controller = new LoginController();
        $controller->execute($usuario,$clave);
        break;


    case "inicioLectorView":
        include_once("controller/LoginController.php");
        $controller = new LoginController();
        $controller->executeInicioLectorView();
        break;

    case "registrar":
        $_SESSION["usuarioAlta"] = "Usuario";
        $_SESSION["actionReg"] = "index";
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->execute();
        break;

    case "guardarUsuario":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $nroDoc = $_POST["nroDoc"];
        $tel = $_POST["telefono"];
        $mail = $_POST["mail"];
        $codUser = 3;

        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->executeRegistarUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUser);
        break;

    case "paginaLector":
        $idUsuario=$_GET["idUsuario"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarNoticiasInicio($idUsuario);
        break;

    case "suscribirse":
        $idUsuario=$_GET["idUsuario"];
        $idRevista=$_GET ["idRevista"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeSuscribirse($idUsuario,$idRevista);
        break;


    case "filtrarRevistas":
        $idUsuario=$_GET["Id_usuario"];
        $idRevista=$_GET ["Cod_revista"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executefiltrarRevistas($idUsuario,$idRevista);
        break;

    case "buscarTodoLector":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarTodoLector();
        break;


    case "inicio":
    default:
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->execute();
        break;
}
include_once("view/partial/footer.php");