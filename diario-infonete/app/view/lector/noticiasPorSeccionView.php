<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>


    <?php
    if (isset($resultadosNoticiasPorSeccion)) {

        $tam = sizeof($resultadosNoticiasPorSeccion);
        for ($i = 1; $i <= $tam; $i++) {
            $posi = explode("-",$resultadosNoticiasPorSeccion[$i]);

            echo "<div class='container'>";
            echo "<h1 class='mt-5 mb-3 text-primary'> $posi[1] </h1>";
            echo "<strong class='mt-3'>$posi[2]</strong>";

            echo "<img src='./images/noticia/$posi[5]' class='mw-100 mt-3 mb-3 '> ";

            echo "<p style='margin-bottom: 100px'>$posi[3]</p>";
            echo "</div>";
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
}

?>



