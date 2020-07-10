<!-- Footer -->


    <footer class="w3-container w3-dark-grey page-footer font-small bg-primary w3-text-white container-fluid" style="padding:10px;margin-top: 70px;position: fixed ; bottom: 0px;">
        <a href="#" class="w3-button w3-black w3-padding-large "><i class="fa fa-arrow-up w3-margin-right"></i>Subir</a>
        <a href="interno.php" style="position: absolute;right:0px; text-decoration: none" class="w3-margin-right w3-button w3-black w3-padding-large  "> Modo admin</a>

    </footer>



<!-- Footer -->
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