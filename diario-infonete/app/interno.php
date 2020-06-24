<?php
include_once("view/partial/headerInteno.php");

$_SESSION["usuarioAlta"] = "Admin";
$_SESSION["actionReg"] = "interno";
$page = isset($_GET[ "page" ]) ? $_GET[ "page" ] : "inicioAdm";

switch ($page){

    case "login":
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        include_once("controller/LoginController.php");
        $controller = new LoginController();
        $controller->execute($usuario,$clave);
        break;

    case "registrar":
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
        $codUser = $_POST["codUser"];
        include_once("controller/AltaUsuarioController.php");
        $controller = new AltaUsuarioController();
        $controller->executeRegistarUsuario($usuario,$clave,$nroDoc,$tel,$mail,$codUser);
        break;

    case "panelControl":
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->executePanelControl();
        break;

    case "admRevista":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->execute();
        break;

    case "buscarNoticias":
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBuscarNoticias();
        break;

    case "crearRevista":
        $_SESSION["crearRevista"] = "OK";
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->execute();
        break;

        case "crearNoticia":
        $_SESSION["crearNoticia"] = "OK";
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->execute();
        break;

    case "guardarRevista":
        $titulo = $_POST["titulo"];
        $nroRevista = $_POST["nroRevista"];
        $descripcion = $_POST["descripcion"];
        $idAdmin = $_POST["idUsuario"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeGuardarRevista($idAdmin,$titulo,$nroRevista,$descripcion);
        break;

    case "guardarNoticia":
        $tituloNoticia = $_POST["titulo"];
        $subtitulo= $_POST["subtitulo"];
        $informe = $_POST["informe"];
        $cod_contenidista = $_POST["cod_contenidista"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeGuardarNoticia($tituloNoticia,$subtitulo,$informe,$cod_contenidista);
        break;

    case "cambiarEstadoNoticia":
        $idNoticia = $_GET["idNoticia"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeCambiarEstadoNoticia($idNoticia);
        break;

    case "borrarNoticia":
        $idNoticia = $_GET["idNoticia"];
        include_once("controller/RevistaController.php");
        $controller = new RevistaController();
        $controller->executeBorrarNoticia($idNoticia);
        break;

    case "inicioAdm":
    default:
        include_once("controller/InicioController.php");
        $controller = new InicioController();
        $controller->executeAdm();
        break;
}
