<style>
        #IncomPletedValues .modal-content {
            padding: 1rem;
        }
    
        #IncomPletedValues .modal-body {
            padding: 1.5rem;
        }
    
        #IncomPletedValues .modal h4 {
            font-size: 2rem;
            color: #398bf7;
        }
    
        #IncomPletedValues .modal h4 span {
            margin-right: 1rem;
        }
    
        #IncomPletedValues .user-profile-update {
            padding: 2rem;
    
            overflow-y: auto;
        }
    
        #IncomPletedValues fieldset {
            border: .1rem solid #DDD;
            border-radius: .5rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
    
        #IncomPletedValues legend {
            display: block;
            width: 100%;
            padding: 0;
            margin-bottom: 20px;
            font-size: 21px;
            line-height: inherit;
            color: #333;
            border: 0;
            border-bottom: 1px solid #e5e5e5;
            color: #f6ab36;
        }
    
        #IncomPletedValues #ValidateAndContinue {
            padding: 1rem 5rem;
            border: none;
            background: #f6ab36;
            color: #FFF;
            font-size: 1.5rem;
            letter-spacing: .1rem;
            border-radius: .5rem;
            transition: background .5s, transform .5s;
            float: right;
        }
        #IncomPletedValues #ValidateAndContinue:hover{
            background: #ff9d00;
            transform: scale(1.05);
        }
    
        #IncomPletedValues .update-group {
            margin-bottom: 2.5rem;
        }
    
        #IncomPletedValues .update-group label {
            color: #f6ab36;
        }
    
        #IncomPletedValues .update-input {
            width: 100%;
            padding: .5rem 1rem;
            border-radius: .3rem;
            border: 0.1rem solid rgba(0, 0, 0, 0.2);
            transition: all .5s;
            font-size: 1.4rem;
        }
    </style>
    <div id="IncomPletedValues" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="    margin-right: 1.5rem;">
                            <i class="fas fa-asterisk"></i>
                        {{trans('frontend/completed.title')}}</h4>
                </div>
                <div class="modal-body clearfix">
                    <div class="user-profile-update">
                        <div class="row">
                            <div class="col-xs-12">
                                <fieldset id="inCompletedFieldSet">
                                    <legend>{{trans('frontend/completed.IncompletedValues')}}</legend>
    
                                    
    
                                    
    
    
    
                                    
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" style="float:left;" data-dismiss="modal">
                        {{trans('frontend/login.close')}}
                    </button>
                    <button type="button" id="ValidateAndContinue" class="btn btn-default" data-dismiss="modal">
                        {{trans('frontend/login.save')}}
                    </button>
                </div>
            </div>
    
        </div>
    </div>