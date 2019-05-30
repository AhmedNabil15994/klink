import {
    setTimeout
} from "timers";
import {
    ENGINE_METHOD_DIGESTS
} from "constants";
import {
    fakeValidator,
    fakeFunction
} from './vss/defaults'
export default function (Vue) {

    Vue.vss = {



        post({
            validate = fakeValidator(),
            url = '',
            succesValidate = fakeFunction,
            failedValidate = fakeFunction,
            successServer = fakeFunction,
            failServer = fakeFunction,
            LoadingTitle = trans('front.main.loadingDefaultTitle'),
            LoadingBody = trans('front.main.LoadingDefaultBody'),
            successTitle = trans('front.main.successDefaultTitle'),
            successBody = trans('front.main.successDefaultBody'),
            failTitle = trans('front.main.failDefaultTitle'),
            failBody = trans('front.main.failDefaultBody'),
            warningBody = trans('front.main.warningDefaultBody'),
            warningTitle = trans('front.main.warningDefaultTitle'),

            data = {}
        } = {}) {


            return validate.validateAll()
                .then(result => {
                    if (result) {
                        return Vue.prototype.$snotify.async(LoadingBody, LoadingTitle, () => {
                            succesValidate(result);
                            return new Promise((resolve, reject) => {
                                return Vue.http.post(url, data, {
                                        before(request) {

                                            // abort previous request, if exists
                                            if (window.previousRequest && window.previousRequest.body === request.body) {


                                                window.previousRequest.abort();
                                            }

                                            // set previous request on Vue instance
                                            window.previousRequest = request;
                                        }
                                    })
                                    .then(response => {

                                        successServer(response);

                                        resolve({
                                            title: successTitle,
                                            body: successBody,

                                            config: {
                                                timeout: 2000,
                                                closeOnClick: true
                                            }
                                        })

                                    }, error => {



                                        if (error.body && error.body.message && error.body.message !== '') {
                                            failBody = error.body.message;
                                        }
                                        if (error.body.errors) {
                                            for (var key in error.body.errors) {
                                                error.body.errors[key].forEach(function (element) {

                                                })
                                            }
                                            reject({
                                                title: failTitle,
                                                body: failBody,

                                                config: {
                                                    timeout: 2000,
                                                    closeOnClick: true
                                                }
                                            })
                                        } else {
                                            reject({
                                                title: failTitle,
                                                body: failBody,

                                                config: {
                                                    timeout: 2000,
                                                    closeOnClick: true
                                                }
                                            })

                                        }
                                        failServer(error);

                                    })
                            })

                        });


                    } else {



                        failedValidate(result);
                    }

                })


        }
    }
    Object.defineProperties(Vue.prototype, {
        $vss: {
            get() {
                return Vue.vss;
            }
        }
    })
}