<table class="table table-hover daTatable dataTable deleteFormModal text-center" data-form="deleteForm" id="questions-table">
	<thead>
		<tr style="background-color: #EEE;">
			<th>{{ trans('main.no#') }}</th>
			<th>Question</th>
			<th>Answers</th>
			<th>Main</th>
			<th>Relatives</th>
			<th>Document</th>
			<th>Notes</th>
			<th>{{trans('main.action')}}</th>
		</tr>
	</thead>

	<tbody>
		<?php $i = 0; ?>
		@foreach($data as  $question)

		<tr class="tab-row{{$question->id}}">
			<td>{{++$i}}</td>
			<td><a href="#" class="editable question" data-id="{{$question->id}}">{{$question->question}}</a></td>
			<td>
				@foreach($question->answers as $answer)
				{{$answer->id}} - <a href="#" class="editable answers" data-question="{{$question->id}}" data-id="{{$answer->id}}">{{$answer->text}}</a><br>
				@endforeach
			</td>
			<td>{{$question->is_main}}</td>
			<td>
				@foreach($question->relatives as $one)
				{{$one['answer']->id}} - {{$one['answer']->text}} => {{$one['related_question']->id}} - {{$one['related_question']->question}} <br>
				@endforeach
			</td>
			<td>
				<a href="#" class="document" data-type="select" data-pk="1" data-url="" data-id="{{$question->id}}" data-title="Document">{{@$question->document->name}}</a>
			</td>
			<td>{{$question->notes}}</td>
			<td>
				<button type="submit" class="btn btn-success btn-xs edit" value="{{$question->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
				<button type="submit" class="btn btn-danger btn-xs delete" value="{{$question->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
			</td>
		</tr>

		@endforeach

	</tbody>

</table>
@if(!count((array)$data) > 0)
<style type="text/css">
tbody,
.dataTables_wrapper .row:last-of-type,
.dataTables_wrapper .row:first-of-type{
	display: none;
}

</style>
<div id="overlayError">
	<div class="row" style="margin-top: 20px;display: block;">
		<div class="col-xs-6 text-left pull-right">
			<img style="width: 120px;" src="{{asset('img/filter.svg')}}">
		</div>
		<div class="col-xs-6 text-right">
			<div class="callout callout-info" style="margin-top: 50px;">
				<h4>{{trans('backend/user.no_result')}}<i class="fa fa-exclamation fa-fw"></i></h4>
				<p>{{trans('backend/user.no_result_now')}}</p>
			</div>
		</div>
	</div>
</div>
@endif

