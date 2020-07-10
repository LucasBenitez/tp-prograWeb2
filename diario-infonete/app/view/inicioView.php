
<header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge"><b>Infonete</b></h1>
    <h6>Diario Online</h6>
</header>
<header class="w3-display-container w3-wide" id="home">
    <img class="w3-image" src="./images/image-index.jpg" alt="imagen principal" width="1600" height="1060">
    <div class="w3-display-left w3-padding-large">
        <h1 class="w3-text-white">El mejor diario digital</h1>
        <h1 class="w3-jumbo w3-text-white w3-hide-small"><b>Argentino</b></h1>
        <?php if (!isset($_SESSION["usuarioOK"])) { ?>
        <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off" onclick="document.getElementById('login').style.display='block'">Ingresar</button></h6>
            <?php
        }
        ?>
    </div>
</header>
<form name="login" action="index.php?page=login" method="post">
<div id="login" class="w3-modal w3-animate-opacity">

    <div class="w3-modal-content" style="padding:32px">
        <div class="w3-container w3-white">
            <i onclick="document.getElementById('login').style.display='none'" class="fa fa-remove w3-transparent w3-button w3-xlarge w3-right"></i>
            <h2 class="w3-wide">Ingresar</h2>
            <p>Inicie sesion para ver el contenido premium de la página</p>
            <p><input class="w3-input w3-border" type="text" placeholder="Ingrese su usuario" id="usuario" name="usuario"></p>
            <p><input class="w3-input w3-border" type="password" placeholder="Ingrese su contraseña" id="clave" name="clave"></p>
            <button type="submit" class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom" onclick="document.getElementById('login').style.display='none'">Iniciar sesion</button>
            <a  class="w3-button w3-block w3-padding-large danger-color-dark text-white w3-margin-bottom"
                    onclick="document.getElementById('login').style.display='none'" href="index.php?page=registrar">Registrarse</a>

        </div>
    </div>
</div>
</form>


            <?php if (isset($_SESSION["loginError"])) {

                echo "<div class='alert error'>
                        <span class='closebtn'>&times;</span>
                        <strong>Error!</strong>Usuario/Password invalido</div>";
                unset($_SESSION["loginError"]);
            }
            ?>
    </div>
        </div>

<div style="margin-bottom: 100px"></div>
