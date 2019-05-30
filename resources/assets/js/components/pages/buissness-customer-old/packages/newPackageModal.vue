<template>
    <div class="modal" id="newPackageModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{trans('front.buissness.packages')}}</h5>
                    <checkbox name="terms" v-model="$parent.allowPackages" v-if="$parent.packages.length === 0">
                        {{trans('front.buissness.packagesPermession')}}
                    </checkbox>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                </div>
                <div class="modal-body">
                    <transition name="fade" v-if="$parent.allowPackages">
    
                        <div class="new-package-info">
                            <input-parent v-for="input in inputs" :key="input.props.id" v-bind="input.props" v-model="upPackage[input.model]">
                                <small-input v-for="small in input.inputs" :key="small.bind" v-bind="small.props" v-model="upPackage[small.model]"></small-input>
                            </input-parent>
                        </div>
                    </transition>
                </div>
                <div class="modal-footer">
                    <button type="button" :disabled="!$parent.allowPackages" @click="newPackageCreated" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
                return [{
                        props: {
                            name: trans('front.buissness.packageName'),
                            placeholder: trans('front.buissness.packageName'),
    
                            validate: 'required',
                            id: 'packageName' + this.stopIndex + this.personIndex + this.packageIndex,
                            newclasses: {
                                'half-width': true,
                                'odd': true
                            },
    
                            autoFocus: true,
    
                        },
                        model: 'name',
                    },
                    {
                        props: {
                            name: trans('front.create.weightName'),
                            placeholder: trans('front.create.weight'),
    
                            validate: 'required|decimal:3|min_value:1',
                            id: 'weightInput' + this.stopIndex + this.personIndex + this.packageIndex,
                            newclasses: {
                                'half-width': true,
                                'odd': true
                            },
                            numeric: true,
    
    
                        },
                        model: 'weight',
                    }, {
                        props: {
                            mulitiple: true,
                            title: trans('front.create.totalSize'),
                            id: 'coordinates' + this.stopIndex + this.personIndex + this.packageIndex,
                            name: 'coordinates',
    
                        },
                        inputs: [{
                                props: {
                                    name: trans('front.create.width'),
                                    placeholder: trans('front.create.width'),
                                    validate: 'required|decimal:3|min_value:1'
                                },
                                model: 'width',
                            },
                            {
                                props: {
                                    name: trans('front.create.length'),
                                    placeholder: trans('front.create.length'),
                                    validate: 'required|decimal:3|min_value:1'
                                },
                                model: 'length',
                            },
                            {
                                props: {
                                    name: trans('front.create.height'),
                                    placeholder: trans('front.create.height'),
                                    validate: 'required|decimal:3|min_value:1'
                                },
                                model: 'height',
                            },
                        ],
                    },
                ]
            }
        },
        props: {
            upPackage: {
                required: true
            }
        },
        methods: {
            newPackageCreated() {
                this.$validator.validateAll()
                    .then(result => {
                        if (result && this.$parent.allowPackages) {
                            this.$parent.addNewPackage(this.upPackage)
                            this.$snotify.success(trans('front.buissness.packageSuccess'), trans('front.buissness.packageSuccessHead'), {
                                timeout: 1500,
                                showProgressBar: false,
                                pauseOnHover: true
                            });
                            $('#newPackageModal').modal('toggle');
                        } else {
                            this.$snotify.warning(trans('front.buissness.packagesWarning'), trans('front.buissness.packagesWarningHead'), {
                                timeout: 1500,
                                showProgressBar: false,
                                pauseOnHover: true
                            });
                        }
                    })
    
            }
        },
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