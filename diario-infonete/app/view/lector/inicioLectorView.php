
<?php
if (isset($_SESSION["usuarioOK"])) {
$usuario = $_SESSION["usuarioOK"];
$pos = explode("-", $usuario);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">InfoNete
                <small>Diario Online</small>
            </h1>
        </div>    	<!-- row 1 -->
    </div> <!-- fin row 1 -->
    <hr>







    <div class="col-md-3">

        <div class="card my-4"> <!-- clima -->
            <h5 class="card-header">Clima
                <span><svg class="bi bi-brightness-high-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="4"/>
            		<path fill-rule="evenodd" d="M8 0a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 0zm0 13a.5.5 0 01.5.5v2a.5.5 0 01-1 0v-2A.5.5 0 018 13zm8-5a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2a.5.5 0 01.5.5zM3 8a.5.5 0 01-.5.5h-2a.5.5 0 010-1h2A.5.5 0 013 8zm10.657-5.657a.5.5 0 010 .707l-1.414 1.415a.5.5 0 11-.707-.708l1.414-1.414a.5.5 0 01.707 0zm-9.193 9.193a.5.5 0 010 .707L3.05 13.657a.5.5 0 01-.707-.707l1.414-1.414a.5.5 0 01.707 0zm9.193 2.121a.5.5 0 01-.707 0l-1.414-1.414a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .707zM4.464 4.465a.5.5 0 01-.707 0L2.343 3.05a.5.5 0 01.707-.707l1.414 1.414a.5.5 0 010 .708z" clip-rule="evenodd"/></svg></span></h5>
            <div class="card-body">
                Bs As : Soleado 21º C<br>
                <a href="#">Ir a Pronóstico Completo</a>
            </div>
        </div> <!-- fin clima -->

        <div class="card my-4"> <!-- otros -->
            <h5 class="card-header">Otras Publicaciones <span><svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          			<path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 018.5 2.5v11a.5.5 0 01-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 010 13.5v-11a.5.5 0 01.276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 01.22-.103 12.958 12.958 0 012.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 001 2.82z" clip-rule="evenodd"/>
          			<path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 007.5 2.5v11a.5.5 0 00.854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0016 13.5v-11a.5.5 0 00-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 00-.799-.34 12.96 12.96 0 00-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0115 2.82z" clip-rule="evenodd"/></svg></span></h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#">Diario 1</a>
                            </li>
                            <li>
                                <a href="#">Diario 2</a>
                            </li>
                            <li>
                                <a href="#">Diario 3</a>
                            </li>
                            <li>
                                <a href="#">Revista 1</a>
                            </li>
                            <li>
                                <a href="#">Revista 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- fin otros -->
    </div> <!-- row 3 -->
</div> <!-- fin row 2 -->
</div> <!-- container -->



</div>

    <div class="row w3-center" style="margin-left: 35%">
    <div class="col  col-md-6">
        <div class="w3-container">
            <h2>Lista de Revistas</h2>
            <table class="w3-table w3-bordered">
                <tr class="w3-center">


                    <th>Titulo</th>
                    <th>Numero</th>
                    <th>Descripcion</th>
                    <th>Suscribirse</th>


                </tr>
        </div>

        <?php

        if (isset($resultadosRevista)) {

            $tam = sizeof($resultadosRevista);
            for ($i = 1; $i <= $tam; $i++) {
                $posi = explode("-", $resultadosRevista[$i]);
                echo "<div>";
                echo "<td>$posi[1]</td>";
                echo "<td>$posi[2]</td>";
                echo "<td>$posi[3]</td>";
                echo "<td><a href='index.php?page=suscribirse&idRevista=$posi[0]&idUsuario=$pos[0]'>Suscrbirse</a> </td>";
                echo "</tr>";

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
        </table>
    </div>

<?php
}

