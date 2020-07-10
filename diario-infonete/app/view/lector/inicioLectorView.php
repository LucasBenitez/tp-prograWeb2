<?php
if (isset($_SESSION["usuarioOK"])) {
$usuario = $_SESSION["usuarioOK"];
$pos = explode("-", $usuario);
?>

    <header class="w3-container w3-center w3-padding-48 w3-white">
        <h1 class="w3-xxxlarge"><b>Infonete</b></h1>
        <h6>Diario Online</h6>
    </header>
    <?php
    if (isset($resultadosRevistas)) {
        $tam = sizeof($resultadosRevistas);
        for ($i = 1; $i <= $tam; $i++) {
            $posi = explode("-", $resultadosRevistas[$i]);
            echo "<div class=\"w3-container w3-white w3-margin w3-padding-large\">
                    <div class=\"w3-center\">
                    <h3>$posi[1]</h3>
                    <h5>$posi[3]</h5>
                    </div>";
            echo "<div class=\"w3-justify\">
            <img src='./images/revista/$posi[4]' alt='' style=\"width:100%\" class=\"w3-padding-16\" >";

            echo "<div class=\"w3-container w3-margin-top text-center w3-margin-bottom \">";

            echo "<a href='index.php?page=buscarSecciones&Id_usuario=$pos[0]&Cod_revista=$posi[0]' class=\"w3-button w3-black w3-margin-bottom text-white\">Abrir revista</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";


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

</div>
</div>

<?php
}?>

<div style="margin-bottom: 100px"></div>



