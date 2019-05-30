$(document).ready(function () {

    var vistedBefore = Cookies.get('accept-value');

    if (vistedBefore != 'true'){
        $('.cookies').fadeIn(500);
        
    } else {
        $('.cookies').css('display','none');
    }

    // create cookies when accepted
    $('.accept-cookies').on('click', function () {
        Cookies.set('accept-value', 'true' , { expires: 7, path: '/' });
        $('.cookies').slideUp();
    });

    // nav fixed position
    /*
    $(window).scroll(function (){

        if ($(this).scrollTop() > 0){
            $('.navbar').addClass('navbar-fixed-top');
        } else {
            $('.navbar').removeClass('navbar-fixed-top');
        }

    });
    */
   
 });
 
 
 
 