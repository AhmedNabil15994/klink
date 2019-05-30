<div class="user-map-head-wrapper">
    <img :src="user.profile.image ? user.profile.image : '/images/avatar.png'" alt="">
    <div class="user-map-head-info">
        <span class="user-map-head-infoPiece">
            <b>{{trans('backend/home.name')}} : </b>@{{user.name}}
        </span>
        <span class="user-map-head-infoPiece">
            <b>{{trans('backend/home.email')}} : </b>@{{user.email}}
        </span>
        <span class="user-map-head-infoPiece">
            <b>{{trans('backend/home.phone')}} : </b>@{{user.profile.phone}}
        </span>
        <span class="user-map-head-infoPiece">
            <b>{{trans('backend/home.address')}} : </b>@{{getAddress()}}
        </span>

    </div>
</div>