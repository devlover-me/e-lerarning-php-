<?php 
$logged_in = $this->session->userdata('adminSession')['logged_in'];
$uid = $this->session->userdata('adminSession')['id'];
?>

<footer class="footer">


	<div class="copyright float-right">
		&copy;
		<script>
			document.write(new Date().getFullYear())

		</script>, made with <i class="material-icons">favorite</i> by
		<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
	</div>

</footer>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('auth/changeadminpassword'); ?>
				<input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
				<input type="password" name="newpassword" class="form-control" placeholder="New Password">
				<input type="hidden" name="uid" value="<?php echo $uid; ?>">
				<button type="submit" class="btn btn-primary">Save changes</button>
				<?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="centerModel" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('admin/changeadminpassword'); ?>
				<input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
				<input type="password" name="newpassword" class="form-control" placeholder="New Password">
				<input type="hidden" name="uid" value="<?php echo $uid; ?>">
				<button type="submit" class="btn btn-primary">Save changes</button>
				<?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>
<?php if(!empty($institute)){ foreach($institute as $n){
	$id=$n->id; ?>
<div class="modal fade" id="batchModal".$id tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
		 
 
				<h5 class="modal-title" id="exampleModalLabel">Choose Batch</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="form-group">
			<?php $action='add';
			 echo form_open_multipart('center/add_form/'.$action.'/'.$uid); ?>
					<label for="exampleInputPassword1">Select Batch *</label>
			<select name="batch" class="form-control" id="batch">
			<option value="" >Select</option>
			<?php
           
            for($i = $year; $i <= ($currentTime); $i++) {
                if (!$i == $currentTime) {
              echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                } else {
                  echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
            ?>

				
				</select>
				<br>
				<div class="form-group">
					<label for="exampleInputPassword1">Select semester *</label>
					<select name="month" class="form-control" id="month" >
						<option value="" >Select</option>
						<option value="<?php  echo $month;?>" ><?php  echo $month;?></option>
						<option value="<?php  echo $final;?>" ><?php  echo $final;?></option>
        
		   



					</select>
					<input  type="text" name="intId" value="<?php  echo $n->id;?>">
				<button type="submit" class="btn btn-primary">NEXT </button>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
				<?php echo form_close(); ?>
			</div>

		</div>
	</div>
</div>
<?php }}?>

<div class="modal fade" id="walletModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Amount</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('center/update_wallet'); ?>
				<input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 ||
				 (event.charCode >= 48 &&  event.charCode <= 57)))" name="amount" class="form-group ">
                    <button type="submit" class="btn btn-primary ">Add </button>
				<?php echo form_error('amount','<div class="error" style="color:red;">', '</div>'); ?>
				<?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>


<div class="modal fade" id="qualificationModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Qulification</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
			<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="sample_1">
								<thead class="">
							
										<th>S no</th>	
								<th>Examination</th>
									<th>Institutaion</th>
									<th>Roll no</th>
									<th>Year of passing</th>
									<th>Board/University</th>
									<th>Marks Obtained</th>
									<th>Max marks</th>
									<th>percentage</th>
									<th>Division</th>
									</thead>
								<tbody>
								<?php
                                    if (is_array($qualification) || is_object($qualification)) {
                                        $i = 0;
										foreach ($qualification as $val) { 
											$i++;?>
								           <td><?php echo $i; ?></td>
										<td><?php echo $val->examination; ?></td>          
										<td><?php echo $val->Institution; ?></td>
										<td><?php echo $val->rollNo; ?></td>
										<td><?php echo $val->yearOfPassing; ?></td>
										<td><?php echo $val->boardUniversity; ?></td>
										<td><?php echo $val->marksObtained; ?></td>
										<td><?php echo $val->maxMarks; ?></td>
										<td><?php echo $val->percentage; ?></td>
										<td><?php echo $val->division; ?></td>	
																							
										<?php }}?>
										</tbody>
							</table>
						</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>
<!-- forgot password -->
<div class="modal fade" id="password" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Forgot password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('student/forgot_password'); ?>
				<label>Enter your userName,email, password</label>
				<input type="text" name="userName" class="form-group ">
                    <button type="submit" class="btn btn-primary ">Add </button>
				<?php echo form_error('userName','<div class="error" style="color:red;">', '</div>'); ?>
				<?php echo form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

			</div>

		</div>
	</div>
</div>