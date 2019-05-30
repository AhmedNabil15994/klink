<div id="ExcelReportTimeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('backend/bills.timeHeader')}}</h4>
            </div>
            <div class="modal-body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3" style="line-height:34px;">
                            <strong>{{trans('backend/bills.startDate')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input id="startModalDateInput" class="form-control" type="text" placeholder="{{trans('backend/bills.startDate')}}" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3" style="line-height:34px;">
                            <strong>{{trans('backend/bills.endDate')}} : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input id="endModalDateInput" class="form-control" type="text" placeholder="{{trans('backend/bills.endDate')}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-success continue">
                            <i class="fa fa-download"></i> {{ trans('backend/bills.download') }}</button>
                    <button type="button" class="btn btn-danger skip">
                            <i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>
        </div>

    </div>
</div>
<script>
    window.addEventListener('load', function (){
        var endDate = '';
        var startDate = 0;
        $('.skip').click(function(){
            window.ExcelReportData.startDate = '';
            window.ExcelReportData.endDate = '';
            
            $('#ExcelReportTimeModal').modal('toggle');
        })
        $('.continue').click(function(){
            window.ExcelReportData.startDate = $('#startModalDateInput').val();
            window.ExcelReportData.endDate = $('#endModalDateInput').val();
            // var $formData = new FormData();
            var url = "{{route('bill.excel')}}";
            if(window.ExcelReportData.endDate&&window.ExcelReportData.endDate!=''&&window.ExcelReportData.startDate&&window.ExcelReportData.startDate!==''){
                url += '?start='+window.ExcelReportData.startDate+'&end='+window.ExcelReportData.endDate
            }
            // alert(url)
            window.location = url;
            
            $('#ExcelReportTimeModal').modal('toggle');
        })
        $('#startModalDateInput').datetimepicker({
            format:'Y-m-d',
            // maxDate:endDate,
            autoclose: true,
            onChangeDateTime:function(v){
                startDate = new Date(v);
                window.ExcelReportData.startDate = new Date(v);
            },
            onShow:function( ct ){

                this.setOptions({
                    maxDate:endDate,
                });
            },
            
        })
        $('#endModalDateInput').datetimepicker({
            format:'Y-m-d',
            
            autoclose: true,
            onShow:function( ct ){

                this.setOptions({
                    minDate:startDate,
                });
            },
            onChangeDateTime:function(v){
                endDate = new Date(v);
                window.ExcelReportData.endDate = new Date(v);
                
            }

        })
    });
</script>