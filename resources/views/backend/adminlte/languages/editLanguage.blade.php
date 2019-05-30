@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/language.update') }}
@endsection


@section('contentheader_title') {{ trans('backend/language.update') }}
@endsection
 
@section('contentheader_description')

<b>{{$languageFiles->name}}</b>
@endsection
 
@section('current_breadcrumb') {{ trans('backend/language.update') }}
@endsection


@section('main-content')
<div class="text-editor-wrapper">
    <div class="right-side-editor">
        <div style="margin-bottom:0px;margin-left:0px;" class="row">
            <button type="button" class="btn btn-success btn-circle save" value=""><i class="fa fa-save"></i> <span>{{ trans('backend/language.save') }}</span></button>
            <button type="button" class="btn btn-success btn-circle refresh" value=""><i class="fa fa-refresh"></i> <span>{{ trans('backend/language.refresh') }}</span></button>
        </div>
        <div id="tree"></div>
    </div>
    <div class="edit-area clearfix">

        <table class="table table-hover daTatable dataTable  text-center " data-form="deleteForm" id="text-table">
            <thead>
                <tr style="background-color: #EEE;">
                    <th>{{ trans('main.no#') }}</th>
                    <th>{{trans('backend/language.original_text')}}({{App::getLocale()}})</th>
                    <th>{{trans('backend/language.translated')}}</th>

                </tr>
            </thead>

            <tbody>


            </tbody>

        </table>
    </div>
</div>



@section('scripts')
<link rel="stylesheet" href="{{ asset('/plugins/fancytree/skin-lion/ui.fancytree.min.css') }}">
    @include('backend.adminlte.layouts.modals.confirm_delete')
    @include('backend.adminlte.layouts.partials.scripts')
<script src="{{ asset('/plugins/fancytree/jquery.fancytree-all-deps.min.js') }}"></script>
<style>
    .text-editor-wrapper {
        display: flex;
        flex-wrap: wrap;

    }

    .text-editor-wrapper .edit-area {
        display: flex;
        flex: 1 0 auto;
        max-width: calc(100% - 200px);
        min-width: 500px;
        flex-direction: column;
    }

    @media screen and (max-width:990px) {
        .text-editor-wrapper {
            overflow-x: auto;
        }
        .right-side-editor {
            min-width: 100%;
        }
        .text-editor-wrapper .edit-area {
            min-width: 100% !important;
            margin-top: 10px;
        }
    }

    .fancytree-ico-c .fancytree-icon {
        background-image: url('/images/translate.svg');
    }

    ul.ui-fancytree {
        margin-bottom: 10px;
        height: 100%;
    }

    .right-side-editor {
        min-width: 200px;
        display: flex;
        flex-direction: column;

    }

    #tree {
        flex: 1 0 auto;
        margin-top: 10px;
    }

    .fancytree-ico-c span.fancytree-icon:hover {
        background-image: url('/images/translate.svg');
        background-position: initial;
    }

    #text-table {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
        max-width: 100% !important;
    }

    #text-table textarea {
        width: 100%;
        height: 100%;
        max-width: 100%;
        max-height: 150px;
        min-width: 100%;
        min-height: 55px;
    }
    #text-table tbody tr > td{
        max-width: 200px;
    }
</style>
<script>
    window.addEventListener('load', function (){
        $('.refresh').click(function(){
            $.ajax({
                   url: "{{route('language.refresh')}}",
                   type: 'GET',
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   success:function(data){
                       location.reload();
                   }
            });
        }); 
        var sources = JSON.parse('{!!$sources!!}');
        window.lastFileOpened = '';
        var lastFileOpenedData = {};
        window.fileOpenedNow = {}
        $('.save').click(function(){
            var $formData = new FormData();
            $formData.append('data',JSON.stringify(lastFileOpenedData));
            $formData.append('path',window.lastFileOpened);
            $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
            $.ajax({
                   url: "{{route('language.editFile')}}",
                   type: 'POST',
                   dataType: 'json',
                   contentType: false,
                   data:$formData,
                   processData: false,
                   success:function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Saved successfully \n Language Saved Successfully",{ position:"top right" ,className:"success"});
                      setTimeout(function () {
                        //   location.reload();
                      },2000)
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }
            });
        });
        function changeValueByPath(path,newvalue){
            var textToBeExcuted = '';
            for(var i=0;i<path.length;i++){
                
                textToBeExcuted +='[\''+path[i]+'\']'
                
            }
            var stack = textToBeExcuted.replace(/\]\[/g, '.').replace(/['"\[\]]/g, '').split('.');

            while (stack.length > 1) {
                lastFileOpenedData = lastFileOpenedData[stack.shift()];
            }
            lastFileOpenedData[stack.shift()] = newvalue;
            
            console.log(lastFileOpenedData);
            return textToBeExcuted;
        }
        function FilesAndDirectories(sources){
            sources = sources.map(function(element){
                // console.log('asdf')
                if(element.folder===true){
                    element.children = FilesAndDirectories(element.children);
                }else{
                    element.title=element.title.replace('.php','.tr')
                    element.type = 'translateFile'
                }
                return element;
            })
            return sources;
        }
        sources = FilesAndDirectories(sources);
        // console.log(sources)
        var index = 0;
        function getObjectTDS(text,othertext, parent){
            
            // console.log(text,othertext)
            Object.keys(text).forEach(function(key) {
                var value = text[key];
                if(typeof(value)==='object'){
                    getObjectTDS(text[key],othertext[key],parent+'/'+key);
                    
                }else{
                    var newElement = `<tr><td>${++index}</td><td>${text[key]}</td><td><textarea id="${parent+'/'+key}" class="form-control">${othertext[key]}</textarea></td></tr>`
                    var oldHtml = $('#text-table tbody').html();
                    $('#text-table tbody').html(oldHtml+newElement);
                    
                }
                            
            });
        }
        $("#tree").fancytree({
            checkbox: false,
            extensions: ['edit'],
            

            source: sources,
            




        }).on("dblclick", "span.fancytree-title", function (event) {
            // Add a hover handler to all node titles (using event delegation)
            var node = $.ui.fancytree.getNode(event);
            // console.log(node.key)
            if (node.type === "translateFile") {
                $(node.span).addClass('fancytree-loading');
                window.lastFileOpened = node.key;
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('language.file')}}"+"?file="+node.key,
                   type: 'GET',
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   success: function (data) {
                       index = 0;
                       lastFileOpenedData = data[1];
                    $(node.span).removeClass('fancytree-loading');
                    if(window.lastFileOpened === node.key){
                        $('#text-table tbody').html('');
                        

                        Object.keys(data[0]).forEach(function(key) {
                            var value = data[0][key];
                            if(typeof(value)==='object'){
                                
                                getObjectTDS(data[0][key],data[1][key],key);
                                
                            }else{
                                var newElement = `<tr><td>${++index}</td><td>${data[0][key]}</td><td><textarea id="${key}" class="form-control">${data[1][key]}</textarea></td></tr>`
                                var oldHtml = $('#text-table tbody').html();
                                $('#text-table tbody').html(oldHtml+newElement);
                                
                            }
                            
                        });
                        setTimeout(function(){
                            $('textarea').change(function(e){
                                var path = e.target.id.split('/');
                                changeValueByPath(path,$(e.target).val());
                            })
                        },500)
                        // console.log(data);
                    }
                    
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }
    
                });

            }

        });
    })

</script>
@endsection

@endsection