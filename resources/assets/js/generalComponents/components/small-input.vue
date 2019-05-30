<template>
    <div class="small-input">
        <input type="text"  @input="handleInput" :class="{'with-error':(errors.has(name)&&fields[name].touched)}" v-model="content" :placeholder="placeholder" :name="name" v-validate="validate">
    </div>
</template>


<script>
    export default {
        data() {
            return {
                content: this.value,
            }
        },
        created() {
    
    
        },
        mounted() {
    
    
        },
        computed: {
    
        },
        methods: {
            handleInput(e) {
    
                this.$emit('input', this.content)
    
            }
        },
        inject: {
            $validator: '$validator'
        },
        watch:{
            value(newval,oldval){
                if(newval!==this.content){
                    this.content = newval;
                }
            }
        },
        props: {
            value:{},
            name: {
                required: true,
    
            },
            placeholder: {
                required: false,
    
            },
            validate: {
                required: false,
                default: '',
            }
    
        }
    
    }
</script>

<style lang="scss">
    
</style>
// Ahmed Ali Thabet
