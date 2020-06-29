<?php
if(isset($_SESSION["usuarioOK"])) {
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
            <a href="interno.php?page=crearRevista" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Crear nueva Revista</a>
            <a href="interno.php?page=crearNoticia" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Crear Noticia</a>

        </div>
    </div>
        <div class="row w3-center" style="margin-left: 35%">
            <div class="col  col-md-6">
        <div class="w3-container">
            <h2>Lista de Revistas</h2>
            <table class="w3-table w3-bordered">
                <tr class="w3-center">
                    <th>id Revista</th>
                    <th>id Administrador</th>
                    <th>Titulo</th>
                    <th>Numero</th>
                    <th>Descripcion</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
    </div>

                <?php
                if(isset($_SESSION["revistas"])) {
                    $revistas = $_SESSION["revistas"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posi = explode("-", $revistas[$i]);
                        echo "<tr>";
                        echo "<td>$posi[0]</td>";
                        echo "<td>$posi[1]</td>";
                        echo "<td>$posi[2]</td>";
                        echo "<td>$posi[3]</td>";
                        echo "<td>$posi[4]</td>";
                        echo "<td>";
                        echo"<div class='w3-margin-left'><a href='interno.php?page=borrarRevista&idRevista=$posi[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                        echo "</td>";
                        echo "<td>";
                        echo "<div class='w3-margin-left'><a href='' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div>";
                        echo "</td>";
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatos"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay revistas para mostrar en la tabla
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

        <div class="w3-container">
            <h2>Lista de Noticias</h2>
            <table class="w3-table w3-bordered">
                <tr>
                    <th>cod. Noticia</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Estado</th>
                    <th>Origen</th>
                    <th>Borrar</th>
                    <th>Modificar Estado</th>
                </tr>
                <?php
                if(isset($_SESSION["noticias"])) {
                    $noticias = $_SESSION["noticias"];
                    $tam = sizeof($noticias);
                    for ($i = 1; $i <= $tam; $i++) {
                        $posi = explode("-", $noticias[$i]);
                        echo "<tr>";
                        echo "<td>$posi[0]</td>";
                        echo "<td>$posi[1]</td>";
                        echo "<td>$posi[2]</td>";
                        echo "<td>$posi[3]</td>";
                        echo "<td>$posi[4]</td>";
                        if($pos[2]==1){
                        echo "<td>";
                        echo"<div class='w3-margin-left'><a href='interno.php?page=borrarNoticia&idNoticia=$posi[0]' style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                        echo "</td>";
                        echo "<td>";
                        echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarEstadoNoticia&idNoticia=$posi[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                        echo "</td>";
                        }else{
                            echo "<td>";
                            echo "No disponible";
                            echo "</td>";
                            echo "<td>";
                            echo "No disponible";
                            echo "</td>";

                        }
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinNoticias"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay noticias para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinNoticias"]);

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
    </div>
    <div class="w3-display-bottomright w3-margin-bottom w3-margin-right">
        <a href="interno.php?page=panelControl" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Volver a la página anterior</a></div>

    <?php
    if(isset($_SESSION["crearRevista"])){
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-left " id="ocultar" style="width:25%;">

            <div class="w3-container bg-primary w3-round">
                <h2 class="w3-center">Crear Revista</h2>
            </div>
            <br>
            <form class="w3-container" name="registrar" action="interno.php?page=guardarRevista" method="post" enctype="application/x-www-form-urlencoded">
                <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo"><br/>
                <label>Nro. Revista</label>
                <input class="w3-input w3-round" type="text" name="nroRevista"><br/>
                <label>Descripcion</label>
                <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50">
                        </textarea>
                <br/>
                <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR" >

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>
        </div>

        <?php
        unset($_SESSION["crearRevista"]);
    }
    ?>
    <?php
    if(isset($_SESSION["crearNoticia"])){
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-left " id="ocultar" style="width:25%;">

            <div class="w3-container bg-primary w3-round">
                <h2 class="w3-center">Crear Noticia</h2>
            </div>
            <br>
            <form class="w3-container" name="registrarNoticia" action="interno.php?page=guardarNoticia" method="post" enctype="application/x-www-form-urlencoded">
                <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo"><br/>
                <label>Subtitulo</label>
                <input class="w3-input w3-round" type="text" name="subtitulo"><br/>
                <label>Informe</label>
                <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50">
                        </textarea>
                <br/>
                <input type="hidden" name="cod_contenidista" value="<?php echo $pos[0]?>">
                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR" >

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>
        </div>
        <?php
        unset($_SESSION["crearNoticia"]);
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
}else{
    header("Location: index.php");
    exit();
}
?>
