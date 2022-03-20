<!DOCTYPE html>
<html>
<head>
	<title>username</title>

				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

				<!-- Popper JS -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<style type="text/css">
.wrapper {
    position:initial;
   

}
	body{
		margin: 0;
		padding: 0;
		display: flex;
	}
	/*.row div,p{
		font-family: sans;
	}
	h2{
		font-family: Cursive;
	}*/
	.font-weight-normal{
		font-weight: 600 !important;
	}
	.f-size-sm{
		font-size: 14px !important;
	}
	a:hover{
		text-decoration: none;
	}
	.container{
		-webkit-box-shadow: 0px 33px 20px 4px rgb(118 118 118 / 46%);
		-moz-box-shadow: 0px 33px 20px 4px rgb(118 118 118 / 46%);
		box-shadow: 0px 33px 20px 4px rgb(118 118 118 / 46%);
		border-top-right-radius: 15px;
		border-bottom-right-radius: 15px;
    	left: 50%;
    	top: 50%;
  	  	position: absolute;
	    -webkit-transform: translate3d(-50%, -50%, 0);
	    -moz-transform: translate3d(-50%, -50%, 0);
	    transform: translate3d(-50%, -50%, 0);

	}
	.image-body{
		height: 650px;
	}
	.img{
		max-width: 100% !important;
		max-height: 100% !important;
	}
	.bg-image-side-1{
		background-image: url(Assets/Images/net.jpg);
		background-color: #0000;
		background-blend-mode:overlay;
		background-repeat: no-repeat;
		background-size: cover;
		border-top-left-radius: 15px;
		border-bottom-left-radius: 15px;
		opacity: 0.5;
	}
</style>
<body>

	
<section class="p-5">
	<div class="container border-0 bg-white ">
		<div class="row d-flex justify-content-sm-center">

				<div class="col-sm-6 p-0 bg-image-side-1">
				</div>

				<div class="col-sm-6  p-5">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="mb-3"><b>Sign up</b></h2>
						</div>
					</div>

					

					<?php echo form_open('user/user_create'); ?>
						<div class="row d-flex justify-content-center align-items-center">
							<div class="col-sm-12">
								<div class="form-group mt-4">
									<label for="email">Name</label>
										    <input type="text" class="form-control bg-light" name="name" id="name">
								</div>
							</div>	  
									<div class="col-sm-12">
										  <div class="form-group mt-4">
										    <label for="pwd">Password</label>
										    <input type="password" class="form-control bg-light" name="password"  id="pwd">
										  </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
								<div class="form-group mt-4">
									<label for="email">Email address</label>
										    <input type="email" class="form-control bg-light" name="email" id="email">
								</div>
							</div>	  
									<div class="col-sm-12">
										  <div class="form-group mt-4">
										    <label for="pwd">Contact Number</label>
										    <input type="text" class="form-control bg-light" name="number" id="number">
										  </div>
										</div>
						</div>
						<div class="mx-auto center" style="width: 140px;">
						<button type="submit" class="btn btn-outline-primary mt-4  btn-default">Create Account</button>
					</div>
							<p class="mt-4 text-center">Already have an account?<a href="<?php echo base_url('auth/user'); ?>">Login</a></p>
                            <?php echo form_close(); ?>

						
				</div>

		</div>

	</div>
</section>
</body>
</html>
