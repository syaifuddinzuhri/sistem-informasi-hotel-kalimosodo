<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('hotel-templates')}}/vendor/auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('hotel-templates')}}/vendor/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<!-- AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('hotel-templates')}}/vendor/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('hotel-templates')}}/vendor/auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('hotel-templates')}}/vendor/auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title py-5" style="background-image: url(/hotel-templates/assets/img/slide-bg.jpg);">
					<span class="login100-form-title-1" data-aos="zoom-in">
						Log In
					</span>
				</div>

				<form class="login100-form validate-form pb-0">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required" data-aos="fade-up">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required" data-aos="fade-up">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" data-aos="zoom-in">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <small class="text-secondary">
                            Don't have already a account?
                            <a href="{{ route('auth.register')}}" style="font-size: 12px;">Register</a>
                        </small>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <a href="{{route('home.index')}}"><i class="fa fa-arrow-left"></i> Back to home</a>
                    </div>
                </div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="{{ asset('hotel-templates')}}/vendor/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('hotel-templates')}}/vendor/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('hotel-templates')}}/vendor/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="{{ asset('hotel-templates')}}/vendor/auth/js/main.js"></script>
	<script>
		$(document).ready(function () {
			// AOS
			AOS.init();
		});
	</script>

</body>
</html>