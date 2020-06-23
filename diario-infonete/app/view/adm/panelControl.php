<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
    <div class="w3-container w3-center">
        <h1 class="">Panel de control Administrador</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>

        <div class="w3-container w3-margin-top">
            <a href="interno.php?page=registrar" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Alta Usuario</a>
            <a href="interno.php?page=admRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Administrar Revista</a>
            <a href="interno.php?page=bajaUsuario" class="w3-button bg-primary w3-hover-black "style="text-decoration: none">Listar usuarios</a>


        </div>
    </div>
    <br>
    <div class="w3-container">
        <h2>Lista Autorizar Noticias</h2>
        <table class="w3-table w3-bordered">
            <tr>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Borrar</th>
                <th>Cambiar Clave</th>
            </tr>
            <?php
            if(isset($_SESSION["usuarios"])) {
                $usuarios = $_SESSION["usuarios"];
                $tam = sizeof($usuarios);
                for ($i = 1; $i <= $tam; $i++) {
                    $pos = explode("-", $usuarios[$i]);
                    echo "<tr>";
                    echo "<td>$pos[1]</td>";
                    echo "<td>$pos[2]</td>";
                    echo "<td>";
                    echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='borrarUsuario.php?idUsuario=$pos[0]'/>";
                    echo "</td>";
                    echo "<td>";
                    echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' href='cambiarClave.php?idUsuario=$pos[0]'/>";
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
