</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="templates/admin/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="templates/admin/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="templates/admin/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="templates/admin/assets/js/custom.js"></script>
{{-- <script src="templates/admin/assets/js/script.js"></script> --}}
<script type="text/javascript">
$(document).ready(function() {
    $(".menu").click(function() {
        $(this).addClass("active-menu");
        $(".menu").not(this).removeClass("active-menu");
    });

});
</script>
</body>

</html>
