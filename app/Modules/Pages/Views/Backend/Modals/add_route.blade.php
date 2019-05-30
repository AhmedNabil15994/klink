<div id="add-route" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Create New Route</h4>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <br>
                    <br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="modal-body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Title : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control title" type="text" placeholder="Title" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Route : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control route" type="text" placeholder="Route" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Layout : </strong>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="layout"  rows="10" cols="80">
                            
                            </textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success ladda-button" data-style="expand-right">
                    <i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal">
                    <i class="fa fa-home "></i> Cancel</button>
            </div>


        </div>
    </div>
</div>
