@extends('front.layouts.app')



@push('style')
{{-- <link rel="stylesheet" href="{{ asset('/front/css/signup-to-cook.css') }}"> --}}

<style>
    .registeration-form{
        position: relative;
        height: 1000px !important;
        text-align: center

    }
    /* video{
        height: 100% !important;
    }
    source{
        height: 100%;
    } */
    .card{
      width:30%;
      position: absolute;
      top:15%;
      right: 15%;
      background-color: #fff;
      border-radius: 15px;
      padding:  15px !important;
      color: #5F5F5F !important

    }
    @media (max-width: 1200px) {
        .card{
            width: 80%;
            top:10px ;
            right: 8%;
            margin: 0 auto;


        }
     }
     .card .h4{
         color: #535353;
         font-size: 2em;
         font-weight: 400 !important
     }
</style>


@endpush

@section('content')


<div class="registeration-form">
    <video class="video-fluid z-depth-1 w-100"  autoplay loop  muted>
        <source class="w-100" src="https://firebasestorage.googleapis.com/v0/b/dishdivvy-2fbca.appspot.com/o/static%2Fsignup%20to%20cook%20background%20video_25s.m4v?alt=media&token=3ecd37cf-4c91-44cf-ac68-1e667a9f8088" type="video/mp4" />
    </video>
    <!-- Default form subscription -->
    <div class=" card text-left border border-light " action="#!">

        <p class="h4 mb-4">Earn money doing <br> what you love</p>
        <p>Thank you <strong> andrew </strong> (a.naiem@momentum-sol.com) for your interest in joining Otbokhly as a HomeCook Partner.</p>

        <!-- Default input -->
        <label for="exampleForm1">Home Address (used to estimate customer coverage in your area)</label>
        <input type="text" id="exampleForm1" class="form-control">

        <label for="exampleForm2">Referral code (optional)</label>
        <input type="text" id="exampleForm2" class="form-control">

    </div>
    <!-- Default form subscription -->

@endsection


@push('script')
{{-- <script src="{{ asset('/front/js/signup-to-cook.js') }}"></script> --}}
@endpush
