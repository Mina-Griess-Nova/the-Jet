@push('style')
    <style>
        img{
            object-fit: cover;
        }
    </style>
@endpush
<!--============================================start header========================================-->
<div class="header sticky-top">
    <div class="container-fluid">
        <div class="info">
            <a href="mailto:hello@otbokhly.com"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
              </svg>
              hello@otbokhly.com
            </a>
        </div>
            <!--Navbar-->
            <nav class="navbar navbar-expand-lg navbar-light light-color">
                <div class="row" style="flex-wrap: nowrap">
                     <!-- Navbar brand -->
                    <div class="col-sm-3 col-3">
                        <a class="navbar-brand" href="#"><img src="{{ asset('front/images/msol-logo.png') }}" alt=""></a>
                    </div>
                    <!-- Collapse button -->
                   <div class=" col-sm-8 col-8" style="padding: 0">
                        <button class="navbar-toggler float-right mt-4" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collapsible content -->
                        <div class="collapse navbar-collapse float-right" id="basicExampleNav">
                            <!-- Links -->

                            <ul class="navbar-nav mr-auto">
                                    <li class="nav-item {{ Request::segment(1) == ' ' ? 'active' : null }}">
                                        <a class="nav-link" href="{{ url('/') }}">VIEW DISHES
                                            <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ Request::segment(1) == 'cooker' ? 'active' : null }}">
                                        <a class="nav-link" href="{{ url('cooker/create') }}">SIGNUP TO COOK</a>
                                        </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">Affiliate Program</a>
                                    </li>
                                    <li class="nav-item {{ Request::segment(1) == 'gift-card' ? 'active' : null }}">
                                        <a class="nav-link" href="{{ url('gift-card') }}">GIFT CARDS</a>
                                    </li>
                                    <li class="nav-item {{ Request::segment(1) == 'Safety&Trust' ? 'active' : null }}">
                                        <a class="nav-link " href="{{ url('Safety&Trust') }}">SAFETY & TRUST</a>
                                    </li>
                                    <li class="nav-item {{ Request::segment(1) == 'FAQS' ? 'active' : null }}">
                                        <a class="nav-link" href="{{ url('FAQS') }}">FAQS</a>
                                    </li>

                            </ul>
                            @if (Auth::guard('customer')->check() )
                            <ul class="cart mt-3 ml-3">
                                <!-- Dropdown -->
                                <li class="nav-item dropdown mt-3">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle" aria-hidden="true" style="font-size: 15px;color:#CB1104"></i>
                                My Account</a>
                                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink" style="min-width:15rem">
                                    <div class="user-info">
                                        <div class="float-left mb-3" style="font-size: 50px;color #838282">
                                            <i class="fas fa-user-circle"></i>
                                        </div>
                                        <div class="float-right mb-3">
                                            <h4>{{ auth()->guard('customer')->user()->name }}</h4>
                                            <span>{{ auth()->guard('customer')->user()->email }}</span>
                                        </div>
                                        <a class="dropdown-item" href="{{ url('profile/'.auth()->guard('customer')->user()->id) }}">
                                            <i class="fas fa-user"></i>
                                            Profile</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            Favorites</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-credit-card"></i>
                                            Payment Methods</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            Past Orders</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-comment-alt"></i>
                                            Messages</a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                                            Contact DishDivvy Support</a>
                                        <a class="dropdown-item" href="{{ url('otbokhly/logout/'.auth()->guard('customer')->user()->id) }}" >
                                            <i class="fa fa-power-off" aria-hidden="true"></i>
                                            logout</a>

                                    </div>

                                </div>
                            </li>
                            <li>
                                <i class="fa fa-shopping-bag mt-3 mx-4" aria-hidden="true" style="font-size: xx-large" data-toggle="modal" data-target="#fullHeightModalRight"></i>
                                <!-- Button trigger modal -->
                            </li>
                            </ul>
                            @else
                            <ul class="cart  ml-3 " style="margin-top: 37px">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/otbokhly/login') }}">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>
                                        login</a>
                                </li>
                               </ul>
                            @endif




                            <!-- Links -->

                        </div>
                   </div>
                    <!-- Collapsible content -->
                </div>

            </nav>
            <!--/.Navbar-->

    </div>
</div>
 <!-- Full Height Modal Right -->
 <div class="modal fade right" id="fullHeightModalRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">

    <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
    <div class="modal-dialog modal-full-height modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Your Order</h4>

            </div>
            <div class="modal-body">
                <div class="row" style="justify-content: flex-end">

                    <div class="col-xs-12">

                    <div class="float-left">
                        <div class="float-right">
                            <img  src="{{ asset('/front/images/kfst6u07qvtxx2syzy8.jpg') }}" width="40px"  alt="">
                        </div>
                        <div class="top">
                            <div>
                                <label for="">Pickup Date :</label>
                                <span>Nov 9, 2020</span>
                            </div>
                            <div>
                                <label for="">Pickup Time :</label>
                                <span>3:45 PM</span>
                            </div>
                            <p>Main Dishes</p>

                        </div>
                        <h5 > <span>Qty: 1 </span> Wild Mushroom Adobo <span> $10.00</span></h5>

                    <div class="warnning">
                            <p class="float-left"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> This Pickup time window has passed. Please select new time</p>
                            <span class="float-right" style="cursor: pointer"> remove</span>
                    </div>
                    <div class="row">
                            <h6><a href="#">+ add more dishes for this day</a></h6>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="total">
                    <span class="px-3">Subtotal </span> <span>$10.00</span>
                </div>
            </div>

            <div class="modal-footer justify-content-center">
            <button type="button" >Ckeckout</button>
            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->
<!--==============================================end header========================================-->
