<div id="add-bill" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">{{ trans('backend/bills.create_new') }}</h4>
                </div>
                <div class="modal-body clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.number')}} : </strong>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control billNumber" type="text" placeholder="{{trans('backend/bills.number')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.orderNumber')}} : </strong>
                            </div>
                            <div class="col-sm-9" style="position:relative;">
                                <span class="reGenerate" id="regenerateOrder"><i class="fa fa-refresh"></i></span>
                                <input class="form-control orderNumber" readonly type="text" placeholder="{{trans('backend/bills.orderNumber')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.customer')}} : </strong>
                            </div>
                            <div class="col-sm-9" style="position:relative;">
                                <input class="form-control customer" type="text" placeholder="{{trans('backend/bills.customer')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.orderCost')}} : </strong>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control orderCost" type="text" placeholder="{{trans('backend/bills.orderCost')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.tax')}}, {{trans('backend/bills.fees')}}, {{trans('backend/bills.discount')}} : </strong>
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control orderTax" type="text" placeholder="{{trans('backend/bills.tax')}}" />
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control orderFees" type="text" placeholder="{{trans('backend/bills.fees')}}" />
                            </div>
                            <div class="col-sm-3">
                                <input class="form-control orderDiscount" type="text" placeholder="{{trans('backend/bills.discount')}}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.paymentType')}} : </strong>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control paymentType" type="text" placeholder="{{trans('backend/bills.paymentType')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.billDate')}} : </strong>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control billDate" id="billDate"  type="text" placeholder="{{trans('backend/bills.billDate')}}" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <strong>{{trans('backend/bills.note')}} : </strong>
                            </div>
                            <div class="col-sm-9">
                                <textarea  style="max-width:100%;max-height:150px;min-height:50px;min-width:100%;" class="form-control note" type="text" placeholder="{{trans('backend/bills.note')}}" ></textarea>
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
    

    <script>
        // Replace the <textarea id="newEmailType"> with a CKEditor
            // instance, using default configuration.
            
            window.addEventListener('load', function (){
                $('#billDate').datetimepicker({
                    format:'Y-m-d H:i',
                })
                var mydate = new Date;
                mydate = mydate.getFullYear()+'-'+mydate.getMonth()+'-'+mydate.getDay()+'-';
                $('.billNumber').val(mydate)
                
                $('#regenerateOrder').click(function(){
                    if($(this).hasClass('rotating'))
                        return false;
                    $(this).addClass('rotating')
                    $.ajax({
                       url: "{{route('bill.randomIndex')}}",
                       type: 'GET',
                       success:function(data){
                            $('.orderNumber').val(data);
                            $('#regenerateOrder').removeClass('rotating');
                       }
                    });
                })
                $("#regenerateOrder").click();

                $('#add-bill').on('click','.btn-success',function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    var $formData = new FormData();
                    
                    $formData.append('number',$('#add-bill .billNumber').val());
                    $formData.append('order_num',$('#add-bill .orderNumber').val());
                    $formData.append('customerName',$('#add-bill .customer').val());
                    $formData.append('order_cost',$('#add-bill .orderCost').val());
                    $formData.append('tax',$('#add-bill .orderTax').val());
                    $formData.append('fees',$('#add-bill .orderFees').val());
                    $formData.append('discount',$('#add-bill .orderDiscount').val());
                    $formData.append('invionce_date',$('#add-bill .billDate').val());
                    $formData.append('payment_type',$('#add-bill .paymentType').val());
                    $formData.append('note',$('#add-bill .note').val());
                    // $formData.append('is_active',$('#add-bill .is_active').val());
                    // console.log();
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });
                    $.ajax({
                       url: "{{route('bill.new')}}",
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
                          $.notify("Saved successfully \n Bill Saved Successfully",{ position:"top right" ,className:"success"});
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