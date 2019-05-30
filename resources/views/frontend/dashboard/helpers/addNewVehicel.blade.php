<link rel="stylesheet" href="{{asset('css/new-vehcile.css')}}"> 

<style>
.pac-container {
  z-index: 1054 !important;
}

.select2-container--default .select2-results>.select2-results__options {
    max-height: 200px;
    overflow-y: auto;
}
ul.select2-results__options #BtnAddNewContact, ul.select2-results__options #BtnAddNewProduct {
    display: block;
    margin-bottom: -13px;
    border-radius: 0;
}
ul.select2-results__options #BtnAddNewContact i.fa{
    margin-right: 5px;
}
</style>
<script>
    window.drivers = {};
</script>
<div class="modal fade rale" role="dialog" id="addNewVehcileModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="fas fa-truck"></span> {{trans('frontend/dashboard.add_vec')}}</h4>
                </div>
                <!--modal body-->
                <div class="modal-body">
    
                    <div class="add-vehcile-content">

                        <div class="add-group">
                            <div class="row">
                                    

                                    <div class="col-xs-4">
                                        <label for="selectpicker201">{{trans('frontend/dashboard.car_type')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                            <select class="selectpicker" id="selectpicker201">
                                                   @foreach($shippings as $ship)
                                                    <option value="{{$ship->id}}">{{$ship->title}}</option>
                                                    @endforeach
                                            </select>
                                    </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="vehcileweight">{{trans('frontend/dashboard.weight')}} (Kg)</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" id="weight" class="add-input" placeholder="{{trans('frontend/dashboard.weight')}} (Kg)" required>
                                    </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="vehcilemodel">{{trans('frontend/dashboard.vec_model')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" id="vehcilemodel" class="add-input" placeholder="{{trans('frontend/dashboard.vec_model')}}" required>
                                    </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="vehcilenumber">{{trans('frontend/dashboard.vec_no')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" id="vehcilenum" class="add-input" placeholder="{{trans('frontend/dashboard.vec_no')}}" required>
                                    </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="first">{{trans('frontend/dashboard.first_reg')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" id="first" class="add-input" placeholder="{{trans('frontend/dashboard.first_reg')}}" required value="{{Carbon::now()->format('Y-m-d')}}">
                                    </div>
                            </div>
                        </div>

                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="driver">{{trans('frontend/dashboard.driver_name')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                           
                                        <select id="driverSelector" class="selectDriver select2 form-control ">
                                            @foreach($drivers as $driver)

                                                <option    value="{{$driver->id}}">{{$driver->name}}</option>
                                                <script>
                                                    window.drivers[{{$driver->id}}] ={!!$driver!!} 
                                                </script>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="add-group">
                            <div class="row">
                                    <div class="col-xs-4">
                                        <label for="address2">{{trans('frontend/dashboard.address')}}</label>
                                    </div>
                                    <div class="col-xs-8">
                                        <input type="text" class="add-input" name="address" id="address2" class="address" placeholder="{{trans('frontend/dashboard.address')}}">
                                    </div>
                            </div>
                        </div>
                              
                        <input type="hidden" class="add-input" name="city" class="city" id="city2" placeholder="{{trans('frontend/dashboard.city')}}">
                        <input type="hidden" class="add-input" name="government" class="government" id="government2" placeholder="{{trans('frontend/dashboard.city')}}">

                        <input type="hidden" class="add-input" name="postal_code" id="postal_code2" class="postal_code" placeholder="{{trans('frontend/dashboard.postal_code')}}">
                                        
                        <input type="hidden" class="add-input" name="country" id="country2" class="country" placeholder="{{trans('frontend/dashboard.country')}}">
                                    


                        

                    </div>
                    
                </div>
                <!--modal body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                    <button type="button" class="btn btn-primary ladda-button ladda-button2" data-style="expand-right"><span class="ladda-label">{{trans('frontend/dashboard.add')}}</span></button>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
</div><!-- /.modal -->