<h4 class="order_heading">{{trans('frontend/order.offers')}}</h4>

<ul class="values">
	<li>
		<span class="value_title">{{trans('frontend/order.name')}}</span>
		<span class="value_title">{{trans('frontend/order.total')}}</span>
		<span class="value_title">{{trans('frontend/order.action')}}</span>
	</li>
	@foreach($offers as $offer)
	<li>
		<?php 
			$profile = \DB::table('user_profiles')->where('user_id','=',$offer->user_id)->first();
			$order = \DB::table('orders')->where('id','=',$offer->order_id)->first();
			$ship = \DB::table('shippings')->where('id','=',$order->ship_id)->first();
			$comment = \DB::table('comments')->where('user_id','=',$offer->user_id)->where('order_id','=',$offer->order_id)->first();
			// $comment = [];
			$discount = $ship->discount;
			$total = $offer->total;

			$x = round($total / (119/100) ,2);

			$new_vat = round( $total - $x ,2);
			//x = round($total - $new_vat , 2);
			$n = round( $x * ( 1 + ($discount/100) ) , 2);
		?>

		<span class="value profile">{{$profile->first_name}} {{$profile->last_name}}</span>
		
		@if($order->min == $offer->total)
		<span class="value myNumberFont">{!! Helper::convNum($order->cost) !!}</span>
		
			@if(isset($comment))
			<span class="btn btn-xs btn-success accept" value="{{$offer->id}}" data-val="{{$order->cost}}" data-check='0'><i class="fas fa-check-circle"></i></span>
			<span class="btn btn-xs btn-primary comment" data-toggle="modal" data-target="#commentModal"><i class="fas fa-envelope"></i></span>
			<input type="hidden" name="comment" class="com" value="{{$comment->comment}}">
			@else
			<span class="btn btn-xs btn-success accept" value="{{$offer->id}}" data-val="{{$order->cost}}" data-check='0' data-company="{{$profile->company}}">{{trans('frontend/order.accept')}}</span>
			@endif
		@else
		<span class="value myNumberFont">{!! Helper::convNum($n) !!}</span>
		
			@if(isset($comment))
			<span class="btn btn-xs btn-success accept" value="{{$offer->id}}" data-val="{{$offer->total}}" data-check='1'><i class="fas fa-check-circle"></i></span>
			<span class="btn btn-xs btn-primary comment" data-toggle="modal" data-target="#commentModal"><i class="fas fa-envelope"></i></span>
			<input type="hidden" name="comment" class="com" value="{{$comment->comment}}">
			@else
			<span class="btn btn-xs btn-success accept" value="{{$offer->id}}" data-val="{{$offer->total}}" data-check='1' data-company="{{$profile->company}}">{{trans('frontend/order.accept')}}</span>
			@endif
		
		@endif

	</li>
	@endforeach
<ul>
