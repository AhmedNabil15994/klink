<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Page Header here')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('backend.dashboard')}}"><i class="fa fa-home"></i> {{ trans('backend/message.home') }}</a></li>
        <li class="prev" style="display: none;"><a href="#">@yield('previous_breadcrumb')</a></li>
        <li class="active">@yield('current_breadcrumb')</li>
    </ol>
</section>