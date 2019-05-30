<div id="offerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" v-if="offer&&offer.id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >{{trans('backend/home.offer')}} : @{{offer.id}}</h4>
            </div>
            <div class="modal-body">
            <p style="text-align:center;">@{{offerVehicl}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('backend/home.close')}}</button>
            </div>
        </div>

    </div>
    
</div>