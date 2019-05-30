@include($pathToView.'.layout.headers.html_header')

<!--start main wrapper-->
<div class="main-wrapper view-profile">
    @include($pathToView.'.layout.headers.header')

    <!--main content-->
    <div class="mainContent view-profile">
    @include($pathToView.'.layout.headers.sideBar') 
    @include($pathToView.'.layout.headers.sideBar2');
    @include('frontend.dashboard.layouts.partials.search-add-modals')
        @yield('page-content')

    </div>
    <!--main content-->

</div>
<!--main wrapper-->
<!--end main wrapper-->
    @include($pathToView.'.layout.headers.html_footer')