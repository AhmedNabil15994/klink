<!--footer-->
<section class="footer rale">
		    <div class="container">
		        
		        <div class="row">
		            
		            <div class="col-md-3 col-sm-4">
		                
		                <div class="footer__info">
		                    
		                    <div class="footer-logo">
		                        <img src="{{asset('images/logoFooter.png')}}" alt="mylogo" draggable="false">
							</div>
							
							<a href="https://www.facebook.com/kurierlink" target="_blank" id="link">
								Follow us on <span class="fab fa-facebook-f"></span>acebook</a>
							</a>
							

		                    <p>
								© 2018 Kurier link, {{trans('frontend/main.rights')}}.
		                    </p>
		                    
		                    
		                </div>
		                
		                
		            </div><!--row-->
		            
		            
		            <div class="col-md-2 col-sm-4">
		                
		                <div class="footer__company">
		                    <h4 class="footer__heading">{{trans('frontend/order.company')}}</h4>
		                    
		                    <ul class="company__list">
		                        <li class="company__list--item"><a href="{{route('main')}}" class="company__list--link">{{trans('frontend/main.home')}}</a></li>
		                        <li class="company__list--item"><a href="{{route('register')}}" class="company__list--link">{{trans('frontend/main.register')}}
								</a></li>
		                        <li class="company__list--item"><a href="{{route('about')}}" class="company__list--link">{{trans('frontend/main.about')}}</a></li>
		                        <li class="company__list--item"><a href="{{route('service')}}" class="company__list--link">{{trans('frontend/main.service')}}
								</a></li>
		                        
		                    </ul>
		                    
		                </div>
		                
		            </div><!--col-->
		            
		            
		            <div class="col-md-2 col-sm-4">
		                
		                <div class="footer__map">
		                    <h4 class="footer__heading">{{trans('frontend/main.support')}}
							</h4>
		                    
		                    <ul class="map__list">
		                        <li class="map__list--item"><a href="{{route('contact')}}" class="map__list--link">{{trans('frontend/main.contact')}}</a></li>
								<li class="map__list--item"><a href="{{route('faq')}}" class="map__list--link">FAQ</a></li>
								<li class="map__list--item"><a href="{{route('terms')}}" class="map__list--link">{{trans('frontend/main.terms')}}</a></li>
								<li class="map__list--item"><a href="{{route('terms')}}" class="map__list--link">{{trans('frontend/main.privacy')}}</a></li>
								<li class="map__list--item"><a href="{{route('imp')}}" class="map__list--link">{{trans('frontend/main.imp')}}</a></li>
		                    </ul>
		                    
		                </div>
		                
		            </div><!--col-->
		            
		            
		           
					
					 <div class="col-md-5 col-sm-4">
		                
		                <div class="footer__subscribe container-fluid">
		                    
		                    <div class="row">
                                <div class="social">
                                    <h4 class="footer__heading" >zahlungsarten  :</h4>
                                    <ul class="social__list clearfix" style="display:flex;flex-wrap:wrap;align-items:center;">
                                        <li class="social__list--item2">
											<img src="{{asset('images/visa.svg')}}" alt="visa">
										</li>
										<li class="social__list--item2">
											<img src="{{asset('images/master.svg')}}" alt="master">
										</li>
										<li class="social__list--item2 ">
											<img class="custom-margin" src="{{asset('images/pay.png')}}" alt="pay">
										</li>
										<li class="social__list--item2">
											<img src="{{asset('images/paypal.svg')}}" alt="paypal">
										</li>
										<li class="social__list--item2">
											<img class="" src="{{asset('images/sepa.svg')}}" alt="paypal">
										</li>
										<li class="social__list--item2">
											<img class="" src="{{asset('images/vorkasse.svg')}}" alt="paypal" style="height: 35px;margin-top: 0 !important;">
										</li>
                                      
                                    </ul>
								</div><!--social-->
								
								
							</div>
							
							<div class="row">
                                <div class="subscribe__form">
                                   
                                    <form action="" class="sub-form">
                                        <input type="email" placeholder="{{trans('frontend/main.enter_email')}}" required>
                                        <button class="subscribe-button">
                                            <span class="fab fa-telegram-plane"></span>
                                        </button>
                                    </form>
                                </div><!--form-->
							</div>
		                  
		                
		                
		            </div>
		            
		            
		            
		        </div>
		        
		    </div><!--container-->
</section>
<!--footer-->

 <!-- <script src="jquery.nicescroll-master/jquery.nicescroll.min.js"></script> -->
 @if(!isset($noJquery))
 <script type="text/javascript" src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
@endif
 <script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>
 <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <!--script src="{{asset('js/detect.js')}}"></script>-->
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/spin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.jquery.min.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/number.js')}}"></script>


<script>

		$(document).ready(function(){

			/*text slider**/
			$('.text-slider').slick({
				arrows:false,
				autoplay:true
			});



			/*number increaser*/

			$('.step__one .input__group input').not('.step__one .input__group input[type="range"],.step__one .input__group input[type="hidden"]').each(function (){
				$(this).number({
					'containerClass' : 'number-style',
					'minus' : 'number-minus',
					'plus' : 'number-plus',
					'containerTag' : 'div',
					'btnTag' : 'span'

				});
			});
		});

</script>


            