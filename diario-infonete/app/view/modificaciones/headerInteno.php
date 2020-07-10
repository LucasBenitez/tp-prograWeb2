<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php?page=inicioLectorView">
                <span>
                    <svg class="bi bi-info-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
                </span> InfoNete
        </a>
        <div class="collapse navbar-collapse align-content-center">
            <ul class="navbar-nav ml-auto align-content-center">
                <li class="nav-item active align-content-center">
                    <?php if(isset($_SESSION["usuarioOK"])) { ?>
                        <label class="text-white">Bienvenido <?php echo $pos[1];?></label>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <div class="container align-content-center"/>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=inicioLectorView">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=tienda&idUsuario=<?php echo $pos[0]?>">Tienda</a>
                </li>
                <?php if(isset($_SESSION["usuarioOK"])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="view/logOut.php">Salir</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
