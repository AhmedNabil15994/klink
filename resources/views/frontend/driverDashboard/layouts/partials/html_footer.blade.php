 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    
    <!--tables-->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <scrip src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <scrip src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <scrip src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <scrip src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
    <script            src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js">
    </script>
    <!--tables-->

    <script src="{{asset('js/detect.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('js/userDashboard.js')}}"></script>
    <script src="{{asset('plugins/notifyjs/js/notify.js')}}"></script>
    <script src="{{asset('js/load_lan.js')}}"></script>
    @yield('scripts')
  </body>
</html>