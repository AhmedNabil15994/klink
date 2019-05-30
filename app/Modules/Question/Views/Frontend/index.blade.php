@extends('frontend.Single.index')

@section('styles')
<link rel="stylesheet" href="{{asset('/css/normalize.css')}}"/>
<!-- font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:300,400"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"/>
<!-- css file -->
<link rel="stylesheet" href="{{asset('/css/question.css')}}"/>
@endsection

@section('content')
<!-- Start question -->
    <div class="question-page">
        <div class="container">
            <div class='progress_ar'>
                <form id="regForm" action="#">
                    <div class="questions">
                        <!-- Question -->
                        <div class='tab active'>
                            <div class="control-group">
                                <h1>{{$question->question}}</h1>
                                <ul>
                                    @foreach($question->answers as $answerKey => $answerValue)
                                    <li class="newQuestion" data-attr="{{$question->id}}">
                                        <input type="radio" id="question-one-answer{{$answerKey+1}}" data-test="{{$answerValue->id}}" name="question-one">
                                        <label for="question-one-answer1">{{$answerValue->text}}</label>
                                        <div class="check"></div>
                                    </li>
                                    @endforeach                          
                                </ul>
                            </div>
                        </div>
                        <!--  End Question -->
                    </div>
                    
                    <div style="overflow:auto;">
                        <div class="down-button">
                            @if($question->last == 1)
                            <button type="button" id="nextBtn">Submit</button>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Circles which indicates the steps of the form: -->
                    <div id="numberofstep" style="text-align:center;margin-top:-25px;">
                        <span class="step"></span>
                    </div>
                
                </form>
            </div>
            <!-- start side right-->
            <div class="step-col">
                <div class="first">
                    <div class="icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="text">
                        <p>Telefonisch beraten lassen</p>
                        <p>Erfahren Sie alles zu unseren Ärzten und Behandlungen am Telefon</p>
                    </div>
                </div>
                <div class="second">
                    <div class="icon">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="text">
                        <p>Termin vereinbaren</p>
                        <p>Sichern Sie sich einen Termin für unsere Top-Behandlungen</p>
                    </div>
                </div>
                <div class="third">
                    <div class="icon">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <div class="text">
                        <p>Erstklassige Behandlung</p>
                        <p>Erhalten Sie eine ausgezeichnete Behandlung und fühlen Sie sich rundum wohl.</p>
                    </div>
                </div>
            </div>
            <!-- End side right-->
        </div><!-- End container-->
    </div>

    <!-- End question -->
@endsection

@section('scripts')
    <script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>

    <script type="text/javascript">
        $(function(){
            var data = [];
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click','li.newQuestion',function(e){
                e.preventDefault();
                e.stopPropagation();
                var answer_id = $(this).children('input').data('test');
                var outerBox = '#regForm .questions';
                var Box = '#regForm .questions';
                var loaging = '<div id="overlayPagination" class="overlay overlay-x1"><i class="fa fa-spinner fa-pulse fa-fw" ></i></div>';
                var question_id = $(this).data('attr');
                $(Box + '#overlayPagination').remove();
                $(Box).append(loaging);
                data.push({
                    'question_id': question_id,
                    'answer_id':  answer_id, 
                });

                $.ajax({
                    url: "{{URL::to(URL::current().'/newQuestion')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'question_id': question_id,
                        'answer_id':  answer_id, 
                        'data': data,
                    },
                    success: function (data) {
                        if(typeof(data) == 'object'){
                            window.location.href = data[1];
                        }else{
                            $('.tab.active').hide();
                            setTimeout(function(){
                                $(Box).append(data);
                                $('#numberofstep').append('<span class="step"></span>');
                                $('#overlayPagination').remove();
                            },2500);
                        }
                    },
                    error: function (data) {
                        $('#overlayPagination').remove();
                        $('#overlayError').remove();
                        var error = '<div id="overlayError" class="alert alert-danger" style="margin: 0"><h4>{{trans('backend/user.con_error')}}<i class="fa fa-exclamation fa-fw"></i></h4><p>{{trans('backend/user.try_again')}}</p></div>';
                        $(Box).html(error);
                    }

                });

            });
        });
    </script>
    
    <script>
      @if(Session::has('success'))
          $.notify("Saved successfully \n Information Saved Successfully", {position: "top right",className: "success"});
      @endif
      @if(Session::has('errors'))
        @foreach(Session::get('errors') as $err)
          $.notify("Whoops \n" + "{{ $err[0] }}", {position: "top right",className: "error"});
        @endforeach
      @endif
    </script>
@endsection
