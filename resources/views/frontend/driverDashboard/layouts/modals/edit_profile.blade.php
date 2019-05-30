<!--edit modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="infoEditModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-user-circle"></span>{{trans('frontend/dashboard.update_profile')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <!--user profile update-->
                <div class="user-profile-update">
                    <div class="row">
                        <div class="col-xs-12">
                            <fieldset>
                                <legend>{{trans('frontend/dashboard.personal')}}</legend>
                            
                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="firstname">{{trans('frontend/dashboard.fname')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="firstname" class="update-input" placeholder="{{trans('frontend/dashboard.fname')}}" required value="{{$profile['first_name']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="last name">{{trans('frontend/dashboard.lname')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="lastname" class="update-input" placeholder="{{trans('frontend/dashboard.lname')}}" required value="{{$profile['last_name']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="birth_date">{{trans('frontend/dashboard.birth_date')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="birth_date" class="update-input" placeholder="{{trans('frontend/dashboard.birth_date')}}" required value="{{$profile['birth_date']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="birth_place">{{trans('frontend/dashboard.birth_place')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="birth_place" class="update-input" placeholder="{{trans('frontend/dashboard.birth_place')}}" required value="{{$profile['birth_place']}}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>{{trans('frontend/dashboard.license')}}</legend>
                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="license_no">{{trans('frontend/dashboard.driver_license')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="license_no" class="update-input" placeholder="{{trans('frontend/dashboard.driver_license')}}" required value="{{$profile['license_no']}}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>{{trans('frontend/dashboard.contact')}}</legend>

                                <fieldset>
                                    <legend>{{trans('frontend/dashboard.phone')}}</legend>
                                    <div class="update-group">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label for="phone">{{trans('frontend/dashboard.phone_num')}}</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="text" id="phone" class="update-input" placeholder="{{trans('frontend/dashboard.phone_num')}}" required value="{{$profile['phone']}}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend>{{trans('frontend/dashboard.address')}}</legend>

                                    <div class="update-group">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label for="firma">{{trans('frontend/dashboard.address')}} / {{trans('frontend/dashboard.home')}}</label>
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" id="address" class="update-input" placeholder="{{trans('frontend/dashboard.address')}}" required value="{{$profile['address']}}">
                                            </div>

                                            <div class="col-xs-4">
                                                <input type="text" id="home" class="update-input" placeholder="{{trans('frontend/dashboard.home')}}" required value="{{$profile['home']}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="update-group">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label for="City">{{trans('frontend/dashboard.postal_code')}} / {{trans('frontend/dashboard.city')}}</label>
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" id="postal_code" class="update-input" placeholder="{{trans('frontend/dashboard.postal_code')}}" required value="{{$profile['postal_code']}}">
                                            </div>
                                            <div class="col-xs-4">
                                                <input type="text" id="district" class="update-input" placeholder="{{trans('frontend/dashboard.city')}}" required value="{{$profile['district']}}">
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="update-group">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label for="country">{{trans('frontend/dashboard.country')}}</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="text" id="country" class="update-input" placeholder="{{trans('frontend/dashboard.country')}}" required value="{{$profile['country']}}"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="update-group">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <label for="address2">{{trans('frontend/dashboard.add_address')}}</label>
                                            </div>
                                            <div class="col-xs-8">
                                                <input type="text" id="address2" class="update-input" placeholder="{{trans('frontend/dashboard.add_address')}}" required value="{{$profile['address2']}}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                  
                            </fieldset>

                            <fieldset>
                                <legend>{{trans('frontend/dashboard.more')}}</legend>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="aboutcompany">{{trans('frontend/dashboard.about')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <textarea id="about" class="custom-input" placeholder="{{trans('frontend/dashboard.about')}}" required>{{$profile['about']}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="info">{{trans('frontend/dashboard.add_info')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="info" class="update-input" placeholder="{{trans('frontend/dashboard.add_info')}}" required value="{{$profile['info']}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="info">{{trans('frontend/dashboard.add_link')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="facebook" class="update-input" placeholder="Facebook" required value="{{$profile['info']}}" style="margin-bottom: 5px;">
                                            <input type="text" id="twitter" class="update-input" placeholder="Twitter" required value="{{$profile['info']}}" style="margin-bottom: 5px;">
                                            <input type="text" id="linkedin" class="update-input" placeholder="LinkedIn" required value="{{$profile['info']}}" style="margin-bottom: 5px;">
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            
                        </div>
                    </div>




                </div>
                <!--user profile update-->


               


            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--edit modal-->
