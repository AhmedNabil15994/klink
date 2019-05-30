<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <div class="col-sm-4">
            <strong>Question Answers : </strong>
        </div>
        <div class="col-sm-8">
            <select class="form-control answers">
                <option disabled selected>Select Answer</option>
                @if(!empty($selectedQuestion))
                    @foreach(json_decode($selectedQuestion->answers) as $selectedAnswer)
                        <option value="{{$selectedAnswer->id}}">{{$selectedAnswer->text}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <div class="col-sm-4">
            <strong>New Questions : </strong>
        </div>
        <div class="col-sm-8">
            <select class="form-control questions" multiple="true">
                <option disabled >Select Question</option>
                @if(!empty($all))
                    @foreach($all as $one)
                        <option value="{{$one->id}}">{{$one->id}} - {{$one->question}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>