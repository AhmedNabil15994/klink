<ul class="nav nav-tabs">
  <li class="{{ active('shipping.index') }}"><a  href="{{ route('shipping.index') }}">{{ trans('backend/shipping.type') }}</a></li>
  <li class="{{ active('shipping.cost') }}"><a  href="{{ route('shipping.cost') }}">{{ trans('backend/shipping.cost') }}</a></li>
  <li class="{{Active('shippingDiscount.*')}}"><a href="{{ route('shippingDiscount.index') }}"><span>{{ trans('backend/shippingDiscount.title') }}</span></a></li>
  <li class="{{Active('shipping.spec')}}"><a href="{{ route('shipping.spec') }}"><span>{{ trans('backend/shippingDiscount.spec') }}</span></a></li>

</ul>