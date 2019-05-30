<template>
    <div style="width:100%; min-height:100vh;" class="otherBody">
        <div class="OtherBodyOverLay">
    
        </div>
        <div class="side-yellow">
    
        </div>
        <div class="relative" style="position:relative">
            <div class="OtherBodyOverLay" style="z-index:3;background-color:#241c0cb8;position:absolute;">
                <form action="#" @submit.prevent="myfunc">

                </form>
            </div>
            <gmap-map :center="{lat:51.165691, lng:10.451526}" :zoom="6" map-type-id="roadmap" style="width:100%; height: 600px; margin:0 auto;" ref="map">
            </gmap-map>
        </div>
        <div style="height:100vh; width:50px;"></div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        methods:{
            myfunc(){
                alert('hello')
            }
        }
    
    }
</script>

<style lang="scss">
    .otherBody {
        background: url('/images/1.jpg');
        background-attachment: fixed;
        background-size: cover;
    }
    
    .OtherBodyOverLay {
        background-color: #20190b91;
        width: 100%;
        height: 100%;
        position: fixed;
        display: flex;
        align-items: center;
        top: 0;
        form{
            min-width: 500px;
            max-width: 50%;
            margin: 0 auto;
            height: 50%;
            background: #fff;
            box-shadow:0 0 10px 0px #Fff; 
        }
    }
    
    .relative {
        margin-top: 75px;
    }
</style>