<div id="add-discount" class="modal fade" role="dialog">
    <div class="modal-dialog ">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('backend/shippingDiscount.new')}}</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>{{trans('backend/shippingDiscount.value')}} : </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control percentageValue" type="number" step="0.1" min="1" max="100" placeholder="{{trans('backend/shippingDiscount.value')}}"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4"><strong>{{trans('backend/shippingDiscount.selectShip')}} : </strong></div>
                        <div class="col-sm-8 col-xs-8 col-md-8">

                            <select class="select2 form-control is_active">
                                    
                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"><span class="ladda-label"> <i class="fa fa-save"></i> {{ trans('main.save') }}</span></button>
                    <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                            <i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>
        </div>

    </div>
</div>
<style>
    .select2{
        width: 100% !important;
    }
</style>
<script>
    window.addEventListener('load',function(){
        var l = $('.ladda-button').ladda();

        $('#add-discount .btn-success').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            $('.ladda-button').ladda('start');

            var $formData = new FormData();
            $formData.append('discount',$('#add-discount .percentageValue').val());
            $formData.append('id',$('#add-discount .is_active').val());
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('shippingDiscount.updateShip')}}",
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
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000);         
                }else if(data==1){
                    $.notify("Saved successfully \n Discount Saved Successfully",{ position:"top right" ,className:"success"});
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                        location.reload();
                    },2000);
                    $('#add-discount').modal('hide');
                } 
                },        
                error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    setTimeout(function () {
                        $('.ladda-button').ladda('stop');
                    },2000);
                }

            });
        })
    })
</script>