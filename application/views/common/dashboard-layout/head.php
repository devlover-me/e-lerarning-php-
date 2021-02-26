<?php if (isset($_SESSION['changepass'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 343px;right: 50px;    z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['changepass']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['changepass']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>

	<?php if (isset($_SESSION['changestatus'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 343px;right: 50px;    z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['changestatus']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['changestatus']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>

	<?php if (isset($_SESSION['savemenu'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 350px;right: 50px;    z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['savemenu']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['savemenu']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>
	<?php if (isset($_SESSION['viewgame'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 343px;right: 50px;    z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['viewgame']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['viewgame']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>


	<?php if (isset($_SESSION['success'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 343px;right: 50px;    z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['success']['status'] == 'true' ? 'alert-success' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['success']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>

<?php if (isset($_SESSION['toaster'])) { ?>
	<div class="col-md-12 hiddenalert"
		style="position: absolute;top: 15px;width: 343px;right: 50px;  z-index: 1000000;">
		<div
			class="alert <?php echo $_SESSION['toaster']['status'] == 'true' ? 'alert-toaster' : 'alert-danger'; ?>  alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?php echo $_SESSION['toaster']['msg']; ?></strong>
		</div>
	</div>
	<?php }
  ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin
  </title>
  <script src="<?php echo base_url('assets/js/core/jquery.min.js');?>"></script>
  <!-- taginput  files  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets\css\bootstrap-tagsinput.css') ?>" />
<script href="<?php echo base_url('assets\js\plugins\bootstrap-tagsinput.js') ?>" ></script>


  <!-- end of taginput -->
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css') ?>/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
  <!-- font awesom -->
  <script src="https://kit.fontawesome.com/337611d7da.js" crossorigin="anonymous"></script>
  <style>.card-stats .card-header.card-header-icon, .card-stats .card-header.card-header-text {
    text-align: right;
    width: 168px;
} </style>
<style>
 .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: blue;
}
.card [class*="card-header-"] .card-icon {
	float: right;
	border-radius: 100%;
	margin-right: -88px;
	height: 49px;
	width: 48px;
	margin-top: 18px;
	/* margin-left: 118px; */
	margin-bottom: 41px;
}

  </style>
<script> 
 $(document).ready(function(){
	   $("#sample_1").dataTable();
	 }); 
</script>
<script>
				$(document).ready(function () {
					$(function () {
						setTimeout(function () {
							$('.hiddenalert').fadeOut('fast');
						}, 7000);
					});
				});
			</script>
</head>
<body class="">
    <div class="wrapper ">