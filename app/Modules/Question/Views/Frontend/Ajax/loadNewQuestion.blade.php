<!-- Question -->
<div class='tab active'>
  <div class="control-group">
    <h1>{{$data->question}}</h1>
    <ul>
        
        @foreach($data->answers as $answerKey => $answerValue)
        <li class="newQuestion" data-attr="{{$data->id}}">
            <input type="radio" id="question-one-answer{{$answerKey+1}}" data-test="{{$answerValue->id}}" name="question-one">
            <label for="question-one-answer1">{{$answerValue->text}}</label>
            <div class="check"></div>
        </li>
        @endforeach
                                  
    </ul>
  </div>
</div>

<!--  End Question -->