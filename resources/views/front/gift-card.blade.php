@extends('front.layouts.app')

@push('style')
<link rel="stylesheet" href="{{ asset('/front/css/gift-card.css') }}">




@endpush

@section('content')

<div class="gift-card">
    <div class="container">
        <h4>Gift Card </h4>
    </div>
</div>

<div class="main">
    <div class="container text-center">
        <h5>Purchase a DishDivvy Gift Card for your loved one</h5>
        <!-- Card Wider -->
        <div class="card card-cascade wider">

            <!-- Card image -->
            <div class="view view-cascade overlay" style="width: 110%">
                <img class="card-img-top " width="500px" src="https://cdn.giftup.app/assets/855c77f4-8072-44b8-acc5-8a69b3c7acdc/artwork_073f2362-534a-42f7-b710-9a8a396a318a.png?cb=64a3e4e1-a265-4dd2-8416-9f58b934e3b9" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        </div>
         <!-- Card content -->
         <div class="content">
            <div class="row" style="justify-content: space-between;background:#F7F7F7">
                <div class="col-sm-6 pt-4" style="text-align:left">
                    <p>Choose an amount…</p>
                </div>
                <div class="col-sm-3 pt-3 mb-3">
                    <div class="input-group" style="border: 1px solid #ccc">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupFileAddon01">$</span>
                        </div>
                        <div class="custom-file" style="background-color: #fff">
                          <input type="text" class="custom-file-input"
                            aria-describedby="inputGroupFileAddon01">
                        </div>
                        <div class="input-group-prepend buy">
                            <span class="input-group-text" id="inputGroupFileAddon01">Buy</span>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row py-3" style="background-color: #EFEFEF;border-top:1px solid rgb(218, 216, 216);font-size:12px">
                <p>To use your gift card, go to https://www.otbokhly.com or download the Otbokhly App. Enter your gift card code at checkout to redeem its value. Please note, gift card value not applicable to DishDivvy platform fee. </p>
            </div>
        </div>
        <div class="text-center promo my-3">
            <a class="p-2 " href="#">Check your gift card balance</a>
            <a class="p-2 " href="#">Have a promo code?</a>
        </div>
        <img src="https://cdn.giftup.app/cdn-assets/logo-greyscale.png" width="80" alt="">
        <p  style="font-size: 13px;margin:5px;">The simplest way to sell your business' gift cards & certificates online</p>
    </div>
</div>







@endsection


