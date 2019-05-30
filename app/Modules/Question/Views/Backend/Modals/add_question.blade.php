<div class="modal fade" id="add-question">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
                <h4 class="modal-title"> <i class="fa fa-plus fa-1x"></i> Add New Question</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Question: </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control question" type="text" placeholder="Question" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Answer 1 : </strong>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control answer" id="answer-1" type="text" placeholder="Answer 1" />
                            <a href="#" class="pull-right add_answer">Add Answer</a>
                        </div>
                    </div>
                </div>
                <div id="answers">
                    
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Main : </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="checkbox" name="type" class="icheckbox_flat is_main">
                            &nbsp; Main
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Document : </strong>
                        </div>
                        <div class="col-sm-8">
                            <select class="form-control docs">
                                <option value="0">Select Item From List</option>
                                @foreach($docs as $doc)
                                <option value="{{$doc->id}}">{{$doc->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <strong>Notes: </strong>
                        </div>
                        <div class="col-sm-8">
                            <textarea class="form-control notes" placeholder="Notes"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success ladda-button" data-style="expand-right"> <i class="fa fa-save"></i> <span class="ladda-label">{{ trans('main.save') }}</span></button>

                <button type="button" class="btn btn-danger btn-close" data-dismiss="modal"><i class="fa fa-home "></i> {{ trans('main.cancel') }}</button>
            </div>
        </div>
    </div>
</div>