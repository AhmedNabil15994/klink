<template>
    <div class="form-wrapper">
        <div class="body-overlay"></div>
        <form action="#" class="app-form" @submit.prevent="login">
            <h3>{{trans('front.main.login')}}</h3>
    
            <div style="display:flex; flex-wrap:wrap;">
                <div :class="{'app-input-div':true,'wrong':errors.has('email')}" id="emailDiv">
                    <div class="icon">
                        <img class="svg" src="/images/user.svg" />
                    </div>
    
                    <input type="email" @focus="focusInput('emailDiv')" name="email" v-model="user.email" v-validate="'required|email'" :placeholder="trans('front.login.example')">
                    <span class="error-danger" v-if="errors.has('email')">{{errors.first('email')}} </span>
                </div>
                <div :class="{'app-input-div':true,'wrong':errors.has('password')}">
                    <div class="icon">
                        <img class="svg" src="/images/key.svg" />
                    </div>
                    <input type="password" name="password" v-model="user.password" :placeholder="trans('front.login.password')" v-validate="'required'">
                    <span class="error-danger" v-if="errors.has('password')">{{errors.first('password')}}</span>
                </div>
                <span class="error-message-global" v-if="attemps.isError">{{attemps.message}}{{timeToLOgin}}</span>
                <div class="app-form-submit">
                    <input type="submit" :disabled="isDisabled" :value="trans('front.main.login')">
                </div>
            </div>
    
            <div class="login-help">
                <span>{{trans('front.login.newTo')}}</span><router-link :to="'/register'" class="register">{{trans('front.login.register')}}</router-link>
            </div>
        </form>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                user: {
                    email: '',
                    password: ''
                },
                attemps: {
                    time: '',
                    message: '',
                    isError: 0
                },
                isDisabled: false,
            }
        },
        computed: {
            timeToLOgin() {
                if (!this.attemps.time) {
                    return ''
                }
                var minutes = parseInt(this.attemps.time / 60);
                var seconds = this.attemps.time % 60;
                return minutes + ' : ' + seconds;
            }
        },
        methods: {
            countDown() {
                if (this.attemps.time <= 0 || !this.attemps.time) {
                    this.isDisabled = false;
                    return false;
                } else {
                    this.attemps.time -= 1;
                    this.isDisabled = true;
                    return setTimeout(() => {
                        this.countDown();
                    }, 1000);
    
                }
            },
            login() {
                this.attemps.isError = false;
                this.$validator.validateAll()
                    .then(result => {
                        if (result) {
    
                            this.$http.post('/login', this.user)
                                .then(response => {
                                    this.$auth.setToken(response.body.access_token, response.body.expires_in * 1000)
                                    this.$router.push('/dashboard')
                                }, error => {
                                    this.attemps.isError = 1;
                                    this.attemps.message = error.body.message
                                    if (error.body['time']) {
                                        this.attemps.time = 0;
                                        setTimeout(() => {
                                            this.attemps.time = parseInt(error.body.time) + 10;
                                            this.countDown();
                                        }, 1000)
                                    }
                                })
                        }
                    })
            },
            focusInput(e) {
    
            },
    
        },
        mounted() {
            this.$genF.svg();
    
        }
    
    }
</script>

<style lang="scss">
    
</style>