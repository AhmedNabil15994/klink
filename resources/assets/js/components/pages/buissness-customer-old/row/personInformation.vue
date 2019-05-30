<template>
    <div class="person-information">
        <div class="head-information">
            <img src="/images/multiple-users-silhouette.svg" alt="persons">
            <span>{{trans('front.buissness.persons')}}</span>
        </div>
        <input-parent v-if="inputs" v-bind="inputs[0].props" v-model="person.information.first_name"> </input-parent>
        <input-parent v-if="inputs" v-bind="inputs[1].props" v-model="person.information.last_name"> </input-parent>
        <input-parent v-if="inputs" v-bind="inputs[2].props" v-model="person.information.email"> </input-parent>
    
    </div>
</template>


<script>
    export default {
        data() {
            return {
    
            }
        },
        computed: {
            inputs() {
                var index = this.index;
    
                return [{
                    props: {
                        placeholder: trans('front.buissness.firstName'),
                        name: trans('front.buissness.firstName') + index + this.stopIndex,
                        id: trans('front.buissness.firstName') + index + this.stopIndex,
                        validate: 'required',
                    }
                }, {
                    props: {
                        placeholder: trans('front.buissness.lastName'),
                        name: trans('front.buissness.lastName') + index + this.stopIndex,
                        id: trans('front.buissness.lastName') + index + this.stopIndex,
                        validate: 'required',
                    }
                }, {
                    props: {
                        placeholder: trans('front.buissness.email'),
                        name: trans('front.buissness.email') + index + this.stopIndex,
                        id: trans('front.buissness.email') + index + this.stopIndex,
                        validate: 'email',
                    }
                }]
            }
        },
        props: {
            person: {
                required: true,
            },
            index: {
                required: true,
            },
            stopIndex: {
                required: true,
    
            }
        },
        methods: {},
        created() {
    
    
        },
        mounted() {
    
    
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
