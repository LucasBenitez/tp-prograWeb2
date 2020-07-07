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
            echo "<a href='index.php?page=buscarNotiPorSeccion&Cod_seccion=$posi[0]' class=\"w3-bar-item w3-button w3-light-grey text-white w3-padding\"> $posi[1]</a>";
            echo "</div>";

            echo "</div>";
            echo "</div>";
            echo "</div>";


        }
    }


    if (isset($resultadosRevista)) {
        $tam = sizeof($resultadosRevista);
        for ($i = 1; $i <= $tam; $i++) {

            $posR = explode("-", $resultadosRevista[$i]);


            echo "<div class='w3-container w3-display-middle'>";
            echo "<div class='w3-row'>";

            echo "<div class='w3-card-4'>";
            echo "<header class=\"w3-container bg-primary text-white mb-3  \">
                        <h1>$posR[1]</h1>
                        </header>";
            echo "<img src='./images/revista/$posR[4]'  class=\"mh-100\">";
            echo "<div class=\"w3-container w3-margin-top\">
                        <p class='mb-3 ' >$posR[3]</p>";
            //echo "<a href='index.php?page=buscarRevistaPorId&Cod_revista=$idRevista' class=\"w3-button bg-primary w3-margin-bottom text-white\">Abrir revista</a>";
            echo "</div>";
            echo "</div>";

        }
    }
    echo "</div>";
    echo "</div>";


    if (isset($_SESSION["sinSeccion"])) {
        echo "<div class='w3-card-4 w3-col s6 text-center w3-display-middle'>

            <div class=\"w3-container bg-primary text-white\">
                <h2>Suscribirse a la revista</h2>
            </div>

               <form class=\"w3-container w3-margin-top\">

                <label>Nombre completo</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">

                <label>Dni</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">
                
                
                <label>Método de pago</label>
                <select class=\"w3-select w3-margin-bottom\" name=\"option\">
                    <option value=\"\" disabled selected>Seleccione método de pago</option>
                    <option value=\"1\">Mercado pago</option>
                    <option value=\"2\">Visa</option>
                    <option value=\"3\">Mastercard</option>
                    
                <label class='w3-margin-top'>Número de tarjeta</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">
                
                <label for=\"fecha\">Fecha de vencimiento</label>
                <input type=\"month\" name=\"fecha\" id=\"fecha\" class=\"form-control w3-margin-bottom\" value=\"2020-07\">
                
</select>
                <div class='w3-container w3-margin-top'>
                <a href='index.php?page=suscribirse&idUsuario=$pos[0]&idRevista=$idRevista' class='w3-bar-item w3-button w3-text-white bg-primary text-white w3-padding mb-3'>Suscribirse</a>
</div>
                
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
