
<div class="col-md-12 ">
    <h1 class="text-center  mt-5 mb-5">InfoNete
        <small>Diario Online</small>
    </h1>
</div>

<div class="container text-center">
<div class="row">
    <div class="col-md-auto">
            <?php if (!isset($_SESSION["usuarioOK"])) { ?>
                <div class="card"> <!-- ingresar -->
                    <h5 class="card-header">Ingreso <span><svg class="bi bi-person-fill" width="1em" height="1em"
                                                               viewBox="0 0 16 16" fill="currentColor"
                                                               xmlns="http://www.w3.org/2000/svg">
          			<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z"
                          clip-rule="evenodd"/></svg></span></h5>
                    <div class="card-body">
                        <form name="login" action="index.php?page=login" method="post">
                            <div class="form-group">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="clave" name="clave">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        </form>
                    </div>
                    <div>
                        <a class="w3-button" href="index.php?page=registrar">Alta usuario</a>
                    </div>


                <?php
            }
            ?>

            <!-- fin ingresar -->
            <?php if (isset($_SESSION["loginError"])) {

                echo "<div class='alert error'>
                        <span class='closebtn'>&times;</span>
                        <strong>Error!</strong>Usuario/Password invalido</div>";
                unset($_SESSION["loginError"]);
            }
            ?>
    </div>
        </div>
    <div class="col ">


            <?php
            if (isset($resultadosRevistas)) {
                $tam = sizeof($resultadosRevistas);
                for ($i = 1; $i <= $tam; $i++) {
                    $posi = explode("-", $resultadosRevistas[$i]);
                    echo "<div class=\"w3-card-4 mb-5\">";
                    echo "<header class=\"w3-container bg-primary text-white mb-3  \">
                        <h1>'$posi[1]'</h1>
                        </header>";
                    echo "<img src='./images/revista/$posi[4]' alt=\"Alps\" class=\"mh-100\">";
                    echo "<div class=\"w3-container w3-margin-top\">
                        <p>'$posi[3]'</p>
                        </div>";

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
</div>
</div>






