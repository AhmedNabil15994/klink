$(document).ready(function () {
    // show dropdown
    $('.list-link').not('.route .list-link').on('click', function (e){
        e.preventDefault();
        if ($('.sideMenu').hasClass('open')){
            $('.sideMenu').removeClass('open');
            $('.navButton').removeClass('active');
            $(this).siblings('.dropDown').toggleClass('active');
            $(this).parent().siblings().children('.dropDown').removeClass('active');
        } else {
        $(this).siblings('.dropDown').toggleClass('active');
        $(this).parent().siblings().children('.dropDown').removeClass('active');
        }
    });
    // show search box
    $('.search .list-link').on('click', function (x) {
        x.preventDefault();
        $(this).siblings('.dropDown').fadeIn().addClass('visible');
        $(this).parent().siblings().children('.dropDown').removeClass('active');
    });
    //close search box
    $('.search-close').on('click', function (){
        $('.search .dropDown').fadeOut().removeClass('active');
    });
    // close Drop down when click
	$(document).on('click', function (e) {
        var clickOver = $(e.target);
        var dropDown = $('.dropDown');
		if (!clickOver.closest('header').length && dropDown.hasClass('active')) {
			dropDown.removeClass('active');
		}
    });
    //for search box
    $(document).on('click', function (e) {
        var clickOver = $(e.target);
        var dropDown = $('.search-control');
		if (!clickOver.closest('header').length && dropDown.hasClass('visible')) {
			dropDown.removeClass('visible').fadeOut();
		}
    });
    //sidebar script
    //sidebar show

    $('.navButton').on('click' , function (){
        $(this).toggleClass('active');
        if ($('.dropDown').hasClass('active')){

            $('.dropDown').removeClass('active');
            $('.sideMenu').toggleClass('open');
            $('.profile-side').toggleClass('active');

        } else {
            $('.sideMenu').toggleClass('open');
            $('.profile-side').toggleClass('active');

        }
    });

    /*
     // new button
     $('.NewnavButton').on('click', function () {
        $(this).toggleClass('active');
        $('.sideMenu').toggleClass('open');
    });
    */

    //close side bar when click some where else
    $('.mainContent').on('click', function (m) {
        var clickOver = $(m.target);
        var sideBar = $('.sideMenu');
        if (!clickOver.closest('aside').length && !clickOver.closest('.pop-up').length && sideBar.hasClass('open')) {
            sideBar.removeClass('open');
            $('.profile-side').removeClass('active');
            $('.navButton').removeClass('active');
        }
    });
    /*
    
    //close side bar when scroll
    $(window).scroll(function (){
        if ($(this).scrollTop() > 20 && $('.sideMenu').hasClass('open')){
            $('.sideMenu').removeClass('open');
            $('.navButton').removeClass('active');
        }
    });*/

    //language sitcher
    $('.selectpicker').selectpicker();
   

    // profile page img edit model
    $('.profile-operation , .profile-operation span').on('click', function () {
    
        $('#imgEditModal').modal({
            show:true
        });
    });

    $(document).on('click','.profile-edit', function () {
        $('#infoEditModal').modal({
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


    //database tables
    $('.demo-foo-filtering').DataTable({
        "pageLength": 5,
        'language': {
            paginate: {
              next: '<span class="fas fa-angle-right"></span>',
              previous: '<span class="fas fa-angle-left"></span>'  
            }
          }
    });


    //documents page
    //show add doc modal
    $(document).on('click','.documents .add-doc', function () {
        $('#uploadFileModal').modal({
            show:true
        });
    });
    //show delete doc modal
    $(document).on('click','.documents .delete-doc', function () {
        $('#deleteDocModal .btn-primary').attr('value',$(this).attr('value'));
        $('#deleteDocModal').modal({
            show:true
        });
    });
	
	
	$(document).on('click','.actions .delete-faq', function () {
        $('#deleteDocModal .btn-primary').attr('value',$(this).attr('value'));
        $(this).parents('.actions').fadeOut(500);
        $('#deleteDocModal').modal({
            show:true
        });
    });

    $(document).on('click','.actions .edit-faq', function () {
        $('#editModal .btn-primary').attr('value',$(this).attr('value'));
        $('#editModal #question').val($(this).parents('.operations').siblings('h3').text());
        $(this).parents('.actions').fadeOut(500);
        $('#editModal').modal({
            show:true
        });
    });
    
    $('#uploadFileModal .choose-button').on('click', function (){
        $('#uploadFileModal #img-upload').click();
    });

    // global for all custom uploads
    $('#uploadFileModal #img-upload').on('change', function (){

        if($('#uploadFileModal #img-upload').val() != ""){
            $('#uploadFileModal .file-info').html($(this).val());
        } else {
            $('#uploadFileModal .file-info').html('no file chosen yet!');
        }
    });



    //  vehcile page


    //show delete vehcile modal
    $(document).on('click','.vehcile .delete-vehcile' ,function () {
        $('#deletevehcileModal .btn-primary').attr('value',$(this).attr('value'));
        $('#deletevehcileModal').modal({
            show:true
        });
    });

    //show edit vehcile
    $(document).on('click','.vehcile .edit-vehcile' ,function () {

        $child = $(this).parents('.table__body--row').children('td');


        $('#editvehcilename').val($child.eq(1).text());
        $('#editvehcileweight').val($child.eq(2).text());
        $('#editvehcileload').val($child.eq(3).text());


        $('#editVehcileModal').modal({
            show:true
        });
    });


    

    //show add vehcile  modal
    $('.vehcile .add-vehcile').on('click', function () {
        $('#addVehcileModal').modal({
            show:true
        });
    });

    //custom upload field for add vehcile 
    $('#addVehcileModal .choose-button').on('click', function (){
        $('#addVehcileModal #img-upload').click();
    });

    
    $('#addVehcileModal #img-upload').on('change', function (){

        if($('#addVehcileModal #img-upload').val() != ""){
            $('#addVehcileModal .file-info').html($(this).val());
        } else {
            $('#addVehcileModal .file-info').html('no file chosen yet!');
        }
    });


    // edit modal

    //custom upload field for edit vehcile 
    $('#editVehcileModal .choose-button').on('click', function (){
        $('#editVehcileModal #img-upload2').click();
    });

    
    $('#editVehcileModal #img-upload2').on('change', function (){

        if($('#editVehcileModal #img-upload2').val() != ""){
            $('#editVehcileModal .file-info').html($(this).val());
        } else {
            $('#editVehcileModal .file-info').html('no file chosen yet!');
        }
    });



    // order offer page

    $('#selectpicker100').selectpicker({});
    $('#selectpicker110').selectpicker({});
    $('#selectpicker120').selectpicker({});

	
    // tabs

    $(document).on('click','.order-item__slide .tab-list li' ,function (){
        
        $(this).addClass('active').siblings().removeClass('active');

        var element = $('.' + $(this).data('content'));

        $(this).parents('.order-item__slide').find(element).addClass('active').siblings().removeClass('active');

    });



    // assignment tabs


    $('.assign-navigation li').on('click', function(){

        $(this).addClass('active').siblings().removeClass('active');
        $('.' + $(this).data('assign')).addClass('active').siblings().removeClass('active');

    });

    $('.show-assign-filter').on('click', function(){
        $('.order-filter').slideToggle();
        $(this).toggleClass('active');
    });




    // sidebar scroll

   
    /*
    $(".nicescroll-box").niceScroll(".wrap",{
        cursorcolor:"#2C2F39",
        cursorwidth:"10px",
        emulatetouch:true,
        railoffset:"56.25px 0"
        
    });
    */


    //new vehcile page
    $('#selectpicker200').selectpicker({});
    $('#selectpicker201').selectpicker({});

    // jQuery.noConflict();
    $('#addNewVehcileModal #first,#editNewVehcileModal #first').datepicker({
        format: 'yyyy-mm-dd',
        autoclose : true,
    });


    $('.show-car-button').on('click', function (){
        $(this).toggleClass('active');
        $(this).parents('.vehcile-item').find('.vehcile-slide-content').slideToggle();
        
        $(this).parents('.vehcile-item').siblings().find('.vehcile-slide-content').slideUp();
        $(this).parents('.vehcile-item').siblings().find('.show-car-button').removeClass('active');

        
    });


     // tabs

     $('.vehcile-slide-content .vehcile-tabs li').on('click', function (e){

        e.preventDefault();

        $(this).addClass('active').siblings().removeClass('active');

        var element = $('.' + $(this).data('content'));

        $(this).parents('.vehcile-slide-content').find(element).addClass('active').siblings().removeClass('active');

    });




     //  new vehcile page modals


    //show delete vehcile modal
    $('.new-vehcile .delete-new-vehcile').on('click', function () {
        $('#deleteNewvehcileModal').modal({
            show:true
        });
    });


    
    //show edit vehcile
    $('.new-vehcile .edit-new-vehcile').on('click', function () {

        $('#editNewVehcileModal').modal({
            show:true
        });
    });
    

    //show add vehcile  modal
    $('.new-vehcile .add-new-vehcile').on('click', function () {
        $('#addNewVehcileModal').modal({
            show:true
        });
    });

    //custom upload field for add vehcile 
    $('#addNewVehcileModal .choose-button').on('click', function (){
        $('#addNewVehcileModal #img-upload').click();
    });
    
    $('#addNewVehcileModal #img-upload').on('change', function (){

        if($('#addNewVehcileModal #img-upload').val() != ""){
            $('#addNewVehcileModal .file-info').html($(this).val());
        } else {
            $('#addNewVehcileModal .file-info').html('no file chosen yet!');
        }
    });
    // edit modal
    //custom upload field for edit vehcile 
    $('#editVehcileModal .choose-button').on('click', function (){
        $('#editVehcileModal #img-upload').click();
    });

    
    $('#editNewVehcileModal #img-upload').on('change', function (){

        if($('#editNewVehcileModal #img-upload').val() != ""){
            $('#editNewVehcileModal .file-info').html($(this).val());
        } else {
            $('#editNewVehcileModal .file-info').html('no file chosen yet!');
        }
    });



     /*new code*/

    $('.user-navi .user-navi_list').on('click', function (){
        $(this).children('.user-navi_sub').toggle();
        $(this).siblings().children('.user-navi_sub').hide();
    });

    $('.mainContent').on('click', function (m) {
        var clickOver = $(m.target);
        if (!clickOver.closest('.user-navi').length) {
            $('.user-navi .user-navi_list .user-navi_sub').hide();
        }
    });

    $(window).scroll(function (){
        $('.user-navi .user-navi_list .user-navi_sub').hide();
    });

    /*to day code*/


    $('.sort-type li').on('click', function () {
        $(this).toggleClass('active').siblings().removeClass('active');
    });

    


    $('#selectpicker301').selectpicker({});






     /* 9 / 8 / 2018 */



     $('.main-wrapper.view-profile .sideMenu .sideList__item a.popup-list').on('click' , function (e){
        e.preventDefault();

        $('#' + $(this).data('pop')).fadeIn(100);
        $('.pop-up__container').addClass('active');


    });


    $('.closePop').on('click' ,function (e) {
        e.preventDefault();
        $('.pop-up__container').removeClass('active');
        $(this).parents('.pop-up').fadeOut();
    });



    $('.pop-up').on('click', function (m) {
        var clickOver = $(m.target);
        if (!clickOver.closest('.pop-up__container').length) {
            $('.pop-up__container').removeClass('active');
            $(this).fadeOut();
        }
    });


    /*detect sub menu location*/


    if ($(window).width() > 768) {

         myvalue = $(window).height() -100;


        $('.user-navi_list .user-navi_sub').css({

            '-webkit-transform' : 'translate3d(45px,' + myvalue + 'px, 0px)',
            '-moz-transform' : 'translate3d(45px,' + myvalue +  'px, 0px)',
            '-o-transform' : 'translate3d(45px,' + myvalue +   'px, 0px)',
            'transform' : 'translate3d(45px,' + myvalue + 'px, 0px)'



        });
        


        myvalue2 = $(window).height() - 130;


        $('.user-navi_list .user-navi_sub.faq').css({

            '-webkit-transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)',
            '-moz-transform' : 'translate3d(45px,' + myvalue2 +  'px, 0px)',
            '-o-transform' : 'translate3d(45px,' + myvalue2 +   'px, 0px)',
            'transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)'



        });

    } /*else {

        myvalue = $('.pageContent').height() - 100;


        $('.user-navi_list .user-navi_sub').css({

            '-webkit-transform' : 'translate3d(45px,' + myvalue + 'px, 0px)',
            '-moz-transform' : 'translate3d(45px,' + myvalue +  'px, 0px)',
            '-o-transform' : 'translate3d(45px,' + myvalue +   'px, 0px)',
            'transform' : 'translate3d(45px,' + myvalue + 'px, 0px)'



        });
        


        myvalue2 = $('.pageContent').height() - 120;


        $('.user-navi_list .user-navi_sub.faq').css({

            '-webkit-transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)',
            '-moz-transform' : 'translate3d(45px,' + myvalue2 +  'px, 0px)',
            '-o-transform' : 'translate3d(45px,' + myvalue2 +   'px, 0px)',
            'transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)'



        });
    }*/


    $(window).resize(function (){

        if ($(window).width() > 768) {
            myvalue = $(window).height() - 100;


            $('.user-navi_list .user-navi_sub').css({

                '-webkit-transform' : 'translate3d(45px,' + myvalue + 'px, 0px)',
                '-moz-transform' : 'translate3d(45px,' + myvalue +  'px, 0px)',
                '-o-transform' : 'translate3d(45px,' + myvalue +   'px, 0px)',
                'transform' : 'translate3d(45px,' + myvalue + 'px, 0px)'



            });

            myvalue2 = $(window).height() - 130;
            


            $('.user-navi_list .user-navi_sub.faq').css({

                '-webkit-transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)',
                '-moz-transform' : 'translate3d(45px,' + myvalue2 +  'px, 0px)',
                '-o-transform' : 'translate3d(45px,' + myvalue2 +   'px, 0px)',
                'transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)'



            });
        } /*else {

            myvalue = $(window).height() - 100;


            $('.user-navi_list .user-navi_sub').css({

                '-webkit-transform' : 'translate3d(45px,' + myvalue + 'px, 0px)',
                '-moz-transform' : 'translate3d(45px,' + myvalue +  'px, 0px)',
                '-o-transform' : 'translate3d(45px,' + myvalue +   'px, 0px)',
                'transform' : 'translate3d(45px,' + myvalue + 'px, 0px)'



            });

            myvalue2 = $(window).height() - 120;


            $('.user-navi_list .user-navi_sub.faq').css({

                '-webkit-transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)',
                '-moz-transform' : 'translate3d(45px,' + myvalue2 +  'px, 0px)',
                '-o-transform' : 'translate3d(45px,' + myvalue2 +   'px, 0px)',
                'transform' : 'translate3d(45px,' + myvalue2 + 'px, 0px)'



            });

        }*/

    });




    /*9 / 10 / 2018*/


    $('.new-button-offer').on('click', function (e){
        e.preventDefault();

        var id = $(this).attr('id');

        var myDiv = $(this).parents('.order-item').find('.new-order-content.'+id);
        myDiv.toggle();
        myDiv.parent().siblings('.col-lg-4').children('.new-order-content').fadeOut();

    });



    $('.slide-button.next').on('click', function (){

        $(this).parents('.slide-content').removeClass('active').fadeOut();
        $(this).parents('.slide-content').next().addClass('active').fadeIn();

    });

    $('.slide-button.prev').on('click', function (){

        $(this).parents('.slide-content').removeClass('active').fadeOut();
        $(this).parents('.slide-content').prev().addClass('active').fadeIn();

    });


    $('.mainContent').on('click', function (m) {
        var clickOver = $(m.target);
        if (!clickOver.closest('.order-item').length) {
            $('.new-order-content').fadeOut();
        }
    });

    $('.new-make-offer').on('click', function (){
        $('.new-make-offer.top-square').addClass('active')
        $('.slide-button.details-button.top-square').removeClass('active')
        $('.details').fadeOut();
        $('.enter-offer').fadeIn();



    });

    $('.slide-button.details-button').on('click', function (){
        $('.new-make-offer.top-square').removeClass('active')
        $('.slide-button.details-button.top-square').addClass('active')
        $('.enter-offer').fadeOut();
        $('.details').fadeIn();



    });

    $('.slide-button.pick-button').on('click', function (){

        $(this).parents('.slide-content').fadeOut();
        $(this).parents('.slide-content').prev().fadeIn();

    });


    $('#datetimepicker').datetimepicker({
        initialDate : new Date()
    });
    $('#datetimepicker2').datetimepicker({
        initialDate  : new Date()
    });


    $('#OrdersOnMap').css('height', '248px');




    






    /* 14 - 9 - 2018 */


     //new profile page
     $('#selectpicker500').selectpicker({});



     /*17 - 9 - 2018*/







    


    $('.user-account-setting .blue-overlay').on('click', function () {
    
        $('#userAvatarModal').modal({
            show:true
        });
    });

     //custom upload field
     $('#userAvatarModal .choose-button').on('click', function (){
        $('#userAvatarModal #img-upload').click();
    });

    // global for all custom uploads
    $('#userAvatarModal #img-upload').on('change', function (){

        if($('#userAvatarModal #img-upload').val() != ""){
            $('#userAvatarModal .file-info').html($(this).val());
        } else {
            $('#userAvatarModal .file-info').html('no file chosen yet!');
        }
    });

    

    $('#lastName').editable({
        mode: 'inline'
    
    });

    $('#birthPlace').editable({
        mode: 'inline'
    
    });




    

    

    
    
    

    
   

    $('.data-button.profile-document').on('click', function () {
    
        $('#fileUploadNewModal').modal({
            show:true
        });
    });

    //custom upload field
    $('#fileUploadNewModal .choose-button').on('click', function (){
            $('#fileUploadNewModal #img-upload').click();
    });
    
    // global for all custom uploads
    $('#fileUploadNewModal #img-upload').on('change', function (){
    
            if($('#fileUploadNewModal #img-upload').val() != ""){
                $('#fileUploadNewModal .file-info').html($(this).val());
            } else {
                $('#fileUploadNewModal .file-info').html('no file chosen yet!');
            }
    });





    /*90 - 23 - 2018 */




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
    $('#selectpicker620').selectpicker();
    $('#selectpicker630').selectpicker();
    $('#selectpicker611').selectpicker();
    $('#selectpicker612').selectpicker();
    $('#selectpicker614').selectpicker();



    window.employment_birthDate = '';
    $('#empbirthdate').editable({
        mode: 'inline',
        format	:'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
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

    $('#card_number,#passport_number,#residency_no,#health_insurance_company,#KV2,#pensions_no').editable({
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
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    $('#fentrydate').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    $('#startdate').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });
    $('#enddate').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
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

    $('a#home').editable({
        mode: 'inline'
      
    });

    $('#comempcity').editable({
        mode: 'inline'
      
    });

    $('#comemppostal').editable({
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
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    


    $('#fcomEntryDate').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    $('#comstartT').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });

    


    $('#comendT').editable({
        mode: 'inline',
        format  :'yyyy-mm-dd',
        viewformat: 'dd-mm-yyyy',
        datepicker	:{
            container : '#birthdate',
            autoclose : 'true'
        }
      
    });


    /*responsive panel*/
    if($(window).width() < 768 ){

        $('.sideMenu').css('height', $('.pageContent').height() + 120);
        $('.profile-side').css('height', $('.pageContent').height() + (120-16) );
        $('.pop-up .profile-side').css('height', $(window).height());


    } else {
        $('.sideMenu').css('height', $(window).height());
        $('.profile-side').css('height', $(window).height());
        $('.pop-up .profile-side').css('height', $(window).height());
    }

    $(window).resize(function (){

        if($(window).width() < 768 ){

        $('.sideMenu').css('height', $('.pageContent').height() + 120);
        $('.profile-side').css('height', $('.pageContent').height() + (120-16) );
        $('.pop-up .profile-side').css('height', $(window).height());


        } else {
            $('.sideMenu').css('height', $(window).height());
            $('.profile-side').css('height', $(window).height());
            $('.pop-up .profile-side').css('height', $(window).height());
        }
    });







    /*27 / 9 */

    $('.employment .pages-step__list').on('click', function () {

        $(this).addClass('active').siblings().removeClass('active');
        $('#' + $(this).data('page')).addClass('active').siblings().removeClass('active');


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



    /*23-10-2018*/
    

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





    

});



