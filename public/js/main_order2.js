$(document).ready(function () {
    //for sender
   

    $('.selectpicker').selectpicker();
    //for reciver
    $('.selectpicker2').selectpicker();
    //for billing
    $('.selectpicker3').selectpicker();
    //for other details
    $('.selectpicker4').selectpicker();
    $('.selectpicker5').selectpicker();
    //company select box
    $('.selectpicker8').selectpicker();
    $('.selectpicker9').selectpicker();
    $('.selectpicker10').selectpicker();
    //date and time picker

    /*var date = new Date();
    date.setDate(date.getDate()-1);
    $('#datetimepicker1,#datetimepicker2,#datetimepicker3,#datetimepicker4').datetimepicker({
         sideBySide:false,
         showClose:true,
         showClear:true,
         format:'yyyy-mm-dd    h:i',    
         autoclose: true,
         setStartDate: new Date(),
         startDate: date,
         pickSeconds: false,
    });*/

    //accordion slide data
    $('.data-button').on('click',function() {
        $(this).children('.icon').toggleClass('active');
        $(this).next('.slide_data').slideToggle();
    });


    //multistep automation

    /* make sure all fields not empty
    var ahmed = $('.content').children('.step_item');
    console.log(ahmed.eq(0));*/

    // prev button on first child
   if(($('.step__one').is(':first-child'))) {
       $('.step__one .prev').attr('disabled','true');
   } else {
      $('.step__one .prev').removeAttr('disabled');      
   }

   //function for empty fields
   
   //step one 
   $('.step__one  input,.step__one  textarea').each(function (){
        $(this).on('keyup',function (){

            if($('.step__one').children().not('input[type=hidden]').val() == '' && $('.step__one textarea').val()==''){
                $('.step__one .next').attr('disabled','true');
            }else{
                $('.step__one .next').removeAttr('disabled');
            }

        });
   });

   //step two
   //console.log($('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]'));
   //without other and true company sender and true company reciver
    function validSecondStep(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }

    //without other and false company sender and false company reciver
    function validSecondStepDoubleFalse(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }
    //without other and true company sender and false company reciver
    function validSecondStepSendertrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }

    //without other and false company sender and true company reciver
    function validSecondStepReceivertrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(17).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() ==''  || elements.eq(18).val() =='' || elements.eq(19).val() =='' 
        ){
            return false;
        } else {
            return true;
        }
    }
  


    //with other and true company sender and true company reciver and true other reciever
    function validSecondStepOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(27).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and true for all company
    function validSecondStepOtherAllTrue(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(27).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
        } else {
            return true;
        }
    }

    //with other and true for all company
    function validSecondStepOtherAllTrueNotOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' ||  elements.eq(7).val() =='' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() =='' || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

    //with other and reciever ture and false for sender
    function validSecondStepOtherAllTrueNotSender(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(17).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

    //with other and reciever ture and false for sender
    function validSecondStepOtherAllTrueNotReciever(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||  elements.eq(7).val() =='' || elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

    //with other ture  reciever false and false for sender
    function validSecondStepOtherAllFalseNotOther(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(27).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalseNotReciever(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(17).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalseNotSender(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(7).val() ==''  || elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }

     //with other ture  reciever false and false for sender
     function validSecondStepOtherAllFalse(){
        var elements = $('.step__two input[type="text"],.step__two input[type="email"]').not('input[type=hidden]');
        /*if there other billing*/
       
        /*if there other billing*/
        if (
            elements.eq(0).val() =='' || elements.eq(1).val() =='' || elements.eq(2).val() ==''
            || elements.eq(3).val() == '' || elements.eq(4).val() == ''  || elements.eq(5).val() == ''  || elements.eq(6).val() == '' || elements.eq(8).val() =='' || elements.eq(9).val() ==''
            || elements.eq(10).val() == '' || elements.eq(11).val() == ''  || elements.eq(12).val() == ''  || elements.eq(13).val() == '' ||  elements.eq(14).val() =='' || elements.eq(15).val() ==''||  elements.eq(16).val() =='' ||   elements.eq(18).val() =='' || elements.eq(19).val() =='' || elements.eq(20).val() =='' || elements.eq(21).val() =='' || elements.eq(22).val() =='' || elements.eq(23).val() =='' || elements.eq(24).val() =='' || elements.eq(25).val() =='' || elements.eq(26).val() ==''|| elements.eq(28).val() =='' || elements.eq(29).val() ==''
        ){
            return false;
            console.log("function work");
        } else {
            return true;
            console.log("function work");
        }
    }



    //change data attribute when choose other
    $(".selectpicker3").on('change',function(){
            var pickerValue = $(this[this.selectedIndex]).val();
            if (pickerValue == "{{trans('frontend/order.other')}}"){
                $(this).attr('data-other','true');
                $('.step__two .next').attr('disabled','true');            
            } else {
                $(this).attr('data-other','false');                
            }
    });
    //change data attribute of sender company 
    $(".selectpicker8").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();

        if (pickerValue == "{{trans('frontend/order.personal')}}"){

            $(this).attr('data-company-sender','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-sender','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });
    //change data attribute of reciever company 
    $(".selectpicker9").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();

        if (pickerValue == "{{trans('frontend/order.personal')}}"){

            $(this).attr('data-company-reciever','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company2').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-reciever','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });

     //change data attribute of other company 
     $(".selectpicker10").on('change',function(){
        var pickerValue = $(this[this.selectedIndex]).val();
        if (pickerValue == "{{trans('frontend/order.personal')}}"){
            $(this).attr('data-company-other','false');
            $(this).parents('.input__group').next().slideUp();

        } else if (pickerValue == "{{trans('frontend/order.company')}}") {

            if($('#company3').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $(this).parents('.input__group').next().slideDown();
            } else {
                $(this).attr('data-company-other','true');
                $(this).parents('.input__group').next().slideDown();
            }
        }
    });
    //
    var picker = $(".selectpicker3");
    var senderCompany = $(".selectpicker8");
    var recieverCompany = $(".selectpicker9");
    var otherCompany = $(".selectpicker10");

    var pickerValue1 = $('.selectpicker8 option:selected').val();
    var pickerValue2 = $('.selectpicker9 option:selected').val();
    var pickerValue3 = $('.selectpicker10 option:selected').val();


    if (pickerValue1 == "{{trans('frontend/order.personal')}}"){

            $('.selectpicker8').attr('data-company-sender','false');
            $('.selectpicker8').parents('.input__group').next().slideUp();

        } else if (pickerValue1 == "{{trans('frontend/order.company')}}") {

            if($('#company').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker8').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker8').attr('data-company-sender','true');
                $('.selectpicker8').parents('.input__group').next().slideDown();
            }
        }

     if (pickerValue2 == "{{trans('frontend/order.personal')}}"){

            $('.selectpicker9').attr('data-company-reciever','false');
            $('.selectpicker9').parents('.input__group').next().slideUp();

        } else if (pickerValue2 == "{{trans('frontend/order.company')}}") {

            if($('#company2').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker9').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker9').attr('data-company-reciever','true');
                $('.selectpicker9').parents('.input__group').next().slideDown();
            }
        }   
     if (pickerValue3 == "{{trans('frontend/order.personal')}}"){
            $('.selectpicker10').attr('data-company-other','false');
            $('.selectpicker10').parents('.input__group').next().slideUp();

        } else if (pickerValue3 == "{{trans('frontend/order.company')}}") {

            if($('#company3').val() == ''){
                $('.step__two .next').attr('disabled','true');
                $('.selectpicker10').parents('.input__group').next().slideDown();
            } else {
                $('.selectpicker10').attr('data-company-other','true');
                $('.selectpicker10').parents('.input__group').next().slideDown();
            }
        }    

    //when fill any input make a vaildation 
    $('.step__two input[type="text"] ,.step__two input[type="email"]').on('keyup blur',function () {

        
        if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'true'){
            
            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        //no other and sender and reciver company is false
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepDoubleFalse()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        

        //no other and sender  true and reciver company is false
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepSendertrue()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        //no other and sender  false and reciver company is true
        } else if (picker.attr('data-other') == 'false' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepReceivertrue()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        //with other false and all companies true
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        //with other true and reciever true and false sender
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotSender()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
         //with other true and reciever false and true sender
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllTrueNotReciever()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        // other true ( and sender , reciever false )
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'true'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotOther()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        // for sender and other are false > reciever is true
        }  else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'true' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotReciever()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     

        // sender true and all false       
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'true' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalseNotSender()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        
        } else if (picker.attr('data-other') == 'true' && senderCompany.attr('data-company-sender') == 'false' && recieverCompany.attr('data-company-reciever') == 'false' && otherCompany.attr('data-company-other') == 'false'){

            $('.step__two .next').attr('disabled','true');
            
            if (validSecondStepOtherAllFalse()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }     
        
        }             
   

        else {


            if (validSecondStep()){
                $('.step__two .next').removeAttr('disabled');
            } else {
                $('.step__two .next').attr('disabled','true');
            }    
        }

    });


    //step three

   $('.step__three  input[type="text"]').each(function (){

        var telements = $('.step__three  input[type="text"]').not('input[type="hidden"]');

        $(this).on('blur',function (){

            if(telements.eq(0).val() == "" || telements.eq(1).val() == "" ||
            telements.eq(2).val() == "" || telements.eq(3).val() == "" 
                                                                         ){
                $('.step__three .next').attr('disabled','true');
            }else{
                $('.step__three .next').removeAttr('disabled');
            }

        });
        
    });




    $(document).on('change','select',function(){
        $('.step__four .next').removeAttr('disabled');     
        next();    
    });

    $('.prev').on('click', function (){

            $('.step_item.active').fadeOut(500, function (){
                
                $('#'+$(this).attr('data-list')).removeClass('active').prev().removeClass('compelete').addClass('active');
                $(this).removeClass('active').prev('.step_item').addClass('active').fadeIn(500);
    
            });


    });

    //sliding in content with select picker
    //sliding in content with select picker
    $(".selectpicker3").change(function(){
        var pickerValue = $(this[this.selectedIndex]).val();
        if (pickerValue == "{{trans('frontend/order.other')}}"){
            $('.other-details').slideDown();
            
        } else {

            console.log("hi");

            $('.other-details').slideUp(function (){

                if (validSecondStep()){
                    $('.step__two .next').removeAttr('disabled');
                } else if (validSecondStepDoubleFalse()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepSendertrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepReceivertrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrue()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotSender()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllTrueNotReciever()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotOther()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotReciever()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalseNotSender()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } else if (validSecondStepOtherAllFalse()){
                    $('.step__two .next').removeAttr('disabled');
                    
                } 
                
                else {
                    $('.step__two .next').attr('disabled','true');
                }


            });
           
                       
        }
    });


    



});



