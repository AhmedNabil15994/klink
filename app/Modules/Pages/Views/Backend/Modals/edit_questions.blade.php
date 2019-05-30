<div id="edit-model" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Edit Model Question</h4>

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
                            <strong>Questions : </strong>
                        </div>
                        <div class="col-sm-9">
                            <select id="questions" class="form-control" multiple="multiple[]">
                            @foreach($questions as $question)
                            <option value="{{$question->id}}">{{$question->question}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <strong>Default : </strong>
                        </div>
                        <div class="col-sm-9">
                            <input type="checkbox" name="active" class="icheckbox_flat active"> Default
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
