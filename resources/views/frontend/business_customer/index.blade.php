@include('frontend.layouts.partials.nav')
<link href="{{asset('css/number.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/main_order.css">
<link rel="stylesheet" href="css/login_style.css">
<link rel="stylesheet" href="css/plugins/date/jquery.datetimepicker.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
 


<style type="text/css">
    .det_icons .glyphicon{
        left: .09rem;
        color:#FFF;
    }
    .row.select_test{
        width: 80%;
        display: block;
        margin: auto;
        margin-top: 10px;
    }
    .myNumberFont{
        font-size: 1.8rem;
    }   

    .notifyjs-corner{
        padding:1rem;
        font-size:1.5rem;
    }
    body{
        background-color: #FFF; 
    }
    .one,.more{
    	border-radius: .5rem;
    	border: .1rem solid #DDD;
    	padding-top: 1rem;
    	padding-left: 0;
    	padding-right: 0;
    	margin-left: 1.5rem;
    }
    .map-input .fa-check{
        display:none;
    }
    .map-input.valid-location .fa-check{
        display:block;
        color:#98b71b !important;
    }

    .map-input.valid-location .fa-home,
    .map-input.valid-location .fa-location-arrow{
        display:none;
    }
    .map-input.valid-location input{
        border-color:#98b71b;
    }
    .map-input i.fa {
	    position: absolute;
	    top: 1rem;
	    left: 2.3rem;
	    z-index: 10;
	    color: #f6ab36;
	    font-size: 1.5rem;
	}
	.map-input .form-control.padder{
		padding-left: 2.5rem !important;
	}
  	.measurments .custom-input-order{
  		width: 30%;
  		display: inline-block;
  		margin-right: 3.5%;
  	}
  	.measurments .custom-input-order:last-of-type{
  		margin-right: 0;
  	}
	.appendable{
		display: none;
	}
</style>

<style type="text/css">

    .content{
        position: relative;
        margin-bottom: 5rem;
    }
    .test{
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #FFF;
        opacity: .7;
    }
    .test img{
        width: 8rem;
        height: 8rem;
        display: block;
        margin: auto;
        margin-top: 20%;
    }
    .loc{
        list-style-type: none;
        padding: 0;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }
    .loc_list{
        padding: 0;
        margin-top: 1rem;
    }
    .glyphicon-map-marker:before,
    .glyphicon-send:before,
    .glyphicon-road:before,
    .icon_time.glyphicon-time:before,
    .glyphicon-euro:before{
        font-size: 2.8rem;
        color: #FFF;
    }

    .glyphicon-map-marker:before, .glyphicon-send:before{
        color:#a0a0a0;
    }
    .loc_det{
        position: absolute;
        margin-top: .5rem;
        margin-left: .5rem;
        display: inline-block;
        color: #888;
        font-weight: bold;
        font-size:1.4rem;
    }
    .det_icons{
        display: inline-block;
        width: 5rem;
        height: 5rem;
        border-radius: 50%;
        border:.1rem solid #FFF;
        margin-bottom: 1.5rem;
        padding: 1rem;
        -webkit-transition: all ease-in-out .25s;
        -moz-transition: all ease-in-out .25s;
        -o-transition: all ease-in-out .25s;
        transition: all ease-in-out .25s;
    }
    .det_icons:hover{
        background-color:#FFF;
        border:.1rem solid #DDD; 
    }
    .det_icons:hover .glyphicon:before{
        color: #98b71b;
    }
    .row .col-md-4:last-of-type .det_icons{
        padding-left: .8rem;
    }
    .det_det{
        position: absolute;
        margin-top: 1.5rem;
        margin-left: 1rem;
        font-weight: 600;
        color: #777;
        font-size: 1.5rem;
        color:#FFF;
    }
    .cargo{
        width: 22rem !important;
    }
    .accept.active{
        border-bottom: .1rem solid #f6ab36
    }
    .log_space .form-group .custom-span::before{
        top: -2.4rem;
        left: -2.7rem;
        font-size: 2rem;
    }
    .content .step__five .compelete-button:disabled{
        background-color: #838383;
    }
    @media ( min-width: 300px) and ( max-width: 580px ){
        .row .det_details{
            text-align: center;
        }
        .det_icons{
            display: block;
            margin: auto;
            margin-bottom: .5rem;
        }
        .det_det{
            position: unset;
            display: block;
            margin-top: 0;
            margin-bottom: 1rem;
        }
    }
    @media ( min-width: 580px ) and ( max-width: 767px ){
        .row .det_details{
            width: 50%;
            float: left;
        }
        .loc_list{
            width: 50%;
            float: left;
        }
    }
    @media ( min-width: 768px) and ( max-width: 991px ){
        .image-delv img{
            width: 30%;
            display: block;
            margin: auto;
        }
    }
    @media ( min-width: 991px ){
        #cal{
            margin-top: 8rem !important;
        }
    }
    @media ( min-width: 300px) and ( max-width: 561px ){
        .content .step__one h3.car.car1:after{
            top: 120%;
        }
    }

</style>

<div class="container">

    <div class="fullHeight">
        <!--step list-->
        

        <!--steplist-->
            
        <div class="content rale">

            <div class="step__one step_item first active" data-list="step_list_1">

                <div class="row">

                    <div class="col-md-3">
                        <div class="image-delv">
                            <img src="./images/delivery-img.png" alt="delivery">
                        </div>
                    </div><!--col-->

                    <div class="col-md-9">
                        <div class="calc_space"> 
                            <div class="col-md-8">
                            	<div class="row">
                            		<div class="col-xs-12">
                            			<fieldset>
										    <legend>{{trans('frontend/order.select_type')}}: </legend>
										    <label for="radio-1">{{trans('frontend/order.one_trip')}}</label>
										    <input type="radio" name="radio-1" id="radio-1" checked>
										    <label for="radio-2">{{trans('frontend/order.more_trip')}}</label>
										    <input type="radio" name="radio-1" id="radio-2">
										</fieldset>
                            		</div>
									
									<div class="col-xs-12 one">

										<div class="map-input col-md-12 form-group col-12 padding-zero rale"> 

	                                      <i class="fa fa-home"></i>
	                                      <i class="fa fa-check"></i>
	                                      <input class="form-control padder" type="text" name="from" id="from" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt">
	                                    </div>
	                                    
	                                    <div class="map-input col-md-12 form-group col-12 padding-zero rale"> 
	                                      <i class="fa fa-location-arrow"></i>
	                                      <i class="fa fa-check"></i>

	                                      <input class="form-control padder" type="text" name="to" id="to" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt">

	                                    </div>


	                                    <div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="width">{{trans('frontend/order.weight')}} (Kg) :</label>          
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <input type="text" min="0" id="weight" id="weight"  placeholder="{{trans('frontend/order.weight')}} (Kg)" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="NUM">{{trans('frontend/order.freights')}} :</label>      
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <input min="0" type="text" id="items" name="items" placeholder="Freights" required>
                                                        
                                                 </div>
                                            </div>
                                        </div><!--input group-->


                                        <div class="input__group col-xs-12 measurments">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="width2">{{trans('frontend/order.total')}} (cm):</label>          
                                                </div>
                                                <div class="col-sm-8">
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="length" name="length" placeholder="{{trans('frontend/order.length')}}" required>
	                                                </div>
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="width" name="width" placeholder="{{trans('frontend/order.width')}}" required>
	                                                </div>
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="height" name="height" placeholder="{{trans('frontend/order.height')}}" required>
	                                                 </div>
	                                            </div>    
                                            </div>
                                        </div><!--input group-->

										<div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="description">{{trans('frontend/order.desc')}} :</label>          
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <textarea name="description" id="description" required placeholder="{{trans('frontend/order.desc')}}"></textarea>
                                                </div>
                                            </div>
                                        </div>
									</div>

									<div class="col-xs-12 hidden more">
										<div class="map-input col-md-12 form-group col-12 padding-zero rale"> 

	                                      <i class="fa fa-home"></i>
	                                      <i class="fa fa-check"></i>
	                                      <input class="form-control padder" type="text" name="from" id="from2" value="" placeholder="Straße / Hausnummer / Postleitzahl / Stadt">
	                                    </div>
	                                    
	                                    

										<div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="NUM">{{trans('frontend/order.freights')}} :</label>      
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <input min="0" type="text" id="items2" name="items" placeholder="Freights" required>
                                                        
                                                </div>
                                            </div>
                                        </div><!--input group-->
										
										<div class="input__group col-xs-12 appendable">
											
										</div>

	                                    <div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="width">{{trans('frontend/order.weight')}} (Kg) :</label>          
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <input type="text" min="0" id="weight2"  placeholder="{{trans('frontend/order.weight')}} (Kg)" required>
                                                </div>
                                            </div>
                                        </div><!--input group-->

                                        <div class="input__group col-xs-12 measurments">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="width2">{{trans('frontend/order.total')}} (cm):</label>          
                                                </div>
                                                <div class="col-sm-8">
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="length2" name="length" placeholder="{{trans('frontend/order.length')}}" required>
	                                                </div>
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="width2" name="width" placeholder="{{trans('frontend/order.width')}}" required>
	                                                </div>
	                                                <div class="custom-input-order">
	                                                    <span class="icon fa fa-check"></span>
	                                                    <input min="0" type="text" id="height2" name="height" placeholder="{{trans('frontend/order.height')}}" required>
	                                                 </div>
	                                            </div>    
                                            </div>
                                        </div><!--input group-->

										<div class="input__group col-xs-12">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="description">{{trans('frontend/order.desc')}} :</label>          
                                                </div>
                                                <div class="col-sm-8 custom-input-order">
                                                    <span class="icon fa fa-check"></span>
                                                    <textarea name="description" id="description2" required placeholder="{{trans('frontend/order.desc')}}"></textarea>
                                                </div>
                                            </div>
                                        </div> 
									</div>
	

                            	</div>
                            </div><!--form col-->

                            <div class="col-md-4 car-loads"></div>

                        </div><!--internal row-->
                    </div><!--calc space-->


                </div><!--row-->
                
            </div><!--step one-->
        
			<div class="test">
			    <img src="{{asset('images/ajax-loader.gif')}}">
			</div>
		</div><!--content-->
	</div><!--full Height-->
</div><!--container-->
@include('frontend.layouts.partials.footer')

<script type="text/javascript" src="css/plugins/date/jquery.datetimepicker.full.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKbJsGIea4zN3LbwdZ7o1eDt2BttMnTCc&libraries=places"
 type="text/javascript"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/number.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	
</script>
<script type="text/javascript">
	$(function(){

		function initialize(input) {

	        var autocomplete = new google.maps.places.Autocomplete(input);
	        
	        autocomplete.addListener('place_changed', function() {
	              place = autocomplete.getPlace();
	              if (!place.geometry) {
	                window.alert("No details available for input: '" + place.name + "'");
	                return;
	              }
	            var latlng = {
	                lat: place.geometry.location.lat(),
	                lng: place.geometry.location.lng()
	            }
	              
	            geocoder = new google.maps.Geocoder();
	            geocoder.geocode( { 'location': latlng}, function(results, status) {
	                if (status == 'OK') {   
	                    input.parentNode.classList.add("valid-location");
	                }else {
	                	alert('Geocode was not successful for the following reason: ' + status);
	              	}
	            });

	        });
	      
	    }
		var input = [];
	    input.push(document.getElementById('from'));
	    input.push(document.getElementById('from2'));
	    input.push(document.getElementById('to'));
	    for (var i = 0; i < input.length; i++) {
	    	initialize(input[i]);
	    }
		
	    google.maps.event.addDomListener(window, 'load', initialize);

		$( "input[type='radio']" ).checkboxradio();

		$('input[type="radio"]').on('change',function(){
			if($('#radio-2').is(':checked')){
				$('.one').slideUp(250);
				$('.more').removeClass('hidden').slideDown(250);
			}else if($('#radio-1').is(':checked')){
				$('.more').slideUp(250);
				$('.one').slideDown(250);
			}
		});

		
		$('#items2').on('blur',function(){
			var count = parseInt($(this).val());
			$('.appendable').empty();
			for (var i = 1; i < count+1; i++) {
				var data= "<div class='row'>"+
								"<div class='col-sm-4'>"+
									"<label for='width2'>{{trans('frontend/order.freight')}} "+i+" :</label>"+   
								"</div>"+
								"<div class='col-sm-8 map-input col-12 padding-zero rale'>"+

									"<i class='fa fa-location-arrow'></i>"+
									"<i class='fa fa-check'></i>"+
									"<input class='form-control appended padder' type='text' name='to' id='freight_to_"+i+"' placeholder='Straße / Hausnummer / Postleitzahl / Stadt'>"+

								"</div>"+
						  "</div>";
				$('.appendable').append(data);
	    		$('.appendable').slideDown(500);

			}
		});

		$(document).on('click', ".appendable .appended",function () {
			var currentInp = $(this).attr("id");
			initialize(document.getElementById(currentInp));
		});

	})
</script>










