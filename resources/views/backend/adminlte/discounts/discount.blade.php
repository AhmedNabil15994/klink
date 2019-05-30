@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/shippingDiscount.title') }}
@endsection


@section('contentheader_title') {{ trans('backend/shippingDiscount.title') }}
@endsection
 
@section('contentheader_description')
{{ trans('backend/shippingDiscount.title') }}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/shippingDiscount.title')
}}
@endsection
 
@section('main-content')
    @include('backend.adminlte.discounts.newDiscountModal')
    @include('backend.adminlte.shipping.inc.nav')
    <div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">

            <div class="row" style="margin-bottom: -35px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
            </div>


            
            <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                id="bills-table">
                <thead>
                    <tr style="background-color: #EEE;">

                        <th>{{trans('main.no#')}}</th>
                        <th>{{trans('backend/shippingDiscount.shipping')}}</th>
                        <th>{{trans('backend/shippingDiscount.discountValue')}}</th>
                        <th>{{trans('backend/shippingDiscount.actions')}}</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i=0;?>
                    @foreach($shippings as $ship)
                    <tr class="selected{{$ship->id}}">
                        <td>{{++$i}}</td>
                        <td>{{$ship['title']}}</td>
                        <td class="discount">{{$ship['discount']}}%</td>
                        <td>
                            <button class="btn btn-success btn-xs edit action-small" data-toggle="tooltip" title="{{trans('backend/shippingDiscount.edit')}}" value="{{$ship->id}}"><i  class="fa fa-edit"></i>{{trans('backend/shippingDiscount.edit')}}</button>
                            <button class="btn btn-danger btn-xs delete action-small" data-toggle="tooltip" title="{{trans('backend/shippingDiscount.delete')}}"
                                value="{{$ship->id}}"><i class="fa fa-close"></i>{{trans('backend/shippingDiscount.delete')}}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table> @if(!count($shippings))
            <style type="text/css">
                tbody,
                .dataTables_wrapper .row:last-of-type,
                .dataTables_wrapper .row:first-of-type {
                    display: none;
                }
            </style>
            <div id="overlayError">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-xs-6 text-left pull-right">
                        <img style="width: 120px;" src="{{asset('images/filter.svg')}}">
                    </div>
                    <div class="col-xs-3"></div>
                    <div class="col-xs-3 pull-left text-right">
                        <div class="callout" style="margin-top: 50px;border-left: 0;">
                            <h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
                            <p>{{trans('main.no_res2')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>



@section('scripts')
    @include('backend.adminlte.layouts.modals.confirm_delete')
    @include('backend.adminlte.layouts.partials.scripts')
<script>
    window.nonActiveShips = {};
    $(function () {
        $('#add-discount').on('hidden.bs.modal', function () {
            $('#add-discount .modal-title').text('{{trans('backend/shippingDiscount.new')}}');
            $('#add-discount .is_active').val(-1);
            $('.select2').prop('selectedIndex', -1);
            $('.select2.form-control').select2({
                placeholder: {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/shippingDiscount.selectShip')}}',
                
                }
            });
            $('#add-discount .is_active').parent().parent().show();
        });
        $(document).on('click','.edit',function(){
            console.log($(this).val());
            $('#add-discount .is_active').append('<option selcted value="'+$(this).val()+'"></option>')
            $('#add-discount .is_active').val($(this).val());
            $('#add-discount .is_active').parent().parent().hide();
            $('#add-discount .modal-title').text('{{trans('backend/shippingDiscount.edit')}}')
            var discountValue = $(this).parents('tr').children('td.discount').text().replace('%','');
            discountValue = Number(discountValue);
            console.log(discountValue)
            $('#add-discount .percentageValue').val(discountValue);
            $('#add-discount').modal('toggle');
        });
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
		           url: "{{route('shippingDiscount.updateShip')}}",
		           type: 'POST',
		           data: {
		           	'_token' : $('input[name="_token"]').val(),
		           	'id'	: id,
                    'discount':0,
		           } ,
		           success: function (data) {
		           
		              $.notify("Deleted successfully \n Shipping Discount Deleted Successfully",{ position:"top right" ,className:"success"});
		              $('#confirm-delete').modal('toggle');
		              $('.selected'+id).remove();
		              close();
		           },        
		           error: function(data){
		            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
		          }

		         });

			});

		});
        $(document).on('click', '.add', function () {
            $('#add-discount').modal('toggle');
            // console.log(nonActiveShips);
            if ($.isEmptyObject(window.nonActiveShips)) {
                // alert('loading')
                $.ajax({
                    url: "{{route('shippingDiscount.nonDiscounted')}}",
                    type: 'GET',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        window.nonActiveShips = data;
                        Object.keys(window.nonActiveShips).forEach(function(key) {
                            $('.select2').append("<option id='"+window.nonActiveShips[key]['id']+"' data-img='"+window.nonActiveShips[key]['img']+"' value='"+window.nonActiveShips[key]['id']+"'>"+window.nonActiveShips[key]['title']+"</option>")
                        });
                        $('.select2').prop('selectedIndex', -1);
                        $('.select2.form-control').select2({
                            placeholder: {
                                id: '-1', // the value of the option
                                text: '{{trans('backend/shippingDiscount.selectShip')}}',
                            
                            }
                        });
                    },
                    error: function (data) {
                        $.notify("Whoops \n Error may be in connection to server", {
                            position: "top right",
                            className: "error"
                        });
                    }

                });
            }
        });
    });

</script>
@endsection

@endsection