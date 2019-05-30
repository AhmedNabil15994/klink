<div class="modal fade" id="edit-relatives">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                <h4 class="modal-title"> <i class="fa fa-plus fa-1x"></i> Answer Relatives</h4>
            </div>
            <div class="modal-body">
                
                @include('Question.Views.Backend.Ajax.loadQuestion')
                
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">{{ trans('main.save') }}</span></button>

                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>
        </div>
    </div>
</div>