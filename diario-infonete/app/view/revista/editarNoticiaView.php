<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
}
    $idNoticia = $_GET["idNoticia"];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form class="w3-container" name="registrar" action="interno.php?page=editarNoticia" method="post" enctype="application/x-www-form-urlencoded">
    <div class="w3-container bg-primary">
        <h2>Cambiar informe noticia</h2>
    </div>

    <label>Informe noticia</label>
    <input class="w3-input w3-margin-top" type="text" name="cuerpoNoticia">

        <input type="hidden" value="<?php echo $idNoticia ?>" name="idNoticia">
        <input type="submit">
    <!--<div class="text-center"><button class="w3-button bg-primary text-white" >Enviar</button></div>-->
    </form
</body>
</html>