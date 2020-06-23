
<html>
    <head>
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="w3-card-4 w3-display-middle">
            <div class="w3-container w3-blue-grey w3-round">
                <h2 class="w3-center">Iniciar sesión</h2>
            </div>
            <br>
            <form class="w3-container" name="login" action="interno.php?page=login" method="post" enctype="application/x-www-form-urlencoded">
                <label>Usuario </label><input class="w3-input w3-round" type="text" name="usuario" placeholder=" Ingrese User"><br/>
                <label>Clave </label><input class="w3-input w3-round" type="password" name="clave" placeholder=" Ingrese Password"><br/>
                <div class="w3-center w3-margin-bottom"><input class="w3-button w3-blue-grey w3-round" type="submit" name="boton" value="ENVIAR"></div>

            </form>
            <div class="w3-center">
                <?php
                if(isset($_SESSION["userAddOK"])) {
                    echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Usuario dado de alta exitosamente</div>";
                    unset($_SESSION["userAddOK"]);
                }
                if(isset($_SESSION["loginError"])) {
                    echo"<div class='alert error'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Error!</strong>Usuario/Password invalido</div>";
                    unset($_SESSION["loginError"]);
                }
                if(isset($_SESSION["userModif"])) {
                    echo"<div class='alert success'>
                          <span class='closebtn'>&times;</span>  
                          <strong>Success!</strong>Clave modificada correctamente</div>";
                    unset($_SESSION["userModif"]);
                }
                session_destroy();
                ?>
            </div>
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