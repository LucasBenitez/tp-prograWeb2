<?php
if (isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
    $idRevista = $_GET["Cod_revista"];
    ?>


    <?php
    if (isset($resultadosSeccionPorRevista)) {

        $tam = sizeof($resultadosSeccionPorRevista);

        echo "<div class='w3-container w3-margin-bottom text-center'>
        <img src='./images/publicidad.jpeg' alt='publicidad' style=' margin-bottom: 20px; margin-top: 20px'>
        </div>";

        echo "<div class='w3-white w3-margin'>
                    <div class='w3-container w3-padding w3-black'>
                     <h4>Secciones</h4></div>";

        for ($i = 1; $i <= $tam; $i++) {
            $posi = explode("-", $resultadosSeccionPorRevista[$i]);

            echo "
                   <ul class=\"w3-ul w3-hoverable w3-white\">
                    <a href='index.php?page=buscarNotiPorSeccion&Cod_seccion=$posi[0]' class='seccion'><li class=\"w3-padding-16 seccion\">
                    <i class=\"fa fa-arrow-right fa-2x w3-left w3-margin-right\" aria-hidden=\"true\"></i>
                     <span class=\"w3 - large\">$posi[1]</span> 
                    </li></a>
                    
                    ";

        }
    }
echo "</div>";
    echo "</div>";




    if (isset($_SESSION["sinSeccion"])) {
        echo "<div class=\"w3-card-4 w3-display-middle \" style=\"width:25%;\">

            <div class=\"w3-container danger-color-dark text-white\">
                <h2>Suscribirse a la revista</h2>
            </div>

               <form class=\"w3-container w3-margin-top\">
                
                <label>Usuario </label><input class=\"w3-input w3-round\" type=\"text\" name=\"usuario\"><br/>
                <label>Nombre completo</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">

                <label>Dni</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">
                
                
                <label >Método de pago</label>
                <select class=\"w3-select  \" name=\"option\" style='font-size: 15px'>
                    <option value=\"\" disabled selected >Seleccione método de pago</option>
                    <option value=\"1\">Mercado pago</option>
                    <option value=\"2\">Visa</option>
                    <option value=\"3\">Mastercard</option>
                    </select>
                <label class='w3-margin-top'>Número de tarjeta</label>
                <input class=\"w3-input w3-margin-bottom\" type=\"text\">
                
                <label for=\"fecha\">Fecha de vencimiento</label>
                <input type=\"month\" name=\"fecha\" id=\"fecha\" class=\"form-control w3-margin-bottom\" value=\"2020-07\">
                
                
                <div class='w3-container w3-margin-top text-center'>
                <a href='index.php?page=suscribirse&idUsuario=$pos[0]&idRevista=$idRevista' class='w3-bar-item w3-button w3-text-white danger-color-dark text-white w3-padding mb-3'>Suscribirse</a>
                <input class=\"w3-bar-item w3-button w3-text-white danger-color-dark text-white w3-padding mb-3\" type=\"submit\" name=\"boton\" value=\"Cancelar\" href=\"index.php?page=inicio\">
                </div>
                
                </form>

                </div>"





        ;
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




