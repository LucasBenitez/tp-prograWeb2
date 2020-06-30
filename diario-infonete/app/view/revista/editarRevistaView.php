<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
}
    $idRevista = $_GET["idRevista"];

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
<form class="w3-container w3-col s6 w3-display-middle" name="registrar" action="interno.php?page=editarRevista" method="post" enctype="application/x-www-form-urlencoded">


    <div class="w3-container bg-primary text-white text-center">
        <h2>Cambiar titulo revista</h2>
    </div>
    <label class="w3-margin-top">Titulo Revista</label>
    <input class="w3-input w3-margin-top" type="text" name="titulo">

    <input type="hidden" value="<?php echo $idRevista ?>" name="idRevista">

    <div class="text-center w3-margin-top"><button class="w3-button bg-primary text-white" >Enviar</button></div>
</form>
</body>
</html>