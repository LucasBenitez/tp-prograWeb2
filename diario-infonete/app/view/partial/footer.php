<!-- Footer -->
<!--
<footer class="page-footer font-small bg-primary w3-text-white ">


    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="#" style="text-decoration: none;" class="w3-hover-light-blue"> www.desarrolloweb.com </a>
        <a href="interno.php" style="position: absolute;right:0px; text-decoration: none" class="w3-margin-right w3-hover-light-gray "> Modo admin</a>
    </div>



</footer>

-->
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