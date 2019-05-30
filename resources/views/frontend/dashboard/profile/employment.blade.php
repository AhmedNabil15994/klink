@extends('frontend.dashboard.profile.index')
<link rel="stylesheet" href="/css/css/all.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<style>
    @media(max-width:1200px){

        .media-padding-cancel{
            margin-left:unset !important;
            border-top:.1rem solid #c2c2c2;
        }
    }
    @media(max-width:992px){

        .media-padding-cancel2{
            margin-left:unset !important;
            border-top:.1rem solid #c2c2c2;
        }

    }

    @media(max-width:767px){
        .employment .pages-content .right-border{
                border:unset !important;
            }

        .employment .pages-content .top-border{
            border-top:.1rem solid #c2c2c2 !important;
        }

        .custom-font-label .label{
            font-size:1.2rem !important;
        }
        body{overflow-x: hidden;}
        
        #contract div.dataTables_wrapper .row:nth-of-type(2){
            overflow-x: auto;
        }
    }

     @media(min-width:768px){
          
          .employment .pages-content .top-border{
              border-top:.1rem solid #c2c2c2 !important;
          }
      }
        
    .data-button {
        border: none;
        padding: .5rem 2rem;
        border: 0.1rem solid #b9b9b9;
        transition: border .5s;
        border-radius: .3rem;
        margin-top: 2rem;
    }    
    
    .employment .row:last-of-type.pull-right{
        margin: 0;
    }
    #contract div.dataTables_wrapper .dataTables_filter,
    #start div.dataTables_wrapper .dataTables_filter{
        margin-top: 0 !important; 
    }
    #contract div.dataTables_wrapper div.dataTables_length select,
    #start div.dataTables_wrapper div.dataTables_length select{
        padding: .5rem 1rem !important;
    }
    #contract table.table-bordered.dataTable tbody th, 
    #contract table.table-bordered.dataTable tbody td,
    #start table.table-bordered.dataTable tbody th, 
    #start table.table-bordered.dataTable tbody td{
        font-size: 1.4rem;
        font-weight: 100;
    }
    #contract th,
    #start th{
        text-align:  center;
    }
    #contract td i,
    #start td i{
        margin-right: .5rem;
        font-size: 1.6rem;
        color: #01b7f2;
        margin-bottom: .7rem;
    }
    #contract td button,
    #start td button{
        display: block;
        width: 100%;
        margin-bottom: 1rem;
    }
    #contract td button i,
    #start td button i{
        margin: 0; 
        margin-right: .5rem;
        color: #FFF;
    }
    #contract td span.emp_add.pull-left,
    #start td span.emp_add.pull-left{
        width: calc(100% - 2.1rem);
    }
    #contract div.dataTables_wrapper .dataTables_paginate,
    #start div.dataTables_wrapper .dataTables_paginate{
        font-size: 1.3rem;
    }
    div.residency.row{
        margin-right: 0;
        margin-left: 0;
        margin-top: .5rem;
        display: none;
    }
    div.residency.row .custom-label{
        margin-top: .5rem;
    }
    div.nationality{
        border-left: .1rem solid #c2c2c2;
    }
    a#residency_date{
        display: none;
        margin-left: 5rem;
    }
    @keyframes pulse {
        0% {
          transform: scale(1);
        }
        50% {
          transform: scale(1.05);
        }
        100% {
          transform: scale(1);
        }
    }
    .pulse{
        animation : pulse .5s infinite;
        color: #d9534f;
        margin-left: 2rem;
    }
    
</style>
@section('new-content')
<div class="employment">



    <!--pages step-->
    <ul class="pages-step clearfix">

        <li class="pages-step__list active" data-page="information">
            <span class="step-icon">
                <i class="fas fa-user"></i>
            </span>
            <span class="step-text">{{trans('frontend/employment.personal_info')}}</span>
        </li>

        <li class="pages-step__list" data-page="contract">
            <span class="step-icon">
                <i class="fas fa-file-alt"></i>
            </span>
            <span class="step-text">{{trans('frontend/employment.contracts')}}</span>
        </li>

        <li class="pages-step__list" data-page="start">
            <span class="step-icon">
                <i class="fas fa-coffee"></i>
            </span>
            <span class="step-text">{{trans('frontend/employment.start_work')}}</span>
        </li>

    </ul>
    <!--pages step-->


    <!--pages content-->

    <div class="pages-content">
        

        <!--page item-->
        <div class="page-item active" id="information">
            
        
            <!--main row-->
            <div class="row">

                
                <!--personal secttion-->
                
                <div class="col-xs-12">
                    <p class="custom-parag-content bold">
                        {{trans('frontend/employment.personal_info')}}
                    </p>
                </div>

                <!--first row-->
                <div class="col-xs-12">




                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="emp-title right-border">
                                    <label class="label" for="title">{{trans('frontend/employment.title')}}</label>
                                    <label for="remember" class="custom-label">
                                            <input type="radio" name="title" class="custom-check" value ="remember" id="remember" checked>
                                            <span class="custom-span">{{trans('frontend/employment.mr')}}</span>
                                    </label>

                                    <label for="remember2" class="custom-label">
                                            <input type="radio" name="title" class="custom-check" value ="remember" id="remember2">
                                            <span class="custom-span">{{trans('frontend/employment.mrs')}}</span>
                                    </label>

                                    @if(App::getLocale() == 'en')
                                    <label for="remember3" class="custom-label">
                                            <input type="radio" name="title" class="custom-check" value ="remember" id="remember3">
                                            <span class="custom-span">Ms</span>
                                    </label>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                    <label class="label" for="Comfullname">{{trans('frontend/employment.name')}}</label>

                                    <a href="#" id="first_name_em" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                        </a>
                                </div>
                            </div>



                        </div>
                    </div>

                  
                    <div class="data-row">    
                        <div class="row">

                            <div class="col-md-6">
                                <div class="emp-title">
                                    <label class="label" for="title">{{trans('frontend/employment.birth_date')}}</label>
                                    <a href="#" id="empbirthdate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username"></a>
                                
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="nationality custom-padding padding-cancel media-padding-cancel2">
                                    <label class="label" for="Comfullname">{{trans('frontend/employment.nationality')}}</label>

                                    <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                                            
                                            @foreach ($countries as $country)
                                                <option value="{{$country->code}}">{{$country->name}}</option>
                                            @endforeach
                                    </select>

                                    <div class="row residency">
                                        <label class="label" for="Comfullname">{{trans('frontend/employment.residency_no')}}</label>

                                        <a href="#" id="residency_no" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                        </a><br>
                                        
                                        <label for="unlimitted" class="custom-label">
                                            <input type="radio" name="residency" class="custom-check" value ="unlimitted" id="unlimitted" checked>
                                            <span class="custom-span">{{trans('frontend/employment.unlimitted')}}</span>
                                        </label>

                                        <label for="limitted" class="custom-label">
                                            <input type="radio" name="residency" class="custom-check" value ="limitted" id="limitted">
                                            <span class="custom-span">{{trans('frontend/employment.limitted')}}</span>
                                            <a href="#" id="residency_date" data-type="date" data-pk="1" data-url="" data-title="Enter username" class="href">
                                            </a><br>
                                        </label>

                                        <p class="p_info"></p>

                                    </div>
                                    
                                </div>
                            </div>



                        </div>
                    </div>


                    <div class="data-row">    
                        <div class="row">

                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="emp-title right-border">
                                    <label class="label" for="selectpicker620">{{trans('frontend/employment.birth_place')}}</label>
                                    
                                    <a href="#" id="empbirthplace"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="fullname custom-padding padding-cancel">
                                    <label class="label" for="Comfullname">{{trans('frontend/employment.martial')}}</label>

                                    <select class="selectpicker href" id="selectpicker630" data-live-search="true">
                                            <option>{{trans('frontend/employment.married')}} </option>
                                            <option>{{trans('frontend/employment.single')}}</option>
                                    </select>
                                    
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4">
                                <div class="passport_number custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="passport_number">{{trans('frontend/employment.passport_number')}}</label>

                                    <a href="#" id="passport_number" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                        </a>
                                    
                                </div>
                            </div>    


                        </div>
                    </div>


                    <div class="data-row">    
                        <div class="row">

                            <div class="col-lg-4 col-md-4">
                                <div class="emp-title right-border">
                                    <label class="label">E-Mail</label>
                                    
                                    <a href="#" id="empemail" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="empmobile">{{trans('frontend/employment.mobile_number')}}</label>

                                    <a href="#" id="empmobile" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                        </a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="card_number custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="card_number">{{trans('frontend/employment.card_number')}}</label>

                                    <a href="#" id="card_number" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
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
                            {{trans('frontend/employment.res_add')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border">
                                    <label class="label" for="land">{{trans('frontend/employment.address')}} / {{trans('frontend/employment.home')}}
                                    </label>
                                    <a href="#" id="land" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">
                                    </a> 
                                    / <a href="#" id="home" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name"></a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="comempcity">{{trans('frontend/employment.postal_code')}} / {{trans('frontend/employment.city')}}</label>

                                    <a href="#" id="comemppostal" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                    </a>
                                    / <a href="#" id="comempcity" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                    <label class="label" for="ComCountry">{{trans('frontend/employment.country')}}</label>

                                    <a href="#" id="ComCountry" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                    </a>
                                    
                                </div>
                            </div>



                        </div>
                    </div>



                </div>
                <!--second row-->

                <!--residental secttion-->



                <!--Employment secttion-->

                <div class="col-xs-12">
                    <p class="custom-parag-content bold">
                        {{trans('frontend/employment.employment')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border">
                                    <label class="label" for="comJobTitle">{{trans('frontend/employment.job_title')}}
                                    </label>
                                    <a href="#" id="comJobTitle" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">
                                    

                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="comEntryDate">{{trans('frontend/employment.entry_date')}}</label>

                                    <a href="#" id="comEntryDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username"></a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel">
                                        <label class="label" for="fcomEntryDate">{{trans('frontend/employment.first_entry_date')}}</label>

                                        <a href="#" id="fcomEntryDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                            </div>



                        </div>

                    </div>



                </div>
                <!--second row-->



                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row">    
                        <div class="row">

                            <div class="col-md-5">
                                <div class="work-time right-border">
                                    <label class="label" for="comJobTitle">{{trans('frontend/employment.weekly_work_time')}}
                                    </label>


                                    <label for="Part" class="custom-label">
                                            <input type="radio" name="time" class="custom-check" value ="remember" id="Part" checked>
                                            <span class="custom-span">{{trans('frontend/employment.part')}}</span>
                                    </label>

                                    <label for="full" class="custom-label">
                                            <input type="radio" name="time" class="custom-check" value ="remember" id="full">
                                            <span class="custom-span">{{trans('frontend/employment.full')}}</span>
                                    </label>

                                    
                                
                                
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="fullname custom-padding  padding-cancel media-padding-cancel">
                                    <label class="label" for="comEntryDate">{{trans('frontend/employment.school_degree')}}</label>

                                    <select class="selectpicker href" id="selectpicker612">
                                            <option>{{trans('frontend/employment.without_degree')}}</option>
                                            <option>{{trans('frontend/employment.main_degree')}}</option>
                                            <option>{{trans('frontend/employment.middle_degree')}}</option>
                                            <option>{{trans('frontend/employment.high_degree')}}</option>

                                    </select>
                                    
                                </div>
                            </div>




                        </div>
                    </div>



                </div>
                <!--second row-->



                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row">    
                        <div class="row">



                        

                            <div class="col-sm-12">
                                <div class="fullname custom-padding  ">
                                    <label class="label" for="comEntryDate">{{trans('frontend/employment.vocational_education')}}
                                        </label>

                                    <select class="selectpicker href" id="selectpicker613">
                                            <option>{{trans('frontend/employment.without_vocational')}}</option>
                                            <option>{{trans('frontend/employment.recognized_vocational')}}</option>
                                            <option>{{trans('frontend/employment.master_vocational')}}</option>
                                            <option>{{trans('frontend/employment.bachelor')}}</option>
                                            <option>{{trans('frontend/employment.diplom')}}</option>
                                    </select>
                                    
                                </div>
                            </div>


                            
                        



                        </div>
                    </div>



                </div>
                <!--second row-->



                <!--second row-->
                <div class="col-xs-12">


                        <div class="data-row">    
                            <div class="row">

                            
                                <div class="col-md-6">
                                    <div class="fullname custom-padding right-border">
                                        <label class="label" for="comstartT">{{trans('frontend/employment.start_training')}}:
                                            </label>

                                        <a href="#" id="comstartT"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                            <div class="col-md-6">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                        <label class="label" for="comendT">{{trans('frontend/employment.end_training')}}:
                                            </label>

                                        <a href="#" id="comendT"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
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
                        {{trans('frontend/employment.tax_info')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border">
                                    <label class="label" for="land">{{trans('frontend/employment.identify_no')}}
                                    </label>
                                    <a href="#" id="ident" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">

                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border">
                                    <label class="label" for="comempcity">{{trans('frontend/employment.office_no')}}</label>

                                    <a href="#" id="officeno" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href"> 
                                        </a>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                    <label class="label" for="ComCountry">{{trans('frontend/employment.bracket_factor')}}
                                        </label>

                                    <a href="#" id="taxbrack" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                        </a>
                                    
                                </div>
                            </div>



                        </div>
                    </div>



                    <div class="data-row">    
                            <div class="row">

                            
                                <div class="col-md-6 col-lg-4">
                                    <div class="fullname custom-padding right-border">
                                        <label class="label" for="taxchild">{{trans('frontend/employment.child_allow')}}
                                            </label>

                                        <a href="#" id="taxchild"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel2 right-border">
                                        <label class="label" for="denomin">{{trans('frontend/employment.denomination')}}
                                            </label>

                                        <a href="#" id="denomin"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-4">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel2">
                                        <label class="label" for="pensions_no">{{trans('frontend/employment.pensions_no')}}
                                            </label>

                                        <a href="#" id="pensions_no"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
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
                        {{trans('frontend/employment.social_insurance')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border">
                                    <label class="label" for="lawins">{{trans('frontend/employment.social_law')}}

                                    </label>
                                    <a href="#" id="lawins" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">

                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="fullname custom-padding right-border padding-cancel media-padding-cancel2 top-border parenthood">
                                    <label class="label" for="comempcity">{{trans('frontend/employment.parenthood')}}</label>

                                    <label for="remember5" class="custom-label">
                                            <input type="radio" name="parenthood" class="custom-check" data-val="1" value ="remember" id="remember5" checked>
                                            <span class="custom-span" >{{trans('frontend/employment.yes')}}</span>
                                    </label>

                                    <label for="remember6" class="custom-label">
                                            <input type="radio" name="parenthood" class="custom-check" data-val="0" value ="remember" id="remember6">
                                            <span class="custom-span">{{trans('frontend/employment.no')}}</span>
                                    </label>
                                    
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
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

                            
                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding right-border">
                                        <label class="label" for="RV">RV
                                            </label>

                                        <a href="#" id="RV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel2 right-border">
                                        <label class="label" for="AV">AV
                                            </label>

                                        <a href="#" id="AV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding padding-cancel media-padding-cancel2">
                                        <label class="label" for="KV2">KV2
                                            </label>

                                        <a href="#" id="KV2"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                            </div>
                    </div>


                    <div class="data-row">    
                            <div class="row">

                            
                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding right-border">
                                        <label class="label" for="PV">PV
                                            </label>

                                        <a href="#" id="PV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding  padding-cancel media-padding-cancel2 right-border">
                                        <label class="label" for="UV">UV - {{trans('frontend/employment.dangerous')}}
                                            </label>

                                        <a href="#" id="UV"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="fullname custom-padding padding-cancel media-padding-cancel2">
                                        <label class="label" for="health_insurance_company">{{trans('frontend/employment.health_insurance_company')}}</label>

                                        <a href="#" id="health_insurance_company"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
                                            
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
                        {{trans('frontend/employment.paper_info')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12 custom-font-label">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-xs-12">
                                    <div class="fullname emp_contract custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.emp_contract')}}</label>
        
                                            <label for="remember7" class="custom-label">
                                                    <input type="radio" name="contract" class="custom-check" value ="remember" id="remember7" data-val="1" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember8" class="custom-label">
                                                    <input type="radio" name="contract" class="custom-check" data-val="0" value ="remember" id="remember8">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="fullname tax_deduction custom-padding right-border  media-padding-cancel2 top-border">
                                    <label class="label" for="comempcity">{{trans('frontend/employment.tax_deduction')}}</label>

                                    <label for="remember9" class="custom-label">
                                            <input type="radio" name="cer" class="custom-check" data-val="1" value ="remember" id="remember9" checked>
                                            <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                    </label>

                                    <label for="remember10" class="custom-label">
                                            <input type="radio" name="cer" class="custom-check" data-val="0" value ="remember" id="remember10">
                                            <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                    </label>
                                    
                                </div>
                            </div>

                            <div class="col-xs-12">
                                    <div class="fullname sv_id custom-padding right-border  media-padding-cancel2 top-border">
                                        <label class="label" for="comempcity">SV-ID
                                            </label>

                                        <label for="remember11" class="custom-label">
                                                <input type="radio" name="SV" class="custom-check" data-val="1" value ="remember" id="remember11" checked>
                                                <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                        </label>

                                        <label for="remember12" class="custom-label">
                                                <input type="radio" name="SV" class="custom-check" data-val="0" value ="remember" id="remember12">
                                                <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                        </label>
                                        
                                    </div>
                            </div>


                        </div>
                    </div>


                    <div class="data-row">    
                        <div class="row">

                            <div class="col-xs-12">
                                    <div class="fullname insuarance_company custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.insurance_company')}}
                                                    </label>
        
                                            <label for="remember13" class="custom-label">
                                                    <input type="radio" name="public" class="custom-check" data-val="1" value ="remember" id="remember13" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember14" class="custom-label">
                                                    <input type="radio" name="public" class="custom-check" data-val="0" value ="remember" id="remember14">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>


                            <div class="col-xs-12">
                                    <div class="fullname private_insurance custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.private_insurance')}}
                                                    </label>
        
                                            <label for="remember15" class="custom-label">
                                                    <input type="radio" name="private" class="custom-check" data-val="1" value ="remember" id="remember15" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember16" class="custom-label">
                                                    <input type="radio" name="private" class="custom-check" data-val="0" value ="remember" id="remember16">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>


                            <div class="col-xs-12">
                                    <div class="fullname proof_parent custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.proof_parent')}}
                                            </label>
        
                                            <label for="remember17" class="custom-label">
                                                    <input type="radio" name="proof" class="custom-check" value ="remember" id="remember17" data-val="1" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember18" class="custom-label">
                                                    <input type="radio" name="proof" class="custom-check" data-val="0" value ="remember" id="remember18">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>

                            <div class="col-xs-12">
                                    <div class="fullname pensions custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.pensions')}}

                                            </label>
        
                                            <label for="remember19" class="custom-label">
                                                    <input type="radio" name="pensions" class="custom-check" value ="remember" id="remember19" data-val="1" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember20" class="custom-label">
                                                    <input type="radio" name="pensions" class="custom-check" data-val="0" value ="remember" id="remember20">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>

                            <div class="col-xs-12">
                                    <div class="fullname painter custom-padding right-border  media-padding-cancel2 top-border">
                                            <label class="label" for="comempcity">{{trans('frontend/employment.painter')}}
                                            </label>
        
                                            <label for="remember21" class="custom-label">
                                                    <input type="radio" name="doc" class="custom-check" value ="remember" id="remember21" data-val="1" checked>
                                                    <span class="custom-span" >{{trans('frontend/employment.available')}}</span>
                                            </label>

                                            <label for="remember22" class="custom-label">
                                                    <input type="radio" name="doc" class="custom-check" value ="remember" id="remember22" data-val="0">
                                                    <span class="custom-span">{{trans('frontend/employment.not_available')}}</span>
                                            </label>
                                            
                                        </div>
                            </div>

                        


                        </div>
                    </div>




                



                </div>
                <!--second row-->

                <!--work paper secttion-->



                <!--social insuarance secttion-->
                
                 <div class="col-xs-12">
                    <p class="custom-parag-content bold">
                        {{trans('frontend/employment.bank_account')}}
                    </p>
                </div>

                <!--second row-->
                <div class="col-xs-12">


                    <div class="data-row first">    
                        <div class="row">

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border">
                                    <label class="label" for="bankN">{{trans('frontend/employment.bank_name')}}

                                    </label>
                                    <a href="#" id="bankN" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">

                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="emp-title right-border padding-cancel">
                                    <label class="label" for="bankA">{{trans('frontend/employment.account_owner')}}

                                    </label>
                                    <a href="#" id="bankA" data-type="text" data-pk="1" data-url="" data-title="Enter user
                                    name" class="href">

                                    </a>
                                
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12">
                                <div class="fullname custom-padding padding-cancel media-padding-cancel">
                                    <label class="label" for="IBANN">{{trans('frontend/employment.iban')}}
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


            <div class="row pull-right">
                <button class="data-button save ladda-button" data-style="expand-right"><i class="fa fa-save"></i> {{trans('frontend/dashboard.save')}}</button>
            </div>
            
        </div>
        <!--page item-->

        <!--page item-->
        <div class="page-item" id="contract">
            <table class="table table-striped table-bordered" id="demo-foo-filtering">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="emp_name">{{trans('frontend/employment.employee')}}</th>
                        <th>{{trans('frontend/employment.start_training')}}</th>
                        <th>{{trans('frontend/employment.end_training')}}</th>
                        <th>{{ trans('backend/user.action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($data as $employee )
                    @if($employee->emp_contract->started != 1)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <i class="fas fa-user-tie"></i>{{$employee->name}}<br>
                            <i class="fas fa-phone"></i>{{$employee->mobile_number}}<br>
                            <i class="fas fa-map-marker-alt pull-left"></i> 
                            <span class="pull-left emp_add">
                                {{$employee->emp_address->address .' '.$employee->emp_address->home}}<br>
                                {{$employee->emp_address->postal_code .' '.$employee->emp_address->city}}<br>
                                {{$employee->emp_address->country}}
                            </span>
                            <div class="clearfix"></div>
                        </td>
                        <td class="text-center">{{$employee->emp_employment->start_training}}</td>
                        <td class="text-center">{{$employee->emp_employment->end_training}}</td>
                        <td>
                            @if($employee->emp_contract->accepted != 1)
                            <button class="btn btn-xs btn-primary print" value="{{$employee->id}}">
                                <i class="fa fa-print"></i>{{ trans('frontend/employment.print') }}
                            </button>    
                            <button class="btn btn-xs btn-info accept" value="{{$employee->id}}">
                                <i class="fa fa-check"></i>{{ trans('frontend/employment.accept') }}
                            </button>           
                            @else
                            <button class="btn btn-xs btn-success start" value="{{$employee->id}}">
                                <i class="fa fa-edit"></i>{{ trans('frontend/employment.start_work') }}
                            </button>   
                            @endif
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>    
                
            </table>
        </div>
        <!--page item-->

        <!--page item-->
        <div class="page-item" id="start">
            <table class="table table-striped table-bordered" id="demo-foo-filtering2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th class="emp_name">{{trans('frontend/employment.employee')}}</th>
                        <th>{{trans('frontend/employment.start_training')}}/th>
                        <th>{{trans('frontend/employment.end_training')}}</th>
                        <th>{{ trans('backend/user.action') }}</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 0; ?>
                    @foreach ($data as $employee )
                    @if($employee->emp_contract->started == 1 )
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <i class="fas fa-user-tie"></i>{{$employee->name}}<br>
                                <i class="fas fa-phone"></i>{{$employee->mobile_number}}<br>
                                <i class="fas fa-map-marker-alt pull-left"></i> 
                                <span class="pull-left emp_add">
                                    {{$employee->emp_address->address .' '.$employee->emp_address->home}}<br>
                                    {{$employee->emp_address->postal_code .' '.$employee->emp_address->city}}<br>
                                    {{$employee->emp_address->country}}
                                </span>
                                <div class="clearfix"></div>
                            </td>
                            <td class="text-center">{{$employee->emp_employment->start_training}}</td>
                            <td class="text-center">{{$employee->emp_employment->end_training}}</td>
                            <td>
                                <button class="btn btn-xs btn-primary view" value="{{$employee->id}}">
                                    <i class="fa fa-eye"></i>{{ trans('frontend/employment.view') }}
                                </button>    
                            </td>
                        </tr>
                    @endif    
                    @endforeach
                </tbody>    
                
            </table>
        </div>
        <!--page item-->




    </div>

    <!--pages content-->
    
    

</div>






@endsection 

@section('scripts')
<script>
    $(function(){
        $('#demo-foo-filtering,#demo-foo-filtering2').DataTable({
            "pageLength":10
        });

        $(document).on('change','#selectpicker610',function(){
            if($(this).val() != 'DE'){
                $('div.row.residency').slideDown(500);
            }else{
                $('div.row.residency').slideUp(500);
            }
        });

         $(document).on('click',$('.nationality input[name="residency"]'),function(){
            var value = $('.nationality input[name="residency"]:checked').val();
            if(value == 'limitted'){
                $('a#residency_date').fadeIn(500);
                $('#residency_date').editable({
                    mode: 'inline',
                    format  :'yyyy-mm-dd',
                    viewformat: 'dd-mm-yyyy',
                    datepicker  :{
                        container : '#residency_date',
                        autoclose : 'true'
                    },
                    success:function(response,newValue){
                        if(new Date() >= newValue){
                            $('p.p_info').html('{{trans('frontend/employment.residency_over')}}')
                            $('p.p_info').addClass('pulse');
                        }
                    },
                  
                });
            }else{
                $('a#residency_date').fadeOut(500);

            }
        });

        $('.ladda-button').ladda();
        $('.data-button.save').on('click',function(){

            // Employee
            var emp_title = $('.emp-title input[type="radio"]:checked').siblings('span.custom-span').text() ;
            var emp_name = $('.fullname a#first_name_em').text();
            var birth_date = $('a#empbirthdate').text();
            var birth_place = $('a#empbirthplace').text();
            var nationality = $('select#selectpicker610 option:selected').val();
            var status = $('select#selectpicker630 option:selected').val();    
            var email = $('a#empemail').text();
            var mobile_number = $('a#empmobile').text();
            var card_number = $('a#card_number').text();
            var passport_number = $('a#passport_number').text();
            var residency_no = $('a#residency_no').text();
            var residency_date = $('a#residency_date').text();
            var residency_type = $('.nationality input[type="radio"]:checked').siblings('span.custom-span').text() ;

            // Employee Address
            var address = $('a#land').text();
            var home = $('a#home').text();
            var postal_code = $('a#comemppostal').text();
            var city = $('a#comempcity').text();
            var country = $('a#ComCountry').text();

            // Employee Employment
            var job_title = $('a#comJobTitle').text();
            var entry_date = $('a#comEntryDate').text();
            var first_entry_date = $('a#fcomEntryDate').text();
            var work_time = $('.work-time input[type="radio"]:checked').siblings('span.custom-span').text();
            var degree = $('select#selectpicker612 option:selected').text();    
            var vocational = $('select#selectpicker613 option:selected').text();    
            var start_training = $('a#comstartT').text();
            var end_training = $('a#comendT').text();

            // Employee Taxes
            var id_number = $('a#ident').text();
            var office_no = $('a#officeno').text();
            var pensions_no = $('a#pensions_no').text();
            var bracket_factor = $('a#taxbrack').text();
            var child_allow = $('a#taxchild').text();
            var denomination = $('a#denomin').text();

            // Employee Social Insurance
            var social_law = $('a#lawins').text();
            var parenthood = $('.parenthood input[type="radio"]:checked').data('val');
            var kv = $('a#KV').text();
            var kv2 = $('a#KV2').text();
            var health_insurance_company = $('a#health_insurance_company').text();
            var rv = $('a#RV').text();
            var av = $('a#AV').text();
            var pv = $('a#PV').text();
            var uv = $('a#UV').text();

            // Employee Papers
            var emp_contact = $('.emp_contract input[type="radio"]:checked').data('val');
            var tax_deduction = $('.tax_deduction input[type="radio"]:checked').data('val');
            var sv_id = $('.sv_id input[type="radio"]:checked').data('val');
            var insurance_company = $('.insuarance_company input[type="radio"]:checked').data('val');
            var private_insurance = $('.private_insurance input[type="radio"]:checked').data('val');
            var proof_parent = $('.proof_parent input[type="radio"]:checked').data('val');
            var pensions = $('.pensions input[type="radio"]:checked').data('val');
            var painter = $('.painter input[type="radio"]:checked').data('val');

            // Employee Banks
            var bank_name = $('a#bankN').text();
            var account_owner = $('a#bankA').text();
            var iban = $('a#IBANN').text();
            

            $('.ladda-button').ladda('start');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.new_emp')}}",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),

                    // Employee
                    'emp_title': emp_title,
                    'emp_name': emp_name,
                    'birth_date': birth_date,
                    'nationality': nationality,
                    'birth_place': birth_place,
                    'status': status,
                    'email': email,
                    'mobile_number': mobile_number,
                    'card_number': card_number,
                    'passport_number': passport_number,
                    'residency_no': residency_no,
                    'residency_date': residency_date,
                    'residency_type': residency_type,

                    // Employee Address
                    'address': address,
                    'home': home,
                    'city': city,
                    'postal_code': postal_code,
                    'country': country,

                    // Employee Employment
                    'job_title': job_title,
                    'entry_date': entry_date,
                    'first_entry_date': first_entry_date,
                    'work_time': work_time,
                    'degree': degree,
                    'vocational': vocational,
                    'start_training': start_training,
                    'end_training': end_training,

                    // Employee Taxes
                    'id_number': id_number,
                    'office_no': office_no,
                    'pensions_no': pensions_no,
                    'bracket_factor': bracket_factor,
                    'child_allow': child_allow,
                    'denomination': denomination,

                    // Employee Social Insurance
                    'social_law': social_law,
                    'parenthood': parenthood,
                    'kv': kv,
                    'kv2': kv2,
                    'health_insurance_company':health_insurance_company,
                    'rv': rv,
                    'av': av,
                    'pv': pv,
                    'uv': uv,

                    // Employee Papers
                    'emp_contact': emp_contact,
                    'tax_deduction': tax_deduction,
                    'sv_id': sv_id,
                    'insurance_company': insurance_company,
                    'private_insurance': private_insurance,
                    'proof_parent': proof_parent,
                    'pensions': pensions,
                    'painter': painter,

                    // Employee Banks
                    'bank_name': bank_name,
                    'account_owner': account_owner,
                    'iban': iban,
                } ,
                success: function (data) {
                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        },2000);      
                    }else{  
                        $.notify("Success \n Employee Saved Successfully",{ position:"top right" ,className:"success"});
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        },2000);  
                    }
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000);
                }
    
            });         
        });

        $(document).on('click','#contract .btn-primary.print',function(){
            var id = $(this).attr('value');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.emp_print',['emp_id'=>'id'])}}".replace('id',id),
                type: 'GET',
                success: function (data) { 
                    $('body').append('<iframe id="printf" style="display:none;" name="printf"></iframe>');
                    $('#printf').contents().find('body').append(data);
                     window.frames["printf"].focus();
                     window.frames["printf"].print();       
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }
    
            });      
        });

        $(document).on('click','#contract .btn-info.accept',function(){
            var id = $(this).attr('value');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.emp_accept')}}",
                type: 'POST',
                data:{
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                },
                success: function (data) { 
                     if(data == 1){
                        $.notify("Success \n Contract Accepted Successfully",{ position:"top right" ,className:"success"});
                        setTimeout(function () {
                            window.location.reload();
                        },2000); 
                     }
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }
    
            });      
        });

        $(document).on('click','#contract .btn-success.start',function(){
            var id = $(this).attr('value');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.emp_start')}}",
                type: 'POST',
                data:{
                    '_token': $('input[name="_token"]').val(),
                    'id': id,
                },
                success: function (data) { 
                     if(data == 1){
                        $.notify("Success \n Employee Started Work Successfully",{ position:"top right" ,className:"success"});
                        setTimeout(function () {
                            window.location.reload();
                        },2000); 
                     }
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }
    
            });      
        });

    });

</script>
@endsection