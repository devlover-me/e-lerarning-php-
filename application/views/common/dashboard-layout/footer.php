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

			<div class="modal fade" id="batchModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog"
				aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Choose Batch</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
						 Choose Batch :<select name="batch" id="batch">
						<option value="0">Batch</option>
						<option value="2018">2018</option>
						<option value="2018">M2018</option>
						<option value="2018">2018</option>
						</select>
						<br>
							<button type="submit" class="btn btn-primary">NEXT </button>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

						</div>

					</div>
				</div>
			</div>

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
						<?php echo form_open('admin/updateWallet'); ?>
						<input type="text" name="amount" class="form-group ">
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