@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> 
@section('new-content')
<div class="info-content">
    <div class="modal fade rale" tabindex="-1" role="dialog" id="newTaxUpload">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><span class="fas fa-file"></span>{{trans('frontend/dashboard.upload_doc')}}</h4>
                </div>
                <!--modal body-->
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                {{trans('frontend/dashboard.tax-id')}}
                            </div>
                            <div class="col-sm-8">
                                <input type="text" placeholder="{{trans('frontend/dashboard.tax-id')}}" id="add-tax-id" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                {{trans('frontend/dashboard.tax-number')}}
                            </div>
                            <div class="col-sm-8">
                                <input type="text" placeholder="{{trans('frontend/dashboard.tax-number')}}" id="add-tax-number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                {{trans('frontend/dashboard.tax-ministry')}}
                            </div>
                            <div class="col-sm-8">
                                <input type="text" placeholder="{{trans('frontend/dashboard.tax-ministry')}}" id="add-tax-ministry" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!--modal body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                    <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--data group-->
    <div class="data-group">
        @if(count($taxes) == 0)
        <button class="data-button add-tax">
            {{trans('frontend/dashboard.add')}}
        </button>
        @endif
    </div>
    <div class="table-space">
        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{trans('frontend/dashboard.tax-id')}}</th>
                    <th>{{trans('frontend/dashboard.tax-number')}}</th>
                    <th>{{trans('frontend/dashboard.tax-ministry')}}</th>
                    {{--
                    <th>{{trans('frontend/dashboard.actions')}}</th> --}}
                </tr>
            </thead>


            <tbody>
                <?php $i=0; ?> @foreach($taxes as $tax)
                <tr>
                    <th>{{++$i}}</th>
                    <th>{{$tax->tax_id}}</th>
                    <td>{{$tax->tax_number}}</td>
                    <td>{{$tax->ministry }}</td>

                </tr>
                @endforeach

            </tbody>




        </table>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
    $(function () {
        $('.add-tax').click(function () {
            $('#newTaxUpload').modal('show');
        })
        $('#newTaxUpload .btn-primary').click(function(){
            var $formData = new FormData();
            $formData.append('add-tax-id',$('#add-tax-id').val())
            $formData.append('add-tax-number',$('#add-tax-number').val())
            $formData.append('add-tax-ministry',$('#add-tax-ministry').val())
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route(Helper::type($profile->status).'.tax_add')}}",
                type: 'POST',
                data: $formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    if (isNaN(data)) {
                        $.each(data['errors'], function (i, item) {
                            $.notify("Whoops \n" + item, {
                                position: "top right",
                                className: "error"
                            });
                        });
                    } else if (data == 1) {
                        $.notify("Saved successfully \n Document Saved Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        $('#fileUploadNewModal').modal('toggle');
                        setTimeout(function () {
                            location.reload();
                        }, 2000)
                    }
                },
                error: function (data) {
                    $.notify("Whoops \n Error may be in connection to server", {
                        position: "top right",
                        className: "error"
                    });
                }

            });
        })
    })

</script>
@endsection