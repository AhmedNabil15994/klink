<template>
    <div class="slick-tour-wrapper">
        <div class="slick-tour-side">
            <div class="side-tour-row row">
                <input-parent v-bind="inputs[0].props"></input-parent>
                <input-parent v-bind="inputs[1].props"></input-parent>
            </div>
    
            <div class="side-tour-row  row">
                <div class="col-7 week-days">
                    <div v-for="(day,index) in days" v-if="index!==6&&index!==5" data-toggle="tooltip" :title="trans('front.buissness.'+day.title)" @click="activateDay(day,index)" :class="{'day':true,'active':day.selected}" :key="'day'+index">
    
                        {{trans('front.buissness.'+day.shortCut)}}
                    </div>
                </div>
                <div class="col-5 week-days">
                    <div v-for="(day,index) in days" v-if="index===6||index===5" data-toggle="tooltip" :title="trans('front.buissness.'+day.title)" @click="activateDay(day,index)" :class="{'day':true,'active':day.selected}" :key="'day'+index">
    
                        {{trans('front.buissness.'+day.shortCut)}}
                    </div>
                </div>
    
    
            </div>
            
        </div>
        <div class="tour-slick">
            <slick ref="slick" :options="slickOptions" class="text-slider">
                <img src="/images/stops/stop.png" alt="stopsimage">
                <img src="/images/stops/slick2.png" alt="stopsimage">
            </slick>
        </div>
    
    
    </div>
</template>


<script>
    import Slick from 'vue-slick';
    export default {
        data() {
            return {
                slickOptions: {
                    arrows: true,
                    autoplay: true,
                    dots: true,
                },
    
                
                days: [{
                        shortCut: 'mondayShortCut',
                        selected: false,
                        title: 'monday',
                    },
                    {
                        shortCut: 'tuesdayShortCut',
                        selected: false,
                        title: 'tuesday',
                    },
                    {
                        shortCut: 'windowsdayShortCut',
                        selected: false,
                        title: 'windowsday',
                    },
                    {
                        shortCut: 'thursdayShortCut',
                        selected: false,
                        title: 'thursday',
                    },
                    {
                        shortCut: 'fridayShortCut',
                        selected: false,
                        title: 'friday',
                    },
                    {
                        shortCut: 'saturdayShortCut',
                        selected: false,
                        title: 'saturday',
                    },
                    {
                        shortCut: 'sundayShortCut',
                        selected: false,
                        title: 'sunday',
                    },
                ],
            }
        },
        computed: {
            inputs() {
                return [{
                    props: {
                        name: 'TourStart',
                        placeholder: trans('front.buissness.tourstartDate'),
                        validate: 'required',
                        id: 'tourStart',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours'),
                        dateOnly: true,
                        newclasses: {
                            'col-7': true
                        },
    
                    }
                }, {
                    props: {
                        name: 'TourStart',
                        placeholder: trans('front.buissness.tourStartTime'),
                        validate: 'required',
                        id: 'tourStartTime',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setHours(0, 0, 0, 0)),
                        timeOnly: true,
                        newclasses: {
                            'col-5': true
                        },
    
                    }
                }, ]
            },
        },
        props: {
            tour: {
                required: true,
            }
        },
        methods: {
            activateDay(day, index) {
                day.selected = !day.selected;
            }
        },
        created() {
    
    
        },
        mounted() {
    
            this.$nextTick(() => {
                $('[data-toggle="tooltip"]').tooltip();
            })
        },
        components: {
            Slick
        },
    
    }
</script>

<style lang="scss">
    
</style>
/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/