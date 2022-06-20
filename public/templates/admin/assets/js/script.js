$(document).ready(function() {
    $(".menu").click(function() {
        $(this).addClass("active-menu");
        $(".menu").not(this).removeClass("active-menu");
    });

});
