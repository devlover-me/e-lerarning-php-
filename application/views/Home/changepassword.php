

<!DOCTYPE html>
<html>
<head>
	<title>forgot password</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		

		.modal {
       width: 500px;
       height: 100px;
       margin:0 auto;
       display:table;
       position: absolute;
       left: 0;
       right:0;
       top: 50%; 
     /*  border:1px solid;*/
       -webkit-transform:translateY(-50%);
       -moz-transform:translateY(-50%);
       -ms-transform:translateY(-50%);
       -o-transform:translateY(-50%);
       transform:translateY(-50%);
    }
	</style>
</head>
<body>
<div id="myModal" class="modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <p class="modal-title">Otp verification</p>
         
      </div>
      <div class="modal-body">

       <form action="<?php echo base_url('user/change_password') ?>" name="form" id="form2" method="post">
       <input type="text" name="new" placeholder="enter New password">
       <br>
       <br>
        <input type="text" name="confirm" placeholder="confirm New Password">
        <input type="text" name="email" value="<?php echo $mail; ?>">
       <br>
       <button name="change" type="submit" class="btn btn-primary">Change</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>

<script type="text/javascript">
	
</script>
</html>