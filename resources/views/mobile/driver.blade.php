@extends('mobile.index')

@section('page-content')
<!--driver page-->
<div class="driver-page mont">

    <!--popup-->

    <!--delete driver modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteDriver">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fas fa-user-minus
                        "></span>Delete Driver</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Are you sure want to delete this driver ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="custom-button custom-button--blue" data-dismiss="modal">Close</button>
                    <button type="button" class="custom-button custom-button--new">Delete</button>
                </div>
                </div>
            </div>
    </div>
    <!--delete driver modal-->

    <!--delete driver modal-->
    <div class="modal fade" tabindex="-1" role="dialog" id="addDriverModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="fas fa-user-plus
                        "></span>add Driver</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="add-Driver-content">

                        <div class="input-group">

                            <div class="container-fluid">
                                <div class="row">

                                        <div class="col-sm-3">
                                            <label for="new-driver-name">Full name</label>
                                        </div>

                                        <div class="col-sm-9">
                                            
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="First name" id="new-driver-name">
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Last name">
                                                </div>

                                            </div>

                                        </div>

                                        
                                </div>
                            </div>

                        </div>

                        <div class="input-group">

                            <div class="container-fluid">
                                <div class="row">

                                        <div class="col-sm-3">
                                            <label for="new-driver-phone">Phone</label>
                                        </div>

                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Phone" id="new-driver-phone">
                                        </div>

                                        
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="custom-button custom-button--blue" data-dismiss="modal">Close</button>
                    <button type="button" class="custom-button custom-button--new">add</button>
                </div>
                </div>
            </div>
    </div>
    <!--delete driver modal-->

    <!--popup-->





    <div class="add-driver-space custom-margin">
        <button class="custom-button custom-button--page add-driver">
            <i class="fas fa-user-plus"></i> add driver
        </button>
    </div>


    <div class="driver-cards-container">

        <!--driver card-->
        <div class="driver-card ">

            <div class="user-operation">
                <div class="delete-user">
                    <i class="fas fa-trash-alt"></i>
                </div>
            </div>

            <!--user icon-->
            <div class="user-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <!--user icon-->

            <!--user img-->
            <div class="user-photo">
                <img src="{{asset('phone/images/2.jpg')}}" alt="user">
            </div>
            <!--user img-->

            <!--global user name-->
            <div class="global-user-name">
                    <a href="#" id="driver-name-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                        user name
                    </a>
            </div>
            <!--global user name-->


            <!--global-user-info-->
            <div class="global-user-info">
                <ul class="info-list">
                    <li class="info-list-item">
                        <a href="#" id="driver-email-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            user@user.com
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-phone-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            012345678
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-car-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            koffer transporter bis
                        </a>
                    </li>
                </ul>
            </div>
            <!--global-user-info-->


            <!--driver control-->
            <div class="driver-control">
                <span>Driver control order on him self ?</span>
                <label for="remember2" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember2">
                        <span class="custom-span"></span>
                </label>
            </div>
            <!--driver control-->

            
            

            





        </div>
        <!--driver card-->


        <!--driver card-->
        <div class="driver-card ">

            <div class="user-operation">
                <div class="delete-user">
                    <i class="fas fa-trash-alt"></i>
                </div>
            </div>

            <!--user icon-->
            <div class="user-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <!--user icon-->

            <!--user img-->
            <div class="user-photo">
                <img src="{{asset('phone/images/2.jpg')}}" alt="user">
            </div>
            <!--user img-->

            <!--global user name-->
            <div class="global-user-name">
                    <a href="#" id="driver-name-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                        user name
                    </a>
            </div>
            <!--global user name-->


            <!--global-user-info-->
            <div class="global-user-info">
                <ul class="info-list">
                    <li class="info-list-item">
                        <a href="#" id="driver-email-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            user@user.com
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-phone-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            012345678
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-car-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            koffer transporter bis
                        </a>
                    </li>
                </ul>
            </div>
            <!--global-user-info-->


            <!--driver control-->
            <div class="driver-control">
                <span>Driver control order on him self ?</span>
                <label for="remember3" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember3">
                        <span class="custom-span"></span>
                </label>
            </div>
            <!--driver control-->

            
            

            





        </div>
        <!--driver card-->


        <!--driver card-->
        <div class="driver-card ">

            <div class="user-operation">
                <div class="delete-user">
                    <i class="fas fa-trash-alt"></i>
                </div>
            </div>

            <!--user icon-->
            <div class="user-icon">
                <i class="fas fa-user-circle"></i>
            </div>
            <!--user icon-->

            <!--user img-->
            <div class="user-photo">
                <img src="{{asset('phone/images/2.jpg')}}" alt="user">
            </div>
            <!--user img-->

            <!--global user name-->
            <div class="global-user-name">
                    <a href="#" id="driver-name-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                        user name
                    </a>
            </div>
            <!--global user name-->


            <!--global-user-info-->
            <div class="global-user-info">
                <ul class="info-list">
                    <li class="info-list-item">
                        <a href="#" id="driver-email-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            user@user.com
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-phone-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            012345678
                        </a>
                    </li>
                    <li class="info-list-item">
                        <a href="#" id="driver-car-card"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">
                            koffer transporter bis
                        </a>
                    </li>
                </ul>
            </div>
            <!--global-user-info-->


            <!--driver control-->
            <div class="driver-control">
                <span>Driver control order on him self ?</span>
                <label for="remember4" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember4">
                        <span class="custom-span"></span>
                </label>
            </div>
            <!--driver control-->

            
            

            





        </div>
        <!--driver card-->


    </div>


</div>
<!--driver page-->
@endsection


@section('scripts')


@endsection
