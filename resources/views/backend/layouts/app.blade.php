<!DOCTYPE html>
<html dir="ltr">
{{-- <html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"> --}}

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 21:07:10 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>theJet _ Dashboard</title>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/feathericon.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/plugins/morris/morris.css') }}">
          <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDst9gRFVsQsqj4-XzWY65uHKT8Ak_RC1E&callback=initMap&libraries=&v=weekly"defer></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

        <!-- Your custom styles (optional) -->
        <link href="{{ asset('/front/css/simple-sidebar.css') }}" rel="stylesheet">

        @stack('style')

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

    <style>
        .disabled{
            pointer-events: none;
        }
    </style>

    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">


            @include('backend.partials.header')


            @include('backend.partials.sidebar')


            @yield('content')


        </div>
		<!-- /Main Wrapper -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>


        <!-- Latest compiled JavaScript -->
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

		<!-- Slimscroll JS -->
        <script src="{{ asset('backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

		<script src="{{ asset('backend/plugins/raphael/raphael.min.js') }}"></script>
		{{-- {{-- <script src="{{ asset('backend/plugins/morris/morris.min.js') }}"></script> --}}
		<script src="{{ asset('backend/js/chart.morris.js') }}"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


        @stack('scripts')


		<!-- Custom JS -->
        <script  src="{{ asset('backend/js/script.js') }}"></script>


    </body>

</html>
