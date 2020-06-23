<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
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
}}
    ?>