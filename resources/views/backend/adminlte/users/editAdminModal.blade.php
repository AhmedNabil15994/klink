<div id="edit-admin-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="box-title" style="border-bottom: 1px solid #DDD; padding-bottom: 15px;">{{ trans('backend/user.edit_admin') }}</h4>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif {!! Form::open(array('route' => 'admins.editAdmin','method'=>'POST')) !!}
                <div class="box-body">

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.name')}} :</strong>
                            </div>
                            {!! Form::text('name', null, array('placeholder' => trans('backend/user.name'),'class' => 'form-control' )) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.email')}} :</strong>
                            </div>
                            {!! Form::text('email', null, array('placeholder' => trans('backend/user.email'),'class' => 'form-control', 'disabled'=>'disabled'))!!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.adminContactMail')}} :</strong>
                            </div>
                            {!! Form::text('profileEmail', null, array('placeholder' => trans('backend/user.adminContactMail'),'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.adminPhone')}} :</strong>
                            </div>
                            {!! Form::text('phone', null, array('placeholder' => trans('backend/user.adminPhone'),'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.adminAdress')}} :</strong>
                            </div>
                            {!! Form::text('adress', null, array('placeholder' => trans('backend/user.adminAdress'),'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.password')}} :</strong>
                            </div>
                            {!! Form::password('password', array('placeholder' => trans('backend/user.password'),'class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>{{trans('backend/user.password_confirmation')}} :</strong>
                            </div>
                            {!! Form::password('password_confirmation', array('placeholder' => trans('backend/user.password_confirmation'),'class' =>'form-control')) !!}
                        </div>
                    </div>


                </div>
                <div class="box-footer pull-right" style="border-top: 0">
                    <button type="submit" class="btn btn-success" style="background-color: #449d44">
                        <i class="fa fa-save"></i> {{ trans('backend/user.save') }}</button>
                    <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                        <i class="fa fa-home "></i> {{ trans('backend/user.cancel') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>