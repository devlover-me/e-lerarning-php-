
      <!-- End Navbar -->
      <div class="content" style="width:1500px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add student</h4>
                  <p class="card-category">Fill the form to join the insitute</p>
                 
								<a class="btn btn-warning" href="<?php echo base_url('admin/viewForm1/'); ?>"
									style="float: right;">Cancle</a>
						
                </div>
                <div class="card-body">
                <?php 

                $action=$this->uri->segment(4); 
                $uid=$this->uri->segment(5);
                $name=$this->uri->segment(3);
                if($action=='edit'){
               
                echo form_open_multipart('center/saveForm/'.$name.'/'.$action.'/'.$uid);}else{
                echo form_open_multipart('center/saveForm');
                } ?>
                        
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <img  style="height:100px;width:100px;"/>
                         
                          <!-- <label class="bmd-label-floating">Company (disabled)</label>
                          <input type="text" class="form-control" disabled> -->
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Batch</label>
                          <select name="batch" id="batch">
						<option value="<?php echo $batch;?>"><?php echo $batch;?></option>
					
						</select>
                        </div>
    <!-- hidden id -->
    <input type="text" value="<?php  echo $intId;?>" name="intId">
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">semestar</label>
                          <select name="month" id="month">
						<option value="<?php echo $month;?>"><?php echo $month;?></option>
					
						</select>
                        </div>
                        <input type="file" class="form-control" id="file">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php 
					 if(form_error('fname')){
							 echo set_value('fname');}else{
								if($action=='edit'){ 
							 echo $user[0]->firstName;} else{
								echo set_value('fname'); 
               } } ?>" >
               <?php echo form_error('fname','<div class="error" style="color:red;">', '</div>'); ?>
                          <input type="text" name="id" id="id" value="<?php 
					 if(form_error('id')){
							 echo set_value('id');}else{
								if($action=='edit'){ 
							 echo $user[0]->id;} else{
								echo set_value('id'); 
               } } ?>" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php 
					 if(form_error('lname')){
							 echo set_value('lname');}else{
								if($action=='edit'){ 
							 echo $user[0]->lastName;} else{
								echo set_value('lname'); 
               } } ?>" >
               <?php echo form_error('lname','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Father's Name</label>
                          <input type="text" name="fathername" class="form-control" value="<?php 
					 if(form_error('fathername')){
							 echo set_value('fathername');}else{
								if($action=='edit'){ 
							 echo $user[0]->fatherName;} else{
								echo set_value('fathername'); 
               } } ?>" >
               <?php echo form_error('fathername','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Mother's  Name</label>
                          <input type="text" name="mothername" class="form-control" value="<?php 
					 if(form_error('mothername')){
							 echo set_value('mothername');}else{
								if($action=='edit'){ 
							 echo $user[0]->motherName;} else{
								echo set_value('mothername'); 
               } } ?>" >
               <?php echo form_error('mothername','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">User Name</label>
                          <input type="text" name="userName" class="form-control" value="<?php 
					 if(form_error('userName')){
							 echo set_value('userName');}else{
								if($action=='edit'){ 
							 echo $user[0]->userName;} else{
								echo set_value('userName'); 
               } } ?>" >
               <?php echo form_error('userName','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">password</label>
                          <input type="text" name="password" class="form-control" value="<?php 
					 if(form_error('password')){
							 echo set_value('password');}else{
								if($action=='edit'){ 
							 echo $user[0]->password;} else{
								echo set_value('password'); 
               } } ?>" >
               <?php echo form_error('password','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone No.</label>
                          <input type="text" name="phone" class="form-control" value="<?php 
					 if(form_error('phone')){
							 echo set_value('phone');}else{
								if($action=='edit'){ 
							 echo $user[0]->phone;} else{
								echo set_value('phone'); 
               } } ?>" >
               <?php echo form_error('phone','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" class="form-control" value="<?php 
					 if(form_error('email')){
							 echo set_value('email');}else{
								if($action=='edit'){ 
							 echo $user[0]->email;} else{
								echo set_value('email'); 
               } } ?>" >
               <?php echo form_error('email','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Aadhar No</label>
                          <input type="text" name="aadhar" class="form-control" value="<?php 
					 if(form_error('aadhar')){
							 echo set_value('aadhar');}else{
								if($action=='edit'){ 
							 echo $user[0]->aadharNo;} else{
								echo set_value('aadhar'); 
               } } ?>" >
               <?php echo form_error('aadhar','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label>
                          <select name="gender" id="gender">
						<option value="0">Gender</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
						</select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB</label>
                          <input type="text" name="dob" class="form-control" value="<?php 
					 if(form_error('dob')){
							 echo set_value('dob');}else{
								if($action=='edit'){ 
							 echo $user[0]->DOB;} else{
								echo set_value('dob'); 
               } } ?>" >
               <?php echo form_error('dob','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    
                    
                   
                     
                      <div class="col-md-4">
                      <div class="form-group">
					<label for="exampleInputPassword1">Select Course *</label>
					<select name="course"   class="form-control cat" id="course" required="">
						<option value="" >Select</option>
						<?php if(!empty($course)){ foreach($course as $n){ ?>
						<option value="<?php echo $n->id;  ?>" <?php echo set_select('cat', $n->id, False); ?> ><?php  echo $n->courseName; ?></option>
						<?php } } ?>
					</select>
				</div>
                     
                      </div>
        
                    <div class="row">
                      <div class="col-md-10">
                        <div class="form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="address" class="form-control" value="<?php 
					 if(form_error('address')){
							 echo set_value('address');}else{
								if($action=='edit'){ 
							 echo $user[0]->address;} else{
								echo set_value('address'); 
               } } ?>" >
               <?php echo form_error('address','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                  
                    
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pin Code</label>
                          <input type="text" name="pincode" class="form-control" value="<?php 
					 if(form_error('pincode')){
							 echo set_value('pincode');}else{
								if($action=='edit'){ 
							 echo $user[0]->postalcode;} else{
								echo set_value('pincode'); 
               } } ?>" >
               <?php echo form_error('pincode','<div class="error" style="color:red;">', '</div>'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                
                          <div class="form-group">
                          <div class="col-md-1">
                          <tr>
              <td>QUALIFICATION </td>
              
              <td>
              <table>
              
              <tr>
              <td align="center"><b>S.No.</b></td>
              <td align="center"><b>Examination</b></td>
              <td align="center"><b>Institution</b></td>
              <td align="center"><b>Roll no</b></td>
              <td align="center"><b>Year of Passing</b></td>
              <td align="center"><b>Board / university</b></td>
              <td align="center"><b>Marks Obtained</b></td>
              <td align="center"><b>Max. Marks</b></td>
              <td align="center"><b>Percentage</b></td>
              <td align="center"><b>Division</b></td>
              </tr>
              
              <tr>
              <td>1</td>
              <td><input value="tenth[]" size="8" disabled></td>
              <td><input  style="width:131px;"type="text" name="institution[]" maxlength="30 "  width="10px"/></td>
              <td><input type="text" name="roll[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="passing[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="board[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="marks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="maxMarks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="percent[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="division[]" style="width:131px;" maxlength="30" /></td>
              </tr>
              
              <tr>
              <td>2</td>
              <td><input value="tenth[]" size="8" disabled></td>
              <td><input type="text" name="institution[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="roll[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="passing[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="board[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="marks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="maxMarks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="percent[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="division[]" style="width:131px;" maxlength="30" /></td>
              </tr>
              
              <tr>
              <td>3</td>
              <td><input value="tenth[]" size="8" disabled></td>
              <td><input type="text" name="institution[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="roll[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="passing[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="board[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="marks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="maxMarks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="percent[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="division[]" style="width:131px;" maxlength="30" /></td>
              </tr>
              
              <tr>
              <td>4</td>
              <td><input value="tenth[]" size="8" disabled></td>
              <td><input type="text" name="institution[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="roll[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="passing[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="board[]" maxlength="30"  style="width:131px;"/></td>
              <td><input type="text" name="marks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="maxMarks[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="percent[]" style="width:131px;" maxlength="30" /></td>
              <td><input type="text" name="division[]" style="width:131px;" maxlength="30" /></td>
              </tr>
              
              <tr>
              <td></td>
              <td></td>
              <td align="center">(10 char max)</td>
              <td align="center">(upto 2 decimal)</td>
              </tr>
              </table>
              
              </td>
              </tr>
 
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                    <?php echo form_close(); ?>
                </div>
              </div>
            </div>
           
            </div>
          </div>
        </div>
      </div>
      