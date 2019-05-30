@extends('frontend.dashboard.index')

@section('sidebar2')
    @include('frontend.dashboard.layouts.sidebar2')
@endsection
@section('page-content')
    <style type="text/css">
        .my{
           
        }

        .margin{
            margin-bottom:1.5rem;
            background:#FFF;
        }
        
        

    </style>

    <style type="text/css">
        @media ( min-width: 991px) {
          .my .col-md-6:first-of-type{
            border-right: .1rem solid #DDD;
          }
        }
    </style>
    <!--pageContent-->
    <div class="pageContent rale">
                <div class="container-fluid">

                    @include('frontend.dashboard.layouts.partials.newHeader')
                    

                    <!--dashboard-->
                    <div class="dashboard">
                       <!--welcome message-->
                       <div class="welcome-message">
                            <h3>{{trans('frontend/dashboard.hello')}} <span class="welcome_user">{{$profile['first_name']}}</span>, {{trans('frontend/dashboard.welcome')}}!</h3>
                            <p>
                                {{trans('frontend/dashboard.all_your_orders')}}
                            </p>
                       </div>
                       <!--welcome message-->

                        <!--row-->
                        <div class="row">

                            <!--col-->
                            <div class="col-md-3 col-sm-6">
                                <div class="card card--yellow">
                                   
                                    <div class="card__counter">
                                        <div class="counterIcon">
                                            <span class="fas plane fa-plane"></span>
                                        </div><!--CounterIcon-->
                                        <div class="counterInfo">
                                            <span class="number">
                                                {{$order_count}}
                                            </span>
                                            <span class="type">
                                                {{trans('frontend/dashboard.my_orders')}}
                                            </span>
                                        </div><!--CounterInfo-->
                                    </div><!--card Counter-->
                                    
                                    <a href="{{route(Helper::type($profile->status).'.orders')}}" class="card__link">
                                        <div class="card__go">
                                                    <span class="card_name">{{trans('frontend/dashboard.my_orders')}}</span>
                                                    <span class="arrow fas fa-long-arrow-alt-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--col-->


                            <!--col-->
                            <div class="col-md-3 col-sm-6">
                                <div class="card card--blue">
                                   
                                    <div class="card__counter">
                                        <div class="counterIcon">
                                            <span class="fas fa-building"></span>
                                        </div><!--CounterIcon-->
                                        <div class="counterInfo">
                                            <span class="number">
                                                {{$accepted_order}}
                                            </span>
                                            <span class="type">
                                                {{trans('frontend/dashboard.todo')}}
                                            </span>
                                        </div><!--CounterInfo-->
                                    </div><!--card Counter-->
                                    
                                    <a href="{{route(Helper::type($profile->status).'.assign')}}" class="card__link">
                                        <div class="card__go">
                                    <span class="card_name">{{trans('frontend/dashboard.to_my_orders')}}</span>
                                    <span class="arrow fas fa-long-arrow-alt-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--col-->



                            <!--col-->
                            <div class="col-md-3 col-sm-6">
                                <div class="card card--red">
                                   
                                    <div class="card__counter">
                                        <div class="counterIcon">
                                            <span class="fas fa-car"></span>
                                        </div><!--CounterIcon-->
                                        <div class="counterInfo">
                                            <span class="number">
                                                {{$vehicle_count}}
                                            </span>
                                            <span class="type">
                                               {{trans('frontend/dashboard.my_vehicle')}}
                                            </span>
                                        </div><!--CounterInfo-->
                                    </div><!--card Counter-->
                                    
                                    <a href="{{route(Helper::type($profile->status).'.vehicles')}}" class="card__link">
                                        <div class="card__go">
                                            <span class="card_name">{{trans('frontend/dashboard.my_vehicle')}}</span>
                                            <span class="arrow fas fa-long-arrow-alt-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--col-->


                            <!--col-->
                            <div class="col-md-3 col-sm-6">
                                <div class="card card--green">
                                   
                                    <div class="card__counter">
                                        <div class="counterIcon">
                                            <span class="fas fa-euro-sign"></span>
                                        </div><!--CounterIcon-->
                                        <div class="counterInfo">
                                            <span class="number">
                                                {!! Helper::convNum($income) !!}
                                            </span>
                                            <span class="type">
                                                {{trans('frontend/dashboard.my_income')}}
                                            </span>
                                        </div><!--CounterInfo-->
                                    </div><!--card Counter-->
                                    
                                    <a href="#Myorders" class="card__link">
                                        <div class="card__go">
                                                    <span class="card_name">{{trans('frontend/dashboard.my_income')}}</span>
                                                    <span class="arrow fas fa-long-arrow-alt-right"></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--col-->

                        </div>
                        <!--row-->

                        <div class="row my">
                            <div class="margin col-xs-12 col-md-6">
                                <canvas id="myChart" width="200" height="100"></canvas>
                            </div>    
                            <div class="margin col-xs-12 col-md-6">
                                <canvas id="myChart2" width="200" height="100"></canvas>
                            </div>
                        </div>

                        <!--order card-->
                         <!--row-->
                        <div class="row">
                            <!--order space-->
                            <div class="order-space">

                                <!--col-->
                                <div class="col-md-6">
                                    <!--order card-->
                                    <div class="orderCard">

                                        <!--order head-->
                                        <div class="order-head">
                                            <h3 class="order-heading">{{trans('frontend/dashboard.active_orders')}}</h3>
                                            <p class="order-paragraph">{{trans('frontend/dashboard.active_orders2')}}</p>
                                        </div>

                                        <!--order data-->
                                        <div class="order-data">



                                            <!--table head-->
                                            <table class="table">

                                                <!--table head-->
                                                <thead class="table__header">
                                                    <tr class="table__header--row">
                                                        <th>{{trans('frontend/dashboard.vehicle')}}</th>
                                                        <th>{{trans('frontend/dashboard.source')}}</th>
                                                        <th>{{trans('frontend/dashboard.destination')}}</th>
                                                    </tr>
                                                </thead>
                                                <!--table head-->


                                                <!--table body-->
                                                <tbody class="table__body">

                                                    @foreach($active_orders as $one)
                                                    <tr class="table__body--row">              
                                                        <?php 
                                                            $ship = \DB::table('vehicles')->where('ship_id',$one->ship_id)->first();
                                                        ?>
                                                        @if(isset($ship))
                                                        <td class="car-head clearfix">
                                                            <div class="car-img">
                                                                <img src="{{asset('images/shippings')}}/{{$ship->img}}" alt="car">
                                                            </div>
                                                            <div class="car-details">
                                                                <span class="car-name">{{$ship->ship_name}}</span>
                                                            </div>
                                                        </td>
                                                        @else
														<td></td>	
                                                        @endif
                                                        <td>{{$one->source}}</td>
                                                        <td>{{$one->destination}}</td>
                                                        
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                                <!--table body-->

                                            </table>
                                            <!--table head-->

                                            
                                            

                                        </div>

                                    </div>
                                    <!--order card-->

                                </div>
                                <!--col-->


                                <!--col-->
                                <div class="col-md-6">
                                    <!--order card-->
                                    <div class="orderCard">

                                        <!--order head-->
                                        <div class="order-head">
                                            <h3 class="order-heading">{{trans('frontend/dashboard.new_orders')}}</h3>
                                            <p class="order-paragraph">{{trans('frontend/dashboard.new_orders2')}}</p>
                                        </div>

                                        <!--order data-->
                                        <div class="order-data">



                                            <!--table head-->
                                            <table class="table">

                                                <!--table head-->
                                                <thead class="table__header">
                                                    <tr class="table__header--row">
                                                        <th>{{trans('frontend/dashboard.vehicle')}}</th>
                                                        <th>{{trans('frontend/dashboard.source')}}</th>
                                                        <th>{{trans('frontend/dashboard.destination')}}</th>
                                                    </tr>
                                                </thead>
                                                <!--table head-->


                                                <!--table body-->
                                                <tbody class="table__body">

                                                    @foreach($new_orders as $one_order)
                                                    <?php 
                                                        $ship = \DB::table('vehicles')->where('ship_id',$one_order->ship_id)->first();
                                                    ?>
                                                    <tr class="table__body--row">              

                                                        <td class="car-head clearfix">
                                                            <div class="car-img">
                                                                <img src="{{asset('images/shippings')}}/{{$ship->img}}" alt="car">
                                                            </div>
                                                            <div class="car-details">
                                                                <span class="car-name">{{$ship->ship_name}}</span>
                                                            </div>
                                                        </td>
                                                        <td>{{$one_order->source}}</td>
                                                        <td>{{$one_order->destination}}</td>
                                                        
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                                <!--table body-->

                                            </table>
                                            <!--table head-->

                                            
                                            

                                        </div>

                                    </div>
                                    <!--order card-->

                                </div>
                                <!--col-->

                                



                            </div>
                            <!--order space-->
                        </div>
                        <!--row-->
                        <!--order card-->







                    </div><!--dashboard-->

                </div>
            </div>
            <!--pageContent-->

@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var ctx2 = document.getElementById("myChart2").getContext('2d');

data1 = [];
data2 = [];

@foreach($offer_count as $key => $one)
@if($key == 0)
@else
data1.push({{$one}});
@endif
@endforeach

@foreach($offer_price as $keys => $ones)
@if($keys == 0)
@else
data2.push({{$ones}});
@endif
@endforeach

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# {{trans('frontend/dashboard.my_orders')}}',
            data: data1,
            borderColor: '#CA9210',
            backgroundColor: '#FDB714',
            fill: false,
            yAxisID: 'y-axis-1',
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    display: false,
                },
                responsive: true,
                hoverMode: 'index',
                stacked: false,
            },{
                type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                display: true,
                position: 'left',
                id: 'y-axis-1',
                // grid line settings
                gridLines: {
                    drawOnChartArea: false, // only want the grid lines for one axis to show up   
                }, 
                           
            }]
        }
    }
});

var myChart = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '{{trans('frontend/dashboard.my_income')}}',
            data: data2,
            borderColor: "#7AA536",
            backgroundColor: "#98CE44",
            fill: false,
            yAxisID: 'y-axis-1',
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    display: false,
                },
                responsive: true,
                hoverMode: 'index',
                stacked: false,
            },{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                    // grid line settings
                    gridLines: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                },
            }]
        }
    }
});
</script>
<script type="text/javascript">
    $(function(){
        @if(Session::has('message'))
        $.notify("Success \n Payment Done Successfully \n Invoice was Sent To your Mail",{ position:"top right" ,className:"success"});
        @endif  
    });
</script>
@endsection

