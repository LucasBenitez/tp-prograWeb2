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

            <a href="interno.php?page=admRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Administrar Revista</a>



        </div>
    </div>
    <br>
    <div class="w3-container">
        <h2>Lista Administradores</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th class='text-center'>Nombre</th>
                <th class='text-center'>Clave</th>
                <th class='text-center'>Borrar</th>
                <th class='text-center'>Cambiar Clave</th>
                <th class='text-center'>Cambiar a contenidista</th>
                <th class='text-center'>Cambiar a lector</th>


            <?php
            if(isset($resultadosA)) {
                $tam = sizeof($resultadosA);
                for ($i = 1; $i <= $tam; $i++) {
                    $posA = explode("-", $resultadosA[$i]);
                    echo "<tr>";
                    echo "<td class='text-center'>$posA[1]</td>";
                    echo "<td class='text-center'>$posA[2]</td>";
                    echo "<td class='text-center'>";
                    echo"<div class='w3-margin-left '><a href='interno.php?page=borrarUsuario&idUsuario=$posA[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarClave&Id_usuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarAConte&Id_usuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarALector&Id_usuario=$posA[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
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
        <table class="w3-table w3-bordered">
            <tr>
                <th class='text-center'>Nombre</th>
                <th class='text-center'>Clave</th>
                <th class='text-center'>Borrar</th>
                <th class='text-center'>Cambiar Clave</th>
                <th class='text-center'>Cambiar a contenidista</th>
                <th class='text-center'>Cambiar a lector</th>
            </tr>
            </tr>
            <?php
            if(isset($resultadosC)) {
                $tam = sizeof($resultadosC);
                for ($i = 1; $i <= $tam; $i++) {
                    $posC = explode("-", $resultadosC[$i]);
                    echo "<tr>";
                    echo "<td class='text-center'>$posC[1]</td>";
                    echo "<td class='text-center'>$posC[2]</td>";
                    echo "<td class='text-center'>";
                    echo"<div class='w3-margin-left '><a href='interno.php?page=borrarUsuario&idUsuario=$posC[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarClave&Id_usuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarAConte&Id_usuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarALector&Id_usuario=$posC[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
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
        <table class="w3-table w3-bordered">
            <tr>
                <th class='text-center'>Nombre</th>
                <th class='text-center'>Clave</th>
                <th class='text-center'>Borrar</th>
                <th class='text-center'>Cambiar Clave</th>
                <th class='text-center'>Cambiar a administrador</th>
                <th class='text-center w3-margin-left'> Cambiar a contenidista</th>
            </tr>
            </tr>
            <?php
            if(isset($resultadosL)) {
                $tam = sizeof($resultadosL);
                for ($i = 1; $i <= $tam; $i++) {
                    $posL = explode("-", $resultadosL[$i]);
                    echo "<tr>";
                    echo "<td class='text-center'>$posL[1]</td>";
                    echo "<td class='text-center'>$posL[2]</td>";
                    echo "<td class='text-center'>";
                    echo"<div class='w3-margin-left '><a href='interno.php?page=borrarUsuario&idUsuario=$posL[0]'style='color: black'><i class=\"fa fa-trash fa-2x\" aria-hidden=\"true\"></i></a></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarClave&Id_usuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarAAdmin&idUsuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
                    echo "</td>";
                    echo "<td class='text-center'>";
                    echo "<div class='w3-margin-left'><div class='w3-margin-left'><a href='interno.php?page=cambiarAConte&idUsuario=$posL[0]' style='color: black'>
                              <i class=\"fa fa-pencil-square-o fa-2x\" aria-hidden=\"true\" href='#'></i></a></div></div>";
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
