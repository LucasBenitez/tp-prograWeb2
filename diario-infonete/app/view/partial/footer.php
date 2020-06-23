<div class="w3-margin-top">
    <footer class=" w3-grey w3-center" style="width: 100% ; position:fixed ;bottom:0;">
        <div class="w3-bar w3-primary">
            <a href="index.html" class="w3-bar-item w3-button text-white"style="text-decoration: none ;">Inicio</a>
            <a href="#" class="w3-bar-item w3-button text-white" style="text-decoration: none">Tienda</a>
            <a href="#" class="w3-bar-item w3-button text-white" style="text-decoration: none">Archivo</a>
            <a href="#" class="w3-bar-item w3-button text-white"style="text-decoration: none">Contacto</a>
        </div>
        <div class="w3-display-right w3-margin-right">
            <a href="interno.php" class="w3-bar-item w3-button text-white"style="text-decoration: none">Modo admin</a>
        </div>
    </footer>
</div>

<script src="view/js/jquery-3.5.1.min.js"></script>
<script src="view/js/bootstrap.min.js"></script>
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