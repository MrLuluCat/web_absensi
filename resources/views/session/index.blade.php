<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login | Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('assets/img/logo_labict2.png') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/animate/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/_login/css/main.css') }}">
</head>

<body>
	<a href="{{ url('/dashboard') }}" onclick=""><i class="fa fa-arrow-left"></i></a>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

				@include('component.massage')

				<form class="login100-form validate-form" action="/session/login" method="POST">
    			@csrf

					<span class="login100-form-title p-b-48">
						<!-- <i class="zmdi zmdi-font"></i> -->
						<img src="../assets/img/logo1.jpg" width="100">
					</span>
					<span class="login100-form-title p-b-26">
						Lab ICT UBL
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" value="{{ Session::get('email') }}" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="{{ asset('assets/_login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<!--===========================================================================================================-->
	<script src="{{ asset('assets/_login/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===========================================================================================================-->
	<script src="{{ asset('assets/_login/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/_login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===========================================================================================================-->
	<script src="{{ asset('assets/_login/vendor/select2/select2.min.js') }}"></script>
	<!--===========================================================================================================-->
	<script src="{{ asset('assets/_login/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assets/_login/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===========================================================================================================-->
	<script src="{{ asset('assets/_login/vendor/countdowntime/countdowntime.js') }}"></script>
	<!--===============================================================================================-->

	<!-- Sweet Alert -->
	<script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
	<script src="{{ asset('assets/_login/js/main.js') }}"></script>


</body>

</html>