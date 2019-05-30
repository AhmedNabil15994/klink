@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
    @include('frontend.dashboard.layouts.sidebar2')
<!--profile view side-->
@endsection
 
@section('page-content')

<!--pageContent-->
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')


        <!--documents-->
        <div class="vehcile">
            <!--table row-->
            <!--row-->
            <div class="row">
                <!--order space-->
                <div class="order-space">

                    <!--col-->
                    <div class="col-xs-12">
                        <!--order card-->
                        <div class="orderCard">

                            <!--order head-->
                            <div class="order-head">
                                <h3 class="order-heading">{{trans('frontend/dashboard.your_abs')}}</h3>
                                <p class="order-paragraph">{{trans('frontend/dashboard.abs_p')}}</p>
                            </div>

                            <!--order data-->
                            <div class="order-data">



                                <!--table head-->
                                <table class="table table-hover  daTatable dataTable demo-foo-filtering" id="demo-foo-filtering">

                                    <!--table head-->
                                    <thead class="table__header">
                                        <tr class="table__header--row">
                                            <th>{{trans('frontend/dashboard.id')}}</th>
                                            <th>{{trans('frontend/dashboard.order_no')}}</th>
                                            <th>{{trans('frontend/dashboard.source')}}</th>
                                            <th>{{trans('frontend/dashboard.destination')}}</th>
                                            <th>{{trans('frontend/dashboard.total')}}</th>
                                        </tr>
                                    </thead>
                                    <!--table head-->


                                    <!--table body-->
                                    <tbody class="table__body">
                                        <?php $i=0; ?> 
                                        @foreach($data as $one)
                                        <tr class="table__body--row tab-row">

                                            <td>{{++$i}}</td>
                                            <input type="hidden" name="number" value="{{$i}}">
                                            <td>{{$one->order_id}}</td>
                                            <td>{{$one->source}}</td>
                                            <td>{{$one->destination}}</td>
                                            <td>{!! Helper::convNum($one->total) !!}</td>
                                            <input type="hidden" name="order_id" id="order_id" value="{{$one->order_id}}">
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
            <!--table row-->



        </div>

        <!--documents-->


    </div>
</div>
<!--pageContent-->
@endsection
 
@section('scripts')
<script type="text/javascript">
    $(function(){

            $(document).on('click','table .tab-row',function(e){
                e.preventDefault();
                e.stopPropagation();

                id = $(this).children('#order_id').val();
                num = $(this).children('input[name="number"]').val();
                var route = "{{route('order_abstract',['order_id' => 'uid','num' => 'num'])}}";
                route = route.replace('uid', id);
                route = route.replace('num', num);
                window.location.href = route;
            });

        });
</script>
@endsection