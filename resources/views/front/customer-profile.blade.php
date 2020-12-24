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
                            Orders</a>
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
                        @include('backend.partials.errors')

                        <h5>Personal Info</h5>
                        <hr>
                        <!-- Default form row -->
                        <form class="w-100" action="{{ url('profile/'.auth()->guard('customer')->user()->id) }}" method="post">
                            @csrf
                            @method('put')
                            <!-- Grd row -->
                            <div class="form-row w-100" style="margin:0">
                                <!-- Grid column -->
                                <div class="form-group col-5">
                                    <label > Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ auth()->guard('customer')->user()->name }}">
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
                                    <input name="email" type="text" class="form-control" value="{{ auth()->guard('customer')->user()->email }}">
                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="form-group offset-1 col-5">
                                    <label >Phone </label>
                                    <input name="phone" type="text" class="form-control" value="{{ auth()->guard('customer')->user()->phone }}">
                                </div>
                                <!-- Grid column -->
                                <!-- Grid column -->
                                <div class="form-group col-5">
                                    <label >Password </label>
                                    <input name="password" type="password" class="form-control" value="">
                                </div>
                                <!-- Grid column -->
                                <div class="form-group offset-1 col-5">
                                    <label >
                                        Confirm Password </label>
                                    <input name="password_confirmation" type="password" class="form-control" value="">
                                </div>
                                <button type="submit" class="btn mt-5" > update</button>

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
                        <h5>Orders
                        </h5>
                        <hr>
                        <div class="row text-center">
                            <section class="Orders mb-5 w-100">
                                <div class="container-fluid">
                                    <div class="row justify-content-start align-items-center">

                                        <div class="col-md-12 mt-1 p-0">
                                            <div class="col-md-12 gray-line1">
                                                <h6 class="pt-2 pl-3 Current-Orders">Current Orders</h6>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Order# 981</h5>
                                                    <small>$43.21</small>
                                                </div>
                                                <p>Order placed on 1/2/2018</p>
                                                <div class="accordion" id="accordion">
                                                    <div  style="border: none;">
                                                        <div  id="heading1" style="background-color: #fff; padding: 0px; border-bottom: 0px;">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left button-1" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                                                    <span>Pickup on: Fri, Jun 15th @ 6:45pm</span>
                                                                    <i class="fa fa-angle-right" style="float: right; font-size: 25px; color: #bbb9b9;"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                                                            <div class="card-body" style="padding: 5px 0px 0px 0px;">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="ml-3 mr-3">
                                            <div class="col-md-12 mb-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Order# 981</h5>
                                                    <small>$43.21</small>
                                                </div>
                                                <p>Order placed on 1/2/2018</p>
                                                <div class="accordion-1" id="accordion-1">
                                                    <div style="border: none;">
                                                        <div id="heading2" style="background-color: #fff; padding: 0px; border-bottom: 0px;">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left button-1" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse">
                                                                    <span>Pickup on: Fri, Jun 15th @ 6:45pm</span>
                                                                    <i class="fa fa-angle-right" style="float: right; font-size: 25px; color: #bbb9b9;"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse1" class="collapse" aria-labelledby="heading2" data-parent="#accordion-1">
                                                            <div class="card-body" style="padding: 5px 0px 0px 0px;">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 gray-line2">
                                                <h6 class="col-md-12 pt-2 pl-3 Current-Orders">Past Orders</h6>
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Order# 981</h5>
                                                    <small>$43.21</small>
                                                </div>
                                                <div class="accordion-3" id="accordion-3">
                                                    <div style="border: none;">
                                                        <div  id="heading1" style="background-color: #fff; padding: 0px; border-bottom: 0px;">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left button-2" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse">
                                                                    <span>Order placed on 1/2/2018</span>
                                                                    <i class="fa fa-angle-right" style="float: right; font-size: 25px; color: #bbb9b9;"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion-3">
                                                            <div class="card-body" style="padding: 5px 0px 0px 0px;">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="ml-3 mr-3">
                                            <div class="col-md-12  mb-3">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">Order# 981</h5>
                                                    <small>$43.21</small>
                                                </div>
                                                <div class="accordion-4" id="accordion-4">
                                                    <div style="border: none;">
                                                        <div  id="heading2" style="background-color: #fff; padding: 0px; border-bottom: 0px;">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link btn-block text-left button-2" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse">
                                                                    <span>Order placed on 1/2/2018</span>
                                                                    <i class="fa fa-angle-right" style="float: right; font-size: 25px; color: #bbb9b9;"></i>
                                                                </button>
                                                            </h2>
                                                        </div>
                                                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion-4">
                                                            <div class="card-body" style="padding: 5px 0px 0px 0px;">
                                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
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
