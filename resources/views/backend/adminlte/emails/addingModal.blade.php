<div id="add-email" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                            <textarea name="newEmailType" id="newEmailType" rows="10" cols="80">
                            
                                    </textarea>
                        </div>
                    </div>
                </div>
                {{-- ahmed  --}}

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
<script>
    // Replace the <textarea id="newEmailType"> with a CKEditor
    // instance, using default configuration.
    tinyMCE.init({
            'formats' : {
                
                'alignright' : {'selector' : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', attributes: {"align":  'right'}},
                
            }
        });
        tinymce.init({
                selector: "textarea#newEmailType",
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
        $('#add-email').on('click','.btn-success',function(e){
            e.preventDefault();
            e.stopPropagation();
            var $formData = new FormData();
            $formData.append('title',$('#add-email .title').val());
            $formData.append('subject',$('#add-email .subject').val());
            $formData.append('layout',tinyMCE.get('newEmailType').getContent());
            // console.log();
            $.ajaxSetup({
	          headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	          }
            });
            $.ajax({
	           url: "{{route('email.store')}}",
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
	              $.notify("Saved successfully \n Email Added Successfully",{ position:"top right" ,className:"success"});
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