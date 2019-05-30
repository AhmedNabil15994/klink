@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title')
Documents
@endsection
 
@section('contentheader_title')
Documents
@endsection
 
@section('contentheader_description') 
	@yield('customer_business_title')
@endsection


<!--breadcrumb current page-->

@section('current_breadcrumb')
Documents
@endsection


@section('main-content')



<div class="tab-content col-lg-9 col-md-12">
	<div id="home" class="tab-pane active in">
		<div class="pag">
			
			@yield('contract')
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="col-lg-3 actions">
	@yield('contract_fields')
	<div class="row actions" style="padding: 0;margin: 0;margin-bottom: 2.5rem;">
        <a href="#" class="btn btn-xs btn-default download" id="download" data-val="{{@$data->id}}"><i class="fa fa-save fa-1x"></i> {{trans('frontend/order.download')}}</a>
        <a href="#" class="btn btn-xs btn-default print" data-val="{{@$data->id}}"><i class="fa fa-print fa-1x"></i> {{trans('frontend/order.print')}}</a>
    </div>
</div>
<div class="clearfix"></div>

@endsection

@section('scripts')
	<script type="text/javascript">
		$(function(){
			
			$('a.editable').editable({
				mode:'inline',
			});
			$('a.editable[data-type="date"]').editable({
				mode: 'inline',
		        type: 'date',
		        format  :'yyyy-mm-dd',
		        viewformat: 'yyyy-mm-dd',
		        datepicker  :{
		            container : '#birthdate',
		            autoclose : 'true',
		            format: 'yyyy-mm-dd'
		        },
			})
		});
	</script>
	@yield('scripts2')
@endsection

