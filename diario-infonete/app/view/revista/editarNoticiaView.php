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


    <form class="w3-container w3-col s6 w3-display-middle" name="registrar" action="interno.php?page=editarNoticia" method="post" enctype="application/x-www-form-urlencoded">


        <div class="w3-container bg-primary text-white text-center">
            <h2>Cambiar informe noticia</h2>
        </div>
        <label class="w3-margin-top">Titulo noticia</label>
        <input class="w3-input w3-margin-top" type="text" name="titulo">

        <label class="w3-margin-top">Informe noticia</label>
        <input class="w3-input w3-margin-top" type="text" name="cuerpoNoticia">


        <input type="hidden" value="<?php echo $idNoticia ?>" name="idNoticia">

        <div class="text-center w3-margin-top"><button class="w3-button bg-primary text-white" >Enviar</button></div>
    </form>
    <div class="w3-display-bottomright w3-margin-bottom w3-margin-right">
        <a href="interno.php?page=admRevista" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Volver a la página anterior</a></div>



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