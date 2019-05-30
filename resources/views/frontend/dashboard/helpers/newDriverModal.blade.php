<div class="modal fade rale" role="dialog" id="newDriverModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-id-card "></span> {{trans('frontend/dashboard.addDriver')}}</h4>
            </div>
            
            <!--modal body-->
            <div class="modal-body">

                <form id="msform" class="add-vehcile-content">
                    <ul class="form-progressbar">
                        <li class="active">{{trans('frontend/dashboard.accountSetup')}}</li>
                        <li>{{trans('frontend/dashboard.personalInformation')}}</li>
                        <li>{{trans('frontend/dashboard.contactInformation')}}</li>
                    </ul>
                    <fieldset>
                        <h3 class="fs-subtitle">{{trans('frontend/dashboard.accountSetup')}}</h3>

                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="driveremail">{{trans('frontend/dashboard.email')}}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="email" name="email" id="driveremail" class="add-input" placeholder="{{trans('frontend/dashboard.email')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="driverPassword">{{trans('frontend/dashboard.driverPassword')}}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="password" name="password" id="driverPassword" class="add-input" placeholder="{{trans('frontend/dashboard.driverPassword')}}"
                                        required>
                                </div>
                            </div>
                        </div>
                        
                        <input type="button" name="next" class="next action-button btn btn-xs btn-success pull-right" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h3 class="fs-subtitle">{{trans('frontend/dashboard.personalInformation')}}</h3>
                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="driverFirstName">{{trans('frontend/dashboard.driverName')}}</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="first_name" id="driverFirstName" class="add-input" placeholder="{{trans('frontend/dashboard.driverFirstName')}}"
                                        required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="last_name" id="driverSecondName" class="add-input" placeholder="{{trans('frontend/dashboard.driverSecondName')}}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="address">{{trans('frontend/dashboard.address')}} / {{trans('frontend/dashboard.home')}}</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="adress" id="address" class="add-input" placeholder="{{trans('frontend/dashboard.address')}}" required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="home" id="home" class="add-input" placeholder="{{trans('frontend/dashboard.home')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="city">{{trans('frontend/dashboard.city')}} / {{trans('frontend/dashboard.postal_code')}}</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="city" id="city" class="add-input" placeholder="{{trans('frontend/dashboard.city')}}" required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="postal_code" id="postal_code" class="add-input" placeholder="{{trans('frontend/dashboard.postal_code')}}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="country">{{trans('frontend/dashboard.country')}}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" name="country" id="country" class="add-input" placeholder="{{trans('frontend/dashboard.country')}}" required>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="next"  class="next action-button btn btn-xs btn-success" value="Next" />
                        <input type="button" name="previous" style="right:75px;" class="previous action-button btn btn-xs btn-success" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <h3 class="fs-subtitle">{{trans('frontend/dashboard.contactInformation')}}</h3>
                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="length">{{trans('frontend/dashboard.phone')}}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" name="phone" id="phone" class="add-input" placeholder="{{trans('frontend/dashboard.phone')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="add-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="length">{{trans('backend/user.home_phone')}}</label>
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" name="home_phone" id="home_phone" class="add-input" placeholder="{{trans('backend/user.home_phone')}}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button btn btn-xs btn-success" value="Previous" />
                    </fieldset>

                </form>


            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" id="newDriverSave" class="btn btn-primary">{{trans('frontend/dashboard.add')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<style>
    #msform {
        width: 100%;
        /* margin: 50px auto; */
        text-align: center;
        position: relative;
        min-height: 315px;
    }
    
    

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 3px;
        /* box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4); */
        padding: 20px 30px;
        box-sizing: border-box;
        width: 100%;
        /* margin: 0 10%; */
        /*stacking fieldsets above each other*/
        position: relative;
        text-align: left;
        height: 280px;
    }

    #msform .action-button {
        bottom: 0;
        position: absolute;
        right: 0;

    }

    /* #msform fieldset .action-button{
        left: 100px;
    } */

    /*Hide all except first fieldset*/

    #msform fieldset:not(:first-of-type) {
        display: none;
    }

    /*inputs*/

    /*buttons*/

    /* #msform .action-button {
        width: 100px;
        background: #27AE60;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 1px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px;
    } */

    /* #msform .action-button:hover,
    #msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
    } */

    /*headings*/

    .fs-title {
        font-size: 15px;
        text-transform: uppercase;
        color: #2C3E50;
        margin-bottom: 10px;
    }

    .fs-subtitle {
        font-weight: normal;
        font-size: 13px;
        color: #666;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-progressbar {
        /* margin-bottom: 30px; */
        overflow: hidden;
        padding-left: 0;
        /*CSS counters to number the steps*/
        counter-reset: step;
    }

    .form-progressbar li {
        list-style-type: none;
        color: #333;
        text-transform: uppercase;
        font-size: 9px;
        width: 33.33%;
        float: left;
        position: relative;
    }

    .form-progressbar li:before {
        content: counter(step);
        counter-increment: step;
        width: 15%;
        line-height: 20px;
        display: block;
        font-size: 10px;
        color: #333;
        background: #f4f4ff;
        border-radius: 3px;
        margin: 0 auto 5px auto;
    }

    /*progressbar connectors*/

    .form-progressbar li:after {
        content: '';
        width: 85%;
        height: 2px;
        background: #f4f4ff;
        position: absolute;
        left: -42.5%;
        top: 9px;
        z-index: 0;
        /*put it behind the numbers*/
    }

    .form-progressbar li:first-child:after {
        /*connector not needed before the first step*/
        content: none;
    }

    /*marking active/completed steps green*/

    /*The number of the step and the connector before it = green*/

    .form-progressbar li.active:before,
    .form-progressbar li.active:after {
        background: #27AE60;
        color: white;
    }
</style>
<script>
    window.onload = function(){
        
        
        
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function(){
        	if(animating) return false;
        	animating = true;
        	
        	current_fs = $(this).parent();
        	next_fs = $(this).parent().next();
        	
        	//activate next step on progressbar using the index of next_fs
        	$(".form-progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        	
        	//show the next fieldset
        	next_fs.show(); 
        	//hide the current fieldset with style
        	current_fs.animate({opacity: 0}, {
        		step: function(now, mx) {
        			//as the opacity of current_fs reduces to 0 - stored in "now"
        			//1. scale current_fs down to 80%
        			scale = 1 - (1 - now) * 0.2;
        			//2. bring next_fs from the right(50%)
        			left = (now * 50)+"%";
        			//3. increase opacity of next_fs to 1 as it moves in
        			opacity = 1 - now;
        			current_fs.css({
                'transform': 'scale('+scale+')',
                'position': 'absolute'
              });
        			next_fs.css({'left': left, 'opacity': opacity});
        		}, 
        		duration: 800, 
        		complete: function(){
        			current_fs.hide();
        			animating = false;
        		}, 
        		//this comes from the custom easing plugin
        		easing: 'easeInOutBack'
        	});
        });

        $(".previous").click(function(){
        	if(animating) return false;
        	animating = true;
        	
        	current_fs = $(this).parent();
        	previous_fs = $(this).parent().prev();
        	
        	//de-activate current step on progressbar
        	$(".form-progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        	
        	//show the previous fieldset
        	previous_fs.show(); 
        	//hide the current fieldset with style
        	current_fs.animate({opacity: 0}, {
        		step: function(now, mx) {
        			//as the opacity of current_fs reduces to 0 - stored in "now"
        			//1. scale previous_fs from 80% to 100%
        			scale = 0.8 + (1 - now) * 0.2;
        			//2. take current_fs to the right(50%) - from 0%
        			left = ((1-now) * 50)+"%";
        			//3. increase opacity of previous_fs to 1 as it moves in
        			opacity = 1 - now;
        			current_fs.css({'left': left});
        			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        		}, 
        		duration: 800, 
        		complete: function(){
        			current_fs.hide();
        			animating = false;
        		}, 
        		//this comes from the custom easing plugin
        		easing: 'easeInOutBack'
        	});
        });


    }

</script>