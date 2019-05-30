@extends('frontend.dashboard.index') 
@section('sidebar2')
<!--profile view side-->
@include('frontend.dashboard.layouts.sidebar2')

<!--profile view side-->
@endsection

<style type="text/css">
  .order-date {
    margin-top: 2ewm;
  }

  .order-data .row {
    margin: 0;
    padding: 0;
  }

  .question {
    width: 100%;
    display: block;
    border: .1rem solid #DDD;
    border-radius: .5rem;
    margin-top: 2rem;
    padding: 2rem;
    background: rgb(252, 252, 252);
    box-shadow: .1rem .1rem .5rem rgba(0, 0, 0, .1);
    font-size: 1.4rem;
  }

  .question h3 {
    font-weight: bold;
    color: #444;
    margin-top: 1rem;
    display: inline-block;
    float: left;
    font-size: 2rem;
  }

  .question .operations {
    position: relative;
    display: inline-block;
    float: right;
  }

  .question .points {
    display: inline-block;
    float: right;
    cursor: pointer;
    margin-top: -.5rem;
  }

  .question .points .span {
    font-size: 3rem;
    font-weight: bold;
    color: #777;
    cursor: pointer;
    transition: all ease-in-out .25s;
    line-height: .3;
  }

  .question .points .span:nth-of-type(2) {
    margin-right: -.3rem;
    margin-left: -.3rem;
  }

  .question .points:hover .span {
    color: #000;
  }

  .question ul.actions {
    position: absolute;
    background: #FFF;
    border: .1rem solid #DDD;
    border-radius: .3rem;
    list-style-type: none;
    top: 1.5rem;
    right: 0;
    padding: 0;
    box-shadow: .3rem .3rem 1rem #DDD;

    display: none;
  }

  .question ul.actions li {
    padding: .5rem;
    width: 8.5rem;
    border-bottom: .1rem solid #DDD;
    transition: all ease-in-out .25s;
  }

  .question ul.actions li:hover {
    background: #DDD;
    color: #FFF;
  }

  .question ul.actions li a {
    text-decoration: none;
    color: #777;
  }

  .question i {
    margin-right: .5rem;
  }

  .question p {
    color: #777;
    line-height: 1.5;
    letter-spacing: .1rem;
  }

  .question .details {
    margin-top: 2rem;
    color: #888;
  }

  textarea {
    max-width: 100%;
    min-width: 100%;
    min-height: 15rem;
    max-height: 15rem;
  }

  label {
    font-size: 1.4rem;
  }
</style>

@section('page-content')
<!--upload file modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="uploadFileModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fas fa-file"></span>{{trans('frontend/dashboard.new_ques')}}</h4>
      </div>
      <!--modal body-->
      <div class="modal-body">

        <!--custom upload-->
        <div class="custom-upload">
          <div class="form-group">
            <div class="row">
              <div class="col-xs-4">
                <label for="vehcileweight">{{trans('frontend/dashboard.question')}}</label>
              </div>
              <div class="col-xs-8">
                <textarea placeholder="{{trans('frontend/dashboard.question')}}" id="question" class="form-control"></textarea>
              </div>
            </div>
          </div>


        </div>
        <!--custom upload-->


      </div>
      <!--modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
        <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--upload file modal-->

<!--upload file modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="editModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fas fa-file"></span>{{trans('frontend/dashboard.edit_ques')}}</h4>
      </div>
      <!--modal body-->
      <div class="modal-body">

        <!--custom upload-->
        <div class="custom-upload">
          <div class="form-group">
            <div class="row">
              <div class="col-xs-4">
                <label for="vehcileweight">{{trans('frontend/dashboard.question')}}</label>
              </div>
              <div class="col-xs-8">
                <textarea placeholder="{{trans('frontend/dashboard.question')}}" id="question" class="form-control"></textarea>
              </div>
            </div>
          </div>


        </div>
        <!--custom upload-->


      </div>
      <!--modal body-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('frontend/dashboard.close')}}</button>
        <button type="button" class="btn btn-primary">{{trans('frontend/dashboard.save')}}</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--upload file modal-->

<!--Delete modal-->
<div class="modal fade rale" tabindex="-1" role="dialog" id="deleteDocModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="fas fa-trash-alt"></span>{{trans('frontend/dashboard.del_ques')}}</h4>
      </div>
      <!--modal body-->
      <div class="modal-body">

        {{trans('frontend/dashboard.delete_p2')}}

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
    <!--Questions-->
    <div class="documents">


      <!--control row-->
      <div class="table-search">
        <div class="row">


          <!--col-->
          <div class="col-xs-12 custom-align">
            <button class="add-doc custom-button custom-button--blue">
                                        {{trans('frontend/dashboard.add_ques')}} <span class="fas fa-question-circle"></span>
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
        <!--Questions space-->
        <div class="order-space">

          <!--col-->
          <div class="col-xs-12">
            <!--Questions card-->
            <div class="orderCard">

              <!--Questions head-->
              <div class="order-head">
                <h3 class="order-heading">{{trans('frontend/dashboard.your_ques')}}</h3>
                <p class="order-paragraph">{{trans('frontend/dashboard.ques_p')}}</p>
              </div>

              <!--Questions data-->
              <div class="order-data">

                <div class="row">
                  @foreach($data as $question)
                  <div class="question tab-row{{$question->id}}">
                    <div class="row">
                      <h3>{{$question->question}}</h3>
                      <div class="operations">
                        <div class="points">
                          <span class="span">.</span>
                          <span class="span">.</span>
                          <span class="span">.</span>
                        </div>

                        <ul class="actions">
                          <li><a href="#" value="{{$question->id}}" class="edit-faq"><i class="fas fa-pencil-alt "></i> {{trans('frontend/dashboard.edit')}}</a></li>
                          <li><a href="#" value="{{$question->id}}" class="delete-faq" data-toggle='#deleteDocModal'><i class="fas fa-trash-alt"></i> {{trans('frontend/dashboard.delete')}}</a></li>
                        </ul>

                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <?php
                                                $date = \Carbon::parse($question->created_at);
                                                $date2 = \Carbon::parse($question->replied_at);
                                                $now = \Carbon::now();
                                                $diff = $date->diffForHumans($now);
                                                $diff2 ='';
                                                if($question->replied_at != ''){
                                                  $diff2 = $date2->diffForHumans($now);
                                                }
                                                
                                              ?>
                      <p>{{$question->reply}}</p>

                      <div class="row details">
                        <div class="col-sm-4" style="padding: 0">
                          <i class="fas fa-clock"></i> {{trans('frontend/dashboard.published_at')}} : {{$diff}}
                        </div>
                        @if($question->replied_at != '')
                        <div class="col-sm-4" style="padding: 0">
                          <i class="fas fa-reply"></i> 1 {{trans('frontend/dashboard.reply')}}
                        </div>
                        <div class="col-sm-4" style="padding: 0">
                          <i class="fas fa-clock"></i> {{trans('frontend/dashboard.replied_at')}}: {{$diff2}}
                        </div>
                        @endif
                      </div>
                  </div>
                  @endforeach
                </div>

              </div>
              <div class="box-footer">
                <div class="pagination-wrapper">{!! $data->render() !!} </div>
              </div>
            </div>
            <!--Questions card-->

          </div>
          <!--col-->






        </div>
        <!--Questions space-->
      </div>
      <!--row-->
      <!--table row-->



    </div>

    <!--Questions-->


  </div>
</div>
<!--pageContent-->
@endsection
 
@section('scripts')

<script type="text/javascript">
  $(function(){
          $('#uploadFileModal').on('click','.btn-primary',function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  $formData = new FormData();
                  
                  $formData.append('question', $('#uploadFileModal textarea').val());
              
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                     url: "{{route(Helper::type($profile->status).'.faq_add')}}",
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
                        $.notify("Saved successfully \n Question Saved Successfully",{ position:"top right" ,className:"success"});
                        $('#uploadFileModal').modal('toggle');
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

          $('#deleteDocModal').on('click','.btn-primary',function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  var id = $(this).attr('value');
                 
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                     url: "{{route(Helper::type($profile->status).'.faq_remove')}}",
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
                        $.notify("Deleted successfully \n Question Deleted Successfully",{ position:"top right" ,className:"success"});
                        $('#deleteDocModal').modal('toggle');
                        $('.tab-row'+id).remove();
                      } 
                     },        
                     error: function(data){
                      $.notify("Whoops \n Error may be in connection to server",{ position:"top right" ,className:"error"});
                    }

                   });
              });


          $(document).on('click','.points',function(e){
                selector = $(this).parent().children('.actions');
                selector.fadeToggle(500);
                $('.actions').not(selector).fadeOut(500);
          });

          $(document).on('click', function (e) {
              var clickOver = $(e.target);
              var dropDown = $('.actions');
              if (!clickOver.closest('.question').length ) {
                dropDown.fadeOut();
              }
          });

          $('#editModal').on('click','.btn-primary',function(e){
                  e.preventDefault();
                  e.stopPropagation();
                  id = $(this).attr('value');
                  $formData = new FormData();
                  
                  $formData.append('question', $('#editModal textarea').val());
                  $formData.append('id', id);
              
                  $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                     url: "{{route(Helper::type($profile->status).'.faq_edit')}}",
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
                        $.notify("Updated successfully \n Question Updated Successfully",{ position:"top right" ,className:"success"});
                        $('#editModal').modal('toggle');
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