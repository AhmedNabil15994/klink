{
    props:['offer'],
    template:`@include('backend.adminlte.homeSide.templates.offerModal')`,
    computed:{
        offerVehicl:function(){
            if(this.offer&&this.offer.id){
                return this.offer.id;
            }else{
                return 'false';
            }
        }
    }
}