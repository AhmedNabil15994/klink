$(document).ready(function (){

    /*show sub menu*/

    $('.list-item__link').on('click' ,function(e){

        e.preventDefault();

       if($(this).hasClass('active')){
            $(this).removeClass('active').parents('.list-item').find('.sub-list').removeClass('active').fadeOut();
       } else {
            $(this).addClass('active').parents('.list-item').siblings().find('.list-item__link').removeClass('active');
            $(this).parent('.list-item').find('.sub-list').fadeIn().addClass('active');
            $(this).parent('.list-item').siblings().find('.sub-list').fadeOut().removeClass('active');
       }
      
    });

     // close Drop down when click
	$(document).on('click', function (e) {
        var clickOver = $(e.target);
		if (!clickOver.closest('.mob-menu').length && $('.sub-list').hasClass('active')) {
            $('.sub-list').removeClass('active').fadeOut();
            $('.list-item__link').removeClass('active');
		}
    });

    //show location search form

    $('.filter-address').on('click', function (){
        $('.filter-input').fadeIn();
    });

    // hide location search form

    $('.choose-location').on('click', function (e){
        e.stopPropagation();
        e.preventDefault();
        $('.filter-input').fadeOut();
    });

    
    // check on tabs 

    $('.select-tabs li').on('click', function (){


        $(this).addClass('active').siblings().removeClass('active');
        $('#' + $(this).data('tab')).addClass('active').siblings().removeClass('active');


    });

    $('.time-filter').on('click', function (){
        $('#searchTimeModal').fadeIn(200);
        $('.select-time').addClass('active');
    });



    // close Drop down when click
	$('.pop-up').on('click', function (e) {
        var clickOver = $(e.target);
		if (!clickOver.closest('.select-time').length) {
            $('.select-time').removeClass('active');
            $('#searchTimeModal').fadeOut();
		}
    });



    $('.car-list').on('click', function (){
        $('#listCarModal').fadeIn(200);
    });

    $('.back-to-search').on('click', function (){
        $('#listCarModal').fadeOut(500);        
    });


    $('.make-offer').on('click', function (e){
        e.stopPropagation();
        $('#searchTimeModal').fadeIn(200);
        $('.select-time').addClass('active');
    });


    $('.available-text').on('click', function (e){
        e.stopPropagation();
        $('#OrderCarModal').fadeIn(200);
        $('.car-card-item').addClass('active');
    });



    // close Drop down when click
	$('.pop-up.orderModal').on('click', function (e) {
        var clickOver = $(e.target);
		if (!clickOver.closest('.car-card-item').length) {
            $('.car-card-item').removeClass('active');
            $('#OrderCarModal').fadeOut();
		}
    });



    // when checked 

    $('.filter-status input[type="checkbox"]').on('change', function (){
        if($(this).is(':checked')){
            $('#loginModal').fadeIn();
            $('#loginModal .login-container').addClass('active');
        } else {
            $('#loginModal').fadeOut();
            $('#loginModal .login-container').removeClass('active');

        }


    });

    // add class when blur

    $('.custom-group.email input').on('blur', function(){


        if($(this).val() != ""){
            $(this).parent().addClass('filled');
            $('.custom-group.password').slideDown();

        } else {
            $(this).parent().removeClass('filled');
            $('.custom-group.password').slideUp();

        }


    });

    //active state 

    $('.custom-group input').on({
        focus:function (){
            $(this).parent().addClass('active-input');
           $(this).parent().addClass('filled-focus');

        },
        blur:function (){
           $(this).parent().removeClass('active-input');
           $(this).parent().removeClass('filled-focus');

        }
    });


    $('.custom-group .edit').on('click', function () {
        $('.custom-group.email input').focus();
        $('.custom-group.email').addClass('filled-focus');
    });


    // hide signin form

    $('.back-area.login').on('click', function (){
        $('#loginModal').fadeOut(300);
        $('#loginModal .login-container').removeClass('active');

        $('.filter-status input[type="checkbox"]').prop('checked',false);

    });

    // hide signin form

    $('.back-area.reset').on('click', function (){
        $('#resetModal').fadeOut(300);
        $('#resetModal .login-container').removeClass('active');


    });

    // reset poup

    $('.forget a').on('click', function (e){

        e.preventDefault();
        $('#resetModal').fadeIn(200);
        $('#resetModal .login-container').addClass('active');

    });


    $('.haveAccount a').on('click', function (e){
        
        e.preventDefault();
        $('#registerModal').fadeIn(200);
        $('#registerModal .login-container').addClass('active');

    });


    // hide signin form

    $('.back-area.register').on('click', function (){
        $('#registerModal').fadeOut(300);
        $('#registerModal .login-container').removeClass('active');


    });


    // selectbox

    $('.selectpicker').selectpicker();




    $('.order-location .more-button').on('click', function (e){
        e.preventDefault();
        $(this).parents('.new-order-card').children('.new-order-card .card-sec-content').addClass('active');
    });

    $('.selectpicker').selectpicker();


    $('#selectpicker8900').on('change', function (){
        $('.slide-driver').slideDown();
    });

    $('.card-sec-content .back-button').on('click', function (e){
        e.preventDefault();
        $(this).parents('.new-order-card').children('.new-order-card .card-sec-content').removeClass('active');
    });


    // edit button popup and image upload

    $('.edit-button').on('click', function (){

        $('#imgEditModal').modal({
            show:true
        });

    });

    // profile page img edit model
    $('.profile-img .img-overlay').on('click', function () {
        $('#imgEditModal').modal({
            show:true
        });
    });

     //custom upload field
    $('#imgEditModal .choose-button').on('click', function (){
        $('#imgEditModal #img-upload').click();
    });

    // global for all custom uploads
    $('#imgEditModal #img-upload').on('change', function (){

        if($('#imgEditModal #img-upload').val() != ""){
            $('#imgEditModal .file-info').html($(this).val());
        } else {
            $('#imgEditModal .file-info').html('no file chosen yet!');
        }
    });





    // profile page popups

    $('.setting-list .setting-list-link').on('click', function (e) {
        e.preventDefault();
        $('#'+ $(this).data('popup')).fadeIn(200);
        $('#'+ $(this).data('popup')).children('.pop-up__container').addClass('active');


    });

    $('.back-to-search').on('click', function (){

        $('.pop-up__container').removeClass('active');
        $(this).parents('.pop-up').fadeOut(500);

    });




    // edit button popup and image upload

    $('.upload-document').on('click', function (){

        $('#uploadDocument').modal({
            show:true
        });

    });


     //custom upload field
    $('#uploadDocument .choose-button').on('click', function (){
        $('#uploadDocument #img-upload').click();
    });

    // global for all custom uploads
    $('#uploadDocument #img-upload').on('change', function (){

        if($('#uploadDocument #img-upload').val() != ""){
            $('#uploadDocument .file-info').html($(this).val());
        } else {
            $('#uploadDocument .file-info').html('no file chosen yet!');
        }
    });


    $('.employment .pages-step__list').on('click', function () {

        $(this).addClass('active').siblings().removeClass('active');
        $('#' + $(this).data('page')).addClass('active').siblings().removeClass('active');


    });


    /* x-editable */

    $('#empfullName').editable({
        mode: 'inline'
    });
    window.employment_first_name = '';
    window.employment_last_name = '';
    $('#first_name_em').editable({
        mode: 'inline',
        success:function(response,newval){
            console.log(response,newval)
            window.employment_first_name = newval
        }
    });
    $('#last_name_em').editable({
        mode: 'inline',
        success:function(response,newval){
            console.log(response,newval)
            window.employment_last_name = newval
        }
    });

    $('#selectpicker610').selectpicker();
    $('#selectpicker611').selectpicker();
    $('#selectpicker612').selectpicker();
    $('#selectpicker614').selectpicker();



    window.employment_birthDate = '';
    $('#empbirthdate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        },
        success:function(response,newval){
            window.employment_birthDate =newval;
        }
        
      
    });

    $('#empaddress').editable({
        mode: 'inline'
      
    });

    $('#empaddressTown').editable({
        mode: 'inline'
      
    });

    $('#empaddressCountry').editable({
        mode: 'inline'
      
    });

    $('#insurance').editable({
        mode: 'inline'
      
    });

    $('#empbirthplace').editable({
        mode: 'inline'
      
    });

    $('#empnationality').editable({
        mode: 'inline'
      
    });

    $('#empjob').editable({
        mode: 'inline'
      
    });

    $('#entrydate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    $('#fentrydate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    $('#startdate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });
    $('#enddate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });





    /*24-9-2018*/

    window.employment_email = '';
    $('#empmobile').editable({
        mode: 'inline',
        success:function(response,newval){
            window.employment_email = newval;
        }
      
    });
    window.employment_mobile = '';
    $('#empemail').editable({
        mode: 'inline',
        success:function(response,newval){
            window.employment_mobile = newval;
        }
      
    });

    $('#empins').editable({
        mode: 'inline'
      
    });

    $('#land').editable({
        mode: 'inline'
      
    });

    $('#comempcity').editable({
        mode: 'inline'
      
    });
    $('#ComCountry').editable({
        mode: 'inline'
      
    });

    $('#comJobTitle').editable({
        mode: 'inline'
      
    });

    $('#comEntryDate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    


    $('#fcomEntryDate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    $('#comstartT').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    


    $('#comendT').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    $('#ident').editable({
        mode: 'inline'
      
    });

    $('#officeno').editable({
        mode: 'inline'
      
    });
    $('#taxbrack').editable({
        mode: 'inline'
      
    });
    $('#taxchild').editable({
        mode: 'inline'
      
    });
    $('#denomin').editable({
        mode: 'inline'
      
    });

    $('#lawins').editable({
        mode: 'inline'
      
    });

    $('#KV').editable({
        mode: 'inline'
      
    });

    $('#RV').editable({
        mode: 'inline'
      
    });
    
    $('#AV').editable({
        mode: 'inline'
      
    });

    $('#PV').editable({
        mode: 'inline'
      
    });

    $('#UV').editable({
        mode: 'inline'
      
    });


    /*29-9-2018*/

    $('#bankN').editable({
        mode: 'inline'
      
    });

    $('#bankA').editable({
        mode: 'inline'
      
    });

    $('#IBANN').editable({
        mode: 'inline'
      
    });


    $.fn.editableform.buttons = '<button type="submit" class="btn btn-primary editable-submit btn-mini"><i class="icon-ok icon-white"></i></button>' +
    '<button type="button" class="btn editable-cancel btn-mini"><i class="icon-remove"></i></button>';


    /*profile setting*/
    $('#full-name').editable({
        mode: 'inline'
      
    });
    $('#street').editable({
        mode: 'inline'
      
    });

    $('#street-no').editable({
        mode: 'inline'
      
    });

    $('#street-post').editable({
        mode: 'inline'
      
    });
    $('#street-city').editable({
        mode: 'inline'
      
    });
    $('#street-region').editable({
        mode: 'inline'
      
    });

    $('#street-country').editable({
        mode: 'inline'
      
    });

    /*account-setting*/

    $('#acc-email').editable({
        mode: 'inline'
      
    });

    /*contact  */

    $('#phone-contact').editable({
        mode: 'inline'
      
    });

    $('#home-contact').editable({
        mode: 'inline'
      
    });

    $('#face-contact').editable({
        mode: 'inline'
      
    });

    $('#twit-contact').editable({
        mode: 'inline'
      
    });

    $('#linked-contact').editable({
        mode: 'inline'
      
    });

    /*employment*/
    
    $('#emp-account-owner').editable({
        mode: 'inline'
      
    });
    $('#emp-account-iban').editable({
        mode: 'inline'
      
    });
    $('#emp-account-name').editable({
        mode: 'inline'
      
    });

    $('#emp-account-company').editable({
        mode: 'inline'
      
    });

    $('#birth-date-o').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
        
      
    });

    $('#street2').editable({
        mode: 'inline'
      
    });

    $('#street-no2').editable({
        mode: 'inline'
      
    });

    $('#street-post2').editable({
        mode: 'inline'
      
    });
    $('#street-city2').editable({
        mode: 'inline'
      
    });
    $('#street-region2').editable({
        mode: 'inline'
      
    });

    $('#street-country2').editable({
        mode: 'inline'
      
    });

    $('#birth-date').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
        
      
    });





    /*23-10-2018*/
    



    

    




    /*vehcile page*/

    $('#fristDate').editable({
        mode: 'inline',
        format	:'yyyy . mm . dd',
        viewformat: 'dd . mm . yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    $('#carLoad').editable({
        mode: 'inline'
      
    });

    $('#driverName').editable({
        mode: 'inline'
      
    });

    $('#driverPhone').editable({
        mode: 'inline'
      
    });


    $('.change-driver').on('click', function (w){
        w.preventDefault();
        $(this).parents('.vehcile-card').find('.change-driver-content').addClass('active');
    });

    $('.car-location').on('click', function (w){
        w.preventDefault();
        $(this).parents('.vehcile-card').find('.car-location-content').addClass('active');
    });

    $('.custom-block').on('click', function (){
        $(this).parents('.parent').removeClass('active');
    });

    $('#car').editable({
        mode: 'inline'
      
    });

    $('#car-no').editable({
        mode: 'inline'
      
    });

    $('#car-post').editable({
        mode: 'inline'
      
    });
    $('#car-city').editable({
        mode: 'inline'
      
    });
    $('#car-region').editable({
        mode: 'inline'
      
    });

    $('#car-country').editable({
        mode: 'inline'
      
    });


    /*driver page*/

    $('.delete-user').on('click', function (){

        $('#deleteDriver').modal({
            show:true
        });

    });

    $('.add-driver').on('click', function (){

        $('#addDriverModal').modal({
            show:true
        });

    });


    $('.driver-control input[type="checkbox"]').on('change', function (){
        if($(this).parents('.driver-card').hasClass('has-account')){
            $(this).attr('checked','false');
            $(this).parents('.driver-card').removeClass('has-account');
        } else {
            $(this).attr('checked','true');
            $(this).parents('.driver-card').addClass('has-account');
        }
    });


    $('#driver-name-card').editable({
        mode: 'inline'
      
    });

    $('#driver-email-card').editable({
        mode: 'inline'
      
    });

    $('#driver-phone-card').editable({
        mode: 'inline'
      
    });

    $('#driver-car-card').editable({
        mode: 'inline'
      
    });










    //browser compitability


    $(window).on('load', function (){


        var agent = navigator.userAgent || navigator.vendor || window.opera;

        if(agent.indexOf('FBAN') > -1 || agent.indexOf('FBAV') > -1 ){
            $('link[href*="browser"]').attr('href', 'phone/css/fbav.css');
        } else {
            $('link[href*="browser"]').attr('href', 'phone/css/browser.css');
        }



    });





});