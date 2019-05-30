<table class="table table-hover daTatable dataTable deleteFormModal text-center" data-form="deleteForm" id="docs-table">
    <thead>
        <th>{{trans('backend/email.no')}}</th>
        <th>{{trans('backend/email.name')}}</th>
        <th>{{trans('backend/email.layout')}}</th>
        <th>Page</th>
        <th>Display For</th>
        <th>Type
            <a class="btn btn-primary btn-xs" href="{{ route('documents.types') }}">
                <i class="fa fa-pencil-alt"></i>
            </a>
        </th>
        <th>{{trans('backend/email.action')}}</th>
    </thead>

    <tbody>
        <?php $count = 0; ?> 
        @foreach($data as $doc)
        <tr class="selected{{$doc->id}}">
            <td>{{++$count}}</td>

            <td class="title">{{$doc->name}}</td>                                 
            <td class="layout">------</td>
            <td class="page_id">
                <a href="#" class="route" data-type="select" data-pk="1" data-url="" data-id="{{$doc->id}}" data-title="Route">{{@$doc->Pages->route}}</a>
            </td>
            <td>
                @if($doc->display_for != null)
                @foreach(unserialize($doc->display_for) as $item)
                {{\App\Models\Frontend\NewDocument::getDisplayFor($item)}} <br>
                @endforeach
                @endif
            </td>
            <td>{{@$doc->document_type->name}}</td>

            <td class="action">
                <button class="btn btn-success btn-xs edit" value="{{$doc->id}}"><a href="{{route('documents.showTemplate',['id'=>$doc->id])}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</a></button>

                <button type="submit"class="btn btn-danger btn-xs delete" value="{{$doc->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

@if(!count($data))
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
