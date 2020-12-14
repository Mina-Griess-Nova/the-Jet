<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DishDivvy</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDst9gRFVsQsqj4-XzWY65uHKT8Ak_RC1E&callback=initMap&libraries=&v=weekly"defer></script>

    <link rel="stylesheet" href="{{ asset('/front/css/reset.css') }}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ asset('/front/css/filter.css') }}"> <!-- Resource style -->
	<script src="{{ asset('/front/js/modernizr.js') }}"></script> <!-- Modernizr -->

    <!-- Your custom styles (optional) -->
    <link href="{{ asset('/front/css/simple-sidebar.css') }}" rel="stylesheet">

    <link href="{{ asset('/front/css/style.css') }}" rel="stylesheet">
    @stack('style')
</head>
<body>

    @include('front.partials.header')

@yield('content')
@include('front.partials.footer')

        <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<!-- plus a jQuery UI theme, here I use "flick" -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css">

<!-- rating -->
<script src="{{ asset('/front/js/rate.js') }}" charset="utf-8"></script>
<script src="{{ asset('/front/js/addons/rating.min.js') }}" charset="utf-8"></script>


<script src="{{ asset('/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/front/js/addons/rating.js') }}"></script>
<script src="{{ asset('/front/js/main.js') }}"></script>

@stack('script')



</body>
</html>
