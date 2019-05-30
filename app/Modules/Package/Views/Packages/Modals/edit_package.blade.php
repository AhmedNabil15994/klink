<div class="modal fade" id="edit-package">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                <h4 class="modal-title"> <i class="fa fa-plus fa-1x"></i> Edit Package</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Title: </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control title" type="text" placeholder="Title" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Price : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control price" type="text" placeholder="Price (€)" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Monthly Price : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control monthly_price" type="text" placeholder="Monthly Price (€)" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Coupon : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control coupon" type="text" placeholder="Coupon (%)" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Discount : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control discount" type="text" placeholder="Discount (%)" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Active : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input type="checkbox" class="icheckbox_flat is_active">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Features : </strong>
                        </div>
                        <div class="col-sm-9">
                            <select id='custom-headers' class="searchable" name="features[]" multiple='multiple'>
                                @forelse($features as $feature)
                                    <option value="{{$feature->id}}">{{$feature->title}}</option>
                                @empty
                                    <option value="0" disabled selected>-- No Data -- </option>
                                @endforelse
                            </select>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">{{ trans('main.save') }}</span></button>

                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>
        </div>
    </div>
</div>