@include('frontend.layouts.partials.nav')
<link rel="stylesheet" href="css/about-style.css">
<!--about-->
<section class="about">

<div class="container">

    <div class="row">
        <article class="about-post">
            <h2>{{trans('frontend/about.title1')}}</h2>
            <p>
                
                {{trans('frontend/about.sentence1')}}

            </p>
        </article>
    </div><!--row-->

    <div class="row">
        <article class="about-post">
            <h2>{{trans('frontend/about.title2')}}
                </h2>
            <p>
                   
                {{trans('frontend/about.sentence2')}}

            </p>
        </article>
    </div><!--row-->


    <div class="row">
        <article class="about-post">
            <h2>{{trans('frontend/about.title3')}}

                </h2>
            <p>
               {{trans('frontend/about.sentence3')}}     
            </p>
        </article>
    </div><!--row-->
    
</div><!--container-->


</section>
<!--about-->

@include('frontend.layouts.partials.footer')