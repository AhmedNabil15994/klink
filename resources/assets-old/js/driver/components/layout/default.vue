<template>
    <div>
        <clear_header></clear_header>
        <div class="wrapper">
            <left_side v-show="this.$store.state.left_open"></left_side>
            <right_side>
                <slot></slot>
            </right_side>
        </div>
        <div class="background-overlay" @click="right_close"></div>
    </div>
</template>

<script>
    import clear_header from "./items/clear_header";
    import left_side from "./items/left-side/default/left-side";
    import right_side from "./items/right-side";
    export default {
        name: 'default_layout',
        components: {
            clear_header,
            left_side,
            right_side
        },
        created: function() {},
        methods: {
            right_close() {
                this.$store.commit('rightside_bar', "close");
            }
        },
        mounted() {
            window.onscroll = function(event) {
                var top = (document.getElementById('menu') && document.getElementById('menu').scrollTop || document.body && document.body.scrollTop || 0);
                if (top <= 56) {
                    document.getElementById("right").style.marginTop = -top + "px"
                } else {
                    document.getElementById("right").style.marginTop = -56 + "px"
                }
    
            }
        }
    }
</script>

<style src="../assets/css/custom_css/metisMenu.css">
    
</style>

<style src="../assets/css/buttons.css">
    
</style>

<style lang="scss" src="../assets/sass/dark/custom.scss">
    
</style>

<style lang="scss" src="../assets/sass/bootstrap/bootstrap.scss">
    
</style>

<style src="font-awesome/css/font-awesome.min.css">
    
</style>

<style src="themify-icons/css/themify-icons.css">
    
</style>

<style>
    body.fixed-header #app .navbar {
        position: relative;
    }
    
    body.fixed-header #app .header {
        margin-bottom: 0;
    }
    
    @media(max-width: 320px) {
        .message_dropdown .dropdown-menu.show {
            left: 20px !important;
        }
    }
</style>

