 <!--assignment tabs-->
 <div class="row">
    <div class="col-xs-12">
                                <div class="assignment-tabs">
                                    <div class="row">

                                        <div class="col-xs-8">
                                            <ul class="assign-navigation">
                                                <li class="{{Active('assign')}}"><a  href="{{route('assign')}}">{{trans('frontend/dashboard.accepted')}}</a></li>
                                                <li class="{{Active('pending')}}"><a  href="{{route('pending')}}">{{trans('frontend/dashboard.pending')}}</a></li>
                                                <li class="{{Active('cancelled')}}"><a href="{{route('cancelled')}}"><span>{{trans('frontend/dashboard.cancelled')}}</span></a></li>
                                            </ul>
                                        </div>

                                        <div class="col-xs-4">
                                            <button class="show-assign-filter">
                                                <span class="fas fa-filter"></span>
                                                {{trans('frontend/dashboard.filter')}}
                                            </button>
                                        </div>



                                    </div>
                                </div>
    </div>
</div>
<!--assignment tabs-->