<div class="modal fade rale" role="dialog" id="add_driver">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-truck"></span> {{trans('frontend/dashboard.newDriver')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="add-group" style="margin-bottom: 10px;">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="selectpicker201">{{trans('frontend/dashboard.name')}}</label>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="first_name" class="add-input form-control" placeholder="{{trans('frontend/dashboard.fname')}} " required>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="last_name" class="add-input form-control" placeholder="{{trans('frontend/dashboard.lname')}} " required>
                            </div>
                        </div>
                </div>

                <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="vehcileweight">{{trans('frontend/dashboard.phone')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="number" id="driver_phones" class="add-input form-control" placeholder="{{trans('frontend/dashboard.phone')}}" required>
                            </div>
                        </div>
                </div>

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary ladda-button" data-style="expand-right"><span class="ladda-label">{{trans('frontend/dashboard.save')}}</span></button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>