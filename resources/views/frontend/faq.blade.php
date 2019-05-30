@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/faq-style.css">
<style type="text/css">
    body{
        overflow-x:hidden;
    }
    .faq-page{
        background: #f9f9f9;
    }
    .container .row:nth-of-type(2) div{
        margin-right: 0;
        margin-left: 0;
    }

    .main{
        padding: 2rem;
    }
    .main h3{
        font-size: 3.2rem;
        font-weight: bold;
        color: #000;
    }
    .main p{
        font-size: 1.4rem;
        color: #777;
    }
    .head{
        padding: 2rem;
    }
    .info{
        position: relative;
        background: #FFF;
        border-radius: .5rem;
        box-shadow: -.1rem 0 .5rem 0 rgba(65, 65, 65, 0.12);
    }
    .info .title{
        padding: .5rem 1.5rem;
        width: 80%;
        display: inline-block;
        float: left;
        margin-right: .1rem !important;
    }
    .info .title h4{
        color: #000;
        font-weight: bold;
        line-height: 1.5;
        font-size:1.7rem;
    }
    .info .icon{
        position: absolute;
        width: 20%;
        height: 100%;
        display: inline-block;
        float: left;
        background:  #f6ab36;
        color: #FFF;
        border: .1rem solid #f6ab36;
        text-align: center;
        cursor: pointer;
        border-top-right-radius: .5rem;
        border-bottom-right-radius: .5rem;
    }
    .info .icon i{
        font-size:2rem;
        margin-top: 1.7rem;
    }
    .info .icon i.fa-minus{
        display:none;
    }
    .info .icon.special i.fa-plus{
        display:none;
    }
    .info .icon.special  i.fa-minus{
        display:inline-block;
    }

    /*
    .info .icon:before{
        content: '';
        position: absolute;
        top: 50%;
        z-index: 4;
        transform: translateY(-50%);
        background: #fff;
        width: 1.4rem;
        height: .2rem;
        right: 42%;
    }
    .info .icon:after{
        content: '';
        position: absolute;
        top: 50%;
        z-index: 4;
        transform:translateY(-50%);
        background: #fff;
        width: .2rem;
        height: 1.4rem;
        right: 47.72%;
    }
    */


    .info .icon.special:after {
        display: none;
    }

    .details{
        color: #9f9f9f;
        background: #fff;
        box-shadow: -.1rem 0 .5rem 0 rgba(65, 65, 65, 0.12);
        border-radius: 0 0 .6rem .6rem;
        padding: 2rem;
        display: none;
    }
    .new{
        background:#FFF;
        margin: 0;
        margin-top: 5rem;
        padding: 2rem;
    }
    .new h3{
        margin-bottom: 2.5rem;
        font-size:1.8rem;
    }
    .form-group .col-sm-6{
        margin-bottom: 1.5rem;
    }
    .form-group .col-sm-6:first-of-type{
        padding-left: 0;
    }
    .form-group .col-sm-6:last-of-type{
        padding-right: 0;
        padding-left: 0;
    }
</style>
<!--faq page-->
<div class="faq-page fullHeight">

<!--row-->
<div class="faq-page-header">
    <div class="container">
        <div class="col-xs-12">
            <h3>
                {{trans('frontend/dashboard.faq')}}
                <span class="fas fa-question-circle"></span>
            </h3>
        </div>
    </div>
</div>
<!--row-->

<div class="container">

    <div class="row">
        <div class="col-sm-6 col-xs-12 main">
            <h3>{{trans('frontend/dashboard.head1')}}</h3>
            <p>{{trans('frontend/dashboard.p1')}}</p>

            <div class="col-sm-12 col-xs-12">
                @foreach($general as $one)

                <div class="head">
                    <div class="row">
                        <div class="info">
                            <div class="title">
                                <h4>{{$one->question}}</h4>
                            </div>
                            <div class="icon">
                                 <i class="fas fa-plus"></i>
                                 <i class="fas fa-minus"></i>
                            </div>    
                            <div class="clearfix"></div>
                        </div>
                        <div class="details">
                            <p>{{$one->reply}}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        <div class="col-sm-6 col-xs-12 main">
            <h3>{{trans('frontend/dashboard.head2')}}</h3>
            <p>{{trans('frontend/dashboard.p2')}}</p>

            <div class="col-sm-12 col-xs-12">
                @foreach($other as $one)

                <div class="head">
                    <div class="row">
                        <div class="info">
                            <div class="title">
                                <h4>{{$one->question}}</h4>
                            </div>
                            <div class="icon">
                                 <i class="fas fa-plus"></i>
                                 <i class="fas fa-minus"></i>
                            </div>    
                            <div class="clearfix"></div>
                        </div>
                        <div class="details">
                            <p>{{$one->reply}}</p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
    </div>

    


</div>


<div class="row new">
    <div class="container">

    <!--row-->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3>{{trans('frontend/dashboard.head3')}}</h3>

            <form action="" class="qustion-form">
                

                <div class="form-group">
                    <div class="col-sm-6 col-xs-12">
                        <label for="email">{{trans('frontend/dashboard.write_your')}} :</label>
                        <input type="email" class="form-control" id="email" required placeholder="{{trans('frontend/dashboard.write_your2')}}">
                    </div>
                    
                    <div class="col-sm-6 col-xs-12">
                        <label for="name">{{trans('frontend/dashboard.your_name')}} :</label>
                        <input type="text" id="name" class="form-control" required placeholder="{{trans('frontend/dashboard.your_name')}}">
                    </div>
                </div>


                <div class="form-group">
                    <label for="textarea" >{{trans('frontend/dashboard.your_msg')}}</label>
                    <textarea id="textarea" placeholder="{{trans('frontend/dashboard.write_ques')}}"></textarea>
                </div>

                <div class="form-group">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                </div>

                <input type="submit" id="send" value="{{trans('frontend/dashboard.send_ques')}}">







            </form>



        </div>
    </div>
    <!--row-->



</div>

</div>

</div>
<!--faq page--> 


@include('frontend.layouts.partials.footer')
<script type="text/javascript">
    $(function(){

        $('.icon').on('click',function(){

            $(this).toggleClass('special');
            $(this).parents('.info').siblings('.details').slideToggle(500);
        });

        $('#send').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            console.log($('.g-recaptcha-response').val());
            $formData = new FormData();

            
            $formData.append('g-recaptcha-response',$('.g-recaptcha-response').val());
            $formData.append('name',$('#name').val());
            $formData.append('email',$('#email').val());
            $formData.append('question',$('#textarea').val());
            
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
               url: "{{route('qustion_store')}}",
               type: 'POST',
               data: $formData ,
               dataType: 'json',
               contentType: false,
               processData: false,
               success: function (data) {
                if (isNaN(data)){
                  $.each(data['errors'], function(i, item) { 
                    $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                  });            
                }else if(data==1){
                  $.notify("Sent successfully \n Question Sent Successfully",{ position:"top right" ,className:"success"});
                  setTimeout(function () {
                      location.reload();
                  },2000)
                } 
               },        
               error: function(data){
                $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
              }

             });
        });

    });
</script>
