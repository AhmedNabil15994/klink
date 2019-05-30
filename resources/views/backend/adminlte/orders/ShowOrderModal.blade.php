<style>
    #ShowOrderModal .tablee {
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        border: 2px solid #f6ab36;
        border-radius: 10px;
        width: 100%;
        overflow: hidden;
        margin-top: 10px;
    }
    i.fa-check-circle{
        color:#4baf4b;
        font-size: 1.5em;
    }
    i.fa-times-circle{
        color: #ef0505;
        font-size: 1.5em;
    }
    #ShowOrderModal .tablee .table-raw {
        width: 100%;
        display: flex;
        flex-wrap: nowrap;
        padding: 0 2.5px;
        padding-left: 0;
        /* height: 30px; */
        border-bottom: 1px solid #f6ab36;
        box-sizing: border-box;
        line-height: 30px;
        max-height: 150px;

    }

    #ShowOrderModal .tablee .table-head {
        width: 40%;
        border-right: 1px solid #f6ab36;
        font-weight: 300;
        text-align: center;
        font-size: 15px;
        font-family: 'Galada', cursive;
        color: #000;
        /* color: #111; */
    }

    #ShowOrderModal .tablee .partial-row {
        padding-right: 0;
    }

    #ShowOrderModal .tablee .partial-row .table-head {
        width: 50%;
        background: #f6ab36;
        color: #fff;
        font-weight: bold;
        border-color: #fff;

    }

    #ShowOrderModal .tablee .partial-row .table-head:last-child {
        border-right: 0;

    }

    #ShowOrderModal .tablee .table-cell {
        text-align: center;
        font-size: 14px;
        width: 60%;
        overflow-y: auto;

    }

    /* .reverse{
        background: #333333;
        color: #ffffff;
    } */

    .table-raw.last {
        border-bottom: 0;

    }

    .notes {
        width: 100%;
        margin-top: 20px;
    }
</style>
<div id="ShowOrderModal" class="modal fade rale" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('backend/orders.ModalTitle')}} <span class="order-id"></span></h4>
            </div>
            <div class="modal-body">
                <div id="OrderCarsouel" class="carousel slide" data-interval="false">

                    <div class="carousel-inner">
                        <div class="item ">
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>{{trans('backend/orders.MainOrder')}}</legend>
                                    <div class="placeShow rowOrderShow">
                                        <div class="place-show-item">

                                            <span class="glyphicon glyphicon-map-marker"></span>
                                            <span class="adress">
                                            <div class="title">
                                                    {{trans('backend/orders.from')}} : 
                                            </div>
                                            <span id="place-show-from" style="padding-left:5px;">
                                                
                                            </span>
                                            </span>
                                        </div>
                                        <div class="place-show-item">

                                            <span class="glyphicon glyphicon-road"></span>
                                            <span class="adress">
                                            <div class="title">
                                                    {{trans('backend/orders.distance')}} : 
                                            </div>
                                            <span id="place-show-distance" style="padding-left:5px;">
                                                
                                            </span>
                                            </span>
                                        </div>

                                        <div class="place-show-item">

                                            <span class="glyphicon glyphicon-send"></span>
                                            <span class="adress">
                                                <div class="title">
                                                        {{trans('backend/orders.to')}} : 
                                                </div>
                                                <span id="place-show-to" style="padding-left:5px;">
                                                    
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="placeShow rowOrderShow ">
                                        <div class="tablee">
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.cost')}}</div>
                                                <div class="table-cell" id="order-cost-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.weight')}}</div>
                                                <div class="table-cell" id="order-weight-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.items')}}</div>
                                                <div class="table-cell" id="order-number-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.dimentions')}}</div>
                                                <div class="table-cell" id="order-dimention-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.description')}}</div>
                                                <div class="table-cell" id="order-description-show"></div>
                                            </div>




                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        </div>
                        <div class="item canBeLoaded ">
                            <div class="col-xs-12">
                                <fieldset>
                                    <legend>{{trans('backend/orders.Dating')}}</legend>
                                    <div class="placeShow rowOrderShow">
                                        <div class="tablee" id="OrderDating">
                                            <div class="table-raw partial-row">
                                                <div class="table-head">{{trans('backend/orders.loadingFrom')}}</div>
                                                <div class="table-head">{{trans('backend/orders.charge')}}</div>

                                            </div>
                                            <div class="table-raw">
                                                <div class="table-cell" id="date-loadingFrom-show"></div>
                                                <div class="table-cell" id="date-charge-show"></div>
                                            </div>
                                            <div class="table-raw partial-row">
                                                <div class="table-head">{{trans('backend/orders.deliveryFrom')}}</div>
                                                <div class="table-head">{{trans('backend/orders.deliveryUntil')}}</div>

                                            </div>
                                            <div class="table-raw">
                                                <div class="table-cell" id="date-deliveryFrom-show"></div>
                                                <div class="table-cell" id="date-deliveryUntil-show"></div>
                                            </div>
                                            <div class="table-raw partial-row">
                                                <div class="table-head" style="width:100%;border-right:0;">{{trans('backend/orders.ActiveTill')}}</div>

                                            </div>
                                            <div class="table-raw">

                                                <div class="table-cell" style="width:100%" id="date-validUntil-show">

                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <div class="placeShow rowOrderShow ">
                                        <h5 style="text-align:center;width:100%;">{{trans('backend/orders.otherBillings')}}</h5>
                                        <div class="tablee" id="orderOtherBilling">
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.first_name')}}</div>
                                                <div class="table-cell" id="orderBilling-first_name-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.email')}}</div>
                                                <div class="table-cell" id="orderBilling-email-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.phone')}}</div>
                                                <div class="table-cell" id="orderBilling-phone-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.company')}}</div>
                                                <div class="table-cell" id="orderBilling-company-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.country')}}</div>
                                                <div class="table-cell" id="orderBilling-country-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.town')}}</div>
                                                <div class="table-cell" id="orderBilling-town-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.street')}}</div>
                                                <div class="table-cell" id="orderBilling-street-show"></div>
                                            </div>
                                            <div class="table-raw">
                                                <div class="table-head">{{trans('backend/orders.home')}}</div>
                                                <div class="table-cell" id="orderBilling-home-show"></div>
                                            </div>






                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="loading-div">
                                <i class="fa fa-spin fa-spinner"></i>
                            </div>
                        </div>
                        <div class="item canBeLoaded ">
                            <fieldset>
                                <legend>{{trans('backend/orders.Sender')}}</legend>
                                <div class="placeShow rowOrderShow">
                                    <div class="tablee" id="SenderInformation">
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.first_name')}}</div>
                                            <div class="table-cell" id="Sender-first_name-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.email')}}</div>
                                            <div class="table-cell" id="Sender-email-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.phone')}}</div>
                                            <div class="table-cell" id="Sender-phone-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.company')}}</div>
                                            <div class="table-cell" id="Sender-company-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.country')}}</div>
                                            <div class="table-cell" id="Sender-country-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.town')}}</div>
                                            <div class="table-cell" id="Sender-town-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.street')}}</div>
                                            <div class="table-cell" id="Sender-street-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.home')}}</div>
                                            <div class="table-cell" id="Sender-home-show"></div>
                                        </div>






                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>{{trans('backend/orders.Receiver')}}</legend>
                                <div class="placeShow rowOrderShow">
                                    <div class="tablee" id="ReceiverInformation">
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.first_name')}}</div>
                                            <div class="table-cell" id="Receiver-first_name-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.email')}}</div>
                                            <div class="table-cell" id="Receiver-email-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.phone')}}</div>
                                            <div class="table-cell" id="Receiver-phone-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.company')}}</div>
                                            <div class="table-cell" id="Receiver-company-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.country')}}</div>
                                            <div class="table-cell" id="Receiver-country-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.town')}}</div>
                                            <div class="table-cell" id="Receiver-town-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.street')}}</div>
                                            <div class="table-cell" id="Receiver-street-show"></div>
                                        </div>
                                        <div class="table-raw">
                                            <div class="table-head">{{trans('backend/orders.home')}}</div>
                                            <div class="table-cell" id="Receiver-home-show"></div>
                                        </div>






                                    </div>
                                </div>
                            </fieldset>

                        </div>
                        <div class="item canBeLoaded active">
                            <fieldset>
                                <legend>{{trans('backend/orders.Offers')}}</legend>
                                <div class="placeShow rowOrderShow">
                                    <table class="table table-striped table-hover" id="OffersTable">
                                        <thead>
                                            <tr style="background:#eee;">
                                                <th>{{trans('backend/orders.total')}}</th>
                                                <th>{{trans('backend/orders.user')}}</th>
                                                <th>{{trans('backend/orders.status')}}</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>


                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer clearfix">
                <a class="btn btn-success pull-left" href="#OrderCarsouel" data-slide="prev">
                            <span class="fa fa-angle-left"></span>  {{trans('backend/orders.prev')}} 
                    </a>

                <a class="btn btn-success pull-right" href="#OrderCarsouel" data-slide="next">
                            {{trans('backend/orders.next')}} <span class="fa fa-angle-right"></span>
                    </a>

            </div>
        </div>

    </div>
</div>
<style>
    #OrderCarsouel .item {
        min-height: 300px;
        /* width: 100%; */
    }

    #OrderCarsouel .item .loading-div {
        transition: .5s;
        opacity: 0;
        z-index: -1;
        width: 0;
        height: 0;
    }

    #OrderCarsouel .item.loading {
        min-height: 300px;
        /* width: 100%; */
        position: relative;
    }

    #OrderCarsouel .item.loading .loading-div {
        opacity: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .4);
        transition: .5s;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #OrderCarsouel .item.loading .loading-div i.fa {

        font-size: 5em;
        color: #f6ab36;
    }

    #OrderCarsouel {
        font-family: 'Raleway', sans-serif;
        letter-spacing: .05rem;
    }

    .carousel-indicators li {
        background: rgba(0, 0, 0, .4);

    }

    .carousel-indicators li.active {
        background: rgba(0, 0, 0, .95);
    }

    fieldset {
        border: .1rem solid #DDD;
        border-radius: .5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;

    }

    legend {
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

    .rowOrderShow {
        display: flex;
        flex-wrap: wrap;
    }

    .rowOrderShow .place-show-item {
        min-width: 33%;
        display: flex;
        align-items: center;
        padding: 0 1rem;
    }

    .place-show-item .title {
        font-size: 18px;
        font-weight: bold;
        padding-left: 5px;
        color: #b7b4b4;
    }

    .glyphicon-map-marker:before,
    .glyphicon-send:before,
    .glyphicon-road:before,
    .icon_time.glyphicon-time:before,
    .glyphicon-euro:before {
        font-size: 2.8rem;
        color: #f6ab36;
    }
</style>