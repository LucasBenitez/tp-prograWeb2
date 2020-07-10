<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    ?>


    <?php
    if (isset($resultadosNoticiasPorSeccion)) {

        echo "<div class='w3-container w3-margin-bottom text-center w3-margin-top'>
        <img src='./images/publicidad1.jpeg' alt='publicidad' style='width: 770px ; margin-bottom: 20px;height: 320px'>
        </div>";
        $tam = sizeof($resultadosNoticiasPorSeccion);
        for ($i = 1; $i <= $tam; $i++) {
            $posi = explode("-",$resultadosNoticiasPorSeccion[$i]);

            echo "<div class=\"w3-container w3-white w3-margin w3-padding-large\">
                    <div class=\"w3-center\">
                    <h3>$posi[1]</h3>
                    <h5>$posi[2]</h5>
                    </div>";
            echo "<div class=\"w3-justify\">
            <img src='./images/noticia/$posi[5]' alt='' style=\"width:100%\" class=\"w3-padding-16\" >";


            echo "<p >$posi[3]</p>";

            echo "</div>";
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
</div>
<div style="margin-bottom: 100px"></div>




