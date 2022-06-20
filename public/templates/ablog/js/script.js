$(document).ready(function() {
    $(".menu").click(function() {
        $(this).addClass("active");
        $(".menu").not(this).removeClass("active");
    });

});
// $(document).ready(function() {
//     $('ul li a').click(function() {
//         $('li a').removeClass("active");
//         $(this).addClass("active");
//     });
// });
