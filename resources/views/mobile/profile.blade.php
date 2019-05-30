@extends('mobile.index')

@section('page-content')
  <!--profile page-->
  <div class="profile-page mont">

    <!--popups-->

    <!--edit img modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="imgEditModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><span class="fas fa-file
                                    "></span>uploading Image</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <!--custom upload--> 
                                <div class="custom-upload">
                                        <input type="file" id="img-upload" hidden="hidden">
                                        <div class="file-info">
                                            no file chosen yet!
                                        </div>
                                        <button class="choose-button custom-button--new">Choose image</button>

                                     
                                </div>
                                <!--custom upload--> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="custom-button custom-button--blue" data-dismiss="modal">Close</button>
                                <button type="button" class="custom-button custom-button--new">save</button>
                            </div>
                            </div>
                        </div>
    </div>
    <!--edit img modal-->


    <!--edit img modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="uploadDocument">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><span class="fas fa-file
                                    "></span>uploading document</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <!--custom upload--> 
                                <div class="custom-upload">
                                        <input type="file" id="img-upload" hidden="hidden">
                                        <div class="file-info">
                                            no file chosen yet!
                                        </div>
                                        <button class="choose-button custom-button--new">Choose document</button>

                                     
                                </div>
                                <!--custom upload--> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="custom-button custom-button--blue" data-dismiss="modal">Close</button>
                                <button type="button" class="custom-button custom-button--new">upload</button>
                            </div>
                            </div>
                        </div>
    </div>
    <!--edit img modal-->



    <!--profile setting-->
    <div class="pop-up mont" id="profile-setting">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> profile setting
                                    </div>


                                    <!--profile setting content-->
                                    <div class="profile-setting-content">

                                        <h4 class="content-heading">Here you can change you name , birth date and address.</h4>

                                        <div class="content">

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="user-name">name</label>
                                                </div>
                                                <div class="data-input">
                                                    <a href="#" id="full-name" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="birth-date">birth date</label>
                                                </div>
                                                <div class="data-input">
                                                    <a href="#" id="birth-date"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                </div>
                                            </div>


                                            <div class="data-group grouped">
                                                <div class="data-label">
                                                    <label for="address">address</label>
                                                </div>
                                                <div class="data-input ">
                                                    <input id="address" type="text" placeholder="Straße / Hausnummer  / Postleitzahl">

                                                    <a href="#" class="grouped" id="street" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            Landsberger Allee
                                                    </a>

                                                    <a href="#" class="grouped" id="street-no" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            B52
                                                    </a>

                                                    <a href="#" class="grouped" id="street-post" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            10249
                                                    </a>

                                                    <a href="#" class="grouped" id="street-city" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            Berlin
                                                    </a>

                                                    
                                                    <br>
                                                    <a href="#" class="grouped" id="street-region" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            region
                                                    </a>
                                                    <br>
                                                    <a href="#" class="grouped" id="street-country" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            country
                                                    </a>



                                                </div>
                                            </div>


                                            <button class="custom-button custom-button--page">
                                                save
                                            </button>



                                        </div>


                                    </div>
                                    <!--profile setting content-->

                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--profile setting-->

    <!--account setting-->
    <div class="pop-up mont" id="account-setting">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Account setting
                                    </div>

                                   <!--account setting content-->
                                   <div class="account-setting-content">

                                        <h4 class="content-heading">Manage your Email details, address, passwords all here.

                                            </h4>

                                        <div class="content">

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="email">Email</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="acc-email" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                B52
                                                        </a>
                                                </div>
                                            </div>
                                            
                                            <div class="data-group">
                                                    <label for="">change your password :</label>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="old-pass">old-password</label>
                                                </div>
                                                <div class="data-input">
                                                    <input id="old-pass" type="password" placeholder="Enter password">
                                                </div>
                                            </div>


                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="new-pass">new-password</label>
                                                </div>
                                                <div class="data-input">
                                                    <input id="new-pass" type="password" placeholder="Enter new password">
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="new-pass">retype-new-password</label>
                                                </div>
                                                <div class="data-input">
                                                    <input id="retype-new-pass" type="password" placeholder="retype new password">
                                                </div>
                                            </div>


                                        


                                            <button class="custom-button custom-button--page">
                                                save
                                            </button>



                                        </div>


                                    </div>
                                    <!--account setting content-->

                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--account setting-->

    <!--contact setting-->
    <div class="pop-up mont" id="contact-setting">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Contact
                                    </div>

                                    <!--contact setting content-->
                                   <div class="contact-setting-content">

                                        <h4 class="content-heading">All information about how can we contact with you.
                                        </h4>

                                        <div class="content">

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="phone">phone number</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="phone-contact" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                        </a>
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="home">home number</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="home-contact" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>
                                            
                                            <div class="data-group">
                                                    <label for="">Social Media :

                                                    </label>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="facebook"><i class="facebook fab fa-facebook-square"></i>facebook account</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="face-contact" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                        </a>
                                                </div>
                                            </div>


                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="twitter"><i class="twitter fab fa-twitter"></i>twitter account</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="twit-contact" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="linkedin"><i class="linkedin fab fa-linkedin"></i>linkedin account</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="linked-contact" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>


                                        


                                            <button class="custom-button custom-button--page">
                                                save
                                            </button>



                                        </div>


                                    </div>
                                    <!--contact setting content-->
                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--contact setting-->

    <!--employment setting-->
    <div class="pop-up mont" id="employment-setting">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Employment
                                    </div>

                                    <!--document  content-->
                                    <div class="employment-setting-content">

                                       

                                        <div class="content">

                                            

                                            <div class="employment">



                                                <!--pages step-->
                                                <ul class="pages-step clearfix">
                                            
                                                    <li class="pages-step__list active" data-page="information">
                                                        <span class="step-icon">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <span class="step-text">Personal information</span>
                                                    </li>
                                            
                                                    <li class="pages-step__list" data-page="contract">
                                                        <span class="step-icon">
                                                            <i class="fas fa-file-alt"></i>
                                                        </span>
                                                        <span class="step-text">Your Contract</span>
                                                    </li>
                                            
                                                    <li class="pages-step__list" data-page="start">
                                                        <span class="step-icon">
                                                            <i class="fas fa-coffee"></i>
                                                        </span>
                                                        <span class="step-text">Start wrok</span>
                                                    </li>
                                            
                                                </ul>
                                                <!--pages step-->
                                            
                                            
                                                <!--pages content-->
                                            
                                                <div class="pages-content">
                                                    
                                            
                                                    <!--page item-->
                                                    <div class="page-item active" id="information">
                                                        
                                                    
                                                        <!--main row-->
                                                        <div class="">
                                            
                                                            
                                                            <!--personal secttion-->
                                                            
                                                            <div class="">
                                                                <p class="custom-parag-content bold">
                                                                    Personal information
                                                                </p>
                                                            </div>
                                            
                                                            <!--first row-->
                                                            <div class="">
                                            
                                            
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="title">Title</label>
                                                                                <label for="remember" class="custom-label">
                                                                                        <input type="radio" name="title" class="custom-check" value ="remember" id="remember" checked>
                                                                                        <span class="custom-span">Mr</span>
                                                                                </label>
                                            
                                                                                <label for="remember2" class="custom-label">
                                                                                        <input type="radio" name="title" class="custom-check" value ="remember" id="remember2">
                                                                                        <span class="custom-span">Mrs</span>
                                                                                </label>
                                            
                                            
                                                                                <label for="remember3" class="custom-label">
                                                                                        <input type="radio" name="title" class="custom-check" value ="remember" id="remember3">
                                                                                        <span class="custom-span">Ms</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-8 col-sm-6">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="Comfullname">Full name</label>
                                            
                                                                                <a href="#" id="first_name_em" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                                <a href="#" id="last_name_em" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="title">Birth Date</label>
                                                                                <a href="#" id="empbirthdate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-6 ">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel2">
                                                                                <label class="label" for="Comfullname">Nationality</label>
                                            
                                                                                <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                                                                                        
                                                                                            <option value="German">German</option>
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="selectpicker610">Birth place</label>
                                                                                
                                                                                <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                                                                                        <option>Egypt</option>
                                                                                        <option>Germany</option>
                                                                                </select>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-6">
                                                                            <div class="fullname custom-padding padding-cancel">
                                                                                <label class="label" for="Comfullname">Martial status</label>
                                            
                                                                                <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                                                                                        <option>married </option>
                                                                                        <option>single</option>
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-5 col-sm-8">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="selectpicker610">E-Mail</label>
                                                                                
                                                                                <a href="#" id="empemail" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-4">
                                                                            <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                                                                <label class="label" for="empmobile">Mobile No.</label>
                                            
                                                                                <a href="#" id="empmobile" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-3 col-sm-12">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="empins">insuarance No.</label>
                                            
                                                                                <a href="#" id="empins" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">45854121355
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                                            </div>
                                                            <!--first row-->
                                            
                                                            <!--personal secttion-->
                                            
                                            
                                            
                                            
                                                            <!--residental secttion-->
                                                            
                                                            <div class="col-xs-12">
                                                                <p class="custom-parag-content bold">
                                                                        Residential address
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="land">Home / No
                                                                                </label>
                                                                                <a href="#" id="land" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                                                                Landsberger Allee / 56B  
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                                                                <label class="label" for="comempcity">postal / City</label>
                                            
                                                                                <a href="#" id="comempcity" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">13589 Berlin 
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="ComCountry">Country</label>
                                            
                                                                                <a href="#" id="ComCountry" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">Germany
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--residental secttion-->
                                            
                                            
                                            
                                                            <!--Employment secttion-->
                                            
                                                            <div class="">
                                                                <p class="custom-parag-content bold">
                                                                    Employment
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="comJobTitle">Job Title
                                                                                </label>
                                                                                <a href="#" id="comJobTitle" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                                                                
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                                                                <label class="label" for="comEntryDate">Entry Date</label>
                                            
                                                                                <a href="#" id="comEntryDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-12">
                                                                                <div class="fullname custom-padding  padding-cancel media-padding-cancel">
                                                                                    <label class="label" for="fcomEntryDate">First Entry Date</label>
                                            
                                                                                    <a href="#" id="fcomEntryDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                                                    
                                                                                </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                            
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                            
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-5">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="comJobTitle">Weekly work time
                                                                                </label>
                                            
                                            
                                                                                <label for="Part" class="custom-label">
                                                                                        <input type="radio" name="time" class="custom-check" value ="remember" id="Part" checked>
                                                                                        <span class="custom-span">Part</span>
                                                                                </label>
                                            
                                                                                <label for="full" class="custom-label">
                                                                                        <input type="radio" name="time" class="custom-check" value ="remember" id="full">
                                                                                        <span class="custom-span">FUll</span>
                                                                                </label>
                                            
                                                                                
                                                                            
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-7">
                                                                            <div class="fullname custom-padding  padding-cancel media-padding-cancel">
                                                                                <label class="label" for="comEntryDate">Highest school degree</label>
                                            
                                                                                <select class="selectpicker href" id="selectpicker612">
                                                                                        <option>ohne Schulabschluss</option>
                                                                                        <option>Haupt-/Volksschulabschluss</option>
                                                                                        <option>Mittlere Reife/gleichwertiger
                                                                                                Abschluss</option>
                                                                                        <option>Abitur/Fachabitur</option>
                                            
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                            
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="">
                                            
                                            
                                            
                                                                    
                                            
                                                                        <div class="">
                                                                            <div class="fullname custom-padding  ">
                                                                                <label class="label" for="comEntryDate">highest vocational education
                                                                                    </label>
                                            
                                                                                <select class="selectpicker href" id="selectpicker612">
                                                                                        <option>ohne beruflichen Ausbildungsabschluss</option>
                                                                                        <option>Anerkannte Berufsausbildung</option>
                                                                                        <option>Meister/Techniker/gleichwertiger
                                                                                                Fachschulabschluss</option>
                                                                                        <option>Bachelor</option>
                                                                                        <option>Diplom/Magister/ Master/Staatsexamen</option>
                                            
                                                                                        <option>Diplom/Magister/ Promotion</option>
                                            
                                                                                </select>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                                                        
                                                                    
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                            
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                    <div class="data-row">    
                                                                        <div class="row">
                                            
                                                                        
                                                                            <div class="col-md-6">
                                                                                <div class="fullname custom-padding right-border">
                                                                                    <label class="label" for="comstartT">Start of training:
                                                                                        </label>
                                            
                                                                                    <a href="#" id="comstartT"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                                                        <div class="col-md-6">
                                                                                <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                                                                    <label class="label" for="comendT">Expected end of training:
                                                                                        </label>
                                            
                                                                                    <a href="#" id="comendT"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                            
                                            
                                                                        </div>
                                                                    </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--Employment secttion-->
                                            
                                            
                                            
                                                            <!--tax secttion-->
                                                            
                                                            <div class="col-xs-12">
                                                                <p class="custom-parag-content bold">
                                                                        Tax information
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class="col-xs-12">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="land">Identification Number.
                                                                                </label>
                                                                                <a href="#" id="ident" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                                                                <label class="label" for="comempcity">Tax office no</label>
                                            
                                                                                <a href="#" id="officeno" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href"> 
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="ComCountry">Tax bracket factor
                                                                                    </label>
                                            
                                                                                <a href="#" id="taxbrack" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                                <div class="data-row">    
                                                                        <div class="row">
                                            
                                                                        
                                                                            <div class="col-md-6">
                                                                                <div class="fullname custom-padding right-border">
                                                                                    <label class="label" for="taxchild">Child allowances
                                                                                        </label>
                                            
                                                                                    <a href="#" id="taxchild"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                                                        <div class="col-md-6">
                                                                                <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                                                                    <label class="label" for="denomin">denomination
                                                                                        </label>
                                            
                                                                                    <a href="#" id="denomin"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                            
                                            
                                                                        </div>
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--tax secttion-->
                                            
                                            
                                            
                                            
                                                            <!--social insuarance secttion-->
                                                            
                                                            <div class="col-xs-12">
                                                                <p class="custom-parag-content bold">
                                                                        Social insurance
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class="col-xs-12">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="lawins">Social law health insurance
                                            
                                                                                </label>
                                                                                <a href="#" id="lawins" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                                                                <label class="label" for="comempcity">Parenthood</label>
                                            
                                                                                <label for="remember5" class="custom-label">
                                                                                        <input type="radio" name="parenthood" class="custom-check" value ="remember" id="remember5" checked>
                                                                                        <span class="custom-span" >Yes</span>
                                                                                </label>
                                            
                                                                                <label for="remember6" class="custom-label">
                                                                                        <input type="radio" name="parenthood" class="custom-check" value ="remember" id="remember6">
                                                                                        <span class="custom-span">No</span>
                                                                                </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="KV">KV
                                                                                    </label>
                                            
                                                                                <a href="#" id="KV" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                                                <div class="data-row">    
                                                                        <div class="row">
                                            
                                                                        
                                                                            <div class="col-sm-6">
                                                                                <div class="fullname custom-padding right-border">
                                                                                    <label class="label" for="RV">RV
                                                                                        </label>
                                            
                                                                                    <a href="#" id="RV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                                                            <div class="col-sm-6">
                                                                                <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                                                                    <label class="label" for="AV">AV
                                                                                        </label>
                                            
                                                                                    <a href="#" id="AV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                            
                                            
                                                                        </div>
                                                                </div>
                                            
                                            
                                                                <div class="data-row">    
                                                                        <div class="row">
                                            
                                                                        
                                                                            <div class="col-md-6">
                                                                                <div class="fullname custom-padding right-border">
                                                                                    <label class="label" for="PV">PV
                                                                                        </label>
                                            
                                                                                    <a href="#" id="PV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                                                        <div class="col-md-6">
                                                                                <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                                                                    <label class="label" for="UV">UV - dangerous tariff
                                                                                        </label>
                                            
                                                                                    <a href="#" id="UV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                            
                                            
                                            
                                                                        </div>
                                                                </div>
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--social insuarance secttion-->
                                            
                                            
                                            
                                            
                                                            <!--work paper secttion-->
                                                            
                                                            <div class="col-xs-12">
                                                                <p class="custom-parag-content bold">
                                                                    Information on the working papers
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class=" custom-font-label">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">Employment contract</label>
                                                    
                                                                                        <label for="remember7" class="custom-label">
                                                                                                <input type="radio" name="contract" class="custom-check" value ="remember" id="remember7" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember8" class="custom-label">
                                                                                                <input type="radio" name="contract" class="custom-check" value ="remember" id="remember8">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-12">
                                                                            <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                <label class="label" for="comempcity">Certificate of tax deduction</label>
                                            
                                                                                <label for="remember9" class="custom-label">
                                                                                        <input type="radio" name="cer" class="custom-check" value ="remember" id="remember9" checked>
                                                                                        <span class="custom-span" >Available</span>
                                                                                </label>
                                            
                                                                                <label for="remember10" class="custom-label">
                                                                                        <input type="radio" name="cer" class="custom-check" value ="remember" id="remember10">
                                                                                        <span class="custom-span">Not Available</span>
                                                                                </label>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                    <label class="label" for="comempcity">SV-ID
                                                                                        </label>
                                            
                                                                                    <label for="remember11" class="custom-label">
                                                                                            <input type="radio" name="SV" class="custom-check" value ="remember" id="remember11" checked>
                                                                                            <span class="custom-span" >Available</span>
                                                                                    </label>
                                            
                                                                                    <label for="remember12" class="custom-label">
                                                                                            <input type="radio" name="SV" class="custom-check" value ="remember" id="remember12">
                                                                                            <span class="custom-span">Not Available</span>
                                                                                    </label>
                                                                                    
                                                                                </div>
                                                                        </div>
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                                                <div class="data-row">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">membership certificate in public health insurance company
                                                                                                </label>
                                                    
                                                                                        <label for="remember13" class="custom-label">
                                                                                                <input type="radio" name="public" class="custom-check" value ="remember" id="remember13" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember14" class="custom-label">
                                                                                                <input type="radio" name="public" class="custom-check" value ="remember" id="remember14">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">Certificate of private health insurance
                                                                                                </label>
                                                    
                                                                                        <label for="remember15" class="custom-label">
                                                                                                <input type="radio" name="private" class="custom-check" value ="remember" id="remember15" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember16" class="custom-label">
                                                                                                <input type="radio" name="private" class="custom-check" value ="remember" id="remember16">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">Proof parent property
                                            
                                            
                                            
                                                                                                </label>
                                                    
                                                                                        <label for="remember17" class="custom-label">
                                                                                                <input type="radio" name="proof" class="custom-check" value ="remember" id="remember17" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember18" class="custom-label">
                                                                                                <input type="radio" name="proof" class="custom-check" value ="remember" id="remember18">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">Contract Occupational pensions
                                            
                                            
                                            
                                                                                                </label>
                                                    
                                                                                        <label for="remember19" class="custom-label">
                                                                                                <input type="radio" name="pensions" class="custom-check" value ="remember" id="remember19" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember20" class="custom-label">
                                                                                                <input type="radio" name="pensions" class="custom-check" value ="remember" id="remember20">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                                                        <div class="col-sm-12">
                                                                                <div class="fullname custom-padding right-border  media-padding-cancel2 top-border">
                                                                                        <label class="label" for="comempcity">Documents social fund construction / painter
                                            
                                            
                                            
                                                                                                </label>
                                                    
                                                                                        <label for="remember21" class="custom-label">
                                                                                                <input type="radio" name="doc" class="custom-check" value ="remember" id="remember21" checked>
                                                                                                <span class="custom-span" >Available</span>
                                                                                        </label>
                                            
                                                                                        <label for="remember22" class="custom-label">
                                                                                                <input type="radio" name="doc" class="custom-check" value ="remember" id="remember22">
                                                                                                <span class="custom-span">Not Available</span>
                                                                                        </label>
                                                                                        
                                                                                    </div>
                                                                        </div>
                                            
                                                                    
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                            
                                                            
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--work paper secttion-->
                                            
                                            
                                            
                                                            <!--social insuarance secttion-->
                                                            
                                                             <div class="col-sm-12">
                                                                <p class="custom-parag-content bold">
                                                                    Bank account
                                                                </p>
                                                            </div>
                                            
                                                            <!--second row-->
                                                            <div class="">
                                            
                                            
                                                                <div class="data-row first">    
                                                                    <div class="row">
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border">
                                                                                <label class="label" for="bankN">Bank Name
                                            
                                                                                </label>
                                                                                <a href="#" id="bankN" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="emp-title right-border padding-cancel">
                                                                                <label class="label" for="bankA">Account Owner
                                            
                                                                                </label>
                                                                                <a href="#" id="bankA" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                                                                name" class="href">
                                            
                                                                                </a>
                                                                            
                                                                            </div>
                                                                        </div>
                                            
                                                                        <div class="col-md-4 col-sm-12">
                                                                            <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                                                                <label class="label" for="IBANN">IBAN
                                                                                </label>
                                            
                                                                                <a href="#" id="IBANN" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                                                    </a>
                                                                                
                                                                            </div>
                                                                        </div>
                                            
                                            
                                            
                                                                    </div>
                                                                </div>
                                            
                                            
                                            
                                            
                                            
                                            
                                                            </div>
                                                            <!--second row-->
                                            
                                                            <!--social insuarance secttion-->
                                            
                                            
                                            
                                                    
                                            
                                            
                                            
                                                            
                                            
                                            
                                            
                                                        </div>
                                                        <!--main row-->
                                            
                                            
                                            
                                                    
                                                    </div>
                                                    <!--page item-->
                                            
                                                    <!--page item-->
                                                    <div class="page-item" id="contract">
                                                        contract
                                                    </div>
                                                    <!--page item-->
                                            
                                                    <!--page item-->
                                                    <div class="page-item" id="start">
                                                        start work
                                                    </div>
                                                    <!--page item-->
                                            
                                            
                                            
                                            
                                                </div>
                                            
                                                <!--pages content-->
                                            
                                            
                                            </div>


                                        


                                            



                                        </div>


                                </div>
                                <!--document  content-->

                                    
                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--employment setting-->

    <!--tax setting-->
    <div class="pop-up mont" id="profile-tax">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Profile tax
                                    </div>


                                    <!--tax setting content-->
                                    <div class="tax-setting-content">

                                        <h4 class="content-heading">All information about profile tax.
                                        </h4>

                                        <div class="content">

                                                <table class="table">

                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Tax-ID</th>
                                                                <th>Tax-number</th>
                                                                <th>Tax-ministry</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                                <tr>
                                                                  <th>1</th>
                                                                  <td>DE12100001</td>
                                                                  <td>12/2155/105</td>
                                                                  <td>
                                                                    Oberhausen Süd 
                                                                  </td>
                                                                </tr>

                                                        </tbody>

                                                    


                                                </table>


                                        


                                            



                                        </div>


                                    </div>
                                    <!--tax setting content-->
                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--tax setting-->


    <!--payment setting-->
    <div class="pop-up mont" id="payment">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> payment
                                    </div>


                                    <!--payment setting content-->
                                   <div class="payment-setting-content">

                                        <h4 class="content-heading">Manage your Payment setting.

                                            </h4>

                                        <div class="content">


                                            <div class="data-group heading">
                                                    <label for="">Bank information</label>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="account-owner">account-owner</label>
                                                </div>
                                                <div class="data-input">
                                                     <a href="#" class="" id="emp-account-owner" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                        </a>
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="iban">IBAN</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="emp-account-iban" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>
                                            
                                            <div class="data-group heading">
                                                    <label for="">Billing information</label>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="owner-name">name</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="emp-account-name" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>


                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="birth-date-o">birth date</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" id="birth-date-o"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
                                                </div>
                                            </div>

                                            <div class="data-group">
                                                <div class="data-label">
                                                    <label for="company-o">company</label>
                                                </div>
                                                <div class="data-input">
                                                        <a href="#" class="" id="emp-account-company" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            </a>
                                                </div>
                                            </div>


                                            <div class="data-group grouped">
                                                <div class="data-label">
                                                    <label for="address-o">address</label>
                                                </div>
                                                <div class="data-input ">
                                                    <input id="address-o" type="text" placeholder="Straße / Hausnummer  / Postleitzahl">

                                                    <a href="#" class="grouped" id="street2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            Landsberger Allee
                                                    </a>

                                                    <a href="#" class="grouped" id="street-no2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            B52
                                                    </a>

                                                    <a href="#" class="grouped" id="street-post2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            10249
                                                    </a>

                                                    <a href="#" class="grouped" id="street-city2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            Berlin
                                                    </a>

                                                    
                                                    <br>
                                                    <a href="#" class="grouped" id="street-region2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            region
                                                    </a>
                                                    <br>
                                                    <a href="#" class="grouped" id="street-country2" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                                            country
                                                    </a>



                                                </div>
                                            </div>


                                        


                                            <button class="custom-button custom-button--page">
                                                save
                                            </button>



                                        </div>


                                    </div>
                                    <!--profile setting content-->
                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--payment setting-->

    <!--document setting-->
    <div class="pop-up mont" id="document">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Document
                                    </div>

                                    <!--document  content-->
                                    <div class="document-setting-content">

                                            <h4 class="content-heading">Here all document for you.
                                            </h4>
    
                                            <div class="content">

                                                    <button class="upload-document custom-button custom-button--page">
                                                        upload document
                                                    </button>
    
                                                    <table class="table">

                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Document name</th>
                                                                <th>upload date</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>


                                                        <tbody>
                                                               

                                                                <tr>
                                                                  <th>1</th>
                                                                  <td>Mohamed</td>
                                                                  <td>20-11-2003</td>
                                                                  <td>
                                                                      <a href="#">Download</a>
                                                                  </td>
                                                                </tr>
                                                               
                                                        </tbody>

                                                        


                                                    </table>
    
    
                                            
    
    
                                                
    
    
    
                                            </div>
    
    
                                    </div>
                                    <!--document  content-->



                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--document setting-->

    <!--deacttive setting-->
    <div class="pop-up mont" id="deactivate">


                        <div class="pop-up__container">
            
                            <div class="car-list-pop">
                
                                    <div class="back-to-search">
                                        <i class="fas fa-arrow-left"></i> Deactivate
                                    </div>

                                     <!--document  content-->
                                     <div class="deactive-setting-content">

                                            <h4 class="content-heading">Here you can deactivate account.
                                            </h4>
    
                                            <div class="content">

                                                <span>want to deactivate you account?</span>
                                                <button  class="custom-button custom-button--red">Deactivate</button> 
    
                                                   
    
    
                                            
    
    
                                                
    
    
    
                                            </div>
    
    
                                    </div>
                                    <!--document  content-->
                
                
                                   
                            </div>
            
            
                        </div>
    
    
    
    </div>
    <!--deacttive setting-->

        
            


    <!--popups-->                


    <!--profile header-->
    <div class="profile-header">

        <!--profile image-->
        <div class="profile-image-cont">
            <div class="profile-image">
                <img src="{{asset('phone/images/2.jpg')}}" alt="user-avatar">
                
            </div>

            <div class="edit-button">
                <i class="fas fa-pen"></i>
            </div>
        </div>
        <!--profile image-->

        <!--user space-->
        <div class="user-space">

            <div class="user-name">Mohamed Emad</div>

            <select class="selectpicker" id="selectpicker500" data-live-search="true">
                    <option data-content='<img class="custom-image" src="{{asset('phone/images/avatar.png')}}"/>  Mohamed Emad'>
                    </option>
            </select>
        </div>
        <!--user space-->




    </div>
    <!--profile header-->

    <!--setting item-->
    <div class="setting-item">


        <ul class="setting-list">
            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="profile-setting">
                    <div class="setting-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>

                    <div class="setting-text">
                        profile setting
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="account-setting">
                    <div class="setting-icon">
                        <i class="fas fa-cog"></i>
                    </div>

                    <div class="setting-text">
                        Account setting
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="contact-setting">
                    <div class="setting-icon">
                            <i class="fas fa-link"></i>
                    </div>

                    <div class="setting-text">
                        contact
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="employment-setting">
                    <div class="setting-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>

                    <div class="setting-text">
                        Employment
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <!--setting item-->

    <!--setting item-->
    <div class="setting-item">


        <ul class="setting-list">
            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="profile-tax">
                    <div class="setting-icon">
                        <i class="fas fa-euro-sign"></i>
                    </div>

                    <div class="setting-text">
                        profile tax
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="payment">
                    <div class="setting-icon">
                        <i class="far fa-credit-card"></i>
                    </div>

                    <div class="setting-text">
                        payment
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="document">
                    <div class="setting-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>

                    <div class="setting-text">
                        Document
                    </div>
                </a>
            </li>


            <li class="setting-list-item">
                <a href="" class="setting-list-link" data-popup="deactivate">
                    <div class="setting-icon">
                        <i class="fas fa-power-off"></i>
                    </div>

                    <div class="setting-text">
                        Deactivate
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <!--setting item-->





</div>
<!--profile page-->
@endsection


@section('scripts')


@endsection
