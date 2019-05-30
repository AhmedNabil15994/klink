<!-- Compiled app javascript -->
<script type="text/javascript" src="{{asset('/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/iCheck/icheck.min.js')}}"></script>
<script>
        $(function () {
            $('.icheck').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>