<div class="modal fade" id="add-feature">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                <h4 class="modal-title"> <i class="fa fa-plus fa-1x"></i> Add New Feature</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Title: </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control title" type="text" placeholder="Title" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Type : </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control type" type="text" placeholder="Type" />
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