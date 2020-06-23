<div class="w3-card-4 w3-display-middle " style="width:25%;">
    <div class="w3-container bg-primary text-white w3-round">
        <h2 class="w3-center">Alta <?php echo$_SESSION["usuarioAlta"] ?></h2>
    </div>
    <br>
    <form class="w3-container" name="registrar" action="<?php echo $_SESSION["actionReg"] ?>.php?page=guardarUsuario" method="post" enctype="application/x-www-form-urlencoded">
        <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario"><br/>
        <label>Clave </label><input class="w3-input w3-round" type="password" name="clave"><br/>
        <label>Nro. Doc </label><input class="w3-input w3-round" type="text" name="nroDoc"><br/>
        <label>Telefono </label><input class="w3-input w3-round" type="text" name="telefono"><br/>
        <label>mail </label><input class="w3-input w3-round" type="email" name="mail"><br/>
        <?php
            if($_SESSION["usuarioAlta"]!="Usuario"){ ?>
                <div class="container">
                    <label>Tipo de usuairo: </label>
                </div>
                <div class="container">
                    <input id="male" class="w3-radio" type="radio" name="codUser" value="1">
                    <label>Administrador</label>
                    <br>
                    <input id="female" class="w3-radio" type="radio" name="codUser" value="2">
                    <label>Contenidista</label>
                </div>
         <?php } ?>
        <div class="container w3-center w3-margin-bottom">
            <input class="w3-button bg-primary text-white w3-round w3-center w3-margin-right" type="submit" name="boton" value="ENVIAR" >
            <input class="w3-button bg-primary text-white w3-round w3-center" type="submit" name="boton" value="CANCELAR" href="interno.php?page=panelControl">
        </div>
    </form>
</div>
