<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    $idRevista = $_GET["Cod_revista"];
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
            echo "<a href='index.php?page=buscarNotiPorSeccion&Cod_seccion=$posi[0]' class=\"w3-bar-item w3-button w3-light-grey text-white w3-padding   \"> $posi[1]</a>";
            echo "</div>";
            echo "</div>";

        }
    }

    echo "<div class=\"w3-card-4 mb-5 w-col-sm\">";
    echo "<header class=\"w3-container bg-primary text-white mb-3  \">
                        <h1>Titulo</h1>
                        </header>";
    //echo "<img src='./images/revista/$posi[4]' class=\"mh-100\">";
    echo "<div class=\"w3-container w3-margin-top\">
                        <p>Subtitlo</p>
                        </div>";

    echo "</div>";


    if (isset($_SESSION["sinSeccion"])) {
        echo "<div class='w3-card-4 w3-col s6 text-center w3-display-middle'>

            <div class=\"w3-container w3-green\">
                <h2>Suscribirse a la revista</h2>
            </div>

               <form class=\"w3-container\">

                <label>First Name</label>
                <input class=\"w3-input\" type=\"text\">

                <label>Last Name</label>
                <input class=\"w3-input\" type=\"text\">
                <a href='index.php?page=suscribirse&idUsuario=$pos[0]&idRevista=$idRevista' class='w3-bar-item w3-button w3-text-white bg-primary text-white w3-padding mb-3'> Suscribirse</a>
                </form>

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
