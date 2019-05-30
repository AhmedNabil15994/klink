
<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering1" data-form="deleteForm"  >
            <thead>
                <tr style="background-color: #EEE;">
                <th>{{ trans('backend/user.no#') }}</th>
                <th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.email') }}" id="search1"></th>
                <th class="col-sm-4">{{ trans('backend/user.roles') }} <a class="btn btn-primary btn-xs" href="{{ route('users.users_roles') }}"><i class="fa fa-pencil"></i></a></th>
                @if($type == 'Company')
                <th>{{trans('frontend/dashboard.vehicles')}}</th>
                @endif
                <th>{{ trans('backend/user.action') }}</th>
            </tr>
            </thead>

            <tbody>
                <?php $i = 0; ?>
                @foreach ($data as $key => $users)
                <form class="form{{$users->id}}" action="{{route('users.editUser',$users->id)}}" method="get">
                    <tr class="tab-row{{$users->id}} selected_record">
                        <input type="hidden" class="user_id" name="user_id" value="{{$users->id}}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $users->email }}<br>
                            <div class="row">
                                <span class="text-left">
                                @if(!empty($users->name))
                                <i class="fa fa-user"></i> {{$users->name}}
                                @elseif(!empty($users->profile->name() )) 
                                <i class="fa fa-user"></i> {{$users->profile->name()}}
                                @endif
                                </span>
                                <span class="text-left">
                                    @if(!empty($users->profile->postal_code))
                                    <i class="fa fa-home"></i> {{$users->profile->postal_code}}
                                    @endif
                                </span>
                                <span class="text-left">
                                    @if(!empty($users->profile->phone))
                                    <i class="fa fa-phone"></i> {{$users->profile->phone}}
                                    @endif 
                                </span>
                            </div>
                        </td>
                        <td>
                            <?php 

                                $user_roles = \DB::table('user_roles')->where('user_id','=',$users->id)->get();
                                foreach ($user_roles as $key => $value) {
                                    $role = \DB::table('roles')->where('id','=',$value->role_id)->first(); ?>
                                <label class="label">{{$role->display_name}}</label>
                                <?php }
                                $user_vec = \DB::table('vehicles')->where('user_id','=',$users->id)->get();
                            ?>
                        </td>
                        @if($type == 'Company')
                        <td class="text-left">
                            @foreach($user_vec as $vec)
                            <?php 
                                $ship = \DB::table('shippings')->where('id','=',$vec->ship_id)->first();
                            ?>
                            <div class="row text-left" style="width: 100%;">
                                <a class="vehicle" href="{{route('seeVehicles',['user' => $users->id])}}" target="_blank"><img src="{{asset('images/shippings')}}/{{$ship->img}}" style="width: 35px;height: 35px;border-radius: 50%;"> {{$vec->ship_name}}</a>
                            </div>
                            @endforeach
                        </td>
                        @endif
                        <td>
                            <button type="button" name="delete" class="btn btn-danger btn-xs  delete" alt=" {{trans('backend/user.delete')}}" value="{{$users->id}}"><i class="fa fa-trash"></i> {{ trans('backend/user.delete') }}</button>                
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </form>
                @endforeach
            </tbody>    
            
        </table>
       @if(!count($data))
                    <style type="text/css">
                        tbody,
                        .dataTables_wrapper .row:last-of-type,
                        .dataTables_wrapper .row:first-of-type{
                            display: none;
                        }
                        .pag .row:first-of-type{
                            margin-bottom: 20px !important;
                        }
                    </style>
                    <div id="overlayError">
                        <div class="row" style="margin-top: 20px;display: block;">
                            <div class="col-xs-6 text-left pull-right">
                                <img style="width: 120px;" src="{{asset('img/filter.svg')}}">
                            </div>
                            <div class="col-xs-6 text-right">
                                <div class="callout callout-info" style="margin-top: 50px;">
                                    <h4>{{trans('backend/user.no_result')}}<i class="fa fa-exclamation fa-fw"></i></h4>
                                    <p>{{trans('backend/user.no_result_now')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

<script type="text/javascript">
    $(function(){
        var oTable = $('.demo-foo-filtering1').DataTable();
        $('#search1').on('keyup',function(){
            oTable.search( this.value ).draw();
        });

        $(document).on('click','a.vehicle',function(e){
            e.stopPropagation();
        });
        
    });
</script>                