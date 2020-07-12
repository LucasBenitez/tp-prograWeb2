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

<form class="w3-container mt-3" name="registrar" action="interno.php?page=editarSeccion" method="post"
      enctype="multipart/form-data">

    <div class="w3-container">

        <h2>Editar Sección</h2>
        <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el titulo" name="titulo"></p>

        <input type="hidden" value="<?php echo $idRevista ?>" name="idRevista">

        <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                onclick="document.getElementById('crearRevista').style.display='none'">Cambiar</button>
        <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
            onclick="document.getElementById('crearRevista').style.display='none'" href="interno.php?page=admRevista">Cancelar</a>

    </div>

</form>


</body>
</html>