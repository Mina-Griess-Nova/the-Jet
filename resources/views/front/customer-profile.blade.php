@extends('front.layouts.app')

@push('style')
   <link rel="stylesheet" href="{{ asset('/front/css/customer-profile.css') }}">

@endpush


@section('content')

<div class="my-account">
    <div class="container">
        <h4>My Account</h4>
    </div>
</div>

<div class="main mt-5">
    <div class="container">
        <div class="row" style="justify-content: space-around">
            <div class="col-md-3 col-sm-12">
                <div class="aside">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <div class="float-left mb-3" style="font-size: 50px;color #838282">
                                <i class="float-left mb-3 fas fa-user-circle"></i>
                            </div>
                            <div class="float-left mb-3 ml-3">
                                <h4>{{ auth()->guard('customer')->user()->name }}</h4>
                                <span>{{ auth()->guard('customer')->user()->email }}</span>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a  class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                            <i class="fas fa-user"></i>
                            Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" role="tab" aria-controls="favorite" aria-selected="false">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            Favorites</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">
                            <i class="fas fa-credit-card"></i>
                            Payment Methods</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="false">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            Past Orders</a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message" aria-selected="false">
                            <i class="fas fa-comment-alt"></i>
                            Messages</a>
                        </li>
                        <li>
                            <a  class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                            Contact DishDivvy Support</a>
                        </li>
                        <li>
                            <a  class="nav-link" id="logout-tab" data-toggle="tab" href="{{ url('otbokhly/logout/'.auth()->guard('customer')->user()->id) }}" role="tab" aria-controls="logout" aria-selected="false">
                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                            logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 mt-5">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h5>Personal Info</h5>
                        <hr>
                        <!-- Default form row -->
                        <form class="w-100">
                        <!-- Grd row -->
                        <div class="form-row w-100" style="margin:0">
                            <!-- Grid column -->
                            <div class="form-group col-5">
                                <label > Name</label>
                                <input type="text" class="form-control" value="{{ auth()->guard('customer')->user()->name }}">
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="form-group offset-1 col-5">
                                {{-- <label >Last name</label>
                                <input type="text" class="form-control" value="Naeem"> --}}
                            </div>
                            <!-- Grid column -->
                             <!-- Grid column -->
                             <div class="form-group  col-5">
                                <label >Email</label>
                                <input type="text" class="form-control" value="{{ auth()->guard('customer')->user()->email }}">
                            </div>
                            <!-- Grid column -->
                             <!-- Grid column -->
                             <div class="form-group offset-1 col-5">
                                <label >Phone </label>
                                <input type="text" class="form-control" value="{{ auth()->guard('customer')->user()->phone }}">
                            </div>
                            <!-- Grid column -->
                             <!-- Grid column -->
                             <div class="form-group  col-5">
                                <label >Full Address </label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <!-- Grid column -->
                             <!-- Grid column -->
                             <div class="form-group offset-1  col-5">
                                <label > Floor / Apt.</label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <!-- Grid column -->
                            <!-- Grid column -->
                            <div class="form-group col-5">
                                <label >Password </label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <!-- Grid column -->
                            <div class="form-group offset-1 col-5">
                                <label >
                                    Confirm Password </label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <button class="btn mt-5" disabled> update</button>

                        </div>
                        <!-- Grd row -->
                        </form>
                        <!-- Default form row -->
                    </div>
                    <div class="tab-pane fade" id="favorite" role="tabpanel" aria-labelledby="favorites-tab">
                        <h5>Favorites</h5>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-8 col-sm-12  mb-1 text-center" style="margin: 20% auto">
                                <h4>Download the Otbokhly App to access your favorites</h4>
                                <a href="#"> <img width="150" src="https://shop.dishdivvy.com/assets/dd-appstore-button.png" alt=""></a>
                                <a href="#"> <img width="180" src="https://shop.dishdivvy.com/assets/dd-google-play-button.png" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="#"> <img  width="250" height="500" src="https://shop.dishdivvy.com/assets/iphone-image.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                        <h5>Payment Methods</h5>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-8 col-sm-12  mb-1 text-center" style="margin: 20% auto">
                                <h4>Download the Otbokhly App to access your payment methods</h4>
                                <a href="#"> <img width="150" src="https://shop.dishdivvy.com/assets/dd-appstore-button.png" alt=""></a>
                                <a href="#"> <img width="180" src="https://shop.dishdivvy.com/assets/dd-google-play-button.png" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="#"> <img  width="250" height="500" src="https://shop.dishdivvy.com/assets/iphone-image.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                        <h5>Past Orders
                        </h5>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-8 col-sm-12  mb-1 text-center" style="margin: 20% auto">
                                <h4>Download the Otbokhly App to access your past orders</h4>
                                <a href="#"> <img width="150" src="https://shop.dishdivvy.com/assets/dd-appstore-button.png" alt=""></a>
                                <a href="#"> <img width="180" src="https://shop.dishdivvy.com/assets/dd-google-play-button.png" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="#"> <img  width="250" height="500" src="https://shop.dishdivvy.com/assets/iphone-image.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
                        <h5>Messages</h5>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-8 col-sm-12  mb-1 text-center" style="margin: 20% auto">
                                <h4>Download the DishDivvy App to be able to message your cook</h4>
                                <a href="#"> <img width="150" src="https://shop.dishdivvy.com/assets/dd-appstore-button.png" alt=""></a>
                                <a href="#"> <img width="180" src="https://shop.dishdivvy.com/assets/dd-google-play-button.png" alt=""></a>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <a href="#"> <img  width="250" height="500" src="https://shop.dishdivvy.com/assets/iphone-image.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class=" tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h5>Contact Support
                        </h5>
                        <hr>
                        <h6 class="my-2">How can we help you?</h6>
                        <!-- Group of default radios - option 1 -->
                        <div class="custom-control custom-radio1">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">I have an issue with my order</label>
                        </div>

                        <!-- Group of default radios - option 2 -->
                        <div class="custom-control custom-radio2">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" >
                            <label class="custom-control-label" for="defaultGroupExample2">I have a comment about my cook</label>
                        </div>

                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio3">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample3">Other customer support request</label>
                        </div>

                        <button class="btn mt-5">Send Note to otbokhly </button>

                    </div>
                  </div>
            </div>

        </div>
    </div>
</div>




@endsection


@push('script')
<script src="{{ asset('/front/js/customer-profile.js') }}"></script>

@endpush
