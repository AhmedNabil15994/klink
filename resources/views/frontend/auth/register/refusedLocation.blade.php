<style>
    .modal-content {
        padding: 1rem;
    }

    .modal-body {
        padding: 1.5rem;
    }

    .modal h4 {
        font-size: 2rem;
        color: #398bf7;
    }

    .modal h4 span {
        margin-right: 1rem;
    }

    .user-profile-update {
        padding: 2rem;

        overflow-y: auto;
    }

    fieldset {
        border: .1rem solid #DDD;
        border-radius: .5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    legend {
        display: block;
        width: 100%;
        padding: 0;
        margin-bottom: 20px;
        font-size: 21px;
        line-height: inherit;
        color: #333;
        border: 0;
        border-bottom: 1px solid #e5e5e5;
        color: #f6ab36;
    }

    #ValidateAndContinue {
        padding: 1rem 5rem;
        border: none;
        background: #f6ab36;
        color: #FFF;
        font-size: 1.5rem;
        letter-spacing: .1rem;
        border-radius: .5rem;
        transition: background .5s, transform .5s;
        float: right;
    }
    #ValidateAndContinue:hover{
        background: #ff9d00;
        transform: scale(1.05);
    }

    .update-group {
        margin-bottom: 2.5rem;
    }

    .update-group label {
        color: #f6ab36;
    }

    .update-input {
        width: 100%;
        padding: .5rem 1rem;
        border-radius: .3rem;
        border: 0.1rem solid rgba(0, 0, 0, 0.2);
        transition: all .5s;
        font-size: 1.4rem;
    }
</style>
<div id="RefusedLocationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="alert alert-warning" style="    margin-right: 1.5rem;">

                    {{trans('frontend/login.refusedConnectionHeader')}}</div>
            </div>
            <div class="modal-body clearfix">
                <div class="user-profile-update">
                    <div class="row">
                        <div class="col-xs-12">
                            <fieldset>
                                <legend>{{trans('frontend/login.countryinfo')}}</legend>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="countryName">{{trans('frontend/login.country')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="countryName" class="update-input" placeholder="{{trans('frontend/login.country')}}" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="city">{{trans('frontend/login.city')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="city" class="update-input" placeholder="{{trans('frontend/login.city')}}" required="">
                                        </div>
                                    </div>
                                </div>



                                <div class="update-group">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <label for="postal_code">{{trans('frontend/login.postal')}}</label>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="text" id="postal_code" class="update-input" placeholder="{{trans('frontend/login.postal')}}" required="" value="">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float:left;" data-dismiss="modal">
                    {{trans('frontend/login.close')}}
                </button>
                <button type="button" id="ValidateAndContinue" class="btn btn-default" data-dismiss="modal">
                    {{trans('frontend/login.save')}}
                </button>
            </div>
        </div>

    </div>
</div>