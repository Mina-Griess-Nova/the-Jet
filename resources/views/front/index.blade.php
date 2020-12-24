@extends('front.layouts.app')



@push('style')
    <style>
        .wishList{
            position: absolute;
            bottom:  10%;
            color: #CB1104 !important;
            font-size: 20px;
            right: 0;
        }
        .wishList i{
            font-size: 25px;
            font-weight: 900;
            -webkit-text-fill-color: white;
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #CB1104;
        }
    </style>
@endpush






@section('content')


<!--=============================================start filter=======================================-->
<div class="filter">

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->

        <div id="page-content-wrapper" >

          <nav class="navbar navbar-expand-lg navbar-light  border-bottom" style="background-color: #FAFAFA">

            <button class="btn" id="menu-toggle"  data-toggle="modal" data-target="#fullHeightModalLeft"><img src="{{ asset('/front/images/cd-icon-filter.svg') }}" alt=""> Filters</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <img src="{{ asset('/front/images/cd-icon-arrow.svg') }}" alt="">
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" >
              <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item active">
                  <i class="fa fa-search" aria-hidden="true" style="display: inline"></i>
                  <input type="text" placeholder="Search for specific dish" style="display: inline">
                </li>
                <li class="nav-item dropdown">
                  {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div> --}}
                  <!-- Medium input -->
                    <div class="md-form">
                        <input type="text"  >
                        <label for="inputMDEx">Your Location</label>
                    </div>
                </li>
              </ul>
            </div>
          </nav>

        </div>
    </div>
</div>
<!-- Full Height Modal Right -->
<div class="modal fade left" id="fullHeightModalLeft" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-left (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full-height modal-left" role="document">


    <div class="modal-content">
     <form action="{{ route('filter') }}" method="post">
        @csrf
        <div class="modal-header ">
            <a class="w-20" href="#">reset filters</a>
          <h4 class="modal-title w-80" id="myModalLabel">Filters </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Sort by</h5>
          <select name="sort" class="browser-default custom-select custom-select-sm mb-3">
              {{-- <option value="1" selected>Distance</option> --}}
              <option value="Price">Price</option>
              <option value="Alphabetical">Alphabetical</option>
          </select>
          <hr>
          <div id="time-range">
              <h5>Food available between</h5>
               <span class="slider-time">10:00 AM</span> - <span class="slider-time2">12:00 PM</span>
              <div class="sliders_step1">
                  <div id="slider-range" ></div>
              </div>
          </div>
          <hr class="mt-5 mb-4">
          <h5>Price range</h5>
          <input type="text" id="amount" name="price" readonly style="border: none" disabled>
          <div id="slider1-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
              <span class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></span>
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
              <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
          </div>
          {{-- <hr class="mt-5 mb-4">
          <h5>Cook Rating</h5>
          <div class="stars">
              <span id="rateMe4"  class="feedback"></span>
          </div> --}}
          <hr class="mt-5 mb-4">
          <h5>Cuisine</h5>
          <div class="cuisine">
              @foreach ($cusines as $cusine)
              <span class="tag"> <input type="checkbox" name="cusine[]" value="{{ $cusine->name }}" hidden >{{ $cusine->name }} </span>
              @endforeach
          </div>
          {{-- <hr class="mt-5 mb-4">
          <h5>Dietary preference</h5>
          <div class="dietary">
              <span class="tag">  Dairy Free  </span> <span class="tag">   Gluten Free   </span><span class="tag">   Keto-Friendly   </span> <span class="tag">   Low Carb   </span><span class="tag">   Organic   </span> <span class="tag">   Vegan   </span><span class="tag">   Vegetarian   </span>
          </div> --}}
          <hr class="mt-5 mb-4">
          <h5>contain</h5>
            <div class="contain">
              @foreach ($addons as $addon)
              <span class="tag"> <input type="checkbox" name="addon[]" value="{{ $addon->name }}" hidden >{{ $addon->name }} </span>
              @endforeach
            </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn">Apply</button>
        </div>
     </form>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->
<!--================================================end filter======================================-->
<!--==============================================start date_slider=================================-->
<div class="date_slider">
    <div class="row justify-content-center">
        <div class="day-picker">

            <span  class="day-picker-nav prev">
              <svg width="12" height="14" xmlns="http://www.w3.org/2000/svg" transform='rotate(180)'>
                <path class="svg-stroke-container" stroke-linejoin="round" stroke-linecap="round" fill-rule="evenodd" fill="none" stroke="#D70F64" d="m3.5,1.5l5,5.5l-5,5.5"></path>
              </svg>
            </span>

            <div class="day-picker-overflow">
              <ul class="day-picker-week">
                <li >
                  <label class="day-picker-day" >
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value" style="border-bottom: 1px solid #CB1104;background-color:#d6d4d3">
                        Sat
                        <span class="day-number" >11</span>
                    </span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Sun<span class="day-number">12</span></span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Mon<span class="day-number">13</span></span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Tue<span class="day-number">14</span></span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Wed<span class="day-number">15</span></span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Thu <span class="day-number">16</span></span>
                  </label>
                </li>
                <li>
                  <label class="day-picker-day">
                    <input type="radio" value="" name="day-picker" />
                    <span class="day-value">Fri <span class="day-number">17</span></span>
                  </label>
                </li>
              </ul>
            </div>

            <span  class="day-picker-nav next">
              <svg width="12" height="14" xmlns="http://www.w3.org/2000/svg" transform='rotate(0)'>
                <path class="svg-stroke-container" stroke-linejoin="round" stroke-linecap="round" fill-rule="evenodd" fill="none" stroke="#D70F64" d="m3.5,1.5l5,5.5l-5,5.5"></path>
              </svg>
            </span>
        </div>
    </div>
</div>
<!--===============================================end date_slider==================================-->
<!--===============================================start main_tabs==================================-->
<div class="main_tabs">
    <div class="row" style="justify-content: center ;border-bottom:1px solid #cccc ;padding-bottom:5px">
        <div class="col-xs-2 active-link default mx-5 my-4">
                <h4>DAILY DISHES</h4>
                <span>save $1 on each portion</span>
        </div>
        <div class="col-xs-2 mx-5 cook-near my-4">
            <h4>COOKS NEAR YOU</h4>
            <span>homecooked dishes made special for your family</span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="content1">
            @isset($dishes)
            <div class="row">

                @foreach ($dishes as $dish)


                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-3">

                    <a href="{{ url('dish/'.$dish->id) }}">
                         <!-- Card -->
                        <div class="card testimonial-card">
                            <!-- Background color -->
                            <div class="card-up ">
                                <!--Carousel Wrapper-->
                                <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                                    <!--Slides-->
                                    @php
                                    $images= explode("__",$dish->images);
                                    @endphp

                                    <div class="carousel-inner" role="listbox" style="position: relative">
                                        <div class="carousel-item active" style="padding: 0;border:none;height:200px">
                                            <img class="d-block w-100 " height="100%" src="{{ asset('/backend/img/dishes/'.$images[0]) }}"
                                            alt="First slide" style="width: 100%">
                                        </div>

                                        @for ($i = 1; $i < count($images); $i++)
                                        <div class="carousel-item">
                                            <img class="d-block w-100" height="100%"  src="{{ asset('/backend/img/dishes/'.$images[$i]) }}"
                                            alt="Second slide" style="width: 100%;padding: 0;border:none;height:200px">
                                        </div>
                                        @endfor
                                        <div class="float-right wishList">
                                            <div class="top float-right" >
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                                <i class="far fa-heart"></i>
                                            </div>
                                            {{-- <div class="bottom">
                                                <span>Pickup or Delivery: 12:00 PM - 8:00 PM</span>
                                            </div> --}}
                                        </div>
                                </div>
                                    <!--/.Slides-->
                            </div>
                                <!--/.Carousel Wrapper-->
                            </div>
                                <!-- Avatar -->

                                <!-- Content -->
                            <div class="card-body">
                                <a href="{{ url('cooker/'.$dish->users->id) }}"><img src="{{ asset('/backend/img/cook/'.$dish->users->images) }}" width="50px" class="rounded-circle" alt="avatar"></a>
                                <!-- Name -->
                                <div class="info">
                                    <div class="float-left">
                                        {{-- <div class="top">
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div> --}}
                                        <div class="bottom">
                                            {{-- <span>1 reviews</span> --}}
                                        </div>
                                    </div>
                                    <div class="float-right px-1 mt-4">
                                        <h6 style="line-height: inherit">{{ $dish->name }}</h6>
                                        <div class="bottom">
                                            <ul>
                                                <li>{{ $dish->portions_available[2]  }} persons</li>
                                                {{-- <li><i class="fas fa-home"></i>  5.2 kilo(s)</li> --}}
                                            </ul>
                                            <div class="row">
                                                @php
                                                    $price=$dish->portions_price;
                                                    $min=$price[0];
                                                    foreach ($price as $pr) {
                                                      if($pr !=null){
                                                        if ($min > $pr) {
                                                        $min =$pr;
                                                      }
                                                      }
                                                    }
                                                @endphp
                                                <p> start  {{ $min }} EGP /single</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>
            @endisset
        </div>
        @isset($users)

        <div class="content2 mt-5">
            <div class="row">
                @foreach ($users as $user)
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-5">
                 <!-- Card -->
                 <div class="card">
                   <!--Card content-->
                   <div class="card-body">
                     <!--Title-->
                     <div class="row" style="justify-content: space-between">
                         <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding: 0">
                           <img src="{{ asset('/backend/img/cook/'.$user->images) }}" width="100px" alt="">
                         </div>
                         @php
                                $cusines_name=array();
                                foreach ($user->dishes as $dish) {
                                    foreach ($dish->cusines as $cusine) {

                                     array_push($cusines_name,$cusine->name);

                                    }

                                }
                                $cusines_name= array_unique($cusines_name);
                         @endphp
                           <div class="col-lg-8 col-md-8 col-sm-8  col-xs-8">
                               <div class="info">
                                   <h3><span>HomeCook </span> {{ ucfirst($user->name) }}</h3>
                                   <h4><span>Cuisine:</span><span style="font-size:13px;color:#000; line-height:10px">
                                         @foreach ($cusines_name as $cusine)
                                             {{ $cusine .',' }}
                                         @endforeach
                                   </span>
                                   </h4>
                                   {{-- <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i> --}}
                                   {{-- <span>0</span>reviews --}}
                               </div>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                               <h4><a href="#">View All Dishes</a></h4>
                               {{-- <h4><i class="fas fa-map-marker-alt"></i> 3.4 miles from you</h4> --}}
                           </div>
                     </div>
                      <div class="row mt-5 justify-content-center">
                         @foreach ($user->dishes as $dish)
                              <div class="col-lg-3 col-xs-3">
                                 @php
                                     $image= explode("__",$dish->images);
                                 @endphp
                                 <img src="{{ asset('/backend/img/dishes/'.$image[0]) }}" width="100%" alt="">
                                 <h5>{{ $dish->name }}</h5>
                                 <span>$ {{ $dish->price }}</span>
                             </div>
                         @endforeach
                   </div>
                   <h5 class="text-center mt-4"><a href="#" style="text-decoration: underline; color:#CB1104">View All Dishes</a></h5>
                   </div>

                 </div>
                 <!-- Card -->
             </div>
               @endforeach

            </div>
        </div>
        @endisset

    </div>
</div>
<!--================================================end main_tabs===================================-->






@endsection
@push('script')
<script>
    $('.tag').click(function(){
        if( $(this).find('input:checkbox:first').is(":checked")){
            $(this).find('input:checkbox:first').attr('checked', false);
        }else{
        $(this).find('input:checkbox:first').attr('checked', 'checked');
        }
    });
</script>
@endpush

