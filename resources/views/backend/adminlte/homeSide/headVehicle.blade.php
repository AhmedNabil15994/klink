<div style="display:flex;flex-direction:column">
    <div class="user-map-head-wrapper" style="margin-bottom:10px; border-bottom:1px solid #ffb43c;">
        <img :src="'/images/shippings/'+vehicle.ship.img" alt="">
        <div class="user-map-head-info">
            <span class="user-map-head-infoPiece">
                <b>{{trans('backend/home.shipTitle')}} : </b>@{{vehicle.ship_name}} 
            </span>
            <span class="user-map-head-infoPiece">
                <b>{{trans('backend/home.address')}} : </b>@{{vehicle.address}}, @{{vehicle.home}},
                        @{{vehicle.postal_code}}, @{{vehicle.city}}, @{{vehicle.country}}.
            </span>
            <span class="user-map-head-infoPiece">
                <b>{{trans('backend/home.weight')}} : </b>@{{vehicle.weight}}.
            </span>
        </div>

    </div>
    <div class="order-part-info">
        <div class="order-menu">
            <div :class="{'order-menu-item':true,'active':showedDriver==='Driver'}" @click="showedDriver='Driver'"  >{{trans('backend/home.driver')}}</div>
            <div :class="{'order-menu-item':true,'active':showedDriver==='Company'}" @click="showedDriver='Company'"  >{{trans('backend/home.companyName')}}</div>
            
        </div>
        <div class="user-map-head-wrapper" v-if="showedDriver==='Driver'">
            <img :src="vehicle.drivere.profile.image ? vehicle.drivere.profile.image : '/images/avatar.png'" alt="">
            <div class="user-map-head-info">
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.name')}} : </b>@{{vehicle.drivere.name}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.email')}} : </b>@{{vehicle.drivere.email}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.phone')}} : </b>@{{vehicle.drivere.profile.phone}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.address')}} : </b>@{{getAddress()}}
                </span>
        
            </div>
        </div>
        <div class="user-map-head-wrapper" v-if="showedDriver==='Company'">
            <img :src="company.profile.image ? company.profile.image : '/images/avatar.png'" alt="">
            <div class="user-map-head-info">
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.name')}} : </b>@{{company.name}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.email')}} : </b>@{{company.email}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.phone')}} : </b>@{{company.profile.phone}}
                </span>
                <span class="user-map-head-infoPiece">
                    <b>{{trans('backend/home.address')}} : </b>@{{getAddress(true)}}
                </span>
        
            </div>
        </div>
    </div>
</div>