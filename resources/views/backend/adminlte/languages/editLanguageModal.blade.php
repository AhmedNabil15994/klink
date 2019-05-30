<div id="edit-language" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">{{ trans('backend/language.create_new') }}</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>{{trans('backend/language.language_title')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control name" type="text" placeholder="{{trans('backend/language.language_title')}}" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>{{trans('backend/language.language_shortcut')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control shortcut" type="text" placeholder="{{trans('backend/language.language_shortcut')}}" />
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3"><strong>{{trans('backend/language.is_active')}} : </strong></div>
                        <div class="col-sm-9 col-xs-9 col-md-9">

                            <select class="select2 form-control is_active">
                                    <option value="1">{{trans('backend/language.yes')}}</option>
                                    <option value="0">{{trans('backend/language.no')}}</option>
                                </select>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<div class="col-sm-3">
							<strong>{{trans('backend/shipping.img')}} : </strong>
						</div>
						<div class="col-sm-9">
							<input class="file" type="file" name="file" id="imageEdit" />
						</div>
					</div>
				</div>
                {{-- ahmed --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> {{ trans('main.save') }}</button>
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                            <i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>


        </div>
    </div>
</div>
<script>
    // Replace the <textarea id="newEmailType"> with a CKEditor
    // instance, using default configuration.

    window.addEventListener('load', function () {
        $('.select2').prop('selectedIndex', -1);
        $('.select2.form-control').select2({
            placeholder: {
                id: '-1', // the value of the option
                text: '{{trans('backend/language.is_active')}}'

            }
        });

        
    });

</script>