<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);

    $idRevista=$_GET["cod_revista"];


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
    <form class="w3-container mt-3" name="registrar" action="interno.php?page=editarRevista" method="post"
          enctype="multipart/form-data">

        <div class="w3-container">

            <h2>Cambiar titulo revista</h2>
            <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el titulo" name="titulo"></p>

            <input type="hidden" value="<?php echo $idRevista ?>" name="idRevista">

            <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                    onclick="document.getElementById('crearRevista').style.display='none'">Cambiar</button>
            <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                onclick="document.getElementById('crearRevista').style.display='none'" href="interno.php?page=admRevista">Cancelar</a>

        </div>

    </form>



        <input type="hidden" value="<?php echo $idRevista ?>" name="idRevista">

   
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

    <?php
}