<template>
    <div class="nav_profile">
        <div class="media profile-left">
            <a class="float-left profile-thumb" href="javascript:void(0)">
                <img :src="this.$store.state.user.picture" class="rounded-circle" alt="User Image">
            </a>
            <div class="content-profile">
                <h4 class="media-heading user_name_max" v-text="this.$store.state.user.name"></h4>
                <ul class="icon-list">
                    <li>
                        <a href="/users_list" title="user">
                            <i class="ti-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/lockscreen" title="lock">
                            <i class="ti-lock"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/edit_user" title="settings">
                            <i class="ti-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/login" title="Logout">
                            <i class="ti-shift-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
    /* left side profile css */
    
    .profile-left {
        padding: 15px;
        min-height: 90px;
        border-bottom: 1px solid #EEE;
    }
    
    .profile-left .profile-thumb {
        border-radius: 50px;
        display: inline-block;
        padding-top: 9px;
    }
    
    .profile-left .media-heading {
        line-height: 23px;
        margin-top: 12px;
        font-weight: 500;
        font-size: 16px;
        color: #2E576B;
    }
    
    .profile-left .profile-thumb img {
        width: 54px;
    }
    
    .content-profile {
        padding-left: 15px;
        .icon-list {
            padding-left: 0;
        }
    }
    
    .content-profile .icon-list li {
        display: inline-block;
        padding: 0;
        vertical-align: top;
    }
    
    .content-profile .icon-list:before {
        content: '';
    }
    
    .content-profile .icon-list li i {
        font-siright-slimze: 13px;
        color: #555;
        padding-top: 5px;
    }
    
    .content-profile .icon-list li a {
        display: block;
        width: 30px;
        height: 25px;
        text-align: center;
        line-height: 23px;
        transition: all 300ms ease-in-out;
    }
    
    .content-profile .icon-list li a {
        border: 1px solid #DDD;
        // padding: 5px;box-shadow: 0 0 15px #EEE;
    }
    
    .icon-list li a {
        position: relative;
    }
</style>
