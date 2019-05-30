@include('frontend.userDashboard.layouts.partials.html_header')


 <!--start main wrapper-->
 <div class="main-wrapper view-profile">

    @include('frontend.userDashboard.layouts.partials.header')

    <!--main content-->
    <div class="mainContent view-profile">

        @include('frontend.userDashboard.layouts.partials.sidebar')

        @yield('sidebar2')

        @include('frontend.userDashboard.layouts.partials.search-add-modals')

        
        @yield('page-content')

    </div>
    <!--main content-->

</div><!--main wrapper-->
<!--end main wrapper-->
    
@include('frontend.userDashboard.layouts.partials.html_footer')



