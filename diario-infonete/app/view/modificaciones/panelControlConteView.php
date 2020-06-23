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

        <div class="w3-container w3-margin-top w3-margin-bottom">
            <a href="interno.php?page=crearRevista" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Alta noticia</a>
            <a href="interno.php?page=crearRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Administrar Noticias</a>
            <a href="interno.php?page=crearRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Crear Noticia</a>

        </div>
    </div>
    <?php
    if(isset($_SESSION["crearRevista"])){
        ?>
        <div class="w3-display-middle w3-margin-top w3-card-4" id="ocultar" style="margin-top: 10%">

            <div class="w3-container bg-primary ">
                <h2 class="w3-center">Crear Revista</h2>
            </div>
            <br>
            <form class="w3-container" name="registrar" action=".php?page=guardarUsuario" method="post" enctype="application/x-www-form-urlencoded">
                <label>Titulo</label>
                <input class="w3-input" type="text" name="titulo"><br/>
                <label>Nro. Revista</label>
                <input class="w3-input " type="text" name="nroRevista"><br/>
                <label>Descripcion</label>
                <textarea class="w3-input " type="text" name="descripcion" rows="4" cols="50">
                        </textarea>
                <br/>
                <div class="w3-center w3-margin-bottom">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="CREAR" >

                    <a class="w3-button w3-blue-grey w3-round w3-center" onclick="cerrarForm()">SALIR</a>
                </div>
            </form>

        </div>
        <?php
    }
    ?>
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
        function cerrarForm() {
            document.getElementById("ocultar").style.display = 'none';

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
