@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/login_style.css">
<style type="text/css">
    .alert-danger{
        width: 100%;
        margin: 0;
        padding: 25px 0 !important;
        background-color: #d9534f;
        color: #FFF;
        border-radius: 5px;
        border-color: #d43f3a;
    }

    .reset-form{
        margin-bottom:10rem;
    }

    


</style>
 <!--login forget space-->
 <section class="log-section">
        <div class="black-overlay">
            <div class="container">


                <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3  col-xs-10 col-xs-offset-1">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif    
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

                    <div class="log_space rale">

                        <div class="slide-item active">

                            <form action="{{url('password/reset')}}" class="reset-form" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <div class="site-logo">
                                        <img src="images/logo3.png" alt="logo">
                                    </div>
                                </div><!--form group-->


                                <div class="form-group">
                                    <h3 class="rest_heading">{{trans('frontend/auth.write')}}</h3>
                                </div>



                                <div class="form-group">
                                    <span class="icon glyphicon glyphicon-user
                                    "></span>
                                    <input type="email" name="email" id="emailreset" required>
                                    <label for="emailreset" class="special">{{trans('frontend/auth.email')}}</label>
                                </div><!--form group-->

                            
                                

                                <div class="form-group center-text">
                                    <input class="custom-input" type="submit" id="reset" value="{{trans('frontend/auth.reset_pass')}}">
                                </div><!--form group-->

                                <div class="form-group center-text">
                                    <a href="{{route('login')}}" class="backtolog">
                                        <span class="glyphicon glyphicon-arrow-left
                                        "></span>
                                        {{trans('frontend/auth.back')}}
                                    </a>
                                </div><!--form group-->


                            </form>

                        </div><!--slide item-->

                    </div><!--log space-->


                </div>


            </div><!--container-->

        </div>
    </section><!--section-->

    
    <!--login forget space-->

@include('frontend.layouts.partials.footer')
<script type="text/javascript" src="js/login_script.js"></script>
<script type="text/javascript">
    $(function(){

        $('#reset').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/postReset",
                type: 'POST',
                data: {
                    '_token': $('input[name="_token"]').val(),
                    'email': $('#emailreset').val(),
                } ,
                success: function (data) {
                    if (isNaN(data)){
                        $.each(data['errors'], function(i, item) { 
                            $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                        });      
                    }   
                    if(data==1){
                                        
                    }
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                }

            });
        });

    });
</script>