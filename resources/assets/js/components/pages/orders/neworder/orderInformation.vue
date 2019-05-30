<template>
    <form action="#">
        <div class="goods-descripe goods-wizard">
            <div :class="{'with-error':senderErrors!==0,'goods-wizard-child':true,'active':senderOrReceiver==='sender'}" @click="changeSenderOrReceiver('sender')">
                {{trans('front.create.sender')}}
                <span class="error-counter badge badge-danger" data-toggle="tooltip" :title="trans('front.create.fakeValidateMessage')" v-if="this.senderErrors!==0&&watchingErrors===false">{{this.senderErrors}}</span>
                <i class="fa fa-check-circle" v-else-if="validated('sender')"></i>
            </div>
            <div :class="{'with-error':receivererrors!==0,'goods-wizard-child':true,'active':senderOrReceiver==='receiver'}" @click="changeSenderOrReceiver('receiver')">
                {{trans('front.create.receiver')}}
                <span class="error-counter badge badge-danger" data-toggle="tooltip" :title="trans('front.create.fakeValidateMessage')" v-if="this.receivererrors!==0&&watchingErrors===false">{{this.receivererrors}}</span>
                <i class="fa fa-check-circle" v-else-if="validated('receiver')"></i>
            </div>
            <div v-if="order.bill_to==='other'" :class="{'with-error':otherBillingErrors!==0,'goods-wizard-child':true,'active':senderOrReceiver==='otherbilling'}" @click="changeSenderOrReceiver('otherbilling')">
                {{trans('front.create.otherbilling')}}
                <span class="error-counter badge badge-danger" data-toggle="tooltip" :title="trans('front.create.fakeValidateMessage')" v-if="this.otherBillingErrors!==0&&watchingErrors===false">{{this.otherBillingErrors}}</span>
                <i class="fa fa-check-circle" v-else-if="validated('otherbilling')"></i>
            </div>
        </div>
        <div class="goods-descripe" v-show="senderOrReceiver==='sender'" v-if="!$parent.loading &&order.sender">
            <h3 class="goods-descripe-head">
                {{trans('front.create.sender')}}
            </h3>
            <input-parent v-for="input in SenderInputs" v-show="!('showif' in input) || input.showif===true" :key="'sender'+input.model" v-bind="input.props" v-model="order['sender'][input.model]">
                <small-input v-for="small in input.inputs" :key="small.bind" v-bind="small.props" v-model="order[small.model]"></small-input>
            </input-parent>
    
    
        </div>
    
        <div class="goods-descripe" v-show="senderOrReceiver==='receiver'" v-if="!$parent.loading">
            <h3 class="goods-descripe-head">
                {{trans('front.create.receiverQuestion')}}
    
                <input type="checkbox" id="sameAsSender" class="kurier-check" v-model="sameAsReceiver">
                <label for="sameAsSender" data-toggle="tooltip" :title="trans('front.create.sameAsReceiver')"></label>
            </h3>
            <input-parent v-for="input in receiverInputs" v-show="!('showif' in input) || input.showif===true" :key="'sender'+input.model" v-bind="input.props" v-model="order['receiver'][input.model]">
                <small-input v-for="small in input.inputs" :key="small.bind" v-bind="small.props" v-model="order[small.model]"></small-input>
            </input-parent>
    
        </div>
        <div class="goods-descripe" v-show="senderOrReceiver==='otherbilling'" v-if="!$parent.loading&&order&&order.bill_to==='other'">
            <h3 class="goods-descripe-head">
                {{trans('front.create.otherbilling')}}
            </h3>
            <input-parent v-for="input in otherBillingInputs" v-show="!('showif' in input) || input.showif===true" :key="'other'+input.model" v-bind="input.props" v-model="order['otherbilling'][input.model]">
            </input-parent>
    
        </div>
    
    
        <div class="goods-descripe" style="margin-left:5px;" v-if="senderOrReceiver==='sender'">
            <h3 class="goods-descripe-head">{{trans('front.create.pickUpTime')}}</h3>
            <input-parent v-for="input in senderTimes" :key="'sender'+input.model" v-bind="input.props" v-model="order['dating'][input.model]">
                <small-input v-for="small in input.inputs" :key="small.bind" v-bind="small.props" v-model="order[small.model]"></small-input>
            </input-parent>
            <input-parent :key="'bill_to'" v-bind="BillitgSelector.props" v-model="order.bill_to"></input-parent>
        </div>
        <div class="goods-descripe" style="margin-left:5px;" v-if="senderOrReceiver==='receiver'">
            <h3 class="goods-descripe-head">{{trans('front.create.deliveryTime')}}</h3>
            <input-parent v-for="input in receiverTimes" :key="'sender'+input.model" v-bind="input.props" v-model="order['dating'][input.model]">
                <small-input v-for="small in input.inputs" :key="small.bind" v-bind="small.props" v-model="order[small.model]"></small-input>
            </input-parent>
        </div>
        <div class="small-order-cell completeIt">
            <div class="letsComplete btn" @click="acceptAndGo">
                {{trans('front.create.saveOrder')}} <img src="/images/loading.svg" alt="">
            </div>
        </div>
    </form>
</template>


<script>
    export default {
        data() {
            return {
                senderOrReceiver: 'sender',
                sameAsReceiver: false,
                watchingErrors: false,
                senderErrors: 0,
                receivererrors: 0,
                otherBillingErrors: 0,
                SenderInputs: [{
                        props: {
                            name: 'sender' + trans('front.create.firstName'),
                            placeholder: trans('front.create.firstName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'senderfirstName',
                            newclasses: {
                                'half-width': true,
                                'odd': true
                            },
                            autoFocus: true,
    
                        },
                        model: 'first_name',
                    },
                    {
                        props: {
                            name: 'sender' + trans('front.create.lastName'),
                            placeholder: trans('front.create.lastName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'senderlastName',
                            newclasses: {
                                'half-width': true,
    
                            }
    
                        },
                        model: 'nick_name',
                    },
                    {
                        props: {
                            name: 'sender' + trans('front.create.phone'),
                            placeholder: trans('front.create.phone'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required|phone',
                            id: 'senderphone',
                            newclasses: {
                                'half-width': true,
                                'odd': true,
    
                            }
    
    
                        },
                        model: 'phone',
                    },
                    {
                        props: {
                            name: 'sender' + trans('front.create.isCompany'),
                            placeholder: trans('front.create.isCompany'),
                            id: 'senderisCompany',
                            type: 'select',
                            newclasses: {
                                'half-width': true,
                                'odd': true,
    
                            },
    
                            options: [{
                                    value: 'person',
                                    text: trans('front.create.person')
    
                                },
                                {
                                    value: 'company',
                                    text: trans('front.create.company')
                                },
                            ]
    
    
    
                        },
    
                        model: 'isCompany',
                    },
                    {
                        props: {
                            name: 'sender' + trans('front.create.company'),
                            placeholder: trans('front.create.company'),
                            // img: '/images/food-scale-tool.svg',
                            validate: '',
                            id: 'sendercompany',
    
    
                        },
                        showif: false,
                        model: 'company',
                    },
                    {
                        props: {
                            name: 'sender' + trans('front.create.email'),
                            placeholder: trans('front.create.email'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'email',
                            id: 'senderemail',
    
    
                        },
                        model: 'email',
                    }
    
    
    
                ],
                BillitgSelector: {
    
                    props: {
                        name: 'paymentfor',
                        placeholder: trans('front.create.bill_to'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'paymentfor',
                        type: 'select',
                        options: [{
                                value: 'sender',
                                text: trans('front.create.sender')
    
                            },
                            {
                                value: 'receiver',
                                text: trans('front.create.receiver')
                            },
                            {
                                value: 'other',
                                text: trans('front.create.otherbilling')
                            },
                        ]
    
    
    
                    },
                    model: 'bill_to',
    
                },
                senderTimes: [{
                    props: {
                        name: 'sender' + trans('front.create.time'),
                        placeholder: trans('front.create.chargingTime'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'sendertime',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours'),
    
                    },
                    model: 'load_from',
                }, {
                    props: {
                        name: 'sender' + trans('front.create.from'),
                        placeholder: trans('front.create.to'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'senderLoadTill',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours'),
    
    
                    },
                    model: 'load_up',
                }],
                receiverTimes: [{
                    props: {
                        name: 'receiver' + trans('front.create.from'),
                        placeholder: trans('front.create.from'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'receivertime',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours'),
    
    
                    },
                    model: 'delivery_from',
                }, {
                    props: {
                        name: 'receiver' + trans('front.create.to'),
                        placeholder: trans('front.create.to'),
                        // img: '/images/food-scale-tool.svg',
                        validate: 'required',
                        id: 'receiverLoadTill',
                        type: 'timePicker',
                        minDate: window.moment(new Date().setMinutes(0)).add('2', 'hours'),
    
    
                    },
                    model: 'delivery_until',
                }],
                receiverInputs: [{
                        props: {
                            name: 'receiver' + trans('front.create.firstName'),
                            placeholder: trans('front.create.firstName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'receiverfirstName',
                            newclasses: {
                                'half-width': true,
                                'odd': true
                            },
    
    
                        },
                        model: 'first_name',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.lastName'),
                            placeholder: trans('front.create.lastName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'receiverlastName',
                            newclasses: {
                                'half-width': true,
    
                            }
    
                        },
                        model: 'nick_name',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.phone'),
                            placeholder: trans('front.create.phone'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required|phone',
                            id: 'receiverphone',
                            newclasses: {
                                'half-width': true,
                                'odd': true,
    
                            },
    
                        },
                        model: 'phone',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.isCompany'),
                            placeholder: trans('front.create.isCompany'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'receiverisCompany',
                            newclasses: {
                                'half-width': true,
    
    
                            },
                            type: 'select',
                            options: [{
                                    value: 'person',
                                    text: trans('front.create.person')
    
                                },
                                {
                                    value: 'company',
                                    text: trans('front.create.company')
                                }
                            ]
    
    
    
                        },
                        model: 'isCompany',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.company'),
                            placeholder: trans('front.create.company'),
                            // img: '/images/food-scale-tool.svg',
                            validate: '',
                            id: 'sendercompany',
    
    
                        },
                        showif: false,
                        model: 'company',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.email'),
                            placeholder: trans('front.create.email'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'email',
                            id: 'receiveremail',
    
    
                        },
                        model: 'email',
                    },
    
                ],
                otherBillingInputs: [{
                        props: {
                            name: 'otherbilling' + trans('front.create.firstName'),
                            placeholder: trans('front.create.firstName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'otherbillingfirstName',
                            newclasses: {
                                'half-width': true,
                                'odd': true
                            }
    
                        },
                        model: 'first_name',
                    },
                    {
                        props: {
                            name: 'otherbilling' + trans('front.create.lastName'),
                            placeholder: trans('front.create.lastName'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'otherbillinglastName',
                            newclasses: {
                                'half-width': true,
    
                            }
    
                        },
    
                        model: 'nick_name',
                    },
                    {
                        props: {
                            name: 'otherbilling' + trans('front.create.phone'),
                            placeholder: trans('front.create.phone'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required|phone',
                            id: 'otherbillingphone',
                            newclasses: {
                                'half-width': true,
                                'odd': true,
    
                            },
    
                        },
                        model: 'phone',
                    },
                    {
                        props: {
                            name: 'receiver' + trans('front.create.isCompany'),
                            placeholder: trans('front.create.isCompany'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'required',
                            id: 'receiverisCompany',
                            newclasses: {
                                'half-width': true,
    
    
                            },
                            type: 'select',
                            options: [{
                                    value: 'person',
                                    text: trans('front.create.person')
    
                                },
                                {
                                    value: 'company',
                                    text: trans('front.create.company')
                                },
                            ]
    
    
    
                        },
                        model: 'isCompany',
                    },
                    {
                        props: {
                            name: 'otherbilling' + trans('front.create.company'),
                            placeholder: trans('front.create.company'),
                            // img: '/images/food-scale-tool.svg',
                            validate: '',
                            id: 'otherbillingcompany',
    
    
                        },
                        showif: false,
                        model: 'company',
                    },
                    {
                        props: {
                            name: 'otherbilling' + trans('front.create.email'),
                            placeholder: trans('front.create.email'),
                            // img: '/images/food-scale-tool.svg',
                            validate: 'email',
                            id: 'otherbillingemail',
    
    
                        },
                        model: 'email',
                    },
    
                ],
            }
        },
        computed: {
            formData() {
                this.order.distance = Number(this.order.orderRoute.routes[0].legs[0].distance.value / 1000)
                this.order.duration = Number(this.order.orderRoute.routes[0].legs[0].duration.value / 60) +
                    (Number(this.order.orderRoute.routes[0].legs[0].duration.value % 60) > 30 ? 1 : 0);
                this.order.encryptedId = this.$route.params.orderId
                var toBeSendOrder = Object.assign({}, this.order);
    
                toBeSendOrder.orderRoute = {};
                //this belongs to old code variables please delete it when you handlening new database
    
                return {
                    'url': '/api/orders/saveInformation',
                    'data': toBeSendOrder,
                    'validate': this.$validator,
                    'successServer': (data) => {
                        setTimeout(()=>{
                            window.location.href = '/order/lastSteps/'+this.order.encryptedId
                        },1000)
    
                    },
                    'failedValidate': (data) => {
                        this.validationErrors();
    
                        this.$snotify.warning(
                            trans('front.create.fakeValidateMessage'),
                            trans('front.create.inputError'), {
                                showProgressBar: false,
                            }
                        );
                    }
                }
    
            },
    
        },
        props: {
            order: {
                required: true,
                default: () => {
                    return {
                        sender: {},
                        receiver: {},
                        dating: {},
                        otherbilling: {},
                    }
                }
            }
        },
        methods: {
            getTempAdressess() {
                if (!window.google || !google) {
                    setTimeout(() => {
                        this.getTempAdressess();
                    }, 100)
                    return {};
                }
                var addresess = {};
    
                var geocoder = new google.maps.Geocoder;
                var order = this.order
                var latlng = {
                    lat: Number(order.from_map.split(',')[0]),
                    lng: Number(order.from_map.split(',')[1])
                };
                geocoder.geocode({
                    'location': latlng
                }, (results, status) => {
                    if (status === 'OK') {
    
                        if (results[0]) {
                            // $('#ToGeoAdress').val(results[1].formatted_address)
    
                            addresess.from = this.oldFormats(results[0])
    
                            // alert(results[1].formatted_address);
                        }
                    }
                })
                var latlng2 = {
                    lat: Number(order.to_map.split(',')[0]),
                    lng: Number(order.to_map.split(',')[1])
                };
                geocoder.geocode({
                    'location': latlng2
                }, (results, status) => {
    
                    if (status === 'OK') {
                        if (results[0]) {
                            // $('#ToGeoAdress').val(results[1].formatted_address)
    
                            addresess.to = this.oldFormats(results[0])
    
                            // alert(results[1].formatted_address);
                        }
                    }
                })
    
                this.order.FromAndTo = addresess;
            },
            oldFormats(results) {
                var myres = {};
                results.address_components.map((e) => {
    
                    if (e.types.indexOf('street_number') !== -1) {
                        myres.home = e.short_name;
                    }
                    if (e.types.indexOf('route') !== -1) {
                        myres.street = e.short_name;
                    }
                    if (e.types.indexOf('country') !== -1) {
                        myres.country = e.short_name;
                    }
                    if (e.types.indexOf('sublocality_level_1') !== -1) {
                        myres.town = e.short_name;
                    }
                    if (e.types.indexOf('postal_code') !== -1) {
                        myres.postal_code = e.short_name;
                    }
    
                })
                return myres;
            },
            checkStatus(newval, type) {
                var types = {
                    'sender': 'SenderInputs',
                    'receiver': 'receiverInputs',
                    'otherbilling': 'otherBillingInputs'
                }
    
    
                this[types[type]].forEach(e => {
                    if (e.model === 'company') {
                        if (newval === 'company') {
                            e.props.validate = 'required'
                            e.showif = true;
                        } else {
                            this.order[type].company = '';
                            e.showif = false;
                            e.props.validate = ''
                        }
                    }
                })
            },
            validated(toBeValidated) {
                for (var input in this.fields) {
                    if (input.indexOf(toBeValidated) === 0) {
                        if (this.fields[input].invalid === true) {
                            return false;
                        }
                    }
                }
                return true;
            },
            acceptAndGo(e) {
                if (this.millistones) {
    
                    this.saveMillistone();
    
                } else {
    
                    this.$vss.post(this.formData)
                }
            },
            validationErrors() {
                console.log('ahmed');
                this.stopWatching();
                this.$nextTick(() => {
                    var newvalInputs = {
                        'sender': ['SenderInputs', 'senderErrors', 0],
                        'receiver': ['receiverInputs', 'receivererrors', 1],
                        'otherbilling': ['otherBillingInputs', 'otherBillingErrors', 2]
                    }
                    for (var input in newvalInputs) {
                        if (this[newvalInputs[input][1]] !== 0) {
                            this.senderOrReceiver = input;
                            return false;
                        }
                    }
    
                })
            },
            validateGroup(group) {
                const results = Promise.all(group.map((e) => {
                    return this.$validator.validate(e);
                }));
    
    
                return results;
            },
            stopWatching() {
                this.watchingErrors = true;
    
                this.$nextTick(() => {
                    this.watchingErrors = false;
                    this.$nextTick(() => {
                        $('[data-toggle="tooltip"]').tooltip();
                    })
                })
    
    
            },
            changeSenderOrReceiver(newval) {
                $('[data-toggle="tooltip"]').tooltip("hide");
                this.watchingErrors = true;
    
                var newvalInputs = {
                    'sender': ['SenderInputs', 'senderErrors', 0],
                    'receiver': ['receiverInputs', 'receivererrors', 1],
                    'otherbilling': ['otherBillingInputs', 'otherBillingErrors', 2]
                }
    
    
                if (this[newvalInputs[this.senderOrReceiver][0]]) {
                    var toBeValidated = this[newvalInputs[this.senderOrReceiver][0]].map((input) => {
                        return input.props.name;
                    })
                    this.validateGroup(toBeValidated)
                        .then(response => {
    
                            if (newvalInputs[newval][2] < newvalInputs[this.senderOrReceiver][2]) {
    
                                this.senderOrReceiver = newval;
                                this.stopWatching();
                                return false;
                            }
                            if (response.every(e => e === true) === false) {
                                this.stopWatching();
                                return false;
                            }
    
    
    
    
                            this.senderOrReceiver = newval;
                        })
                }
                this.stopWatching();
    
    
    
    
            }
        },
        created() {
    
        },
        mounted() {
            this.checkStatus(this.order.sender.isCompany, 'sender')
            this.checkStatus(this.order.receiver.isCompany, 'receiver')
            this.checkStatus(this.order.otherbilling.isCompany, 'otherbilling')
            this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from).add(
                this.order.duration, 'minutes').add(this.order.time, 'minutes');
            this.receiverTimes[1].props.minDate = window.moment(this.order.dating.load_from).add(
                this.order.duration, 'minutes').add(this.order.time, 'minutes');
            this.$nextTick(() => {
                this.getTempAdressess();
    
            })
        },
        watch: {
            'order.from_map': function(newval, oldval) {
                this.getTempAdressess();
            },
            'order.to_map': function(newval, oldval) {
                this.getTempAdressess();
            },
            'order.sender.isCompany': function(newval, oldval) {
    
    
                this.checkStatus(newval, 'sender')
    
            },
            'order.receiver.isCompany': function(newval, oldval) {
    
    
                this.checkStatus(newval, 'receiver')
    
            },
            'order.otherbilling.isCompany': function(newval, oldval) {
    
    
                this.checkStatus(newval, 'otherbilling')
    
            },
            sameAsReceiver(newval, oldval) {
                if (newval === true) {
                    var sender = Object.assign({}, this.order.sender)
                    this.order.receiver = sender;
                }
            },
            'order.sender': {
                handler: function(newval, oldval) {
    
                    if (this.sameAsReceiver === true) {
                        this.order.receiver = Object.assign({}, newval);
                    }
    
                },
                deep: true
            },
            'order.receiver': {
                handler: function(newval, oldval) {
                    if (this.sameAsReceiver === true) {
                        for (var key in newval) {
                            if (newval[key] !== this.order.sender[key]) {
                                this.sameAsReceiver = false;
                            }
                        }
                    }
    
                },
                deep: true
            },
            'order.dating.load_from': function(newval, oldval) {
    
                this.senderTimes[1].props.minDate = window.moment(newval)
    
    
    
                this.receiverTimes[0].props.minDate = window.moment(newval)
                    .add(this.order.duration, 'minutes')
                    .add(this.order.time, 'minutes');
                this.order.dating.load_up = window.moment(newval).add('6', 'hours').format()
    
            },
    
            'order.duration': function(newval, oldval) {
    
                this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from)
                    .add(newval, 'minutes')
                    .add(this.order.time, 'minutes');
            },
            'order.time': function(newval, oldval) {
                this.receiverTimes[0].props.minDate = window.moment(this.order.dating.load_from).add(
                    this.order.duration, 'minutes').add(newval, 'minutes');
            },
            'order.dating.delivery_from': function(newval, oldval) {
                console.log(newval)
                this.receiverTimes[1].props.minDate = window.moment(newval).add('10', 'minutes')
            },
            'errors': {
                handler: function(newval, oldval) {
    
                    this.senderErrors = 0;
                    this.receivererrors = 0;
                    this.otherBillingErrors = 0;
                    if (newval && newval.items && newval.items.length !== 0) {
    
    
                        newval.items.forEach((e) => {
                            if (e.field.indexOf('sender') === 0) {
    
                                this.senderErrors += 1;
    
    
    
    
                            } else if (e.field.indexOf('receiver') === 0) {
                                this.receivererrors += 1;
                            } else if (e.field.indexOf('otherbilling') === 0) {
                                this.otherBillingErrors += 1;
                            }
                        })
    
    
    
    
                    }
    
                },
                deep: true
            }
    
        }
    
    
    }
</script>

<style lang="scss" scoped>
    .create-order-container .form-map-container .order-form-wrapper form {
        align-items: flex-start;
        .goods-descripe {
            max-width: 49%;
            max-width: calc(50% - 5px);
            &.goods-wizard {
                max-width: 100%;
            }
            @media screen and(max-width: 776px) {
                max-width: 100%;
                margin: 0;
            }
            &:last-child {
                margin-left: 5px;
            }
        }
    }
</style>
/******************* 
*
*
*
*    Ahmed Ali Tahbet
*
*
 ********************/