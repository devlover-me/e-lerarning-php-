<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">Add Teacher</h4>
							</div>
							<div class="col-md-6">
								<a class="btn btn-warning" href="<?php echo base_url('admin/viewTeacher'); ?>"
									style="float: right;">View Teachewr</a>
							</div>
						</div>
					</div>

				</div>
				<?php  $action=$this->uri->segment(3); 
                $uid=$this->uri->segment(4);
               
                if($action=='edit'){
               
                echo form_open_multipart('admin/saveteacher/'.$action.'/'.$uid);}else{
                echo form_open_multipart('admin/saveteacher/'.$action.'/'.$uid);
                }
				 ?>

				


            
					<?php echo form_error('nod','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

				<div class="form-group">
                <label for="exampleInputPassword1"> Oraganization Name *</label>
					<input type="text" name="orgName" class="form-control " value="<?php 
				 ?>" id="" required>
              
					<?php echo form_error('orgName','<div class="error" style="color:red;">', '</div>'); ?>
				</div> -->

				<div class="form-group">

					<label for="exampleInputPassword1"> User Name *</label>
					<input type="text" name="name" class="form-control " value="<?php 
					 if(form_error('name')){ echo set_value('name');}else{
					if($action=='edit'){  echo $user[0]->name;} else{
						echo set_value('name');    } } ?>" id="" required>		
								
            
					<?php echo form_error('name','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

				<div class="form-group">
                   <label for="exampleInputPassword1"> Speciality *</label>
					<input type="text" name="special" class="form-control " value="<?php 
					 if(form_error('special')){ echo set_value('special');}else{
						if($action=='edit'){ echo $user[0]->speciality;} else{		
							echo set_value('special');   } } ?>" id="" required>		 
							
				<?php echo form_error('special','<div class="error" style="color:red;">', '</div>'); ?>
		 </div>
				
								
							 <?php echo form_error('aadhar','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Phone *</label>
					<input type="text" name="phone" maxlength="10" class="form-control " value="<?php 
					 ?>" id="" required>	
								
			<?php echo form_error('phone','<div class="error" style="color:red;">', '</div>'); ?>

				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password *</label>
					<input type="text" name="password" class="form-control " value="<?php 
					//  if(form_error('password')){ echo set_value('password');}else{
					// 	if($action=='edit'){ echo $log;} else{echo set_value('password'); 		
					// 	} } ?>" id="" required>	 
							
					<?php echo form_error('password','<div class="error" style="color:red;">', '</div>'); ?>

			
				



				<div class="form-group">
					<button type="submit" class="btn savemainmenu btn-primary" name="submit">Save</button>
				</div>

				<?php echo form_close();  ?>

			</div>
		</div>
	</div>
</div>
</div>
<script>
	$('#tags').tagsinput({
		confirmKeys: [13, 44],
		maxTags: 20
	});

</script>
