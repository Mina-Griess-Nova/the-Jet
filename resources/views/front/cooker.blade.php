@extends('front.layouts.app')

@push('style')
<link rel="stylesheet" href="{{ asset('/front/css/dish.css') }}">
<link rel="stylesheet" href="{{ asset('/front/css/cooker.css') }}">

@endpush

@section('content')


    <div class="homecook">
        <div class="container">
            <h4>Homecook Blanche</h4>
        </div>
    </div>

    <div class="profile mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-12">
                    <img src="{{ asset('/backend/img/cook/'.$cook->images) }}" width="160px" alt="">
                    <div class="follow d-lg-none  d-md-block">
                        <i class="fas fa-share-square"></i><span>Share this profile</span> <button type="button" class="btn  waves-effect"> follow</button>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 mt-4">
                    <h4><span class="mr-2">{{ ucfirst($cook->name) }}</span> </h4>
                    <div class="float-right d-block-xl d-lg-block  d-md-none d-sm-none " style="color: #CB1104">
                        <i class="fas fa-share-square mt-3 "></i>
                        <span class="mt-3 mr-3">Share this profile</span>
                        <button type="button" class="btn  waves-effect"> follow</button>
                    </div>
                    <div class="rating">
                        {{-- <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <span class="ml-2"><span class="count">7</span> <span class="reviews">reviews</span></span> --}}

                        <p class="mt-1">Cusines:
                        @foreach ($cook->dishes[0]->cusines as $cusine)
                        {{ $cusine->name .',' }}
                        @endforeach
                        </p>
                        <p>{{ $cook->info }} .... <a href="#" style="text-decoration:underline">read more</a></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="schedule">
                <div class="container">
                    <div class="row justify-content-center">
                        <h3>My scheduled dishes</h3>
                        <div class="row justify-content-center">
                            <p>(No minimum order required)</p>
                        </div>
                    </div>
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
                                    <li>dishes
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
                </div>

            </div>
            <div class="row my-5">
                <div class="col-md-3">
                    <div class="card card-img-top">
                        <div class="rotate">
                            <span>Order by</span>
                            <br>
                            <span>6:00 AM</span>
                        </div>
                        <img class="img-fluid w-100" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-M0PI7Wq4zm8MtKbj7zA%2Fmd_k6vpoitnrv4n9ux8x4.jpg?alt=media&token=10b56d54-ee33-4af1-9b82-45f3feb770d0">
                    </div>
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Text -->
                        <p class="card-text"><span>$5.99</span> Garlic Roasted Brussel Sprouts</p>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>10 reviews</span>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row pb-3 map-location pt-3" hidden>
                <h6>Pickup Location  <span>(6.1 miles away from you)</span> </h6>
                <span class="row" style="font-size: 10px">Exact location will be provided upon order completion</span>
                <div id="map" class="mb-3" ></div>
            </div>
            <div class="request-dish mt-3">
                <div class="text-center">
                    <h4>Request any dish, any day</h4>
                    {{-- <p>(4 portion minimum required for all special requests)</p> --}}
                </div>
                @php
                    $sections_all=array();
                @endphp
                @foreach ($dishes as $dish)
                            <span hidden>{{ array_push($sections_all,$dish->sections) }}</span>
                @endforeach
                @php
                    $sections=array_unique($sections_all)
                @endphp
                @foreach ($sections as $section)
                <div class="main">
                    <h3 style="font-weight: 500">{{ ucfirst($section->name) }} Dishes</h3>
                    <div id="recipeCarousel{{$section->id  }}" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                @foreach ($section->dishes as $dish)
                                @php
                                $images= explode("__",$dish->images);
                                @endphp

                                    <div class="carousel-item ">

                                            <div class="col-md-3">
                                                <a href="{{ url('dish/'.$dish->id) }}">
                                                    <div class="card card-img-top">
                                                        <img class="img-fluid" src="{{ asset('/backend/img/dishes/'.$images[0]) }}">
                                                    </div>
                                                </a>
                                                <!-- Card content -->
                                                <div class="card-body">
                                                    <!-- Text -->
                                                        <p class="card-text"><span>$ {{$dish->price }}</span> {{ $dish->name }}</p>
                                                    {{-- <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <span>10 reviews</span> --}}

                                                </div>
                                            </div>

                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev w-auto" href="#recipeCarousel{{$section->id  }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next w-auto" href="#recipeCarousel{{$section->id  }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
        <div class="row" style="background-color: #FAFAFA;">
            <div class="container">
                <div class="row  my-5 py-5" style="justify-content:space-around;width:100%">
                    <div class="col-xl-3 col-md-12 text-center">
                        <img src="{{ asset('/backend/img/cook/'.$cook->images) }}" width="300px" style="margin-top:20px;border-radius: 50%" alt="">

                        <div class="rating" style="font-size: 25px">
                            <h4 style="font-weight: bold">{{ $cook->name }}</h4>
                            {{-- <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <br>
                            <span style="font-size: 18px"> <span class="reviews"><span class="count">7 </span> reviews</span></span><br> --}}
                            {{-- <span style="font-size: 13px;padding-bottom:5px">{{ ucfirst($cook->address[0]->city) }}, {{ ucfirst($cook->address[0]->state) }}</span> --}}
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-12 mt-4">
                        <div class="info px-5">
                            <h4 class="float-left">Hi I’m <span class="mr-2">{{ $cook->name }}</span>! </h4>
                            <div class="float-right" style="color: #CB1104">
                                <i class="fas fa-share-square mt-3 "></i>
                                <span class="mt-3 mr-3">Share this profile</span>
                                <button type="button" class="btn  waves-effect"> follow</button>
                            </div>

                        <div class="row">

                            <p class="mt-1">Cusines :
                                @foreach ( $cook->dishes[0]->cusines  as $cusine)
                                    {{ $cusine->name }},
                                @endforeach
                            </p>
                            <p class="mb-5">{{ $cook->info }}</p>
                            <img src="{{ asset('/front/images/food-quality-smiley.jpg') }}" width="60" style="height:60px" alt="">
                            <h4 class="mb-5 pt-3" style="display: inline-block; font-weight:bold;margin-left:10px;">My Fav Food Memory</h4>
                            <p>My favorite childhood memory is of my grandmother's chicken and rice dish. It was absolutely amazing. Just talking about it... I can taste it.</p>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
<script src="{{ asset('/front/js/dish.js') }}"></script>


<script>
    $( document ).ready(function() {
        $('.carousel-inner div:first-child').addClass( "active" );
});

</script>
@endpush
