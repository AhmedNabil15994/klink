<!--table head-->
                                                    <table class="table table-hover  daTatable dataTable demo-foo-filtering2">

                                                        <!--table head-->
                                                        <thead class="table__header">
                                                            <tr class="table__header--row">
                                                                <th>Order No</th>
                                                                <th>Source</th>
                                                                <th>Destination</th>
                                                                <th>Reciever</th>
                                                                <th>total</th>
                                                                <th>status</th>

                                                            </tr>
                                                        </thead>
                                                        <!--table head-->


                                                        <!--table body-->
                                                        <tbody class="table__body">

                                                            @foreach($data as $one)
                                                            <?php 
                                                                $receiver = \DB::table('receivers')->where('order_id','=',$one->order_id)->first();
                                                                $status = '';
                                                                if($one->paid == $one->cost){
                                                                    $status = 'Paid';
                                                                    $class = 'primary';
                                                                }else{
                                                                    $status = 'Un-paid';
                                                                    $class = 'danger';
                                                                }
                                                            ?>
                                                            <tr class="table__body--row" value="{{$one->order_id}}">              

                                                                <td class="car-head">
                                                                    <span class="fas fa-file-alt">

                                                                    </span> {{$one->order_id}}
                                                                </td>
                                                                <td>{{$one->source}}</td>
                                                                <td>{{$one->destination}}</td>
                                                                <td>{{$receiver->first_name.' '.$receiver->nick_name}}</td>
                                                                <td>{{$one->cost}} &euro;</td>
                                                                <td><label class="label label-{{$class}}">{{$status}}</label></td>

                                                                
                                                            </tr>
                                                            @endforeach


                                                        </tbody>
                                                        <!--table body-->

                                                    </table>
                                                    <!--table head-->

<script type="text/javascript">
    $(function(){
        var oTable = $('.demo-foo-filtering2').DataTable();
    });
</script>                                                                 