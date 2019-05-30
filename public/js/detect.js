$(document).ready(function (){

    // calc font size
    function calcFont(){

        if ($(window).innerWidth() > 1366){
            var initwidth = 1366;
            var initFontSize = 62.5;
            var newWidth = $(window).innerWidth();
            var scaleFactor = (newWidth - initwidth) / initwidth;
    
            return (initFontSize + (initFontSize * scaleFactor));
        } else {

            return 62.5;
        }
    }
    $('html').css('font-size',calcFont() + '%');

    // calc font size
    $(window).resize(function () {
        function calcFont(){

            if ($(window).innerWidth() > 1366){
                var initwidth = 1366;
                var initFontSize = 62.5;
                var newWidth = $(window).innerWidth();
                var scaleFactor = (newWidth - initwidth) / initwidth;
        
                return (initFontSize + (initFontSize * scaleFactor));
            } else {

                return 62.5;
            }
    
        }
    
        $('html').css('font-size',calcFont() + '%');
    });

});

$(document).load(function () {

    function calcFont(){

        if ($(window).innerWidth() > 1366){
            var initwidth = 1366;
            var initFontSize = 62.5;
            var newWidth = $(window).innerWidth();
            var scaleFactor = (newWidth - initwidth) / initwidth;
    
            return (initFontSize + (initFontSize * scaleFactor));
        } else {

            return 62.5;
        }

    }
    $('html').css('font-size',calcFont() + '%');
});