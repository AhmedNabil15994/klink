                           <h3 class="car">{{trans('frontend/order.car_type')}}</h3>

                           <div class="car_image">
                               <img src="./images/shippings/{{$data->img}}" alt="bmw"  style="width: 5rem;display: block;margin: auto;">
                           </div>
                           <h4>{{$data->title}}</h4>
							             <div class="row select_test">   
                                <div class="col-xs-12" style="display: inline-block;width: 6rem;padding: 0;">
                                    <label style="display: block;width: 100%;">{{trans('frontend/dashboard.test')}} </label>
                                </div>    
                                
                                <input type="checkbox" name="type" class="icheckbox_flat" value="0">
                            </div>  
                           <button class="cal_button" id="submit_one">{{trans('frontend/order.submit')}}</button>
                           
							<span class="order_id" style="display: none;"></span>
                            <span style="display: none;width: 100%;color: #777;"><span class="distance_cost">{{$cost}}</span> €</span>
                            <input type="hidden" id="ship_id" name="ship_id" value="{{$data->type_id}}">

                            


