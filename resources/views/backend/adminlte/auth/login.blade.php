@extends('backend.adminlte.layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ url('/') }}" style="text-decoration: none;">{{config('app.name')}}</a>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> {{ trans('backend/message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="login-box-body">
        <p class="login-box-msg"> {{ trans('backend/message.siginsession') }} </p>
        <form action="{{ url('/backend/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('backend/message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('backend/message.password') }}" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8" style="padding-left: 0;">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> {{ trans('backend/message.remember') }}
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('backend/message.buttonsign') }}</button>
                </div><!-- /.col -->
            </div>
        </form>


        <a href="{{ url('/password/reset') }}" style="margin-top: 5px;display: block;text-align: center;">{{ trans('backend/message.forgotpassword') }}</a>
        <a href="{{ url('/register') }}" class="text-center" style="margin-top: 5px;display: block;text-align: center;">{{ trans('backend/message.registermember') }}</a>

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('backend.adminlte.layouts.partials.scripts_auth')

    
</body>

@endsection
