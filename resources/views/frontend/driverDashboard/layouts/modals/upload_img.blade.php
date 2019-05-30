 <!--upload img modal-->
 <div class="modal fade rale" tabindex="-1" role="dialog" id="imgEditModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-image"></span>{{trans('frontend/dashboard.upload_image')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

               <!--custom upload--> 
               <div class="custom-upload">
                    <input type="file" id="img-upload" hidden="hidden">
                    <div class="file-info">
                        {{trans('frontend/dashboard.no_file')}}
                    </div>
                    <button class="choose-button">{{trans('frontend/dashboard.choose_image')}}</button>

                    
               </div>
               <!--custom upload--> 


            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--upload img modal-->