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
                <div class="mytable-cell">{{trans('backend/orders.userName')}}</div>
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
           
            
        }
        function getOrder(order){
            // console.log(order);
            return `
            <div class="box collapsed-box" style="border-width:1px; margin-bottom:0;">
                <div class="box-header with-border">
                        <h3 class="box-title mybox-title">
                                <div class="mybox-cell">${order.id}</div>
                                <div class="mybox-cell">${order.name}</div>
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
                        ${getOrdersTable(order.orders,order.name)}
                    </div>
                    <!-- /.box-body -->
                    
                    <!-- box-footer -->
                
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
                var lastRow = `<div class="mybox-cell">${order['offers'][0].total}</div>`;
                var orderBody = '';
                if(order.offers.length>1){
                    lastRow = `<button type="button" class="btn btn-box-tool mybox-cell" data-widget="collapse">
                                                <i class="fa fa-plus"></i>
                                            </button>`;
                    orderBody = getOrderBody(order);
                }
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
                                        ${lastRow}
                                </h3>
                                
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                ${orderBody}
                            </div>
                            <!-- /.box-body -->
                            
                            <!-- box-footer -->
                        </div>
                    </div>
                `;
            })
            text +=`
                </div>
            </fieldset>
            `
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
                           url: "{{route('orders.companies')}}",
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