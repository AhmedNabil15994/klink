@extends('backend.adminlte.documents.index')

@section('previous_breadcrumb')
Documents
@endsection

@section('current_breadcrumb')
Edit Template
@endsection

@section('contract')
<style type="text/css">
iframe{
    min-height: 400px;
}
.pag{
    min-height: 700px;
}
.save{
    margin-bottom: 10px;
}
.btn-xs{
    display: inherit;
    margin-bottom: 5px;
}
.actions .fields,.actions .fields .row{
    margin-bottom: 0;
    padding: 0 5px;
}
@media print{
    .actions,.main-footer{
        display: none;
    }
    .tab-content,.pag{
        border:0;
    }
    .editable-click, a.editable-click, a.editable-click:hover{
        border-bottom: 0;
    }
}
</style>
<form id="invoiceForm" action="{{route('documents.downloadTemplate')}}" method="post">
    <div class="invoice-wrapper openSans">
        <div class="col-xs-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Name</label>
                    </div>
                    <div class="col-xs-8">
                        <input type="text" class="name form-control" placeholder="Name" value="{{$data->name}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Document Type</label>
                    </div>
                    <div class="col-xs-8">
                        <select class="form-control types">
                        @foreach($types as $type)   
                            <option value="{{$type->id}}" {{$type->id == $data->document_type_id ? "selected" : ""}} >{{$type->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Document Person</label>
                    </div>
                    <div class="col-xs-8 persons">

                        @foreach($persons as $person)   
                            <input type="checkbox" name="persons" class="icheckbox_flat" data-id="{{$person['id']}}" {{$data->display_for != null ? in_array($person['id'],unserialize($data->display_for)) ? 'checked':'' : ''}}> {{$person['title']}}
                        @endforeach
                
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-4">
                        <label>Document Route</label>
                    </div>
                    <div class="col-xs-8">
                        <select class="form-control pages">
                        @foreach($pages as $page)   
                            <option value="{{$page->id}}" {{$page->id == $data->page_id ? "selected" : ""}} >{{$page->title}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="first-div" id="first-div">

            </div>
        </div>

        <input type="hidden" id="layout" value="{{$data->layout}}">
    </div>
</form>
@endsection

@section('contract_fields')
    <div class="row fields">
    @foreach($vars as $key => $value)
    <div class="col-xs-12">
        <div class="form-group">
            <div class="row">
                <label>{{$value}}: </label>
            </div>
            <div class="row">
                <input type="text" class="form-control new-data" placeholder="{{$value}}" data-type="{{$key}}">
            </div>
        </div>
    </div>
    @endforeach
    </div>
@endsection

@section('scripts2')
<script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
        
            tinyMCE.init({
                'formats' : {
                    
                    'alignright' : {'selector' : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', attributes: {"align":  'right'}},
                    
                }
            });
            tinymce.init({
                    selector: "div.first-div",
                    theme: "modern",
                    height:100,
                    menubar: true,
                    statusbar: true,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons  paste textcolor"
                    ],
                    toolbar: "rtl | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
            });
    $(function(){

            $("input[type=checkbox]").iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_minimal-blue'
            }); 
            
            $('.first-div').html($('#layout').val());
            $('.row.actions').prepend('<a href="#" class="btn btn-xs btn-default save ladda-button" data-style="expand-right" id="save" value="{{$data->id}}"><i class="fa fa-save fa-1x"></i> {{ trans('main.save') }}</a>')

            var l = $('.ladda-button').ladda();

            $('.breadcrumb .prev').toggle();
            $('.breadcrumb .prev a').click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                window.location.href = "{{route('documents.index')}}";
            });

           
            $(document).on('click','#save',function(){
                $('.ladda-button').ladda('start');
                var display_for = [];
                $('.icheckbox_square-blue.checked').each(function(){
                    display_for.push($(this).children('input').data('id'));
                });


                var id = $(this).attr('value');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('documents.editTemplate')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': id,
                        'name': $('input.name').val(),
                        'layout': tinyMCE.activeEditor.getContent(),
                        'document_type_id': $('select.types option:selected').val(),    
                        'page_id': $('select.pages option:selected').val(),   
                        'display_for': display_for, 
                    },
                    success: function (data) {
                        $.notify("Update successfully \n Template Update Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                                location.reload();
                        }, 2000);
                    },
                    error: function (data) {
                        $.notify("Whoops \n Error may be in connection to server", {
                            position: "top right",
                            className: "error"
                        });
                        setTimeout(function () {
                            $('.ladda-button').ladda('stop');
                        }, 2000)
                    }
                });
            });

            $(document).on('click','.print',function(e){
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).data('val');
                var myVars = [];
                $('input.new-data').each(function(index){
                    myVars.push($(this).val());
                });
                var newWin=window.open('','Print-Window');
                var style = '<head>'+
                            '<style type="text/css">'+
                                'p{margin:0 !important;}'+
                                'body{padding:30px;border:1px solid #DDD;}'+
                            '</style>'+
                            '</head>';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('documents.convertTemplate')}}",
                    type: 'GET',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'myVars': myVars,
                        'id': id,
                    },
                    success:function(data){
                        newWin.document.open();

                        newWin.document.write('<html>'+style+'<body onload="window.print()">'+data+'</body></html>');

                        newWin.document.close();

                        setTimeout(function(){newWin.close();},10);
                    },
                    
                });            
               

            });
            
            
            $(document).on('click', '#download', function (e) {
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).data('val');
                var myVars = [];
                $('input.new-data').each(function(index){
                    myVars.push($(this).val()) ;
                });
                var data = {
                        '_token': $('input[name="_token"]').val(),
                        'data': tinyMCE.activeEditor.getContent(),
                        'name': $('input.name').val(),
                        'myVars': myVars,
                        'id': id,
                    };

                $.each(data , function(key,value){
                    $('#invoiceForm').append("<input type='hidden' name='"+key+"' value='"+value+"'>");
                });
                $('#invoiceForm').submit();
            });

    });
</script>
@endsection