@extends('front.layouts.app')

@push('style')
   <link rel="stylesheet" href="{{ asset('/front/css/dish.css') }}">
   <style>
       .sticky-bottom input{
           color: #A7A7B4;
           border: none
       }


.dish-data-portion__description {
	font-size: 12px;
    color: #535353;
    font-family: Avenir,sans-serif;
}

.dish-portion-description {
	    padding: 0px 15px 15px 45px;
}

.dish-portion-image {
	height: auto;
    max-width: 200%;
    margin-left: 10px;
}

.main {
  margin-left: 5px;
  margin-right: 40%;
}
.counter {
  width: 45px;
  border-radius: 0px !important;
  text-align: center;
  border: 0px;
}
.up_count {
  margin-bottom: 10px;
  margin-left: -4px;
  border-top-left-radius: 0px;
  border-bottom-left-radius: 0px;
}
.down_count {
  margin-bottom: 10px;
  margin-right: -4px;
  border-top-right-radius: 0px;
  border-bottom-right-radius: 0px;
}
   </style>
@endpush

@section('content')



<div class="dish">
   <div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-lg-12">
           <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                <!--Slides-->
                @php
                $images= explode("__",$dish->images);
                @endphp
                <div class="carousel-inner" role="listbox">
                    <i class="far fa-heart" ></i>





                    @if (count($images) >1)
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('backend/img/dishes/'.$images[0]) }}" alt="First slide">
                        </div>
                        @for ($i = 1; $i < count($images); $i++)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('/backend/img/dishes/'.$images[$i]) }}" alt="Second slide">
                        </div>
                        @endfor
                    @else
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('backend/img/dishes/'.$images[0]) }}" alt="First slide">
                    </div>
                    @endif
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
                    <span class="price">  {{ $min }} EGP</span>

                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
                <ol class="carousel-indicators mt-2">

                    <li data-target="#carousel-thumb" data-slide-to="0" class="active"> <img class="d-block w-100" src="{{ asset('backend/img/dishes/'.$images[0]) }}" class="img-fluid"></li>
                    @for ($i = 1; $i < count($images); $i++)
                    <li data-target="#carousel-thumb" data-slide-to="{{ $i }}"><img class="d-block w-100" src="{{ asset('/backend/img/dishes/'.$images[$i]) }}" class="img-fluid"></li>
                    @endfor


                </ol>
            </div>
            <!--/.Carousel Wrapper-->
            <div class="row justify-content-center">
                @if (auth()->guard('customer')->user())
                    @if ($dish->users->availability == 1)
                        <button class="btn"   data-toggle="modal" data-target="#add_order" >Add to Cart</button>
                    @endif
                @endif
            </div>

        </div>
        <div class="col-xl-8 col-lg-12">
            <div class="row pb-5 first-row">
                <div class="col-md-10 col-sm-10 col-xs-10">
                    <h2>{{ $dish->name }}</h2>
                    <p>{{ $dish->info }}.</p>
                    <div class="text-center mt-5">
                        <a href="#"> <i class="fas fa-share-square"></i> Share this dish</a>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-1">
                    <a href="{{ url('cooker/'.$dish->users->id) }}">
                        <img src="{{ asset('/backend/img/cook/'.$dish->users->images) }}" width="80px" alt="">
                        <h6>{{ $dish->users->name }}</h6>
                        {{-- <span>{{ucfirst($dish->users->address[0]->city)  }}, {{ucfirst($dish->users->address[0]->state)  }}</span> --}}
                        {{-- <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <span>7 reviews</span> --}}
                    </a>
                </div>
            </div>
            <div class="row pb-3 portion-details pt-3">
                <img src="{{ asset('front/images/dish-portion-icon.png') }}" alt="" width="50px"> <span style="font-weight: bold">Portion details:   </span> <span> Small Tray (feeds {{ $dish->portions_available[2] }} people); Medium Tray (feeds {{ $dish->portions_available[1] }} people); Large Tray (feeds {{ $dish->portions_available[0] }} people). </span>
            </div>
            <div class="row pb-3 main-ingredients pt-3">
                <img src="{{ asset('front/images/ingredients-icon.png') }}" alt="" width="50px">
                <span style="font-weight: bold">Main Ingredients: </span>
                <span>{{ $dish->main_ingredients }} </span>
            </div>
            <div class="row pb-3 sllergen-info pt-3">
                <span style="font-weight: bold;font-size:13px">Allergen Info:</span>
                @foreach ($dish->allergens as $allergen)
                    <span class="tags">{{ $allergen->name }}</span >
                @endforeach
            </div>
            {{-- <div class="row pb-3 available-on pt-3">
                <span style="font-weight: bold;font-size:13px">Also available on:
                </span><span class="tags">Thu, Nov 12</span ><span class="tags">Thu, Dec 03</span > <span class="tags">Sat, Dec 05</span ><span class="tags">Sat, Nov 14</span><span class="tags">Thu, Nov 19</span><span class="tags">Sat, Nov 21</span><span class="tags">Thu, Nov 26</span><span class="tags">Sat, Nov 28</span>
            </div>
            <div class="row pb-3 reviews pt-3">
                <span>( 7 reviews)</span>
                <i class="fas fa-star mt-1 ml-2"></i>
                <i class="far fa-star  mt-1"></i>
                <i class="far fa-star  mt-1"></i>
                <i class="far fa-star  mt-1"></i>
                <i class="far fa-star  mt-1"></i>
            </div>
            <div class="row pb-3 map-location pt-3">
                <h6>Pickup Location  <span>(6.1 miles away from you)</span> </h6>
                <span class="row" style="font-size: 10px">Exact location will be provided upon order completion</span>
                <div id="map"></div>
            </div> --}}
            <div class="row pb-3 today-dishes pt-3">
                <h6>{{ ucfirst($dish->users->name) }}'s other dishes </h6>
                <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    @php
                                        $img=explode('__',$dishes[0]->images)
                                    @endphp
                                    <a href="{{ url('dish/'.$dishes[0]->id) }}">
                                     <img class="img-fluid" src='{{ asset('/backend/img/dishes/'.$img[0]) }}'>
                                    </a>
                                </div>
                                 <!-- Card content -->
                                <div class="card-body">
                                    <!-- Text -->
                                    <p class="card-text"><span>${{ $dishes[0]->price }}</span> {{ $dishes[0]->name }}</p>
                                    {{-- <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>10 reviews</span> --}}
                                </div>
                            </div>
                        </div>
                        @for ($i = 1; $i < count($dishes); $i++)

                            @php
                                $img=explode('__',$dishes[$i]->images)
                            @endphp

                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <a href="{{ url('dish/'.$dishes[$i]->id) }}">
                                     <img class="img-fluid" src="{{ asset('/backend/img/dishes/'.$img[0]) }}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <!-- Text -->
                                    <p class="card-text"><span>${{ $dishes[$i]->price }}</span> {{ $dishes[$i]->name }} </p>
                                    {{-- <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span>10 reviews</span> --}}

                                </div>
                            </div>
                        </div>
                        @endfor


                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            {{-- <div class="row  future-dishes pt-3">
                <h6>{{ ucfirst($dish->users->name) }}'s future dishes</h6>
                <div id="recipeCarousel1" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner w-100" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-M0PI7Wq4zm8MtKbj7zA%2Fmd_k6vpoitnrv4n9ux8x4.jpg?alt=media&token=10b56d54-ee33-4af1-9b82-45f3feb770d0">
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
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-MLH7fRnC_Lva60G0Zj9%2Fmd_kh32pw6oztugm7v8ti9.jpg?alt=media&token=f8f4fe23-03ad-46d6-ba8b-800f7e11f705">
                                </div>
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
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-MLLLzaCxqCTlZl4k1Wf%2Fmd_kh48wojwgw08zy9mkgd.jpg?alt=media&token=612d053a-3e56-4312-965b-e92885a933c3">
                                </div>
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
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-M0V8bhUa2THDEZ4ZML7%2Fmd_k6u1v6uebo42rzo945p.jpg?alt=media&token=0df46bd5-d3ca-4c42-bb32-19d62efdedaf">
                                </div>
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
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-MLGuXAe3Z_6R9XJR36m%2Fmd_kh33z4imqphhp6ij08.jpg?alt=media&token=9f312e37-d36a-4067-b572-c0300539da4b">
                                </div>
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
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card card-img-top">
                                    <img class="img-fluid" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/dish-images%2F-MLH3ZIlJcBHWRbCygZv%2Fmd_kh322sam0qieig458kb.jpg?alt=media&token=35d0358d-b589-4275-a971-935bdb01d947">
                                </div>
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
                    </div>
                    <a class="carousel-control-prev w-auto" href="#recipeCarousel1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#recipeCarousel1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
   </div>

 @isset($cook->work_from)
 <div class="sticky-bottom">
    @if ($dish->users->availability == 1)
        <h1><span>Available:  </span> {{$cook->work_from }} - {{$cook->work_to }}</h1>
    @else
    <h1><span>Available:  Busy</span></h1>
    @endif

        <div class="row justify-content-center">
        <div class="modal fade" id="add_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" style="margin-top: 143px">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
					<div class="modal-header ">
						<h5 class="modal-title " style="font-size: 14px;">{{ $dish->name }}</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
            <div class="modal-body mx-3">
                @include('backend.partials.errors')

                <form action="{{ url('dish/order') }}" method="post">
                    @csrf
                    <input id="available_count" type="text" value="{{$dish->available_count }}" hidden>
                    <div class="md-form">
                        <input name="dish_id"  type="text"  class="form-control validate" value="{{ $dish->id }}" hidden>
                    </div>
                    <div class="PortionDetails">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center w-100  mb-2" style="padding: 10px 10px;">
                                <span class="portion-details" id="portion-details-title">Portion Details</span>
                                <span class="special-option-label">{{ $dish->available_count-1 }} available</span>
                            </div>
                            <div class="dish-detail__section dish-data-portion">
                                <div class="dish-data-portion__container">

                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="dish-portion-image">
                                            <img src="{{ asset('/backend/img/dishes/1605710362.jpg') }}" style="width: 50px">
                                        </div>
                                        <div class="dish-portion-description">
                                            <span class="dish-data-portion__description">{{ $dish->info }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="PortionDetails">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center w-100  mb-2" style="padding: 10px 10px;">
                                <span class="portion-details" id="portion-details-title">Size </span>
                            </div>
                            <div class="dish-detail__section dish-data-portion">

                                 @for ($i = 0; $i < count($dish->portions_available); $i++)
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" style="display: {{ $dish->portions_available[$i] ==null ? 'none':'block' }}" id="{{ $i }}" name="size" value="
                                        @if ($i==0)
                                        large
                                        @elseif($i==1)
                                        medium
                                        @else
                                        small
                                        @endif
                                        " required>
                                        <input type="text" name="price" value="{{ $price[$i]}}" hidden>
                                        <label class="custom-control-label" for="{{ $i }}" style="display: {{ $dish->portions_available[$i] ==null ? 'none':'block' }}">
                                            @if ($i==0)
                                                <span style="display: {{ $dish->portions_available[$i] ==null ? 'none':'block' }}"> large {{ $price[$i] }} EGP</span>
                                                @elseif($i==1)
                                                <span style="display: {{ $dish->portions_available[$i] ==null ? 'none':'block' }}">medium {{ $price[$i] }} EGP</span>
                                                @else
                                                <span style="display: {{ $dish->portions_available[$i] ==null ? 'none':'block' }}"> small {{ $price[$i] }} EGP</span>
                                            @endif
                                        </label>
                                    </div>
                                 @endfor
                            </div>
                        </div>
                    </div>
                    <hr>
                    <textarea style="width: 100%;padding:3px;border: 1px solid #c2c1c1;" class="br-5 mt-3 mb-4 ng-untouched ng-pristine ng-valid" cols="30" name="notes" placeholder="Notes for your cook (i.e. sauce on the side, etc)" rows="3"></textarea>
                    <p class="doordash-logo-container">
                        <span>Delivery powered by our partner</span>
                        <img style="height: auto; max-width: 15%;" src="{{ asset('/backend/img/logista.jpg') }}">
                    </p>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <br>
                        <div class='main'>
                            <a class='  btn-info' id="down" title='Down' style="display: inline;color:#fff;padding:3px"><i class="fa fa-minus-circle"></i></a>
                            <input class='counter disapled' id="qty" name="qty" type="text" placeholder="value..." value='1'  readonly/>
                            <a class=' btn-info'  id="up" title='Up'  style="display: inline;color:#fff;padding:3px"><i class="fa fa-plus-circle"></i></a>
                        </div>
                        <button type="submit" style="width: 100%; display: block; width: 100%; border: 0px;color:#fff; background-color: #CB1104; border-radius: 5px;" class="modal-footer portions-modal__footer-button">
                            <p style="float: left;" class="select-portion__add-to-cart"> {{ $min }} EGP </p>
                            <p style="float: right;" class="select-portion__add-to-cart">Continue</p>
                        </button>
                    </div>
                </form>
          </div>

        </div>
      </div>
      @if (auth()->guard('customer')->user())
        {{-- <button class="btn" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#add_order"{{ $dish->users->availability == 1 ? '' :'disabled' }}>Add to Cart</button> --}}
      @endif
    </div>
</div>
 @endisset

</div>







@endsection


@push('script')

<script>
      @if (count($errors) > 0)
                $('#add_order').modal('show');
      @endif


      $('#up').click(function(){
        var qty=$('#qty').val();
     var available_count=$('#available_count').val();
        qty++;
        $('#qty').val(qty);
        if(qty <= available_count){
            $('#qty').val(qty);
        }else {
            $('#qty').val(available_count);
        }

      });

      $('#down').click(function(){
        var qty=$('#qty').val();
        var available_count=$('#available_count').val();

        $('#qty').val(qty);

        if(qty > 1){
            qty--;
            $('#qty').val(qty);
        }else{
            $('#qty').val(1);
        }

        })
</script>
<script src="{{ asset('/front/js/dish.js') }}"></script>
@endpush
