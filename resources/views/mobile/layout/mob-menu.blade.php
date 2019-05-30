
<!--website wrapper-->
<div id="wrapper">

    <!--select time popup-->
    <div class="pop-up sans" id="searchTimeModal">


        <div class="pop-up__container">

            <div class="select-time">

                <ul class="select-tabs">
                    <li class="active" data-tab="checkin">
                        <span class="check">Check-in time</span>
                        <span class="pick">pick a date</span>
                    </li>
                    <li class="arrow-ic">
                        <i class="fas fa-arrow-right"></i>
                    </li>
                    <li data-tab="checkout">
                        <span class="check">Check-out time</span>
                        <span class="pick">pick a date</span>
                    </li>
                </ul>

                <div class="content-space">

                    <div class="content-tab active" id="checkin">
                        here check in 
                    </div>

                    <div class="content-tab" id="checkout">
                        here check out
                    </div>
                </div>

                <button class="confirm-button">
                    confirm
                </button>

            </div>


        </div>



    </div>
    <!--select time popup-->



    <!--car list popup-->
    <div class="pop-up sans" id="listCarModal">


        <div class="pop-up__container">

        <div class="car-list-pop">

                <div class="back-to-search">
                    <i class="fas fa-map-marker-alt"></i></i> Map
                </div>


                <div class="car-list-container">

                    <div class="car-card-item">
                        <div class="car-card">
                            <div class="black-overlay">
                                <div class="make-offer">
                                    <i class="fas fa-bolt"></i> make offer
                                </div>
                            </div>

                            <div class="car-image">
                                <img src="{{asset('phone/images/car.jpg')}}" alt="carImage">
                            </div>
                        </div>
                        <div class="order-details">

                            <div class="car-details">
                                <span class="car-name">
                                    lkw bis 7.5t
                                </span>
                                <span class="car-persons">
                                    <i class="fas fa-user-tie"></i>
                                    <i class="fas fa-user-tie"></i>
                                </span>
                            </div>

                            <div class="distance">
                                <span class="order-distance">
                                    <i class="fas fa-map-marker-alt"></i> 2.5km
                                </span>
                                <span class="order-cost">
                                    <i class="fas fa-euro-sign"></i> 200
                                </span>
                            </div>

                        </div>
                    </div>


                    <div class="car-card-item">
                        <div class="car-card">
                            <div class="black-overlay">
                                <div class="make-offer">
                                    <i class="fas fa-bolt"></i> make offer
                                </div>
                            </div>

                            <div class="car-image">
                                <img src="{{asset('phone/images/car-2.jpg')}}" alt="carImage">
                            </div>
                        </div>
                        <div class="order-details">

                            <div class="car-details">
                                <span class="car-name">
                                koffer transporter 3.5t
                                </span>
                                <span class="car-persons">
                                    <i class="fas fa-user-tie"></i>
                                    <i class="fas fa-user-tie"></i>
                                </span>
                            </div>

                            <div class="distance">
                                <span class="order-distance">
                                    <i class="fas fa-map-marker-alt"></i> 2.5km
                                </span>
                                <span class="order-cost">
                                    <i class="fas fa-euro-sign"></i> 200
                                </span>
                            </div>
                            
                        </div>
                    </div>



                    <div class="car-card-item">
                        <div class="car-card">
                            <div class="black-overlay">
                                <div class="make-offer">
                                    <i class="fas fa-bolt"></i> make offer
                                </div>
                            </div>

                            <div class="car-image">
                                <img src="{{asset('phone/images/car.jpg')}}" alt="carImage">
                            </div>
                        </div>
                        <div class="order-details">

                            <div class="car-details">
                                <span class="car-name">
                                    Lkw Bis 7.5t
                                </span>
                                <span class="car-persons">
                                    <i class="fas fa-user-tie"></i>
                                    <i class="fas fa-user-tie"></i>
                                </span>
                            </div>

                            <div class="distance">
                                <span class="order-distance">
                                    <i class="fas fa-map-marker-alt"></i> 2.5km
                                </span>
                                <span class="order-cost">
                                    <i class="fas fa-euro-sign"></i> 200
                                </span>
                            </div>

                        </div>
                    </div>


                    <div class="car-card-item">
                        <div class="car-card">
                            <div class="black-overlay">
                                <div class="make-offer">
                                    <i class="fas fa-bolt"></i> make offer
                                </div>
                            </div>

                            <div class="car-image">
                                <img src="{{asset('phone/images/car-2.jpg')}}" alt="carImage">
                            </div>
                        </div>
                        <div class="order-details">

                            <div class="car-details">
                                <span class="car-name">
                                koffer transporter 3.5t
                                </span>
                                <span class="car-persons">
                                    <i class="fas fa-user-tie"></i>
                                    <i class="fas fa-user-tie"></i>
                                </span>
                            </div>

                            <div class="distance">
                                <span class="order-distance">
                                    <i class="fas fa-map-marker-alt"></i> 2.5km
                                </span>
                                <span class="order-cost">
                                    <i class="fas fa-euro-sign"></i> 200
                                </span>
                            </div>
                            
                        </div>
                    </div>
                
                </div>


        </div>


        </div>



    </div>
    <!--car list popup-->



    <!--car order popup-->
    <div class="pop-up orderModal sans" id="OrderCarModal">


        <div class="pop-up__container">

            <div class="car-card-item">
                        <div class="car-card">
                            <div class="black-overlay">
                                <div class="make-offer">
                                    <i class="fas fa-bolt"></i> make offer
                                </div>


                                <div class="order-details">

                                    <div class="car-details">
                                        <span class="car-name">
                                            lkw bis 7.5t
                                        </span>
                                        <span class="car-persons">
                                            <i class="fas fa-user-tie"></i>
                                            <i class="fas fa-user-tie"></i>
                                        </span>
                                    </div>

                                    <div class="distance">
                                        <span></span>
                                        <span class="order-distance">
                                            <i class="fas fa-map-marker-alt"></i> 2.5km
                                        </span>
                                    </div>

                                </div>



                            </div>

                            <div class="car-image">
                                <img src="{{asset('phone/images/car.jpg')}}" alt="carImage">
                            </div>
                        </div>
                    
            </div>


        </div>



    </div>
    <!--car order popup-->


    <!--login popup-->
    <div class="pop-up login sans" id="loginModal">


        <div class="pop-up__container">

            
            <div class="login-container">


                <div class="back-area login">
                    <i class="fas fa-arrow-left"></i> Sign in to Kurier-Link
                </div>

                <div class="login-form-area">

                    <div class="login-form">

                        <!--login method-->

                        <div class="login-method">

                            <a href="#">
                                <div class="login-method-item google">
                                    <div class="method-logo">
                                        <img src="{{asset('phone/images/google.png')}}" alt="google">
                                    </div>
                                    <div class="method-text">
                                        Continue with google
                                    </div>
                                </div>
                            </a>

                            <a href="#">
                                <div class="login-method-item facebook">
                                    <div class="method-logo">
                                        <i class="fab fa-facebook-square"></i>
                                    </div>
                                    <div class="method-text">
                                        Continue with facebook
                                    </div>
                                </div>
                            </a>

                            



                        </div>

                        <!--login method-->

                        <!--or-->
                        <div class="or">
                            or
                        </div>
                        <!--or-->

                        <!--form input area-->
                        <div class="form-input-area">


                            <form action="" >


                                <div class="custom-group email">
                                    <input type="email" placeholder="Enter email">
                                    <i class="edit fas fa-pen"></i>
                                </div>

                                <div class="custom-group password">
                                    <input type="password" placeholder="Password">
                                    <i class="fas fa-eye-slash"></i>
                                </div>

                                <div class="forget">
                                    <a href="#forgot">
                                        Forgotten your password?
                                    </a>
                                </div>


                                <button class="custom-button">
                                    sign in
                                </button>

                                <div class="haveAccount">
                                    <span>
                                        Don't have account?
                                    </span>
                                    <br>
                                    <a href="#register">
                                        Register
                                    </a>
                                </div>





                                
                            </form>








                        </div>
                        <!--form input area-->













                    </div>

                </div>

                



            </div>



        </div>



    </div>
    <!--login popup-->


    <!--reset popup-->
    <div class="pop-up reset sans" id="resetModal">


        <div class="pop-up__container">

            
            <div class="login-container">


                <div class="back-area reset">
                    <i class="fas fa-arrow-left"></i> Back to sign in
                </div>

                <div class="login-form-area">

                    <div class="login-form">

                    

                        <!--form input area-->
                        <div class="form-input-area">


                            <form action="" >


                                <div class="custom-group email">
                                    <input type="email" placeholder="Enter email">
                                    <i class="edit fas fa-pen"></i>
                                </div>


                                <button class="custom-button">
                                    Recover
                                </button>

                                
                            </form>



                        </div>
                        <!--form input area-->













                    </div>

                </div>

                



            </div>



        </div>



    </div>
    <!--reset  popup-->



    <!--register popup-->
    <div class="pop-up register sans" id="registerModal">


        <div class="pop-up__container">

            
            <div class="login-container">


                <div class="back-area register">
                    <i class="fas fa-arrow-left"></i> Back to sign in
                </div>

                <div class="login-form-area">

                    <div class="login-form">



                        <!--login method-->

                        <div class="login-method">

                            <a href="#">
                                <div class="login-method-item google">
                                    <div class="method-logo">
                                        <img src="{{asset('phone/images/google.png')}}" alt="google">
                                    </div>
                                    <div class="method-text">
                                        Register with google
                                    </div>
                                </div>
                            </a>

                            <a href="#">
                                <div class="login-method-item facebook">
                                    <div class="method-logo">
                                        <i class="fab fa-facebook-square"></i>
                                    </div>
                                    <div class="method-text">
                                        Register with facebook
                                    </div>
                                </div>
                            </a>

                            



                        </div>

                        <!--login method-->

                    

                        <!--form input area-->
                        <div class="form-input-area">


                            <form action="" >

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="custom-group">
                                            <input type="text" placeholder="First name">
                                            <i class="edit fas fa-pen"></i>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="custom-group">
                                            <input type="text" placeholder="Last name">
                                            <i class="edit fas fa-pen"></i>
                                        </div>
                                    </div>


                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <select class="selectpicker" id="selectpicker">
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-8">
                                        <select class="selectpicker" id="selectpicker2">
                                                <option value="company">company</option>
                                                <option value="driver">user</option>
                                                <option value="driver">driver</option>
                                        </select>
                                    </div>
                                </div>

                                


                                <div class="custom-group">
                                    <input type="text" placeholder="phone">
                                    <i class="edit fas fa-pen"></i>
                                </div>

                                <div class="custom-group">
                                    <input type="email" placeholder="email">
                                    <i class="edit fas fa-pen"></i>
                                </div>

                                <div class="custom-group">
                                    <input type="password" placeholder="password">
                                    <i class="edit fas fa-pen"></i>
                                </div>


                                <div class="form-group clearfix">
                                    <label for="remember" class="custom-label">
                                        <input type="checkbox" class="custom-check" value ="remember" id="remember">
                                        <span class="custom-span">
                                        </span>
                                       
                                    </label>


                                     <span class="parag">
                                            Agree to our Terms, Data Policy and CookiePolicy.
                                    </span>
                                </div>


                                


                                <button class="custom-button">
                                    Sign up
                                </button>

                                
                            </form>



                        </div>
                        <!--form input area-->













                    </div>

                </div>

                



            </div>



        </div>



    </div>
    <!--register  popup-->




    <!--page content-->
    <div class="page-content">


        <!--select date and location area-->
        <div class="filter-space sans">
            <div class="container-fluid">

                <!--filters-->
                <div class="filters">

                    <!--llocation filter-->
                    <div class="location-filter">

                        <!--filter icon-->
                        <div class="filter-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <!--filter icon-->

                        <!--filter address-->
                        <div class="filter-address">
                            <span class="post">Haackzeile 13,</span>
                            <span class="city">13589 Berlin</span>

                            <!--filter input-->
                            <div class="filter-input">
                                <form action="">
                                    <input type="text" placeholder="type location ...">
                                    <button class="choose-location">
                                        <i class="far fa-check-circle"></i>
                                    </button>
                                </form>
                            </div>
                            <!--filter input-->

                        </div>
                        <!--filter address-->

                    



                    </div>
                    <!--llocation filter-->

                    <!--time filter-->
                    <div class="time-filter">

                        <!--filter icon-->
                        <div class="filter-icon">
                            <i class="fas fa-calendar-alt
                            "></i>
                        </div>
                        <!--filter icon-->

                        <div class="date-row">
                            <span>when?</span>
                        </div>

                    </div>
                    <!--time filter-->

                </div>

                <!--filters-->



            </div>
        </div>
        <!--select date and location area-->

        <!--map area-->
        <div class="map-area">
                <div class="row">
                    <div class="col-sm-12">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5132297.359442323!2d5.968357985600645!3d51.08992317063123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479a721ec2b1be6b%3A0x75e85d6b8e91e55b!2sGermany!5e0!3m2!1sen!2seg!4v1538906344023"  frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
        </div>
        <!--map area-->


        <!--filter area-->
        <div class="available-area">
            <div class="container-fluid">

                <div class="flex-av">
                    <div class="available-text">
                        Driver Available
                        <span>
                        <i></i> LZW car
                        </span>
                    </div>

                    <div class="filter-status">
                        
                            <div class="toggle-button">
                                <input type="checkbox" id="toggle">
                                <label for="toggle"></label>
                            </div>
                        
                        <div class="car-list">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--filter area-->







    </div>
    <!--page content-->


    <!--Main menu-->
    <div class="mob-menu sans">
        <div class="container-fluid">

            <ul class="mob-menu__list">

                <li class="list-item">
                            <a href="" class="list-item__link have-page">
                                <span class="link__icon">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span class="link__text">
                                    search
                                </span>
                            </a>

                            <ul class="sub-list">

                                <form action="">
                                    <div class="form-group">
                                        <input type="text" name="" id="" placeholder="Search ........">
                                        <button>
                                            <i class="fas fa-search"></i>

                                        </button>
                                    </div>
                                </form>


                            </ul>
                </li>

                <li class="list-item">
                            <a href="" class="list-item__link">
                                <span class="link__icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                                <span class="link__text">
                                    orders
                                </span>
                            </a>

                            <ul class="sub-list">

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-truck"></i>
                                        </span>
                                        <span class="link__text">
                                            orders
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-list-ol"></i>
                                        </span>
                                        <span class="link__text">
                                            assignment
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        <span class="link__text">
                                        active orders
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </span>
                                        <span class="link__text">
                                            payment
                                        </span>
                                    </a>
                                </li>


                            </ul>
                </li>

                <li class="list-item">
                            <a href="" class="list-item__link">
                                <span class="link__icon">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                <span class="link__text">
                                    add
                                </span>
                            </a>

                            <ul class="sub-list">

                                <li class="sub-list__item">
                                    <a href="" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-users"></i>
                                        </span>
                                        <span class="link__text">
                                            Drivers
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-truck"></i>
                                        </span>
                                        <span class="link__text">
                                            Vehciles
                                        </span>
                                    </a>
                                </li>

                            


                            </ul>
                </li>

                <li class="list-item">
                            <a href="" class="list-item__link">
                                <span class="link__icon">
                                    <i class="far fa-question-circle"></i>
                                </span>
                                <span class="link__text">
                                    help
                                </span>
                            </a>

                            <ul class="sub-list">

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="fas fa-headset"></i>
                                        </span>
                                        <span class="link__text">
                                            Support
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                                <i class="fas fa-book-reader"></i>
                                        </span>
                                        <span class="link__text">
                                            How to use
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                                <i class="far fa-question-circle"></i>
                                        </span>
                                        <span class="link__text">
                                            FAQ
                                        </span>
                                    </a>
                                </li>

                            


                            </ul>
                </li>

                <li class="list-item">
                            <a href="" class="list-item__link">
                                <span class="link__icon">
                                    <i class="far fa-user-circle"></i>
                                </span>
                                <span class="link__text">
                                    profile
                                </span>
                            </a>

                            <ul class="sub-list">

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                            <i class="far fa-user-circle"></i>
                                        </span>
                                        <span class="link__text">
                                            Profile setting
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                                <i class="fas fa-users"></i>
                                        </span>
                                        <span class="link__text">
                                            Drivers
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                                <i class="fas fa-truck"></i>
                                        </span>
                                        <span class="link__text">
                                            Vehciles
                                        </span>
                                    </a>
                                </li>

                                <li class="sub-list__item">
                                    <a href="#" class="list-item__link">
                                        <span class="link__icon">
                                                <i class="far fa-question-circle"></i>
                                        </span>
                                        <span class="link__text">
                                            Logout
                                        </span>
                                    </a>
                                </li>

                            


                            </ul>
                </li>
                        
            </ul>

        </div>
                
    </div>
    <!--Main menu-->




</div>
<!--website wrapper-->