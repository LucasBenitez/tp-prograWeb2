<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
    <div class="w3-container w3-center">
        <h1 class="">Panel de control Administrador</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>

        <div class="w3-container w3-margin-top">

            <a href="interno.php?page=admRevista" class="w3-button danger-color-dark w3-margin-right text-white"style="text-decoration: none">Administrar Revista</a>
            <a href="../../../../../tp-prograWeb2/pdf/generarPdf.php" class="w3-button danger-color-dark w3-margin-right text-white"style="text-decoration: none">Generar reporte Usuarios</a>



        </div>
    </div>
    <br>
    <div class="w3-container">
        <h2>Lista Administradores</h2>
        <table class="w3-table-all">
            <tr>
                <th class='text-center' style='font-size: 15px'>Nombre</th>
                <th class='text-center' style='font-size: 15px'>Clave</th>
                <th class='text-center' style='font-size: 15px'>Borrar</th>
                <th class='text-center' style='font-size: 15px'>Cambiar Clave</th>
                <th class='text-center' style='font-size: 15px'>Cambiar a contenidista</th>
                <th class='text-center' style='font-size: 15px'>Cambiar a lector</th>


            <?php
            if(isset($resultadosA)) {
                $tam = sizeof($resultadosA);
                for ($i = 1; $i <= $tam; $i++) {
                    $posA = explode("-", $resultadosA[$i]);
                    echo "<tr>";
                    echo "<td class='text-center' style='font-size: 15px'>$posA[1]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>$posA[2]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>";
                    echo"<a href='interno.php?page=borrarUsuario&idUsuario=$posA[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=redirectUsuario&idUsuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=cambiarAConte&idUsuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=cambiarALector&idUsuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo"</tr>";
                }
            }

            if(isset($_SESSION["sinDatos"])) {
                echo"<div class='alert warning'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong> No hay datos para mostrar en la tabla
                        </div>";
                unset($_SESSION["sinDatos"]);

            }
            if(isset($_SESSION["eliminadoOK"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                unset($_SESSION["eliminadoOK"]);
            }
            if(isset($_SESSION["userModif"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Clave modificada correctamente</div>";
                unset($_SESSION["userModif"]);
            }
            ?>
        </table>
    </div>
    <br>
    <div class="w3-container">
        <h2>Lista Contenidista</h2>
        <table class="w3-table-all">
            <tr>
                <th class='text-center' style='font-size: 15px'>Nombre</th>
                <th class='text-center' style='font-size: 15px'>Clave</th>
                <th class='text-center' style='font-size: 15px'>Borrar</th>
                <th class='text-center' style='font-size: 15px'>Cambiar Clave</th>
                <th class='text-center' style='font-size: 15px'>Cambiar a administrador</th>
                <th class='text-center' style='font-size: 15px'>Cambiar a lector</th>
            </tr>
            </tr>
            <?php
            if(isset($resultadosC)) {
                $tam = sizeof($resultadosC);
                for ($i = 1; $i <= $tam; $i++) {
                    $posC = explode("-", $resultadosC[$i]);
                    echo "<tr>";
                    echo "<td class='text-center' style='font-size: 15px'>$posC[1]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>$posC[2]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>";
                    echo"<a href='interno.php?page=borrarUsuario&idUsuario=$posC[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div ><div class='w3-margin-left'><a href='interno.php?page=redirectUsuario&idUsuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div ><div class='w3-margin-left'><a href='interno.php?page=cambiarAAdmin&idUsuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div ><div class='w3-margin-left'><a href='interno.php?page=cambiarALector&idUsuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo"</tr>";
                }
            }

            if(isset($_SESSION["sinDatos"])) {
                echo"<div class='alert warning'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong> No hay datos para mostrar en la tabla
                        </div>";
                unset($_SESSION["sinDatos"]);

            }
            if(isset($_SESSION["eliminadoOK"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                unset($_SESSION["eliminadoOK"]);
            }
            if(isset($_SESSION["userModif"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Clave modificada correctamente</div>";
                unset($_SESSION["userModif"]);
            }
            ?>
        </table>
    </div>
    <br>
    <div class="w3-container">
        <h2>Lista Lector</h2>
        <table class="w3-table-all">
            <tr>
                <th class='text-center' style='font-size: 15px'>Nombre</th>
                <th class='text-center' style='font-size: 15px'>Clave</th>
                <th class='text-center' style='font-size: 15px'>Borrar</th>
                <th class='text-center' style='font-size: 15px'>Cambiar Clave</th>
                <th class='text-center' style='font-size: 15px'>Cambiar a administrador</th>
                <th class='text-center w3-margin-left' style='font-size: 15px'> Cambiar a contenidista</th>
            </tr>
            </tr>
            <?php
            if(isset($resultadosL)) {
                $tam = sizeof($resultadosL);
                for ($i = 1; $i <= $tam; $i++) {
                    $posL = explode("-", $resultadosL[$i]);
                    echo "<tr>";
                    echo "<td class='text-center' style='font-size: 15px'>$posL[1]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>$posL[2]</td>";
                    echo "<td class='text-center' style='font-size: 15px'>";
                    echo"<a href='interno.php?page=borrarUsuario&idUsuario=$posL[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=redirectUsuario&idUsuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=cambiarAAdmin&idUsuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><a href='interno.php?page=cambiarAConte&idUsuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-3x\" aria-hidden=\"true\" href='#'></i></a></div>";
                    echo "</td>";
                    echo"</tr>";
                }
            }

            if(isset($_SESSION["sinDatos"])) {
                echo"<div class='alert warning'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong> No hay datos para mostrar en la tabla
                        </div>";
                unset($_SESSION["sinDatos"]);

            }
            if(isset($_SESSION["eliminadoOK"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                unset($_SESSION["eliminadoOK"]);
            }
            if(isset($_SESSION["userModif"])) {
                echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Clave modificada correctamente</div>";
                unset($_SESSION["userModif"]);
            }
            ?>
        </table>
    </div>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
    exit();
}
?>
