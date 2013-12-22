
$(document).ready(function() {


    $('#coin-slider').coinslider({
        width: 755, 
        height: 320,
        navigation: true, 
        delay: 2000
    });
    
    $( "#accordion" ).accordion();

    $( "#btn-next-news" ).click(function() {

        $( "#moving-block-news" ).animate({
            top: "-=270",
        }, 1000, function() {

        });
    });
});
