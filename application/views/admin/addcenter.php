<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">Add Center</h4>
							</div>
							<div class="col-md-6">
								<a class="btn btn-warning" href="<?php echo base_url('admin/viewCenter'); ?>"
									style="float: right;">View Center</a>
							</div>
						</div>
					</div>

				</div>
				<?php  $action=$this->uri->segment(3); 
                $uid=$this->uri->segment(4);
               
                if($action=='edit'){
               
                echo form_open_multipart('admin/savecenter/'.$action.'/'.$uid);}else{
                echo form_open_multipart('admin/savecenter/'.$action.'/'.$uid);
                }
				 ?>
         
		 <div class="form-group">
					<label for="exampleInputPassword1">Select Institute *</label>
					<select name="institute"   class="form-control cat" id="cat" required="">
						<option value="" >Select</option>
						<?php if(!empty($institute)){ foreach($institute as $n){ ?>
						<option value="<?php echo $n->id;  ?>" <?php echo set_select('cat', $n->id, False); ?> ><?php  echo $n->instituteName; ?></option>
						<?php } } ?>
					</select>
				</div>
        
				<div class="form-group">
				
				<label for="exampleInputPassword1">  Name of directory *</label>
				<input type="text" name="nod" class="form-control " value="<?php 
					 if(form_error('nod')){
							 echo set_value('nod');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->nameOfDirector;} else{
								echo set_value('nod'); 
               } } ?>" id="" 
					required>
					<?php echo form_error('nod','<div class="error" style="color:red;">', '</div>'); ?>
			</div>

			<div class="form-group">
				
					<label for="exampleInputPassword1"> Oraganization Name *</label>
					<input type="text" name="orgName" class="form-control " value="<?php 
					 if(form_error('orgName')){
							 echo set_value('orgName');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->oraganizationName;} else{
								echo set_value('orgName'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('orgName','<div class="error" style="color:red;">', '</div>'); ?>
				</div>
				
				<div class="form-group">
				
					<label for="exampleInputPassword1"> User Name *</label>
					<input type="text" name="name" class="form-control " value="<?php 
					 if(form_error('name')){
							 echo set_value('name');}else{
								if($action=='edit'){ 
							 echo $user[0]->userName;} else{
								echo set_value('name'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('name','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

				<div class="form-group">
				
					<label for="exampleInputPassword1"> Director father name *</label>
					<input type="text" name="faName" class="form-control " value="<?php 
					 if(form_error('faName')){
							 echo set_value('faName');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->directorFather;} else{
								echo set_value('faName'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('faName','<div class="error" style="color:red;">', '</div>'); ?>
				</div>
				<div class="form-group">
				
					<label for="exampleInputPassword1"> Aadhar Number *</label>
					<input type="text" name="aadhar" maxlength="12" class="form-control " value="<?php 
					 if(form_error('aadhar')){
							 echo set_value('aadhar');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->aadharNumber;} else{
								echo set_value('aadhar'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('aadhar','<div class="error" style="color:red;">', '</div>'); ?>
				</div>
                   
				<div class="form-group">
					<label for="exampleInputPassword1">Phone *</label>
					<input type="text" name="phone" maxlength="10" class="form-control " value="<?php 
					 if(form_error('phone')){
							 echo set_value('phone');
							}else{
								if($action=='edit'){ 
							 echo $user[0]->phone;
							} else{
								echo set_value('phone'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('phone','<div class="error" style="color:red;">', '</div>'); ?>
						
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password *</label>
					<input type="text" name="password" class="form-control " value="<?php 
					 if(form_error('password')){
							 echo set_value('password');}else{
								if($action=='edit'){ 
							 echo $log;} else{
								echo set_value('password'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('password','<div class="error" style="color:red;">', '</div>'); ?>
						
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Email *</label>
					<input type="text" name="email" class="form-control " value="<?php 
					 if(form_error('email')){
							 echo set_value('email');}else{
								if($action=='edit'){ 
							 echo $user[0]->email;} else{
								echo set_value('email'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('email','<div class="error" style="color:red;">', '</div>'); ?>
						
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Center address *</label>
					<input type="text" name="address" class="form-control " value="<?php 
					 if(form_error('address')){
							 echo set_value('address');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->address;} else{
								echo set_value('address'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('address','<div class="error" style="color:red;">', '</div>'); ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Dob *</label>
					<input type="text" name="dob" class="form-control "value="<?php 
					 if(form_error('dob')){
							 echo set_value('dob');}else{
								if($action=='edit'){ 
							 echo $userInfo[0]->dob;} else{
								echo set_value('dob'); 
               } } ?>" id="" 
						required>
						<?php echo form_error('dob','<div class="error" style="color:red;">', '</div>'); ?>
				</div>


				
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