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
            <a class="w3-button danger-color-dark text-white w3-margin-right"
               style="text-decoration: none" onclick="document.getElementById('crearRevista').style.display='block'">Crear nueva Revista</a>
            <a class="w3-button danger-color-dark text-white  w3-margin-right"
               style="text-decoration: none" onclick="document.getElementById('crearNoticia').style.display='block'">Crear Noticia</a>
            <a class="w3-button danger-color-dark text-white  w3-margin-right"
               style="text-decoration: none" onclick="document.getElementById('crearSeccion').style.display='block'">Crear Seccion</a>

        </div>
    </div>


            <div class="w3-container">
                <h2>Lista de Revistas</h2>
                <table class="w3-table-all">
                    <tr>


                        <th style='font-size: 15px'>Titulo</th>
                        <th style='font-size: 15px'>Numero</th>
                        <th style='font-size: 15px'>Descripcion</th>
                        <th style='font-size: 15px'>Borrar</th>
                        <th style='font-size: 15px'>Modificar</th>

                    </tr>
            </div>

            <?php

            if (isset($resultadosRevista)) {

                $tam = sizeof($resultadosRevista);
                for ($i = 1; $i <= $tam; $i++) {
                    $posi = explode("-", $resultadosRevista[$i]);
                    echo "<div>";

                    echo "<td style='font-size: 15px'>$posi[1]</td>";
                    echo "<td style='font-size: 15px'>$posi[2]</td>";
                    echo "<td style='font-size: 15px'>$posi[3]</td>";
                    echo "<td>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=borrarRevista&idRevista=$posi[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                    echo "</td>";
                    echo "<td>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left' ><a href='interno.php?page=redirectRevista&cod_revista=$posi[0]' style='color: black'>
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


        <div class="w3-container">
            <h2>Lista de Noticias</h2>
            <table class="w3-table-all">
                <tr>

                    <th style='font-size: 15px'>Titulo</th>
                    <th style='font-size: 15px'>Subtitulo</th>
                    <th style='font-size: 15px'>Estado</th>
                    <th style='font-size: 15px'>Borrar</th>
                    <th style='font-size: 15px'>Modificar Estado</th>
                    <th style='font-size: 15px'>Editar noticia</th>


                </tr>
                <?php

                if (isset($resultadosNoticia)) {

                    $tam = sizeof($resultadosNoticia);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posN = explode("-", $resultadosNoticia[$i]);

                        echo "<tr>";
                        echo "<td style='font-size: 15px'>$posN[1]</td>";
                        echo "<td style='font-size: 15px'>$posN[2]</td>";
                        echo "<td style='font-size: 15px'>$posN[3]</td>";
                        if ($pos[2] == 1) {
                            echo "<td>";
                            echo "<div class='w3-margin-left'><a href='interno.php?page=borrarNoticia&idNoticia=$posN[0]' style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posN[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                            echo "</td>";
                            echo "<td>";
                            echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=redirect&cod_noticia=$posN[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                            echo "</td>";
                        } else {
                            echo "<td>";
                            echo   "<p style='font-size: 15px'>No disponible</p>";
                            echo "</td>";
                            echo "<td>";
                            echo   "<p style='font-size: 15px'>No disponible</p>";
                            echo "</td>";
                            echo "<td>";
                            echo   "<p style='font-size: 15px'>No disponible</p>";
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

    <div class="w3-container">
        <h2>Lista de Secciones</h2>
        <table class="w3-table-all">
            <tr>
                <th style='font-size: 15px'>Titulo</th>
                <th style='font-size: 15px'>Borrar</th>
                <th style='font-size: 15px'>Modificar</th>

            </tr>
            <?php
            if (isset($resultadosSeccion)) {

                $tam = sizeof($resultadosSeccion);
                for ($i = 1; $i <= $tam; $i++) {
                    $posS = explode("-",$resultadosSeccion[$i]);
                    echo "<tr>";
                    echo "<td style='font-size: 15px'>$posS[1]</td>";
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
                        echo "<p style='font-size: 15px'>No disponible</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p style='font-size: 15px'>No disponible</p>";
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
   <div style="margin-bottom: 100px"></div>


<!-- Modal de crear revista -->
            <div id="crearRevista" class="w3-modal w3-animate-opacity">
                <form class="w3-container" name="registrar" action="interno.php?page=guardarRevista" method="post"
                      enctype="multipart/form-data">
                <div class="w3-modal-content" style="padding:32px">
                    <div class="w3-container w3-white">
                        <i onclick="document.getElementById('crearRevista').style.display='none'" class="fa fa-remove
                        w3-transparent w3-button w3-xlarge w3-right"></i>
                        <h2>Crear Revista</h2>
                        <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el titulo" name="titulo"></p>
                        <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el número de revista" id="clave" name="nroRevista"></p>
                        <p><textarea class="w3-input w3-border" type="text" placeholder="Ingrese la descripción" id="clave" name="descripcion" rows="4"
                            cols="50"></textarea></p>

                        <label for="inputGroupFile01" id="uploadedImage__label"  class="w3-margin-top">Seleccionar
                            imagen para la revista</label>
                        <p><input type="file" id="uploadedImage" name="uploadedImage"
                                  aria-describedby="inputGroupFileAddon01"></p>




                        <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                                onclick="document.getElementById('crearRevista').style.display='none'">Crear</button>
                        <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                            onclick="document.getElementById('crearRevista').style.display='none'" href="interno.php?page=admRevista">Cancelar</a>

                    </div>
                </div>
                </form>
                </div>


    <!-- Modal de crear noticia -->

    <div id="crearNoticia" class="w3-modal w3-animate-opacity">

        <form class="w3-container" name="registrar" action="interno.php?page=guardarNoticia" method="post"
              enctype="multipart/form-data">
            <div class="w3-modal-content" style="padding:32px">
                <div class="w3-container w3-white">
                    <i onclick="document.getElementById('crearNoticia').style.display='none'" class="fa fa-remove
                        w3-transparent w3-button w3-xlarge w3-right"></i>
                    <h2>Crear Revista</h2>
                    <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el titulo" name="titulo"></p>
                    <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el subititulo" id="clave" name="subtitulo"></p>
                    <p><textarea class="w3-input w3-border" type="text" placeholder="Ingrese el informe de la noticia" id="clave" name="informe" rows="4"
                                 cols="50"></textarea></p>
                <?php
                if (isset($resultadosSeccion)) {

                    $tam = sizeof($resultadosSeccion);
                    echo "<select name='cod_seccion' class='w3-margin-top w3-select'>";
                    for ($i = 1; $i <= $tam; $i++) {
                        $posS = explode("-", $resultadosSeccion[$i]);

                        echo " <option  value='$posS[0]'>$posS[1]</option>";


                    }
                    echo "</select>";

                }
                ?>
                <br/>
                    <label for="inputGroupFile01" id="uploadedImage__label"  class="w3-margin-top">Seleccionar
                        imagen para la noticia</label>
                    <p><input type="file" id="uploadedImage" name="uploadedImage"
                              aria-describedby="inputGroupFileAddon01"></p>
                    <input type="hidden" name="cod_contenidista" value="<?php echo $pos[0] ?>">

                    <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                            onclick="document.getElementById('crearNoticia').style.display='none'">Crear</button>
                    <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                        onclick="document.getElementById('crearNoticia').style.display='none'" href="interno.php?page=admRevista">Cancelar</a>
            </div>
            </div>
        </form>
    </div>

    <!-- Modal de crear seccion -->

    <div id="crearSeccion" class="w3-modal w3-animate-opacity">
        <form class="w3-container" name="registrar" action="interno.php?page=guardarSeccion" method="post"
              enctype="multipart/form-data">
            <div class="w3-modal-content" style="padding:32px">
                <div class="w3-container w3-white">
                    <i onclick="document.getElementById('crearSeccion').style.display='none'" class="fa fa-remove
                        w3-transparent w3-button w3-xlarge w3-right"></i>
                    <h2>Crear Seccón</h2>
                    <p><input class="w3-input w3-border" type="text" placeholder="Ingrese el nombre" name="descripcion"></p>


                <?php
                if (isset($resultadosRevista)) {

                    $tam = sizeof($resultadosRevista);
                    echo "<select name='cod_revista' class='w3-select w3-margin-bottom w3-margin-top'>";
                    for ($i = 1; $i <= $tam; $i++) {
                        $posR = explode("-", $resultadosRevista[$i]);

                        echo " <option  value='$posR[0]'>$posR[1]</option>";


                    }
                    echo "</select>";

                }
                ?>


                    <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                            onclick="document.getElementById('crearNoticia').style.display='none'">Crear</button>
                    <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                        onclick="document.getElementById('crearNoticia').style.display='none'" href="interno.php?page=admRevista" style="text-decoration: none">Cancelar</a>
                </div>
            </div>
        </form>
    </div>




    </body>
    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>
