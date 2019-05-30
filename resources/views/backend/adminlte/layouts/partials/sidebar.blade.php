<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user1-128x128.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('webadmin')->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('backend/message.online') }}</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('backend/message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{Active('backend.dashboard')}}">
                <a href="{{ url('backend/dashboard') }}"><i class='fa fa-home'></i> <span>{{ trans('backend/message.home') }}</span></a>
            </li>

            <li class="{{Active('shipping.*')}} {{Active('shippingDiscount.*')}}">
                <a href="{{ route('shipping.index') }}"><i class='fa fa-car'></i> <span>{{ trans('backend/shipping.title') }}</span></a>
            </li>

           
           
            <li class="{{Active('orders.*')}} {{Active('orders/*')}}">
                <a href="{{route('orders.index',['state'=>'all'])}}">
                        <i class="fa fa-shopping-cart"></i>{{trans('backend/orders.title')}}
                </a>
            </li>

            <li class="{{Active('customer_business.*')}} treeview">
                <a href="#">
                  <i class="fa fa-money"></i>
                  <span>{{trans('backend/customer_business.title')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Active('customer_business.tours')}}">
                        <a href="{{route('customer_business.tours')}}"><i class="fa fa-truck"></i>{{trans('backend/customer_business.tour')}}</a>
                    </li>
                    <li class="{{Active('customer_business.order_person')}}">
                        <a href="{{route('customer_business.order_person')}}"><i class="fa fa-user"></i>{{trans('backend/customer_business.order_person')}}</a>
                    </li>
                    <li class="{{Active('customer_business.tour_dates')}}">
                        <a href="{{route('customer_business.tour_dates')}}"><i class="fa fa-clock"></i>{{trans('backend/customer_business.tour_dates')}}</a>
                    </li>
                    <li class="{{Active('customer_business.tour_details')}}">
                        <a href="{{route('customer_business.tour_details')}}"><i class="fa fa-calendar"></i>{{trans('backend/customer_business.tour_details')}}</a>
                    </li>

                    <li class="{{Active('customer_business.tour_trips')}}">
                        <a href="{{route('customer_business.tour_trips')}}"><i class="fa fa-calendar"></i>{{trans('backend/customer_business.trips')}}</a>
                    </li>
                    <li class="{{Active('customer_business.stops')}}">
                        <a href="{{route('customer_business.stops')}}"><i class="fa fa-stop-circle"></i>{{trans('backend/customer_business.stops')}}</a>
                    </li>

                    <li class="{{Active('customer_business.packet_category')}}">
                        <a href="{{route('customer_business.packet_category')}}"><i class="fa fa-file-alt"></i> Freight Category</a>
                    </li>
                    
                    
                    
                </ul>
            </li>
        
            <li class="{{Active('backend/Question')}}"><a href="{{ url('backend/Question') }}"><i class="fab fa-adversal"></i> <span>{{ trans('backend/adversal.title') }}</span></a>
            </li>

            <li class="{{Active('user.*')}} {{Active('user/*')}}"><a href="{{ route('user.index') }}"><i class='fa fa-user'></i> <span>{{ trans('backend/user.title') }}</span></a>
            </li>

            <li class="{{Active('subadmin.*')}} {{Active('subadmin/*')}}"><a href="{{ route('subadmin.index') }}"><i class='fa fa-user'></i> <span>{{ trans('backend/subadmin.title') }}</span></a>
            </li>

            <li class="{{Active('questions.*')}} {{Active('questions/*')}}">
                <a href="{{ route('questions.index') }}"><i class='fa fa-question-circle'></i> <span>{{ trans('backend/question.title') }}</span></a>
            </li>
            
            <li class="{{Active(URL::to('/backend/features'))}} {{Active(URL::to('/backend/packages'))}} treeview">
                <a href="#">
                  <i class="fa fa-file-alt"></i>
                  <span>Packages</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Active(URL::to('/backend/packages'))}}"><a href="{{URL::to('/backend/packages')}}"><i class="fa fa-file-alt"></i> Packages</a></li>

                    <li class="{{Active(URL::to('/backend/features'))}}"><a href="{{URL::to('/backend/features')}}"><i class="fa fa-file-alt"></i> Features</a></li>
                    
                </ul>
            </li>    
        
            <li class="{{Active('email.*')}}">
                <a href="{{ route('email.index') }}"><i class='fa fa-envelope'></i> <span>{{ trans('backend/email.title') }}</span></a>
            </li>
            <li class="{{Active('language.*')}}">
                <a href="{{ route('language.index') }}"><i class='fa fa-language'></i> <span>{{ trans('backend/language.title') }}</span></a>
            </li>
    
            <li class="{{Active('documents.*')}} treeview">
                <a href="#">
                  <i class="fa fa-file-alt"></i>
                  <span>Documents</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Active('documents.invoice')}}"><a href="{{route('documents.invoice')}}"><i class="fa fa-file-alt"></i> {{trans('backend/bills.invoices')}}</a></li>
                    <li class="{{Active('documents.service_contract')}}"><a href="{{route('documents.service_contract')}}"><i class="fa fa-file-alt"></i> {{trans('backend/bills.service_contract')}}</a></li>
                    <li class="{{Active('documents.index')}} {{Active('documents.showTemplate')}} {{Active('documents.newTemplate')}}"><a href="{{route('documents.index')}}"><i class="fa fa-file-alt"></i> Other</a></li>
                </ul>
            </li>

            <li class="{{Active(URL::to('backend/pages'))}} {{Active(URL::to('backend/models'))}}} treeview">
                <a href="#">
                  <i class="fa fa-align-center"></i>
                  <span>Content Management</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{Active(URL::to('backend/pages'))}}"><a href="{{URL::to('backend/pages')}}"><i class="fa fa-file-alt"></i> Pages</a></li>
                    <li class="{{Active(URL::to('backend/models'))}}"><a href="{{URL::to('backend/models')}}"><i class="fa fa-tasks"></i> Models</a></li>
                </ul>
            </li>
                
            <li class="{{Active('bill.*')}} treeview">
                <a href="#">
                  <i class="fa fa-money"></i>
                  <span>{{trans('backend/bills.index')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('bill.index')}}"><i class="fa fa-user"></i> {{trans('backend/bills.userBills')}}</a></li>
                    <li class="{{Active('bill.bill_invoice')}} {{Active('bill.invoices')}}"><a href="{{route('bill.invoices')}}"><i class="fa fa-file-alt"></i> {{trans('backend/bills.invoices')}}</a></li>
                    <li class="{{Active('bill.bill_abstract')}} {{Active('bill.abstracts')}}"><a href="{{route('bill.abstracts')}}"><i class="fa fa-file-alt"></i> {{trans('backend/bills.abstracts')}}</a></li>

                </ul>
            </li>
            
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>