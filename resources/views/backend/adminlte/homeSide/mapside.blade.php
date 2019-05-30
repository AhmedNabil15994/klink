<div id="map-side" class="map-side-main-wrapper">
    <div class="close-map-side">
        <i class="fa fa-times-circle" @click="closeMapSide" ></i>
    </div>
    <head-side :user="user" v-if="user['profile']"></head-side>
    <order-side :order="order" v-if="order['id']"></order-side>
    <vehicle-show :vehicle="vehicle" v-if="vehicle['id']"></vehicle-show>
   
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var offerModal = @include('backend.adminlte.homeSide.offerModal');
    Vue.component('offer-modal',offerModal);
    Vue.component('vehicle-show',{
        props:['vehicle'],
        template:`@include('backend.adminlte.homeSide.headVehicle')`,
        data:function(){
            return {
                showedDriver:'Driver',
            }
        },
        computed:{
            company:function(){
                var users = VueHome.savedUsers.filter(function(e){
                    return e.id === this.vehicle.user_id;
                }.bind(this));
                if(users.length>0){

                    return users[0];
                }else{
                    return {
                        profile:{}
                    }
                }
            }
        },
        methods:{
            getAddress:function(company=false){
                if(company===true){
                    var profile = this.company.profile;
                    var address = `${profile.address}, ${profile.home} ${profile.postal_code}, ${profile.region},
                        ${profile.district}, ${profile.country}`
                    return address;
                }
                var profile = this.vehicle.drivere.profile;
                for(var key in profile){
                    if(!profile[key]){
                        profile[key]=''
                    }
                }
                var address = `${profile.address}, ${profile.home} ${profile.postal_code}, ${profile.region},
                 ${profile.district}, ${profile.country}`
                 return address;
            }
        }
    })
    Vue.component('order-side',{
        props:['order'],
        template:`@include('backend.adminlte.homeSide.headOrder')`,
        data:function(){
            return {
                showedOffers:'offers',
                showedSender:'sender',
                showedOffer:'',
            }
        },
        methods:{
            showOffer(offer){
                this.showedOffer = offer;
                $('#offerModal').modal('show');
                $('.modal-backdrop').appendTo('#map-side');   
     
          //remove the padding right and modal-open class from the body tag which bootstrap adds when a modal is shown
                $('body').removeClass("modal-open")
                $('body').css("padding-right","");
                
            }
        }
    })
    Vue.component('head-side', {
        props:['user'],
        template: `@include('backend.adminlte.homeSide.headMap')`,
        methods:{
            getAddress:function(){
                var profile = this.user.profile;
                for(var key in profile){
                    if(!profile[key]){
                        profile[key]=''
                    }
                }
                var address = `${profile.address}, ${profile.home} ${profile.postal_code}, ${profile.region},
                 ${profile.district}, ${profile.country}`
                 return address;
            }
        }
    })
    window.VueApp = new Vue({

            el: '#map-side',
            data: {
                currentUser:'',
                currentOrder:'',
                currentVehicle:'',

            },
            methods:{
                closeMapSide:function(){
                    $('.map-side-lg').removeClass('shown');
                    $('#googlemaps').removeClass('withShown');
                    console.log('ahmed')
                },
            },
            computed:{
                user:function(){
                    
                    if(this.currentUser && VueHome.savedUsers){
                        var usersArray =  VueHome.savedUsers.filter(function(e){
                            return e.id === this.currentUser;
                        }.bind(this))
                        this.currentOrder = '';
                        this.currentVehicle = '';
                        return usersArray[0];
                    }
                    return {}

                },
                order:function(){
                    if(this.currentOrder&&VueHome.savedOrders){
                        var ordersArray = VueHome.savedOrders.filter(function(order){
                            return order.id === this.currentOrder;
                        }.bind(this));
                        this.currentUser = '';
                        this.currentVehicle = '';
                        return ordersArray[0];
                    }
                    return {};
                },
                vehicle:function(){
                    if(this.currentVehicle&&VueHome.savedVehicles){
                        var vehiclesArray = VueHome.savedVehicles.filter(function(vehicle){
                            return vehicle.id === this.currentVehicle;
                        }.bind(this))
                        this.currentUser = '';
                        this.currentOrder = '';
                        return vehiclesArray[0];
                    }
                    return {};
                }
                
            },
            // watch:{
            //     'currentUser':function(newval){
            //         alert(newval)
            //     }
            // }
            
        }

    )
    
    
</script>