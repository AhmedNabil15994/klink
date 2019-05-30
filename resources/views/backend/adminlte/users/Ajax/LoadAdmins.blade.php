<div class="row" id="row-one" style="margin-bottom: 0px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right admin-add"><i class="fa fa-plus"></i> <span>{{ trans('backend/user.new_one') }}</span></button>
        </div>
<table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering7" data-form="deleteForm" >
            <thead>
                <tr style="background-color: #EEE;">
                <th>{{ trans('backend/user.no#') }}</th>
                <th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.email') }}" id="search7"></th>
                <th class="col-sm-4">{{ trans('backend/user.adminPhone') }}</th>
                <th class="col-sm-4">{{ trans('backend/user.adminContactMail') }}</th>
                <th class="col-sm-4">{{ trans('backend/user.adminAdress') }}</th>
                <th class="col-sm-4">{{ trans('backend/user.created') }}</th>
                <th>{{ trans('backend/user.action') }}</th>
            </tr>
            </thead>

            <tbody>
                <?php $i = 0; ?>
                @foreach ($data as $key => $admin)
                <form class="form{{$admin->id}}" action="{{route('admins.editAdmin',$admin->id)}}" method="get">
                    <tr class="tab-row{{$admin->id}} selected_admin">
                        <input type="hidden" class="admin_id" name="admin_id" value="{{$admin->id}}">
                        <input type="hidden" class="admin_name" name="admin_name" value="{{$admin->name}}">
                        <td>{{ ++$i }}</td>
                        <td class="admin_email">{{ $admin->email }}</td>
                        <td class="admin_profile_phone">{{$admin->profile->phone}}</td>
                        <td class="admin_profile_email">{{$admin->profile->email}}</td>
                        <td class="admin_profile_adress">{{$admin->profile->adress}}</td>
                        <td>{{ \Carbon::parse($admin->created_at)->format('Y-m-d')}}</td>
                        <td>
                            <button class="btn btn-xs btn-success edit-admin" value="{{$admin->id}}"><i class="fa fa-edit"></i>{{ trans('backend/user.edit') }}</button>
                            <button type="button" name="delete" class="btn btn-danger btn-xs  delete" alt=" {{trans('backend/user.delete')}}" value="{{$admin->id}}"><i class="fa fa-trash"></i> {{ trans('backend/user.delete') }}</button>                
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
         var oTable = $('.demo-foo-filtering7').DataTable();
        $('#search7').on('keyup',function(){
            oTable.search( this.value ).draw();
        });
    });
</script>        