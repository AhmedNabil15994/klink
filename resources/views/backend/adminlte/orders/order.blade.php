@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/orders.title') }}
@endsection


@section('contentheader_title') {{ trans('backend/orders.title') }}
@endsection
 
@section('contentheader_description')
{{ trans('backend/orders.title') }}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/orders.title')
}}
@endsection
 
@section('main-content')
@include('backend.adminlte.orders.ShowOrderModal')
<link rel="stylesheet" href="{{asset('/css/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('/phone/css/style.css')}}">
<style type="text/css">
    .new-order-page .new-order-card .card-sec-content.active{
        overflow-y: auto;
        overflow-x: hidden;
        padding-bottom: 15px;
    }
</style>

@include('backend.adminlte.orders.orderModal')



<div class="tab-content">
    <div id="home" class="tab-pane active in">
        {{-- @include('backend.adminlte.orders.head.companyFilter') --}}
        
        <div class="pag">
    
            <div class="row" style="display:none; margin-bottom: -50px;margin-right: 2px;">
                <div class="col-md-3 col-sm-4 col-xs-6 pull-right hidden">
                    <div class="form-group">
                        <select name="category" id="category" class="form-control">
                            @foreach($states as $key=>$state)
                            <?php $selected = '';?>
                            @if(isset($state['active'])&&$state['active']==true)
                                <?php $selected = 'selected';?>
                            @endif
                            <option value="{{$key}}" {{$selected}}>{{trans('backend/orders.'.$key)}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <div class="form-group hidden">
                            <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" style="display:block; margin:0 auto;" id="SelectedType" type="button" data-toggle="dropdown">
                                            <span class="caret" style="    margin-left: 10px;"></span></button>
                                    <ul class="dropdown-menu" id="ChangeDropDown">
                                    @foreach($states as $key=>$state)
                                    <?php $selected = '';?>
                                    @if(isset($state['active'])&&$state['active']==true)
                                        <script>
                                            window.onload= function(){
                                                $('#SelectedType').html('{{trans('backend/orders.'.$key)}}'+'<span class="caret" style="margin-left: 10px;"></span>')
                                            }
                                        </script>
                                        <?php $selected = 'selected';?>
                                    @endif
                                    <li><a href="#" value="{{$key}}">{{trans('backend/orders.'.$key)}}</a></li>
                                    {{-- <option value="{{$key}}" {{$selected}}>{{trans('backend/orders.'.$key)}}</option> --}}
                                    @endforeach
                                      
                                    </ul>
                                  </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <div class="row">

                <div class="col-lg-2 col-md-3">
                    <div class="row ul-row">
                        <ul class="my-side-wrapper">
                            @foreach ($statesCat as $catName=>$cat)
                            <li class="catName">{{$catName}}</li>
                                @foreach ($cat as $state)
                                    <?php $anything = $states[$state] ?>
                                    <li class="stateName">
                                            <?php
                                            $className = '';
                                            if(isset($anything['active'])&&$anything['active']==true){
                                                $className = 'active';
                                            }
                                            ?>
                                            <a  id="state-{{$state}}" data-state="{{$state}}" class="al {{$className}}" href="#">{{trans('backend/orders.'.$state)}}
                                                @if($anything&&$anything['icon'])
                                                {{-- <img src="{{$anything['icon']}}" width="20" /> --}}
                                                @endif
                                            </a>
                                        </li>
                                @endforeach
                            @endforeach
                            
                            
            
                        </ul>
                    </div>
                </div>

                <div class="col-lg-10 col-md-9">
                    <table class="table table-hover daTatable dataTable deleteFormModal text-center " data-form="deleteForm" id="users-table">
                        <thead>
                            <tr style="background-color: #EEE;">
                                
                                <th style="width:50px;max-width:50px !important;">
                                    <input type="text"  class="form-control headSearch" style="min-width:initial !important;"  data-search="number" placeholder="{{ trans('main.no#') }}">
                                </th>
                                <th>
                                        <input type="text"  class="form-control headSearch" data-search="from" placeholder="{{trans('backend/orders.from')}}">
                                </th>
                                <th>
                                        
                                        <input type="text"  class="form-control headSearch" data-search="to" placeholder="{{trans('backend/orders.to')}}">
                                </th>
                                <th>
                                        <input type="text"  class="form-control headSearch" data-search="sender" placeholder="{{trans('backend/orders.senderName')}}">        
                                </th>
                                <th>
                                    <input type="text"  class="form-control headSearch" data-search="Company" placeholder="{{trans('backend/orders.companyName')}}">

                                </th>
                                <th>{{trans('backend/orders.distance')}}</th>
                                <th>{{trans('backend/orders.cost')}}</th>
                                <th>{{trans('backend/orders.last_edit')}}</th>
                                <th>{{trans('frontend/order.order_status')}}</th>
                                <th>{{trans('backend/orders.payment_type')}}</th>
                                <th class="action-th">{{trans('main.action')}}</th>

                                {{--
                                <th>{{trans('backend/shipping.is_active')}}</th> --}}
                                {{--
                                <th>{{}}</th> --}}
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>

            </div><!--row-->

            </div><!--fluid-->



        </div>
    </div>
</div>
<input type="text" id="tags" placeholder="tags...">
@section('scripts')
    
    
    @include('backend.adminlte.layouts.modals.confirm_delete')
    <script src="/plugins/daterangepicker/moment.min.js"></script>
    <script src="/plugins/jQueryUI/jquery-ui.js"></script>
    <script>
        var module = { }; 
    </script>
    <script src="/plugins/echo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    
<script>
window.pagination = 10;
window.page = 1;
$(function () {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    
    $("#tags").autocomplete({
        source: [{
            label: 'ahmed',
            value: 'ali'
        }],
        select: function (event, ui) {
            console.log(ui.item.label); // display the selected text
            console.log(ui.item.value); // save selected id to hidden input
        }
    });
    
    window.io = io;

    window.Echo = new Echo({
        broadcaster: 'socket.io',
        host: window.location.hostname + ':6001',


    });
    var channel = Echo.join(`orders`)
        .here((users) => {

            console.log(users)
        })
        .joining((user) => {
            console.log(user);
        })
        .listen('orderProgress',function(e){
            console.log(e)
        })
        .leaving((user) => {
            console.log(user);
        }).listenForWhisper('typing', (e) => {
            console.log(e.name, 'typing');
        });
    setTimeout(function(){
        channel.whisper('typing', {
                name: 'ahmed ali '
    })
    },500)

    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };


    /*function ShowModal(){
        var order = window.cacheLastJson['data'][window.ToBeShownOrder['row']]
        $('#ShowOrderModal .order-id').html(order['id']);
        // console.log(order)
        $('#ShowOrderModal #place-show-from').html(order.source)
        $('#ShowOrderModal #place-show-distance').html(order.distance)
        $('#ShowOrderModal #place-show-to').html(order.destination)
        $('#ShowOrderModal #order-cost-show').html(order.cost)
        $('#ShowOrderModal #order-number-show').html(order.items)
        $('#ShowOrderModal #order-weight-show').html(order.weight)
        $('#ShowOrderModal #order-dimention-show').html(order.width+', '+order.height+', '+order.length)
        $('#ShowOrderModal #order-description-show').html(order.description)
        if(!window.StoredOrders||!window.StoredOrders[order.id]){
            getOrderInfo(order.id);
        }else{
            ShowOrderOtherDate(order.id)
        }
        $('#ShowOrderModal').modal('toggle')
    }*/


    function ShowOrderOtherDate(id){
        var order = window.StoredOrders[id];
        
        if(order['Dating']){
            $('#OrderDating').fadeIn();
            
            $('#ShowOrderModal #date-validUntil-show').html(moment(order['Dating']['valid_until']).format('LLLL')+', <strong>( '+moment(order['Dating']['valid_until'], "YYYY-MM-DD h:mm:ss").fromNow()+' ).</strong> ')
            $('#ShowOrderModal #date-loadingFrom-show').html(moment(order['Dating']['load_from']).calendar() )
            $('#ShowOrderModal #date-charge-show').html(moment(order['Dating']['load_up']).calendar() )
            $('#ShowOrderModal #date-deliveryUntil-show').html(moment(order['Dating']['delivery_until']).calendar() )
            $('#ShowOrderModal #date-deliveryFrom-show').html(moment(order['Dating']['delivery_from']).calendar() )
        }else{
            $('#OrderDating').fadeOut();
            $.notify('{{trans('backend/orders.noDating')}}', {
                    position: "top right",
                    className: "error"
                });
        }
        
        if(order['otherBilling']){
            $('#orderOtherBilling').fadeIn(500);
            $('#orderOtherBilling #orderBilling-first_name-show').html(order['otherBilling']['first_name'])
            $('#orderOtherBilling #orderBilling-email-show').html(order['otherBilling']['email'])
            $('#orderOtherBilling #orderBilling-phone-show').html(order['otherBilling']['phone'])
            $('#orderOtherBilling #orderBilling-company-show').html(order['otherBilling']['company'])
            $('#orderOtherBilling #orderBilling-country-show').html(order['otherBilling']['country'])
            $('#orderOtherBilling #orderBilling-town-show').html(order['otherBilling']['town'])
            $('#orderOtherBilling #orderBilling-street-show').html(order['otherBilling']['street'])
            $('#orderOtherBilling #orderBilling-home-show').html(order['otherBilling']['home'])
            
        }else{
            $('#orderOtherBilling').fadeOut();
        }
        if(order['Sender']){
            $('#SenderInformation').fadeIn(500);
            $('#SenderInformation #Sender-first_name-show').html(order['Sender']['first_name'])
            $('#SenderInformation #Sender-email-show').html(order['Sender']['email'])
            $('#SenderInformation #Sender-phone-show').html(order['Sender']['phone'])
            $('#SenderInformation #Sender-company-show').html(order['Sender']['company'])
            $('#SenderInformation #Sender-country-show').html(order['Sender']['country'])
            $('#SenderInformation #Sender-town-show').html(order['Sender']['town'])
            $('#SenderInformation #Sender-street-show').html(order['Sender']['street'])
            $('#SenderInformation #Sender-home-show').html(order['Sender']['home'])
            
        }else{
            $('#SenderInformation').fadeOut();
            $.notify('{{trans('backend/orders.noSender')}}', {
                    position: "top right",
                    className: "error"
                });
        }
        if(order['receiver']){
            $('#ReceiverInformation').fadeIn(500);
            $('#ReceiverInformation #Receiver-first_name-show').html(order['receiver']['first_name'])
            $('#ReceiverInformation #Receiver-email-show').html(order['receiver']['email'])
            $('#ReceiverInformation #Receiver-phone-show').html(order['receiver']['phone'])
            $('#ReceiverInformation #Receiver-company-show').html(order['receiver']['company'])
            $('#ReceiverInformation #Receiver-country-show').html(order['receiver']['country'])
            $('#ReceiverInformation #Receiver-town-show').html(order['receiver']['town'])
            $('#ReceiverInformation #Receiver-street-show').html(order['receiver']['street'])
            $('#ReceiverInformation #Receiver-home-show').html(order['receiver']['home'])
            
        }else{
            $('#ReceiverInformation').fadeOut();
            $.notify('{{trans('backend/orders.noReceiver')}}', {
                    position: "top right",
                    className: "error"
                });
        }
        $('#OffersTable tbody').html('')
        if(order['Offers']){
            // console.log(order['Offers'])
            order.Offers.forEach(function(offer){
                $('#OffersTable tbody').append(function(){
                    var activeOffer = function(){
                        if(offer['is_accepted']===1){
                            return '<i data-toggle="tooltip" title="{{trans('backend/orders.Accepted')}}" class="fa fa-check-circle"></i>';
                        }else{
                            return '<i data-toggle="tooltip" title="{{trans('backend/orders.notAccepted')}}" class="fa fa-times-circle"></i>';
                        }
                    }()
                    var acceptedOffer = function(){
                        if(offer['is_accepted']===1){
                            return 'disabled';
                        }else{
                            return '';
                        }
                    }()
                    return `<tr class="OfferRaw${offer['id']}">
                        <td>${offer['total']}</td>
                        <td>
                            <a href="/backend/user/editUser?user_id=${offer['user']['id']}">
                                ${function(){
                                   if(!offer['user']['name']){
                                       return   `${offer['user']['name']} ( ${offer['user']['email']} )`;
                                   }else{
                                       return   `<span  data-toggle="tooltip" title="${offer['user']['email']}">${offer['user']['name']}</span>`;
                                   }
                                }()}
                            </a>
                        </td>
                        <td>${activeOffer}</td>
                        
                    </tr>`
                })
                $('[data-toggle="tooltip"]').tooltip();
                

            })
            
                
            
            
        }else{
            
            $.notify('{{trans('backend/orders.noReceiver')}}', {
                    position: "top right",
                    className: "error"
                });
        }
        $('#ShowOrderModal .editOffer').click(function(){
                    
        }) 
        $('#ShowOrderModal .deleteOffer').click(function () {
            // alert($(this).attr('value'))
            $('#confirm-delete').modal('toggle');
            var id = $(this).attr('value');

            $(document).on('click', '#confirm-delete .btn-danger', function (e) {
                // console.log(id)
                // console.log(e);
                // console.log(this)
                e.preventDefault();
                e.stopPropagation();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('offer.destroy')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': id,
                    },
                    success: function (data) {

                        $.notify("Deleted successfully \n Offer Deleted Successfully", {
                            position: "top right",
                            className: "success"
                        });
                        $('#confirm-delete').modal('toggle');
                        $('.OfferRaw' + id).remove();
                        close();
                    },
                    error: function (data) {
                        var errors = JSON.parse(data.responseText);
                        if (errors && errors.errors) {
                            $.notify('Whoops \n' + errors.errors.accepted, {
                                position: "top right",
                                className: "error"
                            });
                        } else {

                            $.notify("Whoops \n Error may be in connection to server", {
                                position: "top right",
                                className: "error"
                            });
                        }
                    }

                });

            });
        })
        
    }
    
    $.fn.dataTable.pipeline = function (opts) {
        // Configuration options
        var conf = $.extend({
            pages: 5, // number of pages to cache
            url: '', // script url
            data: function ( d ) {
                d.state = $('#category').val();
                // d.company = $('.companyCheckBox:checked').val();
                
            }, // function or object with parameters to send to the server
            // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
        }, opts);

        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        window.cacheLastJson = null;

        return function (request, drawCallback, settings) {
            var ajax = false;
            var requestStart = request.start;
            var drawStart = request.start;
            var requestLength = request.length;
            var requestEnd = requestStart + requestLength;
            request.state = $('#category').val();
            // request.company = $('.companyCheckBox:checked').val();
            
            if (settings.clearCache) {
                // API requested that the cache be cleared
                ajax = true;
                settings.clearCache = false;
            } else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
                // outside cached data - need to make a request
                ajax = true;
            } else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
                JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
                JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)  ||
                JSON.stringify(request.state) !== JSON.stringify(cacheLastRequest.state)    ||
                JSON.stringify(request.company) !== JSON.stringify(cacheLastRequest.company)    
                

                  
            ) {
                // properties changed (ordering, columns, searching)
                
                ajax = true;
            }
            if($('.headSearch').is(':focus')){
                ajax = false;
                $('#users-table_processing').hide(10);
                return false;
                
            }
            // Store the request for checking next time around
            cacheLastRequest = $.extend(true, {}, request);
            if (ajax) {
               
                // Need data from the server
                if (requestStart < cacheLower) {
                    requestStart = requestStart - (requestLength * (conf.pages - 1));

                    if (requestStart < 0) {
                        requestStart = 0;
                    }
                }

                cacheLower = requestStart;
                cacheUpper = requestStart + (requestLength * conf.pages);

                request.start = requestStart;
                request.length = requestLength * conf.pages;

                // Provide the same `data` options as DataTables.
                if (typeof conf.data === 'function') {
                    // As a function it is executed with the data object as an arg
                    // for manipulation. If an object is returned, it is used as the
                    // data object to submit
                    var d = conf.data(request);
                    if (d) {
                        $.extend(request, d);
                    }
                } else if ($.isPlainObject(conf.data)) {
                    // As an object, the data given extends the default
                    $.extend(request, conf.data);
                }

                settings.jqXHR = $.ajax({
                    "type": conf.method,
                    "url": conf.url,
                    "data": request,
                    "dataType": "json",
                    "cache": false,
                    "success": function (json) {
                        console.log(json)

                        window.cacheLastJson = $.extend(true, {}, json);

                        if (cacheLower != drawStart) {
                            json.data.splice(0, drawStart - cacheLower);
                        }
                        if (requestLength >= -1) {
                            json.data.splice(requestLength, json.data.length);
                        }
                        drawCallback(json);
                        // var companyName = '';
                        // if(json.FilterInfo&&json.FilterInfo.company){
                        //     $('#companyName .info').text(json.FilterInfo.company);
                        //     $('#companyFilterTitle').text(json.FilterInfo.company);
                        // }
                        // $('#searchField').hide();
                        // if(json.FilterInfo&&json.FilterInfo.search){
                        //     $('#searchField').show();
                        //     $('#searchField span:first-child').text(json.FilterInfo.search[0])
                        //     $('#searchField span.info').text(json.FilterInfo.search[1])
                        // }
                        // var chartData = [];
                        // var chartLabels =[];
                        // var colors = [
                        //     '#B0E0E6',
                        //     '#FFC0CB',
                        //     '#FFD700',
                        //     '#32CD32',
                        //     '#DC143C',
                        //     '#880000'

                        // ];
                        // for(var key in json.chart){
                        //     chartData.push(json.chart[key])
                        //     chartLabels.push(key)
                            
                        // }
                       
                        // drawCallback(json);
                        // if(window.myPieChart){
                        //     window.myPieChart.destroy();
                        // }
                        // var ctx = document.getElementById("pieChart");
                        // window.myPieChart = new Chart(ctx,{
                        //     type: 'pie',
                        //     data: {
                        //     datasets: [{
                        //         data: chartData,
                        //         backgroundColor:colors
                        //     }],

                        //     // These labels appear in the legend and in the tooltips when hovering different arcs
                        //     labels: chartLabels
                        // },
                            
                        // });
                    }
                });
            } else {
                json = $.extend(true, {}, window.cacheLastJson);
                json.draw = request.draw; // Update the echo for each response
                json.data.splice(0, requestStart - cacheLower);
                json.data.splice(requestLength, json.data.length);

                drawCallback(json);
            }
        }
    };

    // Register an API method that will empty the pipelined data, forcing an Ajax
    // fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register('clearPipeline()', function () {
        return this.iterator('table', function (settings) {
            settings.clearCache = true;
        });
    });
    var ordersTable  = $('#users-table').DataTable({
        serverSide: true,
        processing: false,
        pageLength:100,
        "drawCallback": function( settings ) {
            $('.show').click(function(){
                var ToBeShownData = JSON.parse($(this).val());
                // console.log(ToBeShownData)
                // console.log(window.cacheLastJson['data'])
                if(window.cacheLastJson['data'][ToBeShownData['row']]['id']!==ToBeShownData['id']){
                    $.notify('Whoops \n' , {
                            position: "top right",
                            className: "error"
                    });
                    return '';
                }
                window.ToBeShownOrder = ToBeShownData;
                var order = window.cacheLastJson['data'][window.ToBeShownOrder['row']];
                var row = window.ToBeShownOrder['row'];
                ShowModal(order , row);
                
            })
            $('.deleteOrder').unbind();
            $('.deleteOrder').click(function () {
                // alert($(this).data('id'))
                console.log('ahmed')
                $('#confirm-delete').modal('toggle');
                var id = $(this).data('id');

                $(document).on('click', '#confirm-delete .btn-danger', function (e) {
                    // console.log(id)
                    // console.log(e);
                    // console.log(this)

                    e.preventDefault();
                    e.stopPropagation();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('order.forceDelete')}}",
                        type: 'POST',
                        data: {
                            '_token': $('input[name="_token"]').val(),
                            'id': id,
                        },
                        success: function (data) {

                            $.notify("Deleted successfully \n Offer Deleted Successfully", {
                                position: "top right",
                                className: "success"
                            });
                            $('#confirm-delete').modal('toggle');
                            window.location.reload();

                            close();
                        },
                        error: function (data) {
                            var errors = JSON.parse(data.responseText);
                            if (errors && errors.errors) {
                                $.notify('Whoops \n' + errors.errors.accepted, {
                                    position: "top right",
                                    className: "error"
                                });
                            } else {

                                $.notify("Whoops \n Error may be in connection to server", {
                                    position: "top right",
                                    className: "error"
                                });
                            }
                        }

                    });

                });
            });

            $('.cancelOrder').click(function(){
                var id = $(this).data('id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('order.cancel')}}",
                    type: 'POST',
                    data: {
                        '_token': $('input[name="_token"]').val(),
                        'id': id,
                    },
                    success: function (data) {
                        if(data == 1){
                            $.notify("Cancelled successfully \n Order Cancelled Successfully", {
                                position: "top right",
                                className: "success"
                            });
                                    
                            window.location.reload();
                        }
                    },
                    error: function (data) {
                        $.notify("Whoops \n Error may be in connection to server", {
                            position: "top right",
                            className: "error"
                        });
                                
                    }

                });
            });
        },
        // "ordering": false,
        order: [
            [0, "desc"]
        ],
        "ajax": $.fn.dataTable.pipeline({
            url: '{{ route('orders.orders') }}',
            pages: 5, // number of pages to cache
            data:function ( d ) {
                d.state = $('#category').val();
                // d.company = $('.companyCheckBox:checked').val();
            }, // f
            
        }),
        "columns": [
            
            {
                "data": "id",
                "orderable": true
            },
            {
                "data": function(order,display){
                    if(order.sender&&order.sender.country){
                        return ` ${order.sender.town},<br/>  ${order.sender.postal_code} `;
                    }
                    return order.source;
                },
                "orderable": false
            },
            {
                "data": function(order, display){
                    if(order.receiver&&order.receiver.country){
                        return ` ${order.receiver.town},<br/>  ${order.receiver.postal_code} `;
                    }
                    return order.destination;
                },
                "orderable": false
            },
            {
                "data": function(order,nothing){
                    if(order.sender&&order.sender.first_name){
                        return order.sender.first_name + ' ' + order.sender.nick_name + '<br/>'+ '<span class="email-span">'+order.sender.email+'</span>' ; 
                    }
                    return 'No Name';
                },
                "orderable": false
            },
            {
                "data": function(order,display){
                    return order.accepted_offer.user.name  + '<br/>'+ '<span class="email-span">'+order.accepted_offer.user.email+'</span>';
                    return 'No Name';
                },
                "orderable": false
            },
            
            {
                "data": "distance",
                "orderable": false
            },
            {
                "data":"cost",
                "orderable":true,
            },
            {
                data:function(order,display){
                    if(order['last_edit']){
                        return moment(order['last_edit']['created_at'], "YYYY-MM-DD h:mm:ss").fromNow();
                    }
                    return '00:00';
                    
                },
                orderable:false,
            },
            {
                "data":null,
                "orderable":false,
                "render":function(data,type,full,meta){
                    
                    
                    // console.log(meta)
                    // console.log(full)
                    // console.log(a)
                    var idDisplayStart = meta.settings._iDisplayStart - (window.cacheLastJson.current_page -1)* parseInt(window.cacheLastJson.per_page);
                    var rowInIndex = idDisplayStart + meta.row
                    var labels ={

                        'newOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.newOrderTitle')}}"><img src="/images/writing.svg" width="20px" height="20px"/><span>{{trans('backend/orders.newOrder')}}</span></div><div class="progress" ><div class="progress-bar newOrder" ></div></div></div>',
                        'watingOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.watingOrderTitle')}}"><img src="/images/watingOrder.svg" width="20px" height="20px"/><span>{{trans('backend/orders.watingOrder')}}</span></div><div class="progress" ><div class="progress-bar watingOrder" ></div></div></div>',
                        'decidingOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.decidingOrderTitle')}}"><img src="/images/robot.svg" width="20px" height="20px"/><span>{{trans('backend/orders.decidingOrder')}}</span></div><div class="progress" ><div class="progress-bar decidingOrder" ></div></div></div>',
                        'acceptedOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.acceptedOrderTitle')}}"><img src="/images/acceptedOrder.svg" width="20px" height="20px"/><span>{{trans('backend/orders.acceptedOrder')}}</span></div><div class="progress" ><div class="progress-bar acceptedOrder" ></div></div></div>',
                        'paidOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.paidOrderTitle')}}"><img src="/images/paidOrder.svg" width="20px" height="20px"/><span>{{trans('backend/orders.paidOrder')}}</span></div><div class="progress" ><div class="progress-bar paidOrder" ></div></div></div>',
                        'expiredOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.expiredOrderTitle')}}"><img src="/images/expiredOrder.svg" width="20px" height="20px"/><span>{{trans('backend/orders.expiredOrder')}}</span></div><div class="progress" ><div class="progress-bar expiredOrder" ></div></div></div>',
                        'cancelledOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.cancelledOrderTitle')}}"><img src="/images/cancelledOrder.svg" width="20px" height="20px"/><span>{{trans('backend/orders.cancelledOrder')}}</span></div><div class="progress" ><div class="progress-bar cancelledOrder" ></div></div></div>',
                        'completedOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.completedOrderTitle')}}"><img src="/images/checked.svg" width="20px" height="20px"/><span>{{trans('backend/orders.completedOrder')}}</span></div><div class="progress" ><div class="progress-bar completedOrder" ></div></div></div>',
                        'reklamationOrder':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.reklamationOrderTitle')}}"><img src="/images/complaint.svg" width="20px" height="20px"/><span>{{trans('backend/orders.reklamationOrder')}}</span></div><div class="progress" ><div class="progress-bar reklamationOrder" ></div></div></div>',
                        'cancelledWithoutOffers':'<div class="description-wrapper"><div class="description" data-toggle="tooltip" title="{{trans('backend/orders.cancelledWithoutOffers')}}"><img src="/images/complaint.svg" width="20px" height="20px"/><span>{{trans('backend/orders.cancelledWithoutOffers')}}</span></div><div class="progress" ><div class="progress-bar cancelledWithoutOffers" ></div></div></div>',
                        // 'NotCompleted' :'<span class="pointer label label-primary">{{trans('backend/orders.NotCompleted')}}</span>'
                       
                    }
                    return `${labels[data['status']]}`;
                }
            },
            {
                data:function(order){
                    if(order.payment_type && order.is_active == 1){
                        return order.payment_type;
                    }
                    else{
                        return ""
                    }
                },
                orderable:false,
            },
            {
                data:null,
                orderable:false,
                render:function(data,type,full,meta){
                    var idDisplayStart = meta.settings._iDisplayStart - (window.cacheLastJson.current_page -1)* parseInt(window.cacheLastJson.per_page);
                    var rowInIndex = idDisplayStart + meta.row;
                    if(data.is_active == 1){
                        return `<button class="btn btn-xs btn btn-success show" value='{"id":${data.id},"row":${rowInIndex}}' data-row="${rowInIndex}">
                            <i class="fa fa-eye"></i> {{trans('backend/orders.show')}}
                            </button><button class="btn btn-xs btn-danger cancelOrder" data-id="${data.id}">{{trans('main.cancel')}}</button><button class="btn btn-xs btn-danger deleteOrder" data-id="${data.id}">{{trans('backend/orders.delete')}}</button>`
                    }else{
                        return `<button class="btn btn-xs btn btn-success show" value='{"id":${data.id},"row":${rowInIndex}}' data-row="${rowInIndex}">
                            <i class="fa fa-eye"></i> {{trans('backend/orders.show')}}
                            </button><button class="btn btn-xs btn-danger deleteOrder" data-id="${data.id}">{{trans('backend/orders.delete')}}</button>`
                    }
                    
                }
            }
        ]
    });
    setTimeout(function(){
        // cacheLastJson.data.unshift({"id":68,"weight":250,"items":1,"length":100,"width":100,"height":100,"distance":617.294,"cost":493.6,"paid":0,"min":411.17,"source":"Karl-Marx-Stra\u00dfe 13\u060c \u0628\u0631\u0644\u064a\u0646\u060c \u0623\u0644\u0645\u0627\u0646\u064a\u0627","destination":"Maximilianstra\u00dfe 14\u060c \u0645\u064a\u0648\u0646\u062e\u060c \u0623\u0644\u0645\u0627\u0646\u064a\u0627","description":"asdfasdf","bill_to":null,"person":1,"time":5,"ship_id":16,"is_active":0,"delievered":0,"code":null,"duration":22032,"created_at":"2018-10-01 14:41:10","updated_at":"2018-10-01 14:41:10","status":"newOrder","last_edit":{"id":25,"status":"created","order_id":68,"updated_at":"2018-10-01 14:41:10","created_at":"2018-10-01 14:41:10"},"sender":null,"receiver":null,"accepted_offer":{"order_id":68,"user":{"name":"No Company","email":"No Company"}},"offers":[]});
        // var ahmed = ordersTable.draw(false);
        
        // console.log(ahmed.data())
    },1000)
    $('#users-table tbody').on('click', 'td', function () {
        var tr = $(this).parents('tr');
        var row = ordersTable.row(tr);
        // console.log()
        
        if(tr.parents('div.slider-company').length>0||$(this).hasClass('no-padding')||$(this).children('.show').length===1||$(this).children('.deleteOrder').length===1){
            return false;
        }
        // console.log(row.child)
        if (row.child.isShown()) {
            // This row is already open - close it
            $('div.slider-company', row.child()).slideUp( function () {
                row.child.hide();
                tr.removeClass('shown');
            } );
        } else {
            // Open this row (the format() function would return the data to be shown)
            row.child( format(row.data()), 'no-padding' ).show();
            tr.addClass('shown');
 
            $('div.slider-company', row.child()).slideDown();
            // console.log(row.child)
            if ( ! $.fn.DataTable.isDataTable( '#order-' + row.data().id ) ) {
                
                $('#order-' + row.data().id).dataTable({
                "pageLength": 10,
                "lengthChange": false,
                data:row.data().offers,
                columns: [
                    {
                        title: '{{trans('backend/orders.companyName')}}',
                        render:function(a,b,c,e){
                            // console.log(a,b,c,e)
                            var myClassName = 'a';
                            return '<td class="'+myClassName+'">'+c.user.name+'</td>';
                        },
                        
                    },
                    {
                        title:'{{trans('backend/orders.total')}}',
                        data:'total'
                    },
                    {
                        title:'{{trans('backend/orders.status')}}',
                        data:function(mydata){
                            // console.log(mydata)
                            if(mydata.is_accepted)
                                return '<i data-toggle="tooltip" class="fa fa-check-circle" title="{{trans('backend/orders.Accepted')}}" ></i>'
                            return '<i data-toggle="tooltip"  class="fa fa-times-circle" title="{{trans('backend/orders.notAccepted')}}"></i>'
                        }
                    }
                    
                ],
                'language': {
            paginate: {
              next: '<span class="fa fa-angle-right"></span>',
              previous: '<span class="fa fa-angle-left"></span>'  
            }
          }
            });
            }
            
        }
    });
    function format(d) {
        // `d` is the original data object for the row
       
        return `
        <div class="col-xs-10 col-xs-offset-1">
        <div class="box slider-company">
            <div class="box-header">
              <h3 class="box-title">{{trans('backend/orders.Offers')}}</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table" id="order-${d.id}">
                <thead>
                
                </thead>
                <tbody>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        
        `;
        return '<div class="slider-company table-responsive">' +
                `<div class="company-inside-wrapper">
                    <table class="table table-info">
                        
                    </table>
                </div>`
                +

                '</div>';
    }
    // console.log(window.cacheLastJson)
    $('#category').change(function(){
        // alert('ahmed')
        ordersTable.ajax.reload();
        
    })
    
    $('.al').click(function(e){
        e.preventDefault();
        // e.stopPropagation();
        if($(this).data('state')!==undefined){
            
            $('.al').removeClass('active');
            $('#category').val($(this).data('state'))
            ordersTable.ajax.reload();
            $(this).addClass('active')
        }
    })
    $('#ChangeDropDown a').click(function(){
        // console.log($(this).attr('value'))
        $('#category').val($(this).attr('value'))
        $('#SelectedType').html($(this).text()+'<span class="caret" style="margin-left: 10px;"></span>')
        ordersTable.ajax.reload();
    })
    
    
    $('.headSearch').focus(function(e){
        var old = $(this).val();
        $('.headSearch').val('');
        $(this).val(old);
    })
    $('.headSearch').change(function(e){
        console.log('changed')
        ordersTable.search($(this).data('search')+'-'+$(this).val()).draw();
    })



    $('.order-location .more-button').on('click', function (e){
        e.preventDefault();
        $(this).parents('.new-order-card').children('.new-order-card .card-sec-content').addClass('active');
    });
    $('.card-sec-content .back-button').on('click', function (e){
        e.preventDefault();
        $(this).parents('.new-order-card').children('.new-order-card .card-sec-content').removeClass('active');
    });

   
    
    function ShowModal(order,row){
        //var order = window.cacheLastJson['data'][window.ToBeShownOrder['row']];


        $('a.next-button').unbind('click');
        $('a.next-button').on('click',function(){
    		order = window.cacheLastJson['data'][row+1];
    		$('#orderModal').modal('hide');
    		ShowModal(order,row+1);
    	});

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('orders.information',['order'=>'order_id'])}}".replace("order_id", order.id),
            type: 'GET',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {

                // Order First Details

                $('#orderModal .order-id, #orderModal .order-card-id.pull-left').html(order['id']);
                $('#orderModal span.source').html(order.source);
                $('#orderModal span.destination').html(order.destination);
                $('#orderModal span.distance').html(Math.round(parseFloat(order.distance)) + " Km");
                $('#orderModal span.weight').html(order.weight + " Kg");
                $('#orderModal span.length').html(order.length + " Cm");
                $('#orderModal span.load_time').html(order.time + " Min"); 
                $('#orderModal div.perons').empty();               
                for (var i = 0; i < order.person; i++) {
                    $('#orderModal div.perons').append('<span class="back"></span>');
                }
                $('#orderModal img.image').attr('src','{{asset('images/shippings')}}/'+data['ship'].img);
                $('#orderModal div.car-name').html(data['ship'].title);
                $('#orderModal span.description').html(order.description);
                $('#orderModal span.length').html(order.length +" Cm");
                $('#orderModal span.height').html(order['height'] +" Cm");
                $('#orderModal span.width').html(order['width'] +" Cm");



                // Order Dates
                if(data['Dating'].load_from == null || data['Dating'].load_from == ""){
                    
                    $('#orderModal span.load_from').html('un-known');
                    $('#orderModal span.delivery_until').html('un-known');
                    //$('#orderModal span.valid_until').html('un-known');
                    $('#orderModal .order-pickup.order_dates').hide();
                }else{
                    $('#orderModal span.load_from').html(data['Dating'].load_from);
                    $('#orderModal span.delivery_until').html(data['Dating'].delivery_until);
                    $('#orderModal .order-pickup.order_dates').show();
                    //$('#orderModal span.valid_until').html(data['Dating'].valid_until);
                    $('#orderModal span.load_up').html(data['Dating'].load_up);
                    $('#orderModal span.delivery_from').html(data['Dating'].delivery_from);

                }

                // Order Payment Details
                if(order.is_active == 1){
                    $('#orderModal img.payment_type').attr('src','{{asset('images')}}/'+order.payment_type+'.svg');
                    $('#orderModal span.company').html(data['profile'].first_name +' '+ data['profile'].last_name);
                    $('#orderModal span.offer_total').html(order['accepted_offer'].total);
                    
                    if(order.paid == order.cost){
                        $('#orderModal .order_status').addClass('label-success');
                        $('#orderModal .order_status').html("{{trans('backend/bills.paid')}}");
                    }else{
                        $('#orderModal .order_status').addClass('label-danger');
                        $('#orderModal .order_status').html("{{trans('backend/bills.unpaid')}}");
                    }
                    $('#orderModal .order-important-info.payment').show();

                }else{
                    $('#orderModal .order-important-info.payment').hide();
                }

                if(data['order_steps'].take_money == null || data['order_steps'].take_money == ""){
                    $('#orderModal .order-important-info.company_order_steps').hide();
                }else{

                    $('#orderModal span.take_money').html(data['order_steps'].take_money);

                    if(data['order_steps'].pick_up == null || data['order_steps'].pick_up == ""){
                        $('#orderModal p#p_pick_up').hide();
                    }else{
                        $('#orderModal span.pick_up').html(data['order_steps'].pick_up);
                        $('#orderModal p#p_pick_up').show();
                    }

                    if(data['order_steps'].pick_up_done == null || data['order_steps'].pick_up_done == ""){
                        $('#orderModal p#p_pick_up_done').hide();
                    }else{
                        $('#orderModal span.pick_up_done').html(data['order_steps'].pick_up_done);
                        $('#orderModal p#p_pick_up_done').show();
                    }

                    if(data['order_steps'].to_destination == null || data['order_steps'].to_destination == ""){
                        $('#orderModal p#p_delievered').hide();
                    }else{
                        $('#orderModal span.delievered').html(data['order_steps'].to_destination);
                        $('#orderModal p#p_delievered').show();
                    }

                    $('#orderModal .order-important-info.company_order_steps').show();
                }

                // Determine To Hide More Data Or Not
                if(order['sender'] == null){
                    $('#orderModal a.more-button').hide();
                }else{
                    
                    // Order Sender Data
                    $('#orderModal span.sender_name').html(data['sender'].first_name+' '+data['sender'].nick_name);
                    $('#orderModal span.source').html(data['sender'].street+' '+data['sender'].home+"<br>"+data['sender'].town+' '+data['sender'].postal_code+"<br>"+data['sender'].country);
                    $('#orderModal span.destination').html(data['receiver'].street+' '+data['receiver'].home+"<br>"+data['receiver'].town+' '+data['receiver'].postal_code+"<br>"+data['receiver'].country);

                    //$('#orderModal span.sender_add').html(data['sender'].street+' '+data['sender'].home+"<br>"+data['sender'].town+' '+data['sender'].postal_code+"<br>"+data['sender'].country);
                    $('#orderModal span.sender_phone').html(data['sender'].phone);
                    $('#orderModal span.sender_email').html(data['sender'].email);

                    // Determine To Hide Company
                    if(data['sender'].company == null || data['sender'].company == ''){
                        $('#orderModal .sender_comp').hide();
                    }else{
                        $('#orderModal span.sender_company').html(data['sender'].company);
                        $('#orderModal .sender_comp').show();
                    }


                    // Order Receiver Data
                    $('#orderModal span.receiver_name').html(data['receiver'].first_name+' '+data['receiver'].nick_name);
                    //$('#orderModal span.receiver_add').html(data['receiver'].street+' '+data['receiver'].home+"<br>"+data['receiver'].town+' '+data['receiver'].postal_code+"<br>"+data['receiver'].country);
                    $('#orderModal span.receiver_phone').html(data['receiver'].phone);
                    $('#orderModal span.receiver_email').html(data['receiver'].email);

                    // Determine To Hide Company
                    if(data['receiver'].company == null || data['receiver'].company == ''){
                        $('#orderModal .receiver_comp').hide();
                    }else{
                        $('#orderModal span.receiver_company').html(data['receiver'].company);
                        $('#orderModal .receiver_comp').show();
                    }



                    if(data['otherBilling'] == null || data['otherBilling'] == ''){
                        $('#orderModal .otherBillingData').hide();
                    }else{
                        $('#orderModal span.other_phone').html(data['otherBilling'].phone);
                        $('#orderModal span.other_email').html(data['otherBilling'].email);
                        if(data['otherBilling'].company == null || data['otherBilling'].company == ''){
                            $('#orderModal .other_comp').hide();
                        }else{
                            $('#orderModal span.other_company').html(data['otherBilling'].company);
                            $('#orderModal span.other_company').html(data['otherBilling'].company);
                            $('#orderModal .other_comp').show();
                        }
                        $('#orderModal .otherBillingData').show();
                    }

                    
                    if(order.bill_to == 'sender'){
                        $('#orderModal span.bill_to').html(data['sender'].first_name+' '+data['sender'].nick_name+"<br>"+data['sender'].street +' '+data['sender'].home +"<br>"+data['sender'].town+' '+data['sender'].postal_code+"<br>"+data['sender'].country);
                    }else if (order.bill_to == 'receiver') {
                        $('#orderModal span.bill_to').html(data['receiver'].first_name+' '+data['receiver'].nick_name+"<br>"+data['receiver'].street+' '+data['receiver'].home+"<br>"+data['receiver'].town+' '+data['receiver'].postal_code+"<br>"+data['receiver'].country);
                    }else if (order.bill_to == 'other') {
                        $('#orderModal span.bill_to').html(data['otherBilling'].first_name+' '+data['otherBilling'].nick_name+"<br>"+data['otherBilling'].street+' '+data['otherBilling'].home+"<br>"+data['otherBilling'].town+' '+data['otherBilling'].postal_code+"<br>"+data['otherBilling'].country);
                        $('#orderModal span.bill_to').html();
                    }




                    if(data['company_order_dates']['start'] == null || data['company_order_dates']['start'] == "" ){
                        $('#orderModal div.order-important-info.company_details').hide();
                    }else{

                        $('#orderModal span.additional#company_dates').text(data['company_order_dates']['start'] +" - "+data['company_order_dates']['end']);

                        if(data['company_order_dates'].load_up == null || data['company_order_dates'].load_up == ''){
                             $('#orderModal p#company_load_up').hide();
                        }else{
                            $('#orderModal span.additional#company_load_time').html(data['company_order_dates']['load_up'] +" Min");
                            $('#orderModal p#company_load_up').show();
                        }

                        $('#orderModal div.order-important-info.company_details').show();

                    }

                    if(data['company_order_vecs'] == null || data['company_order_vecs'] == "" ){
                        $('#orderModal div#company_order_vecs').hide();
                    }else{

                        $('#orderModal img.image2').attr('src',"{{asset('images/shippings')}}/"+data['ship2'].img);
                        $('#orderModal div.car-name2').html(data['ship2'].title);
                        $('#orderModal span.driver_name').html(data['driver_profile'].first_name +" "+data['driver_profile'].last_name);
                        $('#orderModal span.driver_phone').html(data['driver_profile'].phone);
                        
                        $('#orderModal div#company_order_vecs').show();

                    }


                    $('#orderModal a.more-button').show();
                }






                $('#orderModal .card-main-content').addClass('active');
                $('#orderModal .card-sec-content').removeClass('active');
                $('#orderModal').modal('show'); 
                

            },
            error: function (data) {
                $.notify("Whoops \n Error may be in connection to server", {
                    position: "top right",
                    className: "error"
                });
            }

        });
        
    }

    function getOrderInfo(id) {
        $('#ShowOrderModal .canBeLoaded').addClass('loading')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('orders.info',['order'=>'ToBeShownId'])}}".replace("ToBeShownId",id),
            type: 'GET',
            
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (data) {
                $('#ShowOrderModal .canBeLoaded').removeClass('loading');
                
                if(!window.StoredOrders){
                    window.StoredOrders = {}
                }
                window.StoredOrders[id] = data
                ShowOrderOtherDate(id);
            },
            error: function (data) {
                $.notify("Whoops \n Error may be in connection to server", {
                    position: "top right",
                    className: "error"
                });
            }

        });
    }


    
   
})


</script>
<style>
    .pointer{
        cursor: pointer;
    }
</style>
@endsection
@endsection

   
 