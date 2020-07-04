<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    $idRevista=$_GET["Cod_revista"];
    ?>


    <?php
    if (isset($resultadosSeccionPorRevista)) {

        $tam = sizeof($resultadosSeccionPorRevista);
        for ($i = 1; $i <= $tam; $i++) {
            $posi = explode("-", $resultadosSeccionPorRevista[$i]);

            echo "<div class='w3-container'>";
            echo "<div class='w3-row'>";
            echo "<div class='w3-col m4 l2'>";
            echo "<div class='w3-bar-block w3-light-blue w3-mobile '>";
            echo "<a href='index.php?page=buscarNotiPorSeccion&Cod_seccion=$pos[0]' class=\"w3-bar-item w3-button w3-light-grey text-white w3-padding   \"> $posi[1]</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }


        if (isset($_SESSION["sinSeccion"])) {
            echo "<div class='w3-card-4 w3-col s6 text-center w3-display-middle'>
              <header class=\"w3-container w3-text-white bg-primary mb-3\">
              <h1>Suscribirse a la revista</h1>
              </header>

              <div class=\"w3-container\">
              <a href='index.php?page=suscribirse&idUsuario=$pos[0]&idRevista=$idRevista' class=\"w3-bar-item w3-button w3-text-white bg-primary text-white w3-padding mb-3\"> Suscribirse</a>
              </div>
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
}
?>
