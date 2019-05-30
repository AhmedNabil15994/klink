@extends('mobile.index')

@section('page-content')
  <!--vehcile page-->
  <div class="vehcile-page mont">



<div class="vehcile-container">

    <div class="vehcile-card">

        <div class="available-status">
                <label for="remember2" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember2">
                        <span class="custom-span">available</span>
                </label>
        </div>

        <button class="extend-button sans change-driver">
            <i class="fas fa-user-edit"></i> <span>change Driver</span>
        </button>

        <button class="extend-button sans car-location">
            <i class="fas fa-compass"></i> <span>Car location</span>
        </button>


        <div class="car-information">
            <div class="car-image">
                <img src="{{asset('phone/images/1.png')}}" alt="car-image">
            </div>
            <p>Koffer Transporter bis 3.5 T</p>
        </div>

        <div class="info-block">
            <span>First registeration : </span>
            <a href="#" id="fristDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
        </div>

        <div class="info-block">
            <span>car Load : </span>
            <a href="#" id="carLoad"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">3500 </a> kg
        </div>

        <div class="change-driver-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>
            </div>

            <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                    <option value="German">USER 1</option>
                    <option value="German">USER 2</option>
                    <option value="German">USER 3</option>

            </select>

            <div class="info-block">
                    <span>name : </span>
                    <a href="#" id="driverName"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
            </div>

            <div class="info-block">
                    <span>phone : </span>
                    <a href="#" id="driverPhone"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"> </a>
            </div>

            <div class="info-block custom-margin change-label">
                    <span>Status : </span>
                    <label for="remember3" class="custom-label">
                            <input type="checkbox" name="status" class="custom-check" value ="remember" id="remember3">
                            <span class="custom-span"></span>
                    </label>
            </div>

        </div>

        <div class="car-location-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>

                
            </div>


            <div class="data-group grouped">
                    
                    <div class="data-input ">

                        <a href="#" class="grouped" id="street" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Landsberger Allee
                        </a>

                        <a href="#" class="grouped" id="car-no" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                B52
                        </a>

                        <a href="#" class="grouped" id="car-post" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                10249
                        </a>

                        <a href="#" class="grouped" id="car-city" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Berlin
                        </a>

                        
                        <a href="#" class="grouped" id="car-region" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                region
                        </a>
                        <a href="#" class="grouped" id="car-country" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                country
                        </a>



                    </div>
            </div>


            <div class="info-block">
                    <span>Map </span>
                   <div class="map">

                   </div>
            </div>

        </div>

        
    </div>

    <div class="vehcile-card">

        <div class="available-status">
                <label for="remember2" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember2">
                        <span class="custom-span">available</span>
                </label>
        </div>

        <button class="extend-button sans change-driver">
            <i class="fas fa-user-edit"></i> <span>change Driver</span>
        </button>

        <button class="extend-button sans car-location">
            <i class="fas fa-compass"></i> <span>Car location</span>
        </button>


        <div class="car-information">
            <div class="car-image">
                <img src="{{asset('phone/images/1.png')}}" alt="car-image">
            </div>
            <p>Koffer Transporter bis 3.5 T</p>
        </div>

        <div class="info-block">
            <span>First registeration : </span>
            <a href="#" id="fristDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
        </div>

        <div class="info-block">
            <span>car Load : </span>
            <a href="#" id="carLoad"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">3500 </a> kg
        </div>

        <div class="change-driver-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>
            </div>

            <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                    <option value="German">USER 1</option>
                    <option value="German">USER 2</option>
                    <option value="German">USER 3</option>

            </select>

            <div class="info-block">
                    <span>name : </span>
                    <a href="#" id="driverName"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
            </div>

            <div class="info-block">
                    <span>phone : </span>
                    <a href="#" id="driverPhone"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"> </a>
            </div>

            <div class="info-block custom-margin change-label">
                    <span>Status : </span>
                    <label for="remember3" class="custom-label">
                            <input type="checkbox" name="status" class="custom-check" value ="remember" id="remember3">
                            <span class="custom-span"></span>
                    </label>
            </div>

        </div>

        <div class="car-location-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>

                
            </div>


            <div class="data-group grouped">
                    
                    <div class="data-input ">

                        <a href="#" class="grouped" id="street" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Landsberger Allee
                        </a>

                        <a href="#" class="grouped" id="car-no" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                B52
                        </a>

                        <a href="#" class="grouped" id="car-post" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                10249
                        </a>

                        <a href="#" class="grouped" id="car-city" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Berlin
                        </a>

                        
                        <a href="#" class="grouped" id="car-region" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                region
                        </a>
                        <a href="#" class="grouped" id="car-country" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                country
                        </a>



                    </div>
            </div>


            <div class="info-block">
                    <span>Map </span>
                   <div class="map">

                   </div>
            </div>

        </div>

        
    </div>

    <div class="vehcile-card">

        <div class="available-status">
                <label for="remember2" class="custom-label">
                        <input type="checkbox" name="title" class="custom-check" value ="remember" id="remember2">
                        <span class="custom-span">available</span>
                </label>
        </div>

        <button class="extend-button sans change-driver">
            <i class="fas fa-user-edit"></i> <span>change Driver</span>
        </button>

        <button class="extend-button sans car-location">
            <i class="fas fa-compass"></i> <span>Car location</span>
        </button>


        <div class="car-information">
            <div class="car-image">
                <img src="{{asset('phone/images/1.png')}}" alt="car-image">
            </div>
            <p>Koffer Transporter bis 3.5 T</p>
        </div>

        <div class="info-block">
            <span>First registeration : </span>
            <a href="#" id="fristDate"  class="href" data-type="date" data-pk="1" data-url="" data-title="Enter username">20 . 11 . 2018</a>
        </div>

        <div class="info-block">
            <span>car Load : </span>
            <a href="#" id="carLoad"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username">3500 </a> kg
        </div>

        <div class="change-driver-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>
            </div>

            <select class="selectpicker href" id="selectpicker610" data-live-search="true">
                    <option value="German">USER 1</option>
                    <option value="German">USER 2</option>
                    <option value="German">USER 3</option>

            </select>

            <div class="info-block">
                    <span>name : </span>
                    <a href="#" id="driverName"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"></a>
            </div>

            <div class="info-block">
                    <span>phone : </span>
                    <a href="#" id="driverPhone"  class="href" data-type="text" data-pk="1" data-url="" data-title="Enter username"> </a>
            </div>

            <div class="info-block custom-margin change-label">
                    <span>Status : </span>
                    <label for="remember3" class="custom-label">
                            <input type="checkbox" name="status" class="custom-check" value ="remember" id="remember3">
                            <span class="custom-span"></span>
                    </label>
            </div>

        </div>

        <div class="car-location-content parent">
            <div class="custom-block">
                <a href="#" class="back-button"><i class="fa fa-long-arrow-alt-left"></i> back </i></a>

                
            </div>


            <div class="data-group grouped">
                    
                    <div class="data-input ">

                        <a href="#" class="grouped" id="street" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Landsberger Allee
                        </a>

                        <a href="#" class="grouped" id="car-no" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                B52
                        </a>

                        <a href="#" class="grouped" id="car-post" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                10249
                        </a>

                        <a href="#" class="grouped" id="car-city" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                Berlin
                        </a>

                        
                        <a href="#" class="grouped" id="car-region" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                region
                        </a>
                        <a href="#" class="grouped" id="car-country" data-type="text" data-pk="1" data-url="" data-title="Enter username" class="href">
                                country
                        </a>



                    </div>
            </div>


            <div class="info-block">
                    <span>Map </span>
                   <div class="map">

                   </div>
            </div>

        </div>

        
    </div>

    

</div>






</div>
<!--vehcile page-->


@endsection


@section('scripts')


@endsection
