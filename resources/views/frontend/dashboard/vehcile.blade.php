@extends('frontend.dashboard.index') 
@section('sidebar2')
@include('frontend.dashboard.layouts.partials.profile-sidebar')
@endsection
 
@section('page-content')
<style type="text/css">
    .orderCard {
        overflow-x: auto !important;
    }

    .orderCard .btn {
        padding: .2rem .5rem !important;
        min-width: 12rem !important;
    }
</style>
<!--add Vehcile modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="addVehcileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-truck"></span>{{trans('frontend/dashboard.add_vec')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="add-vehcile-content">

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="ship_id">{{trans('frontend/dashboard.car_type')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <select class="selectpicker form-control">
                                            @foreach($shippings as $ship)

                                            <option value="{{$ship->id}}">{{$ship->title}}</option>

                                            @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>


                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="weight">{{trans('frontend/dashboard.weight')}} (Kg)</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="weight" class="add-input" placeholder="{{trans('frontend/dashboard.weight')}} (Kg)" required>
                            </div>
                        </div>
                    </div>


                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="first">{{trans('frontend/dashboard.first_reg')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="first" class="add-input" placeholder="{{trans('frontend/dashboard.first_reg')}}" required value="{{Carbon::now()->format('Y-m-d')}}">
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="driver">{{trans('frontend/dashboard.driver_name')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="driver" class="add-input" placeholder="{{trans('frontend/dashboard.driver_name')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="length">{{trans('frontend/dashboard.phone')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="phone" class="add-input" placeholder="{{trans('frontend/dashboard.phone')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="country">{{trans('frontend/dashboard.country')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="country" class="add-input" placeholder="{{trans('frontend/dashboard.country')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="add-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="city">{{trans('frontend/dashboard.city')}} / {{trans('frontend/dashboard.postal_code')}}</label>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="city" class="add-input" placeholder="{{trans('frontend/dashboard.city')}}" required>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="postal_code" class="add-input" placeholder="{{trans('frontend/dashboard.postal_code')}}" required>
                            </div>
                        </div>
                    </div>


                    <!--custom upload-->
                    <div class="custom-upload">
                        <input type="file" id="img-upload" hidden="hidden">
                        <div class="file-info">
                            {{trans('frontend/dashboard.no_file')}}
                        </div>
                        <button class="choose-button">{{trans('frontend/dashboard.choose_image')}}</button>
                    </div>
                    <!--custom upload-->



                </div>

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.add')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--add Vehcile modal-->

<!--edit Vehcile modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="editVehcileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-truck"></span> {{trans('frontend/dashboard.edit_vec')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                <div class="edit-vehcile-content">

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="ship_id">{{trans('frontend/dashboard.car_type')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <select class="selectpicker form-control">
                                            @foreach($shippings as $ship)

                                            <option value="{{$ship->id}}">{{$ship->title}}</option>

                                            @endforeach
                                        </select>
                            </div>
                        </div>
                    </div>


                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="weight">{{trans('frontend/dashboard.weight')}} (Kg)</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="weight" class="edit-input" placeholder="{{trans('frontend/dashboard.weight')}} (Kg)" required>
                            </div>
                        </div>
                    </div>


                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="first">{{trans('frontend/dashboard.first_reg')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="first" class="edit-input" placeholder="{{trans('frontend/dashboard.first_reg')}}" required value="{{Carbon::now()->format('Y-m-d')}}">
                            </div>
                        </div>
                    </div>

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="driver">{{trans('frontend/dashboard.driver_name')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="driver" class="edit-input" placeholder="{{trans('frontend/dashboard.driver_name')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="length">{{trans('frontend/dashboard.phone')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="phone" class="edit-input" placeholder="{{trans('frontend/dashboard.phone')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="country">{{trans('frontend/dashboard.country')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <input type="text" id="country" class="edit-input" placeholder="{{trans('frontend/dashboard.country')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="city">{{trans('frontend/dashboard.city')}} / {{trans('frontend/dashboard.postal_code')}}</label>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="city" class="edit-input" placeholder="{{trans('frontend/dashboard.city')}}" required>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" id="postal_code" class="edit-input" placeholder="{{trans('frontend/dashboard.postal_code')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="edit-group">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="height">{{trans('frontend/dashboard.image')}}</label>
                            </div>
                            <div class="col-xs-8">
                                <img src="" class="img-responsive">
                            </div>
                        </div>
                    </div>



                    <!--custom upload-->
                    <div class="custom-upload">
                        <input type="file" id="img-upload2" hidden="hidden">
                        <div class="file-info">
                            {{trans('frontend/dashboard.no_file')}}
                        </div>
                        <button class="choose-button">{{trans('frontend/dashboard.choose_image')}}</button>
                    </div>
                    <!--custom upload-->



                </div>

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.update')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--edit Vehcile modal-->

<!--Delete modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="deletevehcileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fas fa-trash-alt"></span>{{trans('frontend/dashboard.del_vec')}}</h4>
            </div>
            <!--modal body-->
            <div class="modal-body">

                {{trans('frontend/dashboard.delete_p')}}

            </div>
            <!--modal body-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
                <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.delete')}}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Delete modal-->



<!--pageContent-->
<div class="pageContent rale">
    <div class="container-fluid">
    @include('frontend.dashboard.layouts.partials.newHeader')


        <!--documents-->
        <div class="vehcile">


            <!--control row-->
            <div class="table-search">
                <div class="row">


                    <!--col-->
                    <div class="col-xs-12 custom-align">
                        <button class="add-vehcile custom-button custom-button--blue">
                                        {{trans('frontend/dashboard.add_vec')}} <span class="fas fa-truck"></span>
                                    </button>
                    </div>
                    <!--col-->


                </div>
                <!--row-->
            </div>
            <!--table search-->

            <!--control row-->

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
                                <h3 class="order-heading">{{trans('frontend/dashboard.your_vec')}}</h3>
                                <p class="order-paragraph">{{trans('frontend/dashboard.here_vec')}}</p>
                            </div>

                            <!--order data-->
                            <div class="order-data">



                                <!--table head-->
                                <table class="table table-hover  daTatable dataTable demo-foo-filtering" id="demo-foo-filtering">

                                    <!--table head-->
                                    <thead class="table__header">
                                        <tr class="table__header--row">
                                            <th>{{trans('frontend/dashboard.id')}}</th>
                                            <th>{{trans('frontend/dashboard.name')}}</th>
                                            <th>{{trans('frontend/dashboard.weight')}} (Kg)</th>
                                            <th>{{trans('frontend/dashboard.first_reg')}}</th>
                                            <th>{{trans('frontend/dashboard.driver_name')}}</th>
                                            <th>{{trans('frontend/dashboard.phone')}}</th>
                                            <th>{{trans('frontend/dashboard.country')}}</th>
                                            <th>{{trans('frontend/dashboard.postal_code')}}</th>
                                            <th>{{trans('frontend/dashboard.actions')}}</th>
                                        </tr>
                                    </thead>
                                    <!--table head-->


                                    <!--table body-->
                                    <tbody class="table__body">
                                        <?php $i=1; ?> @foreach($data as $vehicle => $value)
                                        <tr class="table__body--row tab-row">

                                            <td class="car-head">
                                                @foreach($value as $one)
                                                <span class="fas fa-truck">

                                                            </span> {{$i++}}
                                                <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="ship_name{{$one->id}}">{{$one->ship_name}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="weight{{$one->id}}">{{$one->weight}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="first_reg{{$one->id}}">{{$one->first_reg}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="driver{{$one->id}}">{{$one->driver}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="phone{{$one->id}}">{{$one->phone}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="country{{$one->id}}">{{$one->country}}</span> <br><br> @endforeach
                                            </td>
                                            <td>
                                                @foreach($value as $one)
                                                <span class="postal_code{{$one->id}} ">{{$one->postal_code}}</span> <br><br>                                                @endforeach
                                            </td>
                                            <td class="operation">
                                                @foreach($value as $one)
                                                <div class="row">
                                                    <button class="btn btn-danger btn-xs delete-vehcile" value="{{$one->id}}">
                                                                    {{trans('frontend/dashboard.delete')}} <span class="fas fa-trash-alt"></span>
                                                                </button>
                                                    <input type="hidden" name="image" class="img" value="{{$one->img}}">
                                                    <input type="hidden" name="ship_id" class="ship_id" value="{{$one->ship_id}}">
                                                    <input type="hidden" name="city" class="city" value="{{$one->city}}">
                                                    <button class="btn btn-success edit-vehcile btn-xs" value="{{$one->id}}">
                                                                    {{trans('frontend/dashboard.edit')}} <span class="fas fa-edit"></span>
                                                                </button>
                                                </div>
                                                @endforeach

                                            </td>

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
<link rel="stylesheet" type="text/css" href="{{asset('plugins/datepicker/datepicker3.css')}}">
<script type="text/javascript" src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
    $(function(){

            $('#addVehcileModal #first,#editVehcileModal #first').datepicker({
                format: 'yyyy-mm-dd',
                autoclose : true,
            });
            $('#addVehcileModal .selectpicker,#editVehcileModal .selectpicker').selectpicker();

            $('#addVehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var $file = document.getElementById('img-upload');
                $formData = new FormData();
                if ($file.files.length > 0) {
                   for (var i = 0; i < $file.files.length; i++) {
                      $formData.append('image', $file.files[i]);
                   }
                 }
                
                $formData.append('ship_id', $('#addVehcileModal .selectpicker option:selected').val());
                $formData.append('ship_name', $('#addVehcileModal .selectpicker option:selected').text());
                $formData.append('weight', $('#addVehcileModal #weight').val());
                $formData.append('first_reg', $('#addVehcileModal #first').val());
                $formData.append('driver', $('#addVehcileModal #driver').val());
                $formData.append('phone', $('#addVehcileModal #phone').val());
                $formData.append('country', $('#addVehcileModal #country').val());
                $formData.append('city', $('#addVehcileModal #city').val());
                $formData.append('postal_code', $('#addVehcileModal #postal_code').val());
            
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('vehicles_add')}}",
                   type: 'POST',
                   data: $formData ,
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Saved successfully \n Vehcile Saved Successfully",{ position:"top right" ,className:"success"});
                      $('#addVehcileModal').modal('toggle');
                      setTimeout(function () {
                          location.reload();
                      },2000)
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                 });
            });


            $(document).on('click','.edit-vehcile',function(){

                $child = $(this).parents('.table__body--row').children('td');
                ship_id = $(this).siblings('.ship_id').val();
                city = $(this).siblings('.city').val();
                id = $(this).attr('value');
                //
                /*$('#editVehcileModal .selectpicker option').each(function(){
                    if($(this).val() == ship_id){
                        $(this).attr('selected','selected');
                    }
                });*/
                $('#editVehcileModal .selectpicker').val(ship_id);
                $('#editVehcileModal .selectpicker').selectpicker('refresh')
                $('#editVehcileModal #weight').val($child.eq(2).find('span.weight'+id).text());
                $('#editVehcileModal #first').val($child.eq(3).find('span.first_reg'+id).text());
                $('#editVehcileModal #driver').val($child.eq(4).find('span.driver'+id).text());
                $('#editVehcileModal #phone').val($child.eq(5).find('span.phone'+id).text());
                $('#editVehcileModal #country').val($child.eq(6).find('span.country'+id).text());
                $('#editVehcileModal #postal_code').val($child.eq(7).find('span.postal_code'+id).text());
                $('#editVehcileModal #city').val(city);
                $('#editVehcileModal img').attr('src',"{{asset('images/vehicles')}}/"+$(this).siblings('.img').attr('value'));
                $('#editVehcileModal .btn-primary').attr('value',$(this).attr('value'));

            });

            $('#editVehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var $file = document.getElementById('img-upload2');
                $formData = new FormData();
                if ($file.files.length > 0) {
                   for (var i = 0; i < $file.files.length; i++) {
                      $formData.append('image', $file.files[i]);
                   }
                 }
                $formData.append('id', id);
                $formData.append('ship_name', $('#editVehcileModal .selectpicker option:selected').text());
                $formData.append('ship_id', $('#editVehcileModal .selectpicker option:selected').val());
                $formData.append('weight', $('#editVehcileModal #weight').val());
                $formData.append('driver', $('#editVehcileModal #driver').val());
                $formData.append('first_reg', $('#editVehcileModal #first').val());
                $formData.append('phone', $('#editVehcileModal #phone').val());
                $formData.append('country', $('#editVehcileModal #country').val());
                $formData.append('city', $('#editVehcileModal #city').val());
                $formData.append('postal_code', $('#editVehcileModal #postal_code').val());
            
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('vehicles_update')}}",
                   type: 'POST',
                   data: $formData ,
                   dataType: 'json',
                   contentType: false,
                   processData: false,
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Updated successfully \n Vehcile Updated Successfully",{ position:"top right" ,className:"success"});
                      $('#editVehcileModal').modal('toggle');
                      setTimeout(function () {
                          location.reload();
                      },2000)
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                 });
            });

            $('#deletevehcileModal').on('click','.btn-primary',function(e){
                e.preventDefault();
                e.stopPropagation();
                var id = $(this).attr('value');
               
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                $.ajax({
                   url: "{{route('vehicles_delete')}}",
                   type: 'POST',
                   data: {
                        '_token': $('input[name="_token"]').val(),
                        'id':id,
                   },
                   success: function (data) {
                    if (isNaN(data)){
                      $.each(data['errors'], function(i, item) { 
                        $.notify("Whoops \n"+item,{ position:"top right" ,className:"error"});
                      });            
                    }else if(data==1){
                      $.notify("Deleted successfully \n Vehcile Deleted Successfully",{ position:"top right" ,className:"success"});
                      $('#deletevehcileModal').modal('toggle');
                      setTimeout(function () {
                          location.reload();
                      },2000)
                    } 
                   },        
                   error: function(data){
                    $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                  }

                 });
            });

        });
</script>
@endsection