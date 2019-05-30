@include('frontend.order.uncompleted.layouts.partials.html_header')


 <!--start main wrapper-->
 <div class="main-wrapper view-profile">

    @include('frontend.order.uncompleted.layouts.partials.header')

    <!--main content-->
    <div class="mainContent view-profile">

        @include('frontend.order.uncompleted.layouts.partials.sidebar')

        @yield('sidebar2')

        @include('frontend.order.uncompleted.layouts.partials.search-add-modals')

        
        @yield('page-content')

    </div>
    <!--main content-->

</div><!--main wrapper-->
<!--end main wrapper-->
    
@include('frontend.order.uncompleted.layouts.partials.html_footer')



