<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Dec 2019 21:07:40 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Login</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="backend/img/.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">

		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							{{-- <img class="img-fluid" src="{{ asset('front/images/msol-logo.png') }}" alt="Logo"> --}}
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
                            @include('backend.partials.errors')
                            <div id="login_error" class="alert alert-danger"  style="display:none">

                            </div>
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>

								<!-- Form -->
								<form data-type="json" id="form">
                                    @csrf
									<div class="form-group">
										<input class="form-control" name="email" type="text" placeholder="Email">
                                    </div>

									<div class="form-group">
										<input class="form-control" name="password" type="password" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-otbokhly btn-block" type="submit" >Login</button>
									</div>
								</form>
								<!-- /Form -->
								<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>

		<!-- Bootstrap Core JS -->
        <script src="{{ asset('backend/js/popper.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('backend/js/script.js') }}"></script>




        <script>



        $(function() {

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $('#form').on('submit', function(e){
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            type: 'POST',
            url: '/dashboard/checklogin',
            data: $this.serializeArray(),
            dataType: $this.data('type'),
            success: function (response) {
                // var response = JSON.parse(response);
                if(response.success) {
                    window.location.href = response.redirectto;
                }
                else if( ! response.success){
                    $('#login_error').css('display','block')
                    $('#login_error').append('<p>'+response.error+'</p>');
                }
            },

        });
        });

        });
          </script>
    </body>

</html>
