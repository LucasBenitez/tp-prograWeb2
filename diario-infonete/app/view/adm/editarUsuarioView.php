<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);

    $idUsuario=$_GET["idUsuario"];


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
    <form class="w3-container w3-col s6 w3-display-middle" name="registrar" action="interno.php?page=cambiarClave" method="post" enctype="application/x-www-form-urlencoded">


        <div class="w3-container bg-primary text-white text-center">
            <h2>Cambiar clave usuario</h2>
        </div>
        <label class="w3-margin-top">Clave nueva</label>
        <input class="w3-input w3-margin-top" type="text" name="claveNueva">

        <input type="hidden" value="<?php echo $idUsuario?>" name="idUsuario">

        <input type="submit" value="Cambiar clave">

        <div class="w3-container">
            <h2>Usuario a cambiar clave</h2>
            <table class="w3-table w3-bordered">
                <tr>
                    <th class='text-center'>Nombre</th>
                    <th class='text-center'>Clave actual</th>

                </tr>
                </tr>
                <?php
                if(isset($resultadoUsuario)) {
                    $tam = sizeof($resultadoUsuario);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posC = explode("-", $resultadoUsuario[$i]);
                        echo "<tr>";
                        echo "<td class='text-center'>$posC[1]</td>";
                        echo "<td class='text-center'>$posC[2]</td>";

                        echo"</tr>";
                    }
                }

                if(isset($_SESSION["sinDatos"])) {
                    echo"<div class='alert warning'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong> No hay datos para mostrar en la tabla
                        </div>";
                    unset($_SESSION["sinDatos"]);

                }
                if(isset($_SESSION["eliminadoOK"])) {
                    echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                    unset($_SESSION["eliminadoOK"]);
                }
                if(isset($_SESSION["userModif"])) {
                    echo"<div class='alert success'>
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

    <?php
}