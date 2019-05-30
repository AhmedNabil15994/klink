         <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering8" data-form="deleteForm" >
            <thead>
                <tr style="background-color: #EEE;">
                <th>{{ trans('backend/user.no#') }}</th>
                <th style="padding: 0; width: 200px;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.roles') }}" id="search8"></th>
                <th style="padding: 0;"><input type="text" style="margin-bottom: 5px;" name="search" class="form-control" placeholder="{{ trans('backend/user.email') }}" id="search10"></th>
                <th>{{ trans('backend/user.action') }}</th>
            </tr>
            </thead>

            <tbody>
                <?php $i = 0; ?>
                @foreach ($data as $key => $roles)
                    <tr class="tab-row">
                        <td>{{ ++$i }}</td>
                        <td>{{ $roles->display_name }}</td>
                        <td>
                            <?php 
                                $user = [];
                                $role_user = \DB::table('user_roles')->where('role_id','=',$roles->id)->get();
                                foreach ($role_user as $key => $value) {
                                    $user[] = \DB::table('users')->where('id','=',$value->user_id)->get();
                                }
                                for ($x=0; $x <count($user) ; $x++) { ?>
                                @foreach($user[$x] as $row)
                                   <h5 class="labels" val="{{$row->id}}">{{ $row->email }}</h5>
                                @endforeach   
                            <?php  }
                            ?>
                            
                        
                        </td>
                        <td>
                            <button type="button" name="delete" class="btn btn-danger btn-xs  delete" alt=" {{trans('backend/user.delete')}}" value="" disabled><i class="fa fa-trash"></i> {{ trans('backend/user.delete') }}</button>                
                        </td>
                    </tr>
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
        var oTable = $('.demo-foo-filtering8').DataTable();
        $('#search8').on('keyup',function(){
            oTable.search( this.value ).draw();
        });

        $(document).on('click','table tr .labels',function(e){
            e.preventDefault();
            e.stopPropagation();
            var id = $(this).attr('val');
            var route = "{{route('users.editUser',['user_id' => 'uid'])}}";
            route = route.replace('uid', id);
            window.location.href = route;
        });
        
        $('#search10').unbind('keyup');
        $(document).on('keyup','#search10',function(){
 
            value=$(this).val();
            if(value == ''){
                oTable.search( this.value ).draw();
            }else{
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); 
                $.ajax({ 
                    type : 'POST',          
                    url: "{{URL::to('backend/searchEmail')}}",
                    data:{
                        '_token': $('input[name=_token]').val(),
                        'search':value
                    }, 
                    success:function(data){
                       $('.demo-foo-filtering9 tbody').html(data); 
                    }   
                 
                });
            }  
 
 
        });

    });
</script>                