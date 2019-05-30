<div id="edit-email" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <input type="hidden" value="0" class="emailId">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">{{ trans('backend/email.create_new') }}</h4>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="modal-body clearfix">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3"><strong>{{trans('backend/email.email_language')}} : </strong></div>
                        <div class="col-sm-9 col-xs-9 col-md-9">

                            <select id="languageSelector" class="slectLanguage form-control is_active">
                                @foreach($languages as $language)
                                <option value="{{$language->shortcut}}">{{$language->name}}</option>
                                
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>{{trans('backend/email.email_title')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control title" type="text" placeholder="{{trans('backend/email.email_title')}}" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>{{trans('backend/email.subject')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control subject" type="text" placeholder="{{trans('backend/email.subject')}}" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>{{trans('backend/email.layout')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <textarea name="EditEmailLayout" id="EditEmailLayout" rows="10" cols="80">
                                    
                                            </textarea>
                        </div>
                    </div>
                </div>
                {{-- ahmed --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                            <i class="fa fa-save"></i> {{ trans('main.save') }}</button>
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                            <i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>


        </div>
    </div>
</div>
{{-- {!!$emails = '
<script>
    $('#edit-email .emailId').val()
</script>'!!} --}}
<script>
    // Replace the <textarea id="EditEmailLayout"> with a CKEditor
        // instance, using default configuration.
        tinyMCE.init({
                'formats' : {
                    
                    'alignright' : {'selector' : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', attributes: {"align":  'right'}},
                    
                }
            });
            tinymce.init({
                    selector: "textarea#EditEmailLayout",
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
        
            
        window.addEventListener('load', function (){
            // $('.slectLanguage').prop('selectedIndex', -1);
            
            $('.slectLanguage.form-control').select2({
                placeholder: {
                    id: '-1', // the value of the option
                    text: '{{trans('backend/email.email_language')}}',
                   
                }
            });
            var previos = '{{$languages[0]['shortcut']}}';

            $('#languageSelector').change(function(e){
                changeEmail();
                previos = $(this).val();   
                $('#edit-email .subject').val(window.emails.subject[$(this).val()])
                tinyMCE.get('EditEmailLayout').setContent(window.emails.layout[$(this).val()])
                
                
            })
            function changeEmail(){
                window.emails.subject[previos] = $('#edit-email .subject').val();
                window.emails.layout[previos] = tinyMCE.get('EditEmailLayout').getContent()
            }
            $('#edit-email').on('click','.btn-success',function(e){
                changeEmail();
                e.preventDefault();
                e.stopPropagation();
                var $formData = new FormData();
                $formData.append('title',$('#edit-email .title').val());
                $formData.append('subject',JSON.stringify(window.emails.subject));
                $formData.append('layout',JSON.stringify(window.emails.layout));
                // console.log();
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                    
                   url: "{{route('email.edit',['emails'=>'EmailsId'])}}".replace('EmailsId',$('#edit-email .emailId').val()),
                   type: 'POST',
                   data: $formData ,
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Saved successfully \n Shipping Type Saved Successfully",{ position:"top right" ,className:"success"});
                      setTimeout(function () {
                          location.reload();
                      },2000)
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }
    
                 });
            })
        });

</script>