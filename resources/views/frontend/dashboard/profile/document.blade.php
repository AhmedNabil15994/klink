@extends('frontend.dashboard.profile.index')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('new-content')
    <!--upload file modal-->
        <div class="modal fade rale" tabindex="-1" role="dialog" id="fileUploadNewModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="fas fa-file"></span>{{trans('frontend/dashboard.upload_doc')}}</h4>
                    </div>
                    <!--modal body-->
                    <div class="modal-body">
        
                        <!--custom upload-->
                        <div class="custom-upload">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="vehcileweight">{{trans('frontend/dashboard.name')}}</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="selectpicker" id="documentTypesSelect">
                                                                    @foreach($types as $type)
                                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                                    @endforeach
                                                                </select>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="vehcileweight">{{trans('frontend/dashboard.doc_desc')}}</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" placeholder="{{trans('frontend/dashboard.doc_desc')}}" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="vehcileweight">{{trans('frontend/dashboard.docDate')}}</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control documentDate">
                                    </div>
                                </div>
                            </div>
        
        
                            <input type="file" id="img-upload" hidden="hidden">
                            <div class="file-info">
                                {{trans('frontend/dashboard.no_file')}}
                            </div>
                            <button class="choose-button">{{trans('frontend/dashboard.choose_file')}}</button>
        
        
                        </div>
                        <!--custom upload-->
        
        
                    </div>
                    <!--modal body-->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                        <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.upload')}}</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!--upload file modal-->
        
        <h4 class="section-heading">
            {{trans('frontend/dashboard.your_docs')}} :
        </h4>
        
        
        
        <div class="info-content">
        
            <!--data group-->
            <div class="data-group">
                <button class="data-button profile-document">
                    {{trans('frontend/dashboard.upload_doc')}}
                </button>
            </div>
            <!--data group-->
        
            <div class="table-space">
                <table class="table">
        
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{trans('frontend/dashboard.name')}}</th>
                            <th>{{trans('frontend/dashboard.doc_desc')}}</th>
                            <th>{{trans('frontend/dashboard.upload_date')}}</th>
                            <th>{{trans('frontend/dashboard.actions')}}</th>
                        </tr>
                    </thead>
        
        
                    <tbody>
                        <?php $i=0; ?> @foreach($data as $document)
                        <tr>
                            <th>{{++$i}}</th>
                            <th>{{$document->name}}</th>
                            <td>{{$document->description}}</td>
                            <td>{!! Helper::convert($document->created_at) !!}</td>
                            <td>
                                <a href="#" class="down_doc" data-val="{{$document->id}}">Download</a>
                            </td>
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
    $('.documentDate').val(new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDay());
    $('.documentDate').datetimepicker({
        format:'Y-m-d',
    });
    // $(".datepicker").datepicker("update", new Date());
  $('#fileUploadNewModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var $file = document.getElementById('img-upload');
                $formData = new FormData();
                if ($file.files.length > 0) {
                   for (var i = 0; i < $file.files.length; i++) {
                      $formData.append('image', $file.files[i]);
                   }
                 }

                $formData.append('type', $('#fileUploadNewModal .selectpicker option:selected').val());
                $formData.append('description', $('#fileUploadNewModal textarea').val());
                $formData.append('documentDate', $('#fileUploadNewModal .documentDate').val());
            
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    url: "{{route(Helper::type($profile->status).'.documents_add')}}",
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
        });
    

  $(document).on('click','.down_doc',function(e){
      e.preventDefault();
      e.stopPropagation();
      var id = $(this).data('val');
      var route = "{{route(Helper::type($profile->status).'.download_attach',['id' => 'uid'])}}";
      route = route.replace('uid', id);
      window.location.href = route;
  });


});
</script>
@endsection