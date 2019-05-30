@include('frontend.layouts.partials.nav')

@section('title')
{{ucwords($data->title)}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/faq-style.css')}}">
<style type="text/css">
    .faq-page{
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
@endsection

<!--faq page-->
<div class="faq-page fullHeight">

    <div class="container">

            {!!html_entity_decode($data->layout)!!}
       
    </div>

</div>
<!--faq page--> 


@include('frontend.layouts.partials.footer')

