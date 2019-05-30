@include('mobile.partials.html-header')


<div id="wrapper">



    <div class="page-content">

        @yield('page-content')


    </div>






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


@include('mobile.partials.html-footer')


