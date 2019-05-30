@extends('backend.adminlte.layouts.app')
@section('htmlheader_title')
Documents
@endsection
 
@section('contentheader_title')
Documents
@endsection
 
@section('contentheader_description') 
@endsection


<!--breadcrumb current page-->
@section('current_breadcrumb')
Documents
@endsection



@section('main-content')
<style type="text/css">
    button a,button a:hover,
    button a:active,button a.active{
        color: #FFF;
        display: block;
        text-decoration: none;
        width: 100%;
        height: 100%;
    }
    .bigFilter{
        border: 1px solid #DDD;
        padding: 20px 20px;
        background-color: #FFF;
        border-radius: 5px;
        box-shadow: 1px 1px 10px #999;
    }
    .bigFilter ul.main{
        margin: 0;
        margin-left:5px; 
        padding: 0;
    }
    .bigFilter ul.main>li,
    .bigFilter ul.main>li a{
        font-size: 15px;
        color: #666;
        margin-bottom: 10px;
        text-decoration: none;
    }
    .bigFilter ul.main li ul.inner li{
        margin-top: 5px;
    }
    .bigFilter ul.main li ul.inner li a{
        color: #777;
        font: 14px;
        display: block;
        width: 100%;
        text-decoration: none;
        font-weight: 400;
    }
    .bigFilter ul li a.active{
        font-weight: bold !important;
        color: #333 !important;
    }
</style>

<div class="col-md-3" style="padding-top: 15px;padding-bottom: 15px;padding-right: 0">
    <div class="bigFilter">
        <ul class="main">
            <li><a class="type active" id="all" href="javascript:void(0)" link="{{URL::to('backend/documents/other')}}">All Documents</a></li>
            <li>Documents By Type 
                <ul class="inner">
                    @foreach($types as $type)
                    <li><a class="type" data-id="{{$type->id}}" href="javascript:void(0)" link="{{URL::to('backend/documents/filterByType/'.$type->id)}}">{{$type->name}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="tab-content col-md-9">
    <div id="home" class="tab-pane active in">
        <div class="pag">
            <div class="first_row pull-right">
                <button type="button" class="btn btn-success btn-circle pull-right add" value="">
                    <a href="{{route('documents.newTemplate')}}">
                        <i class="fa fa-plus"></i>
                        <span>{{trans('backend/email.new')}}</span>
                    </a>
                </button>
            </div>
            <div class="col-sm-12 get-table">
                @include('backend.adminlte.documents.Ajax.filter')
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

@endsection


@section('scripts')
@include('backend.adminlte.layouts.modals.confirm_delete')
<script type="text/javascript">
    $(function () {
        
        function initTable(){
            $('#docs-table').dataTable({
                "fnRowCallback": function( nRow, mData, iDisplayIndex ,iDisplayIndexFull ) {
                    var values = [];

                    @foreach($pages as $page)
                    values.push({
                        value: "{{$page->id}}",
                        text: "{{$page->route}}",
                    });
                    @endforeach

                    $('a.route').editable({

                        mode:'inline',
                        type:'select',
                        source: values,
                        success:function(response,newValue){
                            var id = $(this).data('id');
                            $.ajax({
                                url: "{{URL::to('/backend/documents/editDocumentRoute')}}",
                                type: 'POST',
                                data: {
                                    '_token': $('input[name="_token"]').val(),
                                    'id': id,
                                    'page_id': newValue,
                                },
                                success: function (data) {
                                    $.notify("Updated successfully \n Document Route Updated Successfully", {
                                        position: "top right",
                                        className: "success"
                                    });
                                    //location.reload();
                                },
                                error: function (data) {
                                    $.notify("Whoops \n Error may be in connection to server", {
                                        position: "top right",
                                        className: "error"
                                    });
                                }

                            });
                        },

                    });
                },

            });
        }

        initTable();

        $('.bigFilter ul.main li a.type').click(function () {
            if ($(this).hasClass('active')) {
                return void (0);
            } else {
                $('ul li a.active').removeClass('active');
                $(this).addClass('active');
                getData(null, $(this).attr('link'));
            }
        });

        function getData(page_number, url) {
            url = url || '?page=' + page_number
            var outerBox = '#home';
            var Box = '#home .pag .get-table';
            var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
            $(Box + ' #overlayPagination').remove();
            $(Box).append(loaging);
            $.ajax({
                url: url,
            }).done(function (data) {
                setTimeout(function(){
                    $(Box).html(data);
                    initTable();
                    $('.pag #overlayPagination').remove();
                },2500);
            }).fail(function () {
                $('.pag #overlayPagination').remove();
                $('.pag #overlayError').remove();
                var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                $(Box).html(error);
            });
       }

        

        

        $(document).on('click','.delete',function(){
			$('#confirm-delete').modal('toggle');
			var id = $(this).attr('value');

			$(document).on('click','#confirm-delete .btn-danger' ,function(e){

				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
		          headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		          }
		        });
		        $.ajax({
		           url: "{{route('documents.destroyTemplate')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Template Deleted Successfully",{ position:"top right" ,className:"success"});
		              $('#confirm-delete').modal('toggle');
		              location.reload();
		           },        
		           error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		          }

		         });

			});

		});
    })

</script>
@endsection

