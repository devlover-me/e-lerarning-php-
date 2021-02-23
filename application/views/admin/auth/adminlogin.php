<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url('assets\css\bootstrap.min.css') ?>">

	<!-- jQuery library -->
	<script src="<?php echo base_url('assets\js\core\jquery.min.js') ?>"></script>

	<!-- Popper JS -->
	<script src="<?php echo base_url('assets\js\core\popper.min.js') ?>"></script>

	<!-- Latest compiled JavaScript -->
	<script src="<?php echo base_url('assets\js\bootstrap.min.js') ?>"></script>

	<style>
		.row div,
		h1 {
			font-family: sans;
		}

		@media only screen and (max-width:500px) {
			.p {
				padding: 100px !important;
			}
		}

		.form-control {
			border-radius: 0px;
		}

		input[type="text"] {
			padding-bottom: 40px;
			border: none;
			outline: 0;
			border-bottom: 1px solid black;
			color: black;
		}

		input[type="text"]:focus {
			padding-bottom: 10px;
			transition: 0.4s ease-out;
			-webkit-box-shadow: none;
			box-shadow: none;
			border-bottom: 2px solid blue;
		}

		input[type="password"] {
			padding-bottom: 40px;
			border: 0;
			outline: 0;
			border-bottom: 1px solid black;
			color: #ccc;
		}

		input[type="password"]:focus {
			padding-bottom: 10px;
			transition: 0.4s ease-out;
			-webkit-box-shadow: none;
			box-shadow: none;
			border-bottom: 2px solid blue;
		}

		.text {
			position: absolute;
			margin-left: 144px;
			margin-top: -680px;
			font-size: 62px;
			z-index: 10;
			color: white;
		}

		.color {
			background-color: blue;
			position: absolute;
			width: 830px;
			height: 812px;
			margin-top: -853px;
			z-index: 9;
			opacity: 0.4;
		}

		.p {
			padding: 170px;

		}

		.link {
			margin-bottom: 30px;
			margin-top: 10px;
			margin-left: 16px;
		}

		.wel {
			margin-top: 150px;
			font-size: 30px;
		}

		body {
			overflow: hidden;
		}

		.image {
			width: 830px;
			height: 812px;
		}

		.butonlogin {
			width: 100%;
			margin-top: 10px;
			height: 40px;
			font-weight: bold;
			background: #2196F3;
			border: none;
			color: #fff;
			transition: all 250ms;
		}

		.butonlogin:hover {
			background: #1E88E5;
		}

	</style>

</head>

<body>
	<section class="background-animation p-0" style="height: 100vh;">
		<section>
			<?php if (isset($_SESSION['success'])) { ?>
			<div class="col-md-12 hiddenalert" style="position: absolute;top: 15px;width: 343px;right: 50px;">
				<div
					class="alert <?php echo $_SESSION['success']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $_SESSION['success']['msg']; ?></strong>
				</div>
			</div>
			<?php }
			?>
			<?php echo form_open('auth/adminlogin'); ?>
			<div class="row">
				<!-- <h3> Center Login</h3> -->
				<div class="col-md-6 p-0 d-none d-md-block">

					<img class="image p-0" src="..\assets\images\login\Login.jpg">
					<div class="text">
						Welcome
						<h3 class="wel">
							"Welcome the challenges. <br>
							Look for the opportunities in every<br>
							situation to learn and grow in wisdom."<br>
						</h3>
					</div>
					<div class="color"></div>

				</div>
				<div class="col-md-6 p">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="mb-5"><b>Login</b></h1>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control " type="text" autocomplete="disabled" name="username"
									placeholder="Enter your Username">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input class="form-control " type="password" name="password" autocomplete="disabled"
									placeholder="Enter your password">
							</div>
						</div>

						<div class="col-md-12 text-right my-3">
							<a href="#">Forgot password?</a>
						</div>

					</div>

					<div class="col-md-12 mb-4">
						<input class="butonlogin mx-auto" type="submit" name="" value="Login">
					</div>
					<!-- class="giris" -->
					<!-- class="loginbaslik" -->


				</div>
			</div>
			<?php echo form_close(); ?>
		</section>
	</section>

	<script>
		$(document).ready(function () {
			$(function () {
				setTimeout(function () {
					$('.hiddenalert').fadeOut('fast');
				}, 3000);
			});
		});

	</script>
</body>

</html>
