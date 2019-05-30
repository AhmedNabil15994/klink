@extends('frontend.Single.index')

@section('styles')
<style type="text/css">
    
</style>
@endsection

@section('content')
<!--page-->
<div class="faq-page single fullHeight">
  	<div class="container">           
    	<div class="row">
			<div class="col-xs-12">
				{!!html_entity_decode($data->layout)!!}
			</div>
		</div>
    </div>
</div>
<!--page--> 
@endsection


@section('scripts')
<script>
	$(function(){
		var ele = $('.single p a').each(function(){
			link = $(this).attr('href').replace('..','');
			$(this).attr('href',"{{\URL::current()}}"+link);
		});
	});
</script>
@endsection
