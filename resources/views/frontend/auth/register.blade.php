@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">
<link rel="stylesheet" href="css/register_style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

@include('frontend.auth.register.refusedLocation')
<style>
    .fullHeight{
        height: 100%;
    }
    .reg-section .black-overlay{
        padding-bottom: 3rem;
    }
    .form-group{
        margin-bottom: 1.5rem;
    }
    .reg_space{
        background-color: rgba(0,0,0,.3);
    }
    .reg_space .datepicker{
        width: 100%;
    }
    input[type='submit']{
        width: 100%;
    }
    .login-service-wrapper {
        width: 100%;
        border-top: .1rem solid #757c81;
        display: flex;
        padding: 1.5rem;
        flex-wrap: wrap;
        /* justify-content: space-between; */
    }

    .login-service-message {
        color: #afafaf;
        font-size: 1.2rem;
        text-transform: uppercase;
        min-width: 100%;
        flex: 1 0 100%;
        margin-bottom:1rem;
        text-align: center;
    }

    .login-service-item {
        height: 4.5rem;
        border: 1px solid #dbe2e8 !important;
        padding: 0.75rem 1rem;
        margin-top: .5rem;
        margin-right: .5rem;
        cursor: pointer;
        flex: 1;
        text-decoration: none;

    }

    .login-service-item:hover,
    .login-service-item:focus {
        text-decoration: none;
    }

    .login-service-item-inner {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #757c81;
        font-size:1.6rem;
    }

    .login-service-item i.fab,
    .login-service-item i.fas {
        font-size: 2.35rem;
        margin-right: .5rem;
    }
    .zoomIn,.zoomOut{
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }


    .footer-navgation{
    }

    @media(min-width: 1200px){
        .col-lg-5{
            margin-left: 29.16666665%;
        }
    }
    @media(max-width: 767px){
        .col-sm-4,
        .col-sm-3{
            margin-bottom: 10px;
        }
    }
    @media (min-width: 600px) and (max-width: 767px){
        .form-group .col-sm-3{
            width: 25% !important;
            float: left;
        }
        .form-group .col-sm-4{
            width: 33.33333333% !important;
            float: left;
        }
        .form-group .col-sm-5{
            width: 41.66666667% !important;
            float: left;
        }
        .form-group .col-sm-8{
            width: 66.66666667% !important;
            float: left;
        }
    }
    .custom-style{
        padding-bottom: 0 !important;
        margin-top: 1.5rem !important;
    }

    @media (max-width:600px){
        .custom-style2{
            margin-top: 1rem;
         }
    }

    .datepicker > div{
        display:block;
    }
    .datepicker-dropdown:after{
        top:unset;
    }

    .datepicker-dropdown:before{
        top:unset;
    }
    .reg_space .form-group .ladda-button[disabled]{
      background: rgba(0,0,0,.3);
    }
    .reg_space .form-group .ladda-button[disabled]:hover{
      background: rgba(0,0,0,.3);
      transform: scale(1);
    }
</style>

@if($errors->has('LocationError'))
    <script>
        window.addEventListener('load',function(){
            @foreach ($errors->all() as $error)
                $.notify("Whoops \n"+"{{$error}}",{ position:"top right" ,className:"error"});
            @endforeach
            $('#RefusedLocationModal #countryName').val('{{old('country')}}')
            $('#RefusedLocationModal #city').val('{{old('city')}}'),
            $('#RefusedLocationModal #postal_code').val('{{old('postal')}}')
            var url ='{{route('registerCredential',['service'=>old('service')])}}'
            RefusedLocationPromise().then(function(response){
                url += '?country='+response['country']+'&city='+response['city']
                    +'&postal='+response['postal_code']
                window.location = url;
            })
        })       
    </script>
@endif
<!--login forget space-->
<section class="reg-section">
    <div class="black-overlay">
        <div class="container fullHeight">


            <div class="col-lg-5 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2  col-xs-10 col-xs-offset-1">


                <div class="reg_space rale">
                    <h3 class="reg_heading">{{trans('frontend/auth.join')}}</h3>
                    
                    <form action="" class="reg-form">
                        <div class="row">
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="fname">{{trans('frontend/order.name')}}</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" id="fname" placeholder="{{trans('frontend/auth.fname')}}" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" id="lname" placeholder="{{trans('frontend/auth.lname')}}" required>
                                        </div>
                                    </div>
                        </div>
                        <!--col-->



                        {{-- <div class="row">



                           
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="birth">{{trans('frontend/auth.birth')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="datepicker input-group date">
                                                <input type="text" class=" form-control" id="birth" placeholder="{{trans('frontend/auth.birth')}}" required>
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar
                                                        "></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        </div> --}}
                        <!--col-->

                        <div class="row">

                                    <div class="form-group custom-style2">
                                        <div class="col-sm-4">
                                            <label for="phone">{{trans('frontend/order.phone')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="phone" placeholder="{{trans('frontend/order.phone')}}" required>
                                        </div>
                                    </div>

                        </div>


                        <div class="row">

                            

                                
                       
                                <div class="form-group custom-style2">
                                        <div class="col-sm-4">
                                            <label for="selectpicker">{{trans('frontend/auth.gender')}} / {{trans('frontend/auth.status')}}</label>
                                        </div>
                                        <div class="col-sm-3">
                                            <select class="selectpicker" id="selectpicker">
                                                    <option value="{{trans('frontend/auth.mr')}}">{{trans('frontend/auth.mr')}}</option>
                                                    <option value="{{trans('frontend/auth.mrs')}}">{{trans('frontend/auth.mrs')}}</option>
                                                </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="selectpicker" id="selectpicker2">
                                                <option value="Company">{{trans('frontend/auth.company')}}</option>
                                                <option value="User">{{trans('frontend/auth.user')}}</option>
                                                <option value="Driver">{{trans('frontend/auth.driver')}}</option>
                                                    
                                                </select>
                                        </div>
                                </div>


                                  


                        </div>
                        <!--col-->

                        <div class="row">

                                    <div class="form-group custom-style2">
                                        <div class="col-sm-4">
                                            <label for="email">{{trans('frontend/auth.email')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" id="email" placeholder="{{trans('frontend/auth.email')}}" required>
                                        </div>
                                    </div>

                                </div>

                        <div class="row">

                          
                                    <div class="form-group custom-style2">
                                        <div class="col-sm-4">
                                            <label for="pass">{{trans('frontend/auth.password')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="password" id="pass" placeholder="{{trans('frontend/auth.password')}}" required>
                                        </div>
                                    </div>

                           

                        </div>
                            <!--col-->


                        {{-- <div class="row">

                                    <div class="form-group custom-style2">
                                        <div class="col-sm-4">
                                            <label for="retype">{{trans('frontend/auth.retype')}}</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="password" id="retype" placeholder="{{trans('frontend/auth.retype')}}" required>
                                        </div>
                                    </div>


                        </div> --}}
                          
                        <div class="row col-xs-12" style="margin: 0;margin-bottom: 1rem;margin-top: 1rem;"> 
                            <div class="col-xs-2">
                                <input type="checkbox" name="type" class="icheckbox_flat">  
                            </div>
                            <div class="col-xs-10" style="display: inline-block;padding: 0;color: #FFF;">
                                <label style="display: block;width: 100%;font-weight: 400;font-size: 13px;">{{trans('frontend/auth.agree')}}</label>
                            </div>     

                        </div>  
                       
                        
                        <div class="form-group center-text clearfix custom-style2">
                            <button  class="ladda-button" data-style="expand-right" disabled><span class="ladda-label">{{trans('frontend/auth.create_new')}}</span></button>

                        </div>
                        <!--form group-->
                        <div class="login-service-wrapper">
                            <div class="login-service-message">{{trans('frontend/login.Message')}}</div>
                            <a href="{{route('registerCredential',['service'=>'twitter'])}}" class="login-service-item">
                                <div class="login-service-item-inner">
                                    <i class="fab fa-twitter" style="color:#1da1f2;"></i> {{trans('frontend/login.twitter')}}
                                </div>
                            </a>
                            <a class="login-service-item" href="{{route('registerCredential',['service'=>'google'])}}">
                                <div class="login-service-item-inner">
                                    <i class="fab fa-google-plus" style="color:#d34836;"></i> {{trans('frontend/login.google+')}}
                                </div>
                            </a>
                            <a href="{{route('registerCredential',['service'=>'microsoft'])}}" class="login-service-item">
                                <div class="login-service-item-inner">
                                    <i class="fas fa-cloud" style="color:#007FFF;"></i> {{trans('frontend/login.Mircosoft')}}
                                </div>
                            </a>

                        </div>



                    </form>



                </div>
                <!--reg space-->


            </div>
            <input type="hidden" id="country">
            <input type="hidden" id="town">
            <input type="hidden" id="region">
            <input type="hidden" id="street">
            <input type="hidden" id="home">
            <input type="hidden" id="postal_code">
            <input type="hidden" id="latLng">

        </div>
    </div>
    <!--container-->
</section>
<!--section-->
<!--login forget space-->
    @include('frontend.layouts.partials.footer',['noJquery'=>true])
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/register.js"></script>
<link rel="stylesheet" type="text/css" href="plugins/iCheck/all.css">
<script src="plugins/iCheck/icheck.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places&language={{\App::getLocale()}}"
  type="text/javascript"></script>
<script type="text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function showPosition(position) {
       
        
        var geocoder  = new google.maps.Geocoder();

        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        console.log(latlng);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    $('#latLng').val(latlng.lat()+','+latlng.lng());
                    for (var i=0; i<results[0].address_components.length; i++) {
                        for (var b=0;b<results[0].address_components[i].types.length;b++) {

                            if (results[0].address_components[i].types[0] === "locality") {
                                $('#town').val(results[0].address_components[i].long_name);
                            }
                            if (results[0].address_components[i].types[0] === "administrative_area_level_2") {
                                $('#town').val(results[0].address_components[i].long_name);
                            }
                            if (results[0].address_components[i].types[0] === "administrative_area_level_1") {
                                $('#region').val(results[0].address_components[i].long_name);
                            }
                            if(results[0].address_components[i].types.indexOf('postal_code') > -1) {
                                $('#postal_code').val(results[0].address_components[i].long_name);
                            }
                            if(results[0].address_components[i].types.indexOf('route') > -1) {
                                $('#street').val(results[0].address_components[i].long_name);
                            }
                            if(results[0].address_components[i].types.indexOf('country') > -1) {
                                $('#country').val(results[0].address_components[i].long_name);
                            }
                            if(results[0].address_components[i].types.indexOf('street_number') > -1) {
                                $('#home').val(results[0].address_components[i].long_name);
                            }
                        }
                    }
                }
            }
        }); 

    }
</script>
<script type="text/javascript">
    $(function(){
        getLocation();
        var l = $('.ladda-button').ladda();
        $("input[type=checkbox]").iCheck({
            checkboxClass: 'icheckbox_square-orange',
            radioClass: 'iradio_minimal-orange'
        }); 

        $('input[type=checkbox]').on('ifChecked', function(event){
            $('.ladda-button').removeAttr('disabled');
        });

        $('input[type=checkbox]').on('ifUnchecked', function(event){
            $('.ladda-button').attr('disabled','disabled');
        });
        

        $('.login-service-item').on('click',function(e){
            
            var lat = '';
            var lng = '';
            var MainUrl =$(this).attr('href');
            e.preventDefault();
            
            if (navigator.geolocation) {
                
                navigator.geolocation.getCurrentPosition(function (position) {

                    lat = position.coords.latitude;
                    lng = position.coords.longitude;
                    var geocoder = new google.maps.Geocoder;
                    var myadress = '';
                    var latlng = {
                        lat: lat,
                        lng: lng
                    };
                    geocoder.geocode({
                        'location': latlng
                    }, function (results, status) {
                        if (status === 'OK') {
                            if (results[1]) {
                                // console.log(results[1]);
                                
                                myadress = results[1].formatted_address
                                var url = MainUrl + '?adress=' + myadress;
                                results[1]['address_components'].map(function (element) {
                                    if (element['types'][0] === 'country') {
                                        url = url + '&country=' + element['long_name']
                                    }
                                    if (element['types'][0] === 'administrative_area_level_1') {
                                        url = url + '&city=' + element['long_name']
                                    }
                                })
                                // console.log(results[1])
                                window.location = url;
                            } else {
                                alert('No results found');
                            }
                        }
                    })

                    // alert(lat,lng)
                },function(){
                    var url = MainUrl;

                    RefusedLocationPromise().then(function(response){
                        url += '?country='+response['country']+'&city='+response['city']
                            +'&postal='+response['postal_code']
                        window.location = url;
                    })
                });
            } else {}
            
            
        })
        // window.RefusedLocation = {}
        window.RefusedLocationPromise = function(){
            return new Promise(function(resolve,reject){
                $('#RefusedLocationModal').modal('toggle')
                $('#ValidateAndContinue').click(function(){
                    resolve({
                        'country':$('#RefusedLocationModal #countryName').val(),
                        'city': $('#RefusedLocationModal #city').val(),
                        'postal_code': $('#RefusedLocationModal #postal_code').val(),
                    })
                })
            })
        }
        function testAnim(x) {
                $('.modal .modal-dialog').attr('class', 'modal-dialog  ' + x + '  animated');
        };
        $('.modal').on('show.bs.modal', function (e) {
            
            testAnim('zoomIn');
        })
        $('.modal').on('hide.bs.modal', function (e) {
            
            testAnim('zoomOut');
        })
        $('.ladda-button').on('click',function(e){
            /*$(this).attr("disabled", "disabled");*/
            e.preventDefault();
            e.stopPropagation();
            $('.ladda-button').ladda('start');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/postReg",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'first_name': $('#fname').val(),
                    'last_name': $('#lname').val(),
                    // 'birth_date': $('#profile').val(),
                    'gender': $('#selectpicker option:selected').val(),
                    'status': $('#selectpicker2 option:selected').val(),
                    'phone': $('#phone').val(),
                    'country': $('#country').val(),
                    'address': $('#street').val(),
                    'postal_code': $('#postal_code').val(),
                    'district': $('#town').val(),
                    'region': $('#region').val(),
                    'home': $('#home').val(),
                    'email': $('#email').val(),
                    'password': $('#pass').val(),
                    'location':$('#latLng').val()
                    // 'password_confirmation': $('#retype').val(),
                    
                } ,
                success: function (data) {
                    

                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });    
                        setTimeout(function () {
                                $('.ladda-button').ladda('stop');
                        },2000)
                    }   
                    if(data==1){
                        $.notify("Success \n Registeration is successful.",{ position:"top right" ,className:"success"});
                        setTimeout(function(){
                            window.location.href="{{route('login')}}";
                        },2000);
                        
                    }
                    
                    
                    
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
					setTimeout(function () {
						$('.ladda-button').ladda('stop');
					},2000)
                }

            });
        });

    });

</script>