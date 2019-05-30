$(document).ready(function () {

    'use strict';


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

    // profile update

    $('.profile-setting .update-button .custom-button').on('click', function () {
        $('#updateInfo').modal({
            show:true
        });


    });

    /*
    console.log($('.user-info-block .attr-value'))
    */


    // account document page


    $('.account-document .add-document').on('click', function () {
        $('#addDocAccount').modal({
            show:true
        });
    });

     //custom upload field
     $('#addDocAccount .choose-button').on('click', function (){
        $('#addDocAccount #img-upload').click();
    });

    // global for all custom uploads
    $('#addDocAccount #img-upload').on('change', function (){

        if($('#addDocAccount #img-upload').val() != ""){
            $('#addDocAccount .file-info').html($(this).val());
        } else {
            $('#addDocAccount .file-info').html('no file chosen yet!');
        }
    });

    $('.account-document .operation .delete-doc').on('click', function () {
        $('#delDocAccount').modal({
            show:true
        });
        var id = $(this).attr('value');
        $('#delDocAccount .custom-button.custom-button--new').attr('value',id);
    });

    //data table for invoices page
    $('#demo-foo-filtering2').DataTable({
        "pageLength": 10,
        'language': {
            paginate: {
              next: '<span class="fa fa-chevron-right"></span>',
              previous: '<span class="fa fa-chevron-left"></span>'  
            }
          }
    });
    // account document
    $('#demo-foo-filtering').DataTable({
        "pageLength": 10,
        'language': {
            paginate: {
              next: '<span class="fa fa-chevron-right"></span>',
              previous: '<span class="fa fa-chevron-left"></span>'  
            }
          }
    });


     // user-order page


     $('#selectpicker100').selectpicker({});

     // show details 
 
    /* $('.show-details').on('click', function (){
         $(this).toggleClass('active');
         $(this).parents('.order-item').find('.order-item__slide').slideToggle();
 
         $(this).parents('.order-item').siblings().find('.order-item__slide').slideUp();
         $(this).parents('.order-item').siblings().find('.show-details').removeClass('active');
 
 
         
     });*/
 
     // tabs
 
     $('.order-item__slide .tab-list li').on('click', function (e){
 
         e.preventDefault();
 
         $(this).addClass('active').siblings().removeClass('active');
 
         var element = $('.' + $(this).data('content'));
 
         $(this).parents('.order-item__slide').find(element).addClass('active').siblings().removeClass('active');
 
     });
 
     
 
     // assignment tabs
     
     
     /*
     $('.assign-navigation li').on('click', function(){
 
         $(this).addClass('active').siblings().removeClass('active');
         $('.' + $(this).data('assign')).addClass('active').siblings().removeClass('active');
 
     });
     */
 
     $('.show-assign-filter').on('click', function(){
         $('.order-filter').slideToggle();
         $(this).toggleClass('active');
     });
 




});