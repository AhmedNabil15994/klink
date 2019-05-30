@include('frontend.dashboard.layouts.partials.html_header')


 <!--start main wrapper-->
 <div class="main-wrapper">

    @include('frontend.dashboard.layouts.partials.header')

    <!--main content-->
    <div class="mainContent">

        @include('frontend.dashboard.layouts.partials.sidebar')

        @yield('page-content')

    </div>
    <!--main content-->

</div><!--main wrapper-->
<!--end main wrapper-->
    
@include('frontend.dashboard.layouts.partials.html_footer')



