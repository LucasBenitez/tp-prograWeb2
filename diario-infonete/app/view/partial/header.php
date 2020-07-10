<?php
session_start();
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>InfoNete - Diario Online</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="img/png" href="view/img/favdiario.ico"/>
        <!-- css -->
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/mdb.min.css">
        <link rel="stylesheet" href="view/css/estilos.css">
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- js -->
        <script type="text/javascript" src="view/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="view/js/bootstrap.min.js"></script>
    </head>
    <body>

    <style>
        h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
        body {font-family: "Open Sans"}
    </style>
    <body class="w3-light-grey">

    <!-- Navigation bar with social media icons -->
    <div class="w3-bar w3-black w3-hide-small">
        <a href="index.php?page=inicio" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a>
        <a href="index.php?page=tienda&idUsuario=<?php echo $pos[0]?>" class="w3-bar-item w3-button"><i class="fa fa-shopping-bag"></i></a>

        <?php if(isset($_SESSION["usuarioOK"])) { ?>
            <label class="text-white mt-2 ">Bienvenido <?php echo $pos[1];?></label>
        <?php } ?>

        <?php if(isset($_SESSION["usuarioOK"])) {
        ?>
        <a href="view/logOut.php" class="w3-bar-item w3-button w3-right"><i class="fa fa-sign-out"></i></a>
            <?php
        }
        ?>
    </div>
<!-- Page content -->
<div class="w3-content" style="max-width:1600px">