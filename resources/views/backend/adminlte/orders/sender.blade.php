@extends('backend.adminlte.layouts.app') 
@section('htmlheader_title') {{ trans('backend/orders.title') }}
@endsection
 
@section('contentheader_title')
{{ trans('backend/orders.title') }}
@endsection
 
@section('contentheader_description') {{ trans('backend/orders.title') }}
@endsection
 
@section('current_breadcrumb') {{ trans('backend/orders.title') }}
@endsection
 
@section('main-content')
    @include('backend.adminlte.orders.ShowOrderModal')
<style>
    .mybox-title{
        display: flex !important;
        flex-wrap: nowrap;
    }
    .mybox-cell{
        flex: 1;
        text-align: center;
        padding: 12px 5px;
        max-height: 120px;
        font-size: 14px;
        overflow-y: auto;
    }
    .mybox-cell:first-child{
        width: 60px;
        max-width: 60px;
    }
    .box-header{
        padding: 0;
    }
    .mytable-header{
        background-color: #EEE;
        display: flex;
        flex-wrap: nowrap;
    }
    .mytable-header .mytable-cell{
        flex: 1;
        padding: 12px 5px;
        border-bottom: 2px solid #ddd;
        text-align: center;
        font-weight: bold;
    }
    .mytable-cell:first-child{
        max-width: 60px;
        
    }
    .btn:focus{
        outline: none !important;
    }
</style>
{{-- <ul class="nav nav-tabs">
    <li class="{{ active('orders.index') }}">
        <a href="{{ route('orders.index') }}">{{ trans('backend/orders.title') }}</a>
    </li>
    <li class="{{ active('orders.users') }}">
        <a href="{{ route('orders.users') }}">{{ trans('backend/orders.users') }}</a>
    </li>
    <li class="{{ active('orders.senders') }}">
        <a href="{{ route('orders.senders') }}">{{ trans('backend/orders.senders') }}</a>
    </li>


</ul> --}}
<div class="tab-content">
    <div id="home" class="tab-pane active in">
        <div class="pag">

            <div class="mytable-header">
                <div class="mytable-cell">{{trans('backend/orders.num')}}</div>
                <div class="mytable-cell">{{trans('backend/orders.senderName')}}</div>
                <div class="mytable-cell">{{trans('backend/orders.Email')}}</div>
                <div class="mytable-cell">{{trans('backend/orders.numberOfOrders')}}</div>
                <div class="mytable-cell">{{trans('backend/orders.Action')}}</div>
            </div>
            <div class="orders">

            </div>
            <div class="clearfix">
                    <ul class="pagination" id="mytable-pagination">

                    </ul>
            </div>
            
        
    </div>
</div>



@section('scripts')
    @include('backend.adminlte.layouts.modals.confirm_delete')
    @include('backend.adminlte.layouts.partials.scripts')
<script src="/plugins/daterangepicker/moment.min.js"></script>
<script>
    window.onload = function(){

        var pageNum = 1;
        window.orders = {
    
        }
        function showPagination(current, lastPage){
            var disabledPrev = current ===1 ? 'disabled':'';
            var disabledNext = current ===lastPage ? 'disabled':'';
            var paginationText = `
            <li class="paginate_button previous ${disabledPrev}" id="users-table_previous">
                <a href="#" aria-controls="users-table" data-dt-idx="${current-1}" >{{trans('backend/orders.previous')}}</a>
            </li>
            
            `;
            for(var page=1;page<=lastPage; page++){
                
                var isActive = page===current ? 'active':'';
                paginationText +=`
                <li class="paginate_button ${isActive}">
                    <a href="#" aria-controls="users-table"  data-dt-idx="${page}">${page}</a>
                </li>
                `;
            }
            paginationText +=`
            <li class="paginate_button next ${disabledNext}" id="users-table_next">
                <a href="#" aria-controls="users-table" data-dt-idx="${current+1}" >{{trans('backend/orders.next')}}</a>
            </li>
            `;
            $('#mytable-pagination').html(paginationText);
            $('#mytable-pagination a').click(function(e){
                e.preventDefault();
                if($(this).parent('li').hasClass('disabled')||$(this).parent('li').hasClass('active')){
                    return false;
                }
                getOrders($(this).data('dtIdx'));
            })
        }
        function showOrders(pageNum){
            var orders = window.orders[pageNum];
            showPagination(pageNum, window.orders.lastPage)
            $('.orders').html('')
            orders.forEach(element => {
                $('.orders').append(getOrder(element))
            });
            $('.show').click(function(){
                var ToBeShownData = JSON.parse($(this).val());
                // console.log(ToBeShownData);
                ShowModal(ToBeShownData);
                
            })
            
        }
        function getOrder(order){
           
            // console.log(order);
            return `
            <div class="box collapsed-box" style="border-width:1px; margin-bottom:0;">
                <div class="box-header with-border">
                        <h3 class="box-title mybox-title">
                                <div class="mybox-cell">${order.id}</div>
                                <div class="mybox-cell">${order.first_name + ' ' + order.nick_name}</div>
                                <div class="mybox-cell">${order.email}</div>
                                <div class="mybox-cell">${order.orders.length}</div>
                                <button type="button" class="btn btn-box-tool mybox-cell" data-widget="collapse">
                                        <i class="fa fa-plus"></i>
                                    </button>
                        </h3>
                        
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        ${getOrdersTable(order.orders,order.first_name + ' ' + order.nick_name)}
                    </div>
                    <!-- /.box-body -->
                    
                    <!-- box-footer -->
                </div>
            </div>
            `;
        }
        function getOrdersTable(orders,userName){
            lastRow = ``
            
            var text = `
            
            <fieldset>
                <legend>${userName}{{trans('backend/orders.userOrders')}}</legend>
                                
                            
                <div class="mytable-header">
                    <div class="mytable-cell">{{trans('backend/orders.num')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.from')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.to')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.weight')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.items')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.dimentions')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.distance')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.cost')}}</div>
                    <div class="mytable-cell">{{trans('backend/orders.usersOffer')}}</div>
                </div>
                <div class="orderees">
            `;
            orders.forEach(function(order){
                // var lastRow = `<div class="mybox-cell">${order['offers'][0].total}</div>`;
                var orderBody = '';
                var labels ={
                        'activeOrder':'<span class="pointer label label-info">{{trans('backend/orders.activeOrder')}}</span>',
                        'expiredOrder':'<span class="pointer label label-warning">{{trans('backend/orders.expiredOrder')}}</span>',
                        'acceptedOrder':'<span class="pointer label label-success">{{trans('backend/orders.acceptedOrder')}}</span>',
                        'canceledOrder':'<span class="pointer label label-danger">{{trans('backend/orders.canceledOrder')}}</span>', 
                        'NotCompleted' :'<span class="pointer label label-primary">{{trans('backend/orders.NotCompleted')}}</span>'
                       
                    }
                    var label =  `<button class="btn btn-xs btn btn-success show" style="margin-bottom:5px;" value='${JSON.stringify(order)}'>
                        <i class="fa fa-eye"></i> {{trans('backend/orders.show')}}
                    </button>${labels[order['status']]}`;
                text += `
                        <div class="box collapsed-box" style="border-width:1px; margin-bottom:0;">
                            <div class="box-header with-border">
                                    <h3 class="box-title mybox-title">
                                            <div class="mybox-cell">${order.id}</div>
                                            <div class="mybox-cell">${order.source}</div>
                                            <div class="mybox-cell">${order.destination}</div>
                                            <div class="mybox-cell">${order.weight}</div>
                                            <div class="mybox-cell">${order.items}</div>
                                            <div class="mybox-cell">${order.width}, ${order.height}, ${order.length}</div>
                                            <div class="mybox-cell">${order.distance}</div>
                                            <div class="mybox-cell">${order.cost}</div>
                                            <div class="mybox-cell">${label}</div>
                                            
                                    </h3>
                                    
                                    <!-- /.box-tools -->
                                </div>
                            <!-- /.box-header -->
                           
                            <!-- /.box-body -->
                            
                            <!-- box-footer -->
                       
                    </div>
                `;
            })
            text +=`
                </div>
            </fieldset>
            `;
            
            return text;
        }
        function getOrderBody(order){
            var text =  `
            <fieldset>
                                <legend>{{trans('backend/orders.Offers')}}</legend>
                                <div class="placeShow rowOrderShow">
                                    <table class="table table-striped table-hover" id="OffersTable">
                                        <thead>
                                            <tr style="background:#eee;">
                                                
                                                <th>{{trans('backend/orders.num')}}</th>
                                                <th>{{trans('backend/orders.total')}}</th>
                                                <th>{{trans('backend/orders.status')}}</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        
            `;
            order.offers.forEach(function(element){
                var isAccepted = '';
                if(element.is_accepted){
                    isAccepted = `<i data-toggle="tooltip"  class="fa fa-check-circle" title="{{trans('backend/orders.Accepted')}}"></i>`
                }else{
                    isAccepted  = `<i data-toggle="tooltip"  class="fa fa-times-circle" title="{{trans('backend/orders.notAccepted')}}"></i>`;
                }
                 text +=`
                    <tr>
                        <td>${element.id}</td>    
                        <td>${element.total}</td>    
                        <td>${isAccepted}</td>    
                    </tr>
                `;
            })
            
            text +=`
                        </tbody>
                    </table>
                </div>
            </fieldset>
            `;
            return text;
        }
        getOrders(1);
        function ShowModal(order){
            $('#ShowOrderModal .order-id').html(order['id']);
        
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
        }
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
        function getOrders(pageNum){
            if(window.orders[pageNum]){
                showOrders(pageNum)
                return false;
            }
            $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          }
                        });
                        $.ajax({
                           url: "{{route('orders.sendersinfo')}}",
                           type: 'GET',
                           data: [
                               'page='+pageNum
                           ],
                           dataType: 'json',
                           contentType: false,
                           processData: false,
                           success: function (data) {
                               window.orders[pageNum] = data['users'];
                               window.orders.lastPage = data['lastPage']
                               setTimeout(function(){
                                    $('[data-toggle="tooltip"]').tooltip();
                               },500)
                               showOrders(pageNum)
                           },        
                           error: function(data){
                            $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                          }
            
                        });
        }
    }

</script>
@endsection

@endsection