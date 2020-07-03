<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>

    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <body>

    <div class="w3-container w3-center">
        <h1 class="">Panel de control Administrador</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>


        <div class="w3-container w3-margin-top w3-margin-bottom">
            <a href="interno.php?page=crearRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"
               style="text-decoration: none">Crear nueva Revista</a>
            <a href="interno.php?page=crearNoticia" class="w3-button bg-primary w3-hover-black w3-margin-right"
               style="text-decoration: none">Crear Noticia</a>
            <a href="interno.php?page=crearSeccion" class="w3-button bg-primary w3-hover-black w3-margin-right"
               style="text-decoration: none">Crear Seccion</a>

        </div>
    </div>
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
                        <th>Borrar</th>
                        <th>Modificar</th>

                    </tr>
            </div>

            <?php

            if (isset($resultadosRevista)) {

                $tam = sizeof($resultadosRevista);
                for ($i = 1; $i <= $tam; $i++) {
                    $posi = explode("-", $resultadosRevista[$i]);
                    echo "<div>";
                    echo "<td>$posi[0]</td>";
                    echo "<td>$posi[1]</td>";
                    echo "<td>$posi[2]</td>";
                    echo "<td>$posi[3]</td>";
                    echo "<td>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=borrarRevista&idRevista=$posi[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                    echo "</td>";
                    echo "<td>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=redirectRevista&idRevista=$posi[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
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

        <div class="w3-container">
            <h2>Lista de Noticias</h2>
            <table class="w3-table w3-bordered">
                <tr>
                    <th>cod. Noticia</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Estado</th>
                    <th>Borrar</th>
                    <th>Modificar Estado</th>
                    <th>Editar noticia</th>
                </tr>
                <?php

                if (isset($resultadosNoticia)) {

                    $tam = sizeof($resultadosNoticia);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posN = explode("-", $resultadosNoticia[$i]);

                        echo "<tr>";
                        echo "<td>$posN[0]</td>";
                        echo "<td>$posN[1]</td>";
                        echo "<td>$posN[2]</td>";
                        echo "<td>$posN[3]</td>";
                        if ($pos[2] == 1) {
                            echo "<td>";
                            echo "<div class='w3-margin-left'><a href='interno.php?page=borrarNoticia&idNoticia=$posN[0]' style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posN[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=redirect&idNoticia=$posN[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                            echo "</td>";
                        } else {
                            echo "<td>";
                            echo "No disponible";
                            echo "</td>";
                            echo "<td>";
                            echo "No disponible";
                            echo "</td>";

                        }
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
    <div class="w3-container">
        <h2>Lista de Seccicion</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th>Titulo</th>
                <th>Borrar</th>
                <th>Modificar</th>

            </tr>
            <?php
            if (isset($resultadosSeccion)) {

                $tam = sizeof($resultadosSeccion);
                for ($i = 1; $i <= $tam; $i++) {
                    $posS = explode("-",$resultadosSeccion[$i]);
                    echo "<tr>";
                    echo "<td>$posS[1]</td>";
                    if ($pos[2] == 1) {
                        echo "<td>";
                        echo "<div class='w3-margin-left'><a href='interno.php?page=borrarSeccion&idSeccion=$posS[0]' style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                        echo "</td>";
                        echo "<td>";
                        echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=redirectSeccion&idSeccion=$posS[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                        echo "</td>";
                    } else {
                        echo "<td>";
                        echo "No disponible";
                        echo "</td>";
                        echo "<td>";
                        echo "No disponible";
                        echo "</td>";

                    }
                    echo "</tr>";
                }
            }
            if (isset($_SESSION["sinSeccion"])) {
                echo "<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay noticias para mostrar en la tabla
                            </div>";
                unset($_SESSION["sinSeccion"]);

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
    <div class="w3-display-bottomright w3-margin-bottom w3-margin-right">
        <a href="interno.php?page=panelControl" class="w3-button bg-primary w3-hover-black w3-margin-right"
           style="text-decoration: none">Volver a la página anterior</a></div>

    <?php
    if (isset($_SESSION["crearRevista"])) {
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-left " id="ocultar" style="width:25%;">

            <div class="w3-container bg-primary w3-round">
                <h2 class="w3-center">Crear Revista</h2>
            </div>
            <br>
            <form class="w3-container" name="registrar" action="interno.php?page=guardarRevista" method="post"
                  enctype="multipart/form-data"
            >
                <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo"><br/>
                <label>Nro. Revista</label>
                <input class="w3-input w3-round" type="text" name="nroRevista"><br/>
                <label>Descripcion</label>
                <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50">
                        </textarea>
                <input type="file" id="uploadedImage" name="uploadedImage"
                       aria-describedby="inputGroupFileAddon01">
                <label for="inputGroupFile01" id="uploadedImage__label">Seleccionar
                    imagen para la revista</label>

                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR">

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>
        </div>

        <?php
        unset($_SESSION["crearRevista"]);
    }
    ?>
    <?php
    if (isset($_SESSION["crearNoticia"])) {
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-left " id="ocultar" style="width:25%;">

            <div class="w3-container bg-primary w3-round">
                <h2 class="w3-center">Crear Noticia</h2>
            </div>
            <br>
            <form class="w3-container" name="registrarNoticia" action="interno.php?page=guardarNoticia" method="post"
                  enctype="multipart/form-data">
                <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo"><br/>
                <label>Subtitulo</label>
                <input class="w3-input w3-round" type="text" name="subtitulo"><br/>
                <label>Informe</label>
                <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50">
                        </textarea>
                <?php
                if (isset($resultadosSeccion)) {

                    $tam = sizeof($resultadosSeccion);
                    echo "<select name='cod_seccion'>";
                    for ($i = 1; $i <= $tam; $i++) {
                        $posS = explode("-", $resultadosSeccion[$i]);

                        echo " <option  value='$posS[0]'>$posS[1]</option>";


                    }
                    echo "</select>";

                }
                ?>
                <br/>
                <input type="file" id="uploadedImage" name="uploadedImage"
                       aria-describedby="inputGroupFileAddon01">
                <label for="inputGroupFile01" id="uploadedImage__label">Seleccionar
                    imagen para la noticia</label>

                <input type="hidden" name="cod_contenidista" value="<?php echo $pos[0] ?>">
                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR">

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>
        </div>
        <?php
        unset($_SESSION["crearNoticia"]);
    }
    ?>
    <?php
    if (isset($_SESSION["crearSeccion"])) {
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-left " id="ocultar" style="width:25%;">

            <div class="w3-container bg-primary w3-round">
                <h2 class="w3-center">Crear Seccion</h2>
            </div>
            <br>
            <form class="w3-container" name="registrarSeccion" action="interno.php?page=guardarSeccion" method="POST"
                  enctype="application/x-www-form-urlencoded">
                <label>Nombre</label>
                <input class="w3-input w3-round" type="text" name="descripcion"><br/>

                <?php
                if (isset($resultadosRevista)) {

                    $tam = sizeof($resultadosRevista);
                    echo "<select name='cod_revista'>";
                    for ($i = 1; $i <= $tam; $i++) {
                        $posR = explode("-", $resultadosRevista[$i]);

                        echo " <option  value='$posR[0]'>$posR[1]</option>";


                    }
                    echo "</select>";

                }
                ?>


                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR">

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>
        </div>
        <?php
        unset($_SESSION["crearSeccion"]);
    }
    ?>


    <script>
        function cerrarForm() {
            document.getElementById("ocultar").style.display = 'none';
        }

    </script>
    </body>
    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>
