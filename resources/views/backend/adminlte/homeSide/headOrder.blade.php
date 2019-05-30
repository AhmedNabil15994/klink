<div class="order-descriptioin-wrapper">
    
    <div class="order-part-info">
        <div class="order-part-item">
            <i class="fa fa-home"></i>
            @{{order.source}}
        </div>
        <div class="order-part-item">
            <i class="fa fa-location-arrow"></i>
            @{{order.destination}}
        </div>
    </div>
    <div class="order-part-info">
        <div class="order-menu">
            <div :class="{'order-menu-item':true,'active':showedOffers==='offers'}"  @click="showedOffers='offers'">{{trans('backend/home.offers')}}</div>
            <div :class="{'order-menu-item':true,'active':showedOffers==='information'}"  @click="showedOffers='information'">{{trans('backend/home.information')}}</div>
            
        </div>
        <div class="order-part-item offers" v-if="showedOffers==='offers'">
            <div class="offer-item head-item" v-if="order.offers && order.offers.length!==0">
                <div class="offer-desc">
                    {{trans('backend/home.companyName')}}
                </div>
                <div class="offer-desc">
                    {{trans('backend/home.total')}}
                </div>
                <div class="offer-desc">
                    {{trans('backend/home.status')}}
                </div>
            </div>
            <div class="no-items" style="padding:5px;" v-else>
                <img src="/images/noOffers.svg" width="60px" height="60px" alt="{{trans('backend/home.noOffers')}}">
                <p style="text-algin:center;">{{trans('backend/home.noOffers')}}</p>
            </div>
            <div class="offer-item" @click="showOffer(offer)" v-for="offer in order.offers">
                <div class="offer-desc">
                    @{{offer.user.name}}
                </div>
                <div class="offer-desc">
                    @{{offer.total}}
                </div>
                <div class="offer-desc">
                    <i :class="{'fa':true,'fa-check-circle':offer.is_accepted===1,'fa-times-circle':offer.is_accepted===0}"></i>
                </div>
            </div>
            
        </div>
        <div class="order-part-item information" v-if="showedOffers==='information'">
            <div class="tablee">
                <div class="table-row">
                    <div class="table-head">{{trans('backend/orders.cost')}}</div>
                    <div class="table-cell">@{{order.cost}}</div>
                </div>
                <div class="table-row">
                    <div class="table-head">{{trans('backend/orders.weight')}}</div>
                    <div class="table-cell">@{{order.weight}}</div>
                </div>
                <div class="table-row">
                    <div class="table-head">{{trans('backend/orders.items')}}</div>
                    <div class="table-cell">@{{order.items}}</div>
                </div>
                <div class="table-row">
                    <div class="table-head">{{trans('backend/orders.dimentions')}}</div>
                    <div class="table-cell">@{{order.width}}, @{{order.height}}, @{{order.length}}</div>
                </div>
                <div class="table-row">
                    <div class="table-head">{{trans('backend/orders.description')}}</div>
                    <div class="table-cell">@{{order.description}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-part-info">
        <div class="order-menu">
                <div :class="{'order-menu-item':true,'active':showedSender==='sender'}" @click="showedSender='sender'" >{{trans('backend/home.Sender')}}</div>
                <div :class="{'order-menu-item':true,'active':showedSender==='receiver'}" @click="showedSender='receiver'" >{{trans('backend/home.Receiver')}}</div>
                <div :class="{'order-menu-item':true,'active':showedSender==='otherBilling'}" @click="showedSender='otherBilling'" v-if="order.other_billing&&order.other_billing!==null" >{{trans('backend/home.otherBillings')}}</div>
        </div>
        <div class="order-part-item" style="flex-wrap:wrap;" v-if="showedSender==='sender'">
            <div style="width:100%;margin-top:5px;" >
                <i class="fa fa-user-circle"></i>
                @{{order.sender.first_name}} @{{order.sender.nick_name}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-envelope"></i>
                @{{order.sender.email}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-phone"></i>
                @{{order.sender.phone}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-map-marker"></i>
                @{{order.sender.street}}, 
                @{{order.sender.home}}, 
                @{{order.sender.postal_code}}, 
                @{{order.sender.town}}, 
                @{{order.sender.country}}.
            </div>
        </div>
        <div class="order-part-item" style="flex-wrap:wrap;" v-if="showedSender==='receiver'">
            <div style="width:100%;margin-top:5px;" >
                <i class="fa fa-user-circle"></i>
                @{{order.receiver.first_name}} @{{order.receiver.nick_name}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-envelope"></i>
                @{{order.receiver.email}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-phone"></i>
                @{{order.receiver.phone}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-map-marker"></i>
                @{{order.receiver.street}}, 
                @{{order.receiver.home}}, 
                @{{order.receiver.postal_code}}, 
                @{{order.receiver.town}}, 
                @{{order.receiver.country}}.
            </div>
        </div>
        <div class="order-part-item" style="flex-wrap:wrap;" v-if="showedSender==='other_billing'">
            <div style="width:100%;margin-top:5px;" >
                <i class="fa fa-user-circle"></i>
                @{{order.other_billing.first_name}} @{{order.other_billing.nick_name}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-envelope"></i>
                @{{order.other_billing.email}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-phone"></i>
                @{{order.other_billing.phone}}
            </div>
            <div style="width:100%;">
                <i class="fa fa-map-marker"></i>
                @{{order.other_billing.street}}, 
                @{{order.other_billing.home}}, 
                @{{order.other_billing.postal_code}}, 
                @{{order.other_billing.town}}, 
                @{{order.other_billing.country}}.
            </div>
        </div>
    </div>
    <offer-modal :offer="showedOffer"></offer-modal>
</div>