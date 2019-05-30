<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script type="text/javascript" src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>


<script src="{{asset('plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
    <script src="{{asset('css/plugins/date/jquery.datetimepicker.full.min.js')}}"></script>


<script src="{{ asset('plugins/lou-multi-select/js/jquery.multi-select.js')}}"></script>
<script src="{{ asset('plugins/quicksearch/jquery.quicksearch.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/spin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/ladda-buttons/js/ladda.jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-timepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/load_lan.js') }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
	/*$.fn.dataTable.ext.search.push(
            function( settings, aData, dataIndex ) {
                var min =  $('#start_date').val();
                var max =  $('#end_date').val();
                var iStartDateCol = 3;
                var iEndDateCol = 3;
         
                min=min.substring(6,10) + min.substring(3,5)+ min.substring(0,2);
                max=max.substring(6,10) + max.substring(3,5)+ max.substring(0,2);
         
                var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
                var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
         
                if ( min === "" && max === "" )
                {
                    return true;
                }
                else if ( min <= datofini && max === "")
                {
                    return true;
                }
                else if ( max >= datoffin && min === "")
                {
                    return true;
                }
                else if (min <= datofini && max >= datoffin)
                {
                    return true;
                }
                return false;
            }
        );*/

    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

    $(function(){
    	var oTable = $('.demo-foo-filtering').DataTable();

        $('#search').on('keyup',function(){
            oTable.search( this.value ).draw();
        });

        $('#start_date , #end_date').on('change',function(){
        	oTable.draw();
        });

        

        $('.DatePicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
         });

        $('.icheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $('.select2').select2();

        function close(){
            $('input').val('');
        }

    });

</script>

@yield('scripts')