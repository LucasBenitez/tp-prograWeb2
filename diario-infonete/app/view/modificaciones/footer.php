<footer class="py-4 bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="text-right text-white">InfoNete S.A.</p>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <ul class="list-unstyled text-left">
                        <li><a href="tienda.html" class="text-white">Tienda</a></li>
                        <li><a href="#" class="text-white">Archivo</a></li>
                        <li><a href="#" class="text-white">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </div>   <!-- row -->
    </div>   <!-- container -->
</footer>

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