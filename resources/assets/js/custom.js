$('div.alert-success').delay(10000).slideUp('slow');

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

$(".nav a").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
