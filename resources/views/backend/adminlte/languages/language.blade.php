@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/language.list') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/language.list') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/language.list')
}}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/language.list') }}
@endsection
 
@section('main-content')
    @include('backend.adminlte.languages.newLanguageModal')
    @include('backend.adminlte.languages.editLanguageModal')
<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">

            <div class="row" style="margin-bottom: -35px;margin-right: 2px;">
                <button type="button" class="btn btn-success btn-circle pull-right add" value=""><i class="fa fa-plus"></i> <span>{{ trans('main.new') }}</span></button>
            </div>
            <table class="table table-hover daTatable dataTable deleteFormModal text-center demo-foo-filtering" data-form="deleteForm"
                id="users-table">
                <thead>
                    <tr style="background-color: #EEE;">
                        <th>{{ trans('main.no#') }}</th>
                        <th>{{trans('backend/language.language_title')}}</th>
                        <th>{{trans('backend/language.language_shortcut')}}</th>
                        <th>{{trans('backend/language.image')}}</th>
                        <th>{{trans('backend/language.is_active')}}</th>

                        {{--
                        <th>{{trans('backend/shipping.is_active')}}</th> --}}
                        <th>{{trans('main.action')}}</th>
                        <th>{{trans('backend/language.translation')}}</th>
                        {{-- <th>{{}}</th> --}}
                    </tr>
                </thead>

                <tbody>
                    <?php $i=0; ?> @foreach($languages as $language)
                    <tr class="selected{{$language->id}}">
                        <td>{{++$i}}</td>
                        <td class="name"> {{$language['name']}} </td>
                        <td class="shortcut">{{$language['shortcut']}}</td>
                        <td class="image"><img src="{{$language->image}}" width="20" alt=""></td>
                        <td class="is_active" value="{{$language['is_active']}}">{{$language['is_active']}}</td>
                        <td>
                            <button class="btn btn-success btn-xs edit" value="{{$language->id}}"><i class="fa fa-edit"></i>{{trans('main.edit')}}</button>
                            <?php $disabled = ''; ?>
                            @if($language->is_main)
                             <?php $disabled = 'disabled'; ?>
                            @endif
                            <button type="submit" class="btn btn-danger btn-xs delete" {{$disabled}}  value="{{$language->id}}"><i class="fa fa-close"></i>{{trans('main.delete')}}</button>
                        </td>
                        <td>
                                <a href="{{route('language.show',['languageFiles'=>$language->id])}}" class="btn btn-success btn-xs" value="{{$language->id}}"><i style="margin-right:5px;" class="fa fa-language"></i>{{trans('backend/language.translation')}}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            @if(!count($languages))
            <style type="text/css">
                tbody,
                .dataTables_wrapper .row:last-of-type,
                .dataTables_wrapper .row:first-of-type {
                    display: none;
                }
            </style>
            <div id="overlayError">
                <div class="row" style="margin-top: 10px;">
                    <div class="col-xs-6 text-left pull-right">
                        <img style="width: 120px;" src="{{asset('images/filter.svg')}}">
                    </div>
                    <div class="col-xs-3"></div>
                    <div class="col-xs-3 pull-left text-right">
                        <div class="callout" style="margin-top: 50px;border-left: 0;">
                            <h4>{{trans('main.no_res')}}<i class="fa fa-exclamation fa-fw"></i></h4>
                            <p>{{trans('main.no_res2')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@section('scripts')
    @include('backend.adminlte.layouts.modals.confirm_delete')
<script type="text/javascript">
    $(function () {
        $('.select2').prop('selectedIndex', -1);
        $('.select2.form-control').select2({
            placeholder: {
                id: '-1', // the value of the option
                text: '{{trans('backend / shipping.status ')}}'
            }
        })

        $(document).on('click', '.add', function () {
            $('#add-language').modal('toggle');
        });





        $(document).on('click', '.edit', function () {
            $('#edit-language').modal('toggle');
            var id = $(this).attr('value');
            parent = $('tr.selected' + id);
            
            $('#edit-language .name').val(parent.children('td.name').text());
            $('#edit-language .shortcut').val(parent.children('td.shortcut').text());
            $('#edit-language .select2').val(parent.children('td.is_active').attr('value')).trigger('change');
            $('#edit-language #imageEdit').val('');    
            $('#edit-language .btn-success').on('click', function (e) {

                e.preventDefault();
                e.stopPropagation();

                var $file = document.getElementById('imageEdit')
                // console.log($file);
                var $formData = new FormData();
                if ($file.files.length > 0) {
                    for (var i = 0; i < $file.files.length; i++) {
                        $formData.append('imageTemp', $file.files[i]);
                    }
                }
                $formData.append('id', id);
                $formData.append('name', $('#edit-language .name').val());
                $formData.append('shortcut', $('#edit-language .shortcut').val());
                $formData.append('is_active', $('#edit-language .is_active').val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('language.edit')}}",
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
                            $.notify("Updated successfully \n Shipping Type Updated Successfully", {
                                position: "top right",
                                className: "success"
                            });
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

        });


        $(document).on('click', '.delete', function () {
            $('#confirm-delete').modal('toggle');
            var id = $(this).attr('value');

            $(document).on('click', '#confirm-delete .btn-danger', function (e) {

                e.preventDefault();
                e.stopPropagation();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('language.destroy')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': id,
                    },
                    success: function (data) {

                        $.notify("Deleted successfully \n language Deleted Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        $('#confirm-delete').modal('toggle');
                        $('.selected' + id).remove();
                        close();
                    },
                    error: function (data) {
                        var errors = JSON.parse(data.responseText);
                        if (errors && errors.errors) {
                            $.notify('Whoops \n' + errors.errors.mainLanguage, {
                                position: "top right",
                                className: "error"
                            });
                        } else {

                            $.notify("Whoops \n Error may be in connection to server", {
                                position: "top right",
                                className: "error"
                            });
                        }
                    }

                });

            });

        });












    });

</script>
@endsection

@endsection