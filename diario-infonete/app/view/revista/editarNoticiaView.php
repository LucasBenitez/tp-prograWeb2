<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);

    $idNoticia=$_GET["cod_noticia"];
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


        <form class="w3-container mt-3" name="registrar" action="interno.php?page=editarNoticia" method="post"
              enctype="multipart/form-data">

                <div class="w3-container">

                    <h2>Cambiar informe noticia</h2>
                    <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el titulo" name="titulo"></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el informe de la noticia" id="clave" name="cuerpoNoticia"></p>

                    <input type="hidden" value="<?php echo $idNoticia ?>" name="idNoticia">

                    <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                            onclick="document.getElementById('crearRevista').style.display='none'">Cambiar</button>
                    <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                        onclick="document.getElementById('crearRevista').style.display='none'" href="interno.php?page=admRevista">Cancelar</a>

                </div>

        </form>


    <div class="w3-container">
        <h2>Lista de Noticias</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th>cod. Noticia</th>
                <th>Titulo</th>
                <th>Subtitulo</th>
                <th>Estado</th>

            </tr>
            <?php

            if(isset($resultadoNoticia)){

                $tam = sizeof($resultadoNoticia);
                for ($i = 1; $i <= $tam; $i++) {
                    $posN = explode("-", $resultadoNoticia[$i]);

                    echo "<tr>";
                    echo "<td>$posN[0]</td>";
                    echo "<td>$posN[1]</td>";
                    echo "<td>$posN[2]</td>";
                    echo "<td>$posN[3]</td>";
                    echo "</tr>";

                }
            }
            if (isset($_SESSION["sinNoticias"])) {
                echo "<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay noticias para mostrar en la tabla
                            </div>";
                unset($_SESSION["sinNoticias"]);

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
    </div>
    </body>
    </html>
    <?php
}