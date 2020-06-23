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
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/w3.css">
        <!-- js -->
        <script type="text/javascript" src="view/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="view/js/bootstrap.min.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span>
                    <svg class="bi bi-info-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
                </span> InfoNete
            </a>
            <div class="collapse navbar-collapse align-content-center">
                <ul class="navbar-nav ml-auto align-content-center">
                    <li class="nav-item active align-content-center">
                        <?php if(isset($_SESSION["usuarioOK"])) { ?>
                            <label>Bienvenido <?php echo $pos[1];?></label>
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="container align-content-center"/>

            <div class="collapse navbar-collapse" >
                <?php if(isset($_SESSION["usuarioOK"])) {
                ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Alta-conte

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tienda.html">Alta-noticia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Autorizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view/logOut.php">Salir</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">
</html>