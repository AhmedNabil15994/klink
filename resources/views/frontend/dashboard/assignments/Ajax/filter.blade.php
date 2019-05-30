<?php 
    $test_type = \Crypt::decrypt($type);

?>
@if($test_type == 'pending' )
<style type="text/css">
    .order-offer .results .order-item.complete{
        border-left: .5rem solid #f6ab36 !important;
    }
</style>
@elseif($test_type == 'cancelled')
<style type="text/css">
    .order-offer .results .order-item.complete{
        border-left: .5rem solid #d9534f !important;
    }
</style>
@elseif($test_type == 'finished')
<style type="text/css">
    .order-offer .results .order-item.complete{
        border-left: .5rem solid #398bf7 !important;
    }
</style>
@endif
<div class="results">
                                <div class="row first_row">
                                    <button class="btn btn-md btn-primary pull-right filter"> <i class="fas fa-filter"></i> Filter</button>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row second_row">
                                    <div class="col-xs-12">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country" placeholder="Country" value="{{$country}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code" placeholder="Postal Code" value="{{$postal_code}}"/>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city" placeholder="City" value="{{$city}}"/> 
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="margin-top: 15px;">
                                        <div class="col-md-3 col-sm-4 col-xs-6" style="padding: 0">
                                            <div class="col-xs-1">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="col-xs-10">
                                                <input class="form-control" type="text" id="country2" placeholder="Country" value="{{$country2}}"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="number" id="postal_code2" placeholder="Postal Code" value="{{$postal_code2}}"/>
                                        </div>
                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                            <input class="form-control" type="text" id="city2" placeholder="City" value="{{$city2}}"/> 
                                        </div>
                                        <div class="col-md-5 col-sm-12 col-xs-12">
                                            <button class="btn btn-md btn-primary pull-right search"><i class="fas fa-search"></i> Search</button>
                                        </div>
                                    </div>    
                                </div>


                                <div class="assign-item Cancelled active">
                                    @include('frontend.userDashboard.layouts.orders')
                                </div>

                            </div>

                            <!--here all results-->

                            <div class="row">
                                <div class="box-footer">
                                    <div class="pagination-wrapper tested">{!! $data->render() !!} </div>
                                </div> 
                            </div>
