<style>
    button:focus{
        outline: none !important;
    }
    .box.box-info{
        border-top-color: #5fbeaa;
    }
    #companyFilterTitle.box-title{
        font-size: 12px;
        font-weight: bold;
    }
    .box-header{
        cursor: pointer;
    }
    h3.fa-minus:before,
    h3.fa-plus:before{
        content: '' !important;
    }
    .dashedRows .row{
        border-top:1px dashed #777;
        padding:0;
        margin:0;
    }
    .dashedRows .row span{
        padding:10px 0;
    }
    .dashedRows .row span:nth-child(1){
        float: left;
        font-weight: bold;
    }
    .dashedRows .row span:nth-child(2){
        float: left;
        color: #044e22;
        padding-left: 5px;
    
    }
</style>
<div class="row">
    
    <div class="col-xs-12 col-md-6 col-sm-8">
        <div class="box box-info ">
            <div class="box-header with-border" data-widget="collapse">
                <h3 class="box-title"  id="companyFilterTitle">{{trans('backend/orders.allCompanies')}}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover daTatable dataTable deleteFormModal text-center " id="companiesTable">
                        <thead>
                            <tr>
                                <th>
                                <div class="checkbox" data-toggle="tooltip" data-placement="right" title="{{trans('backend/orders.allCompanies')}}">
                                        <label><input type="radio" checked name="companyCheckBox" class="companyCheckBox" value="0">{{trans('backend/orders.num')}}</label>
                                    </div>
                                    
                                </th>
                                <th>
                                    <input type="text" style="margin-bottom: 5px;font-size:12px;" name="search" class="form-control" placeholder="{{trans('backend/orders.userName')}} or Email" id="SearchCompanies">
                                </th>
                                <th>{{trans('backend/orders.Email')}}</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $com)  
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label><input type="radio" name="companyCheckBox" class="companyCheckBox" value="{{$com->id}}">{{$com->id}}</label>
                                    </div>
                                </td>
                                <td>{{$com->name}}</td>
                                <td>
                                    {{$com->email}}
                                </td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
        </div>
    </div>
    <div class="col-xs-6">
        <div class="box box-danger ">
            <div class="box-header with-border" data-widget="collapse">
              <h3 class="box-title">{{trans('backend/orders.chart')}}</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body" style="">
              <canvas id="pieChart" width="468" height="234"></canvas>
                <div class="dashedRows">
                    <div class="row" id="companyName" >
                        <span style="color:#333;font-size:14px;font-weight:bold;">{{trans('backend/orders.companyName')}}</span>
                        <span class="info">All Companies</span>
                    </div>
                    <div class="row" id="searchField" >
                        <span style="color:#333;font-size:14px;font-weight:bold;"></span>
                        <span class="info"></span>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>