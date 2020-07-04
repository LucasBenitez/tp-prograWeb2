<?php
if (isset($_SESSION["usuarioOK"])) {
$usuario = $_SESSION["usuarioOK"];
$pos = explode("-", $usuario);
?>


<?php
if (isset($resultadosSeccionPorRevista)) {

    $tam = sizeof($resultadosSeccionPorRevista);
    for ($i = 1; $i <= $tam; $i++) {
        $posi = explode("-",$resultadosSeccionPorRevista[$i]);

        echo "<div class=\"btn-group-vertical\" role=\"group\" aria-label=\"Vertical button group\">";
        echo "<a href='index.php?page=buscarNotiPorSeccion&Cod_seccion=$pos[0]' class=\"w3-button w3-black\"> $posi[1]</a>";
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
