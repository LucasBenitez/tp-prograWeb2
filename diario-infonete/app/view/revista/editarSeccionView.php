<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
}
$idSeccion = $_GET["idSeccion"];

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
<form class="w3-container w3-col s6 w3-display-middle" name="registrar" action="interno.php?page=editarSeccion" method="post" enctype="application/x-www-form-urlencoded">



    <label class="w3-margin-top">Titulo seccion</label>
    <input class="w3-input w3-margin-top" type="text" name="titulo">


    <input type="hidden" value="<?php echo $idSeccion ?>" name="idSeccion">

    <div class="text-center w3-margin-top"><button class="w3-button bg-primary text-white" >Enviar</button></div>
</form>
<div class="w3-display-bottomright w3-margin-bottom w3-margin-right">
    <a href="interno.php?page=admRevista" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Volver a la página anterior</a></div>

<input type="hidden" value="<?php echo $idSeccion ?>" name="idSeccion">

</form>
</body>
</html>