$(document).ready(function () {
   //move label when focus;

   $('input').on('focus', function (){
        $(this).addClass('active');
   }).on('blur',function (){
        if($(this).val() == ""){
            $(this).removeClass('active');
        }
   });;


   


   // go to reset page

   
});



