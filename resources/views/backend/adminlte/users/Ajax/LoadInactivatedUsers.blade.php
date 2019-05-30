<div class="row" id="row-one" style="margin-bottom: 0px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right user-add"><i class="fa fa-plus"></i> <span>{{ trans('backend/user.new_one') }}</span></button>
        </div>
<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering2" data-form="deleteForm"  >
            <thead>
                <tr style="background-color: #EEE;">
                <th>{{ trans('backend/user.no#') }}</th>
                <th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.email') }}" id="search2"></th>
                <th class="col-sm-4">{{ trans('backend/user.created') }}</th>
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
                        <td>{{ $users->email }} <br>
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
                        <td>{{ \Carbon::parse($users->created_at)->format('Y-m-d')}}</td>
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
         var oTable = $('.demo-foo-filtering2').DataTable();
        $('#search2').on('keyup',function(){
            oTable.search( this.value ).draw();
        });
    });
</script>        