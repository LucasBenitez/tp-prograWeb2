<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
}


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
    <div class="row w3-center" style="margin-left: 35%">
        <div class="col  col-md-6">
            <div class="w3-container">
                <h2>Lista de Revistas</h2>
                <table class="w3-table w3-bordered">
                    <tr class="w3-center">
                        <th>id Revista</th>

                        <th>Titulo</th>
                        <th>Numero</th>
                        <th>Descripcion</th>


                    </tr>
            </div>

            <?php

            if (isset($resultadoRevista)) {

                $tam = sizeof($resultadoRevista);
                for ($i = 1; $i <= $tam; $i++) {
                    $posi = explode("-", $resultadoRevista[$i]);
                    echo "<div>";
                    echo "<td>$posi[0]</td>";
                    echo "<td>$posi[1]</td>";
                    echo "<td>$posi[2]</td>";
                    echo "<td>$posi[3]</td>";
                    echo "</tr>";

                }

            }
            if (isset($_SESSION["sinDatos"])) {
                echo "<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay revistas para mostrar en la tabla
                            </div>";
                unset($_SESSION["sinDatos"]);

            }
            if (isset($_SESSION["eliminadoOK"])) {
                echo "<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                unset($_SESSION["eliminadoOK"]);
            }
            if (isset($_SESSION["userModif"])) {
                echo "<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Clave modificada correctamente</div>";
                unset($_SESSION["userModif"]);
            }
            ?>
            </table>
        </div>
</form>
</body>
</html>