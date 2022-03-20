<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title"> My Dashboard </h1>
                </div>
            </div>
        </section>



        <div class="container pt-5" >
	<div class="row">
		<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
			<h1  style="text-align:center;" class="destinationheading">Dashboard</h1>
			<p style="text-align:center;">Update your details From here </p>
		</div>
	</div>
</div>








<div class="content"  data-aos="fade-up" data-aos-duration="3000" style="font-size: 20px;">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body"  >
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar">
					<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                </div>
                <?php 
                 if(!empty($user)) {foreach($user as $catarr) 
                    {?>
                
				<h5 class="user-name"><?php  echo $catarr->name  ?></h5>
				<h6 class="user-email"><?php  echo $catarr->email  ?></h6>
			</div>
		
		</div>
	</div>
</div>
</div>
<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Personal Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Full Name</label>
					<input type="text" value="<?php  echo $catarr->name  ?>" class="form-control" id="fullName" placeholder="Enter full name">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email"  value="<?php  echo $catarr->email  ?>" class="form-control" id="eMail" placeholder="Enter email ID">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" value="<?php  echo $catarr->number  ?>" class="form-control" id="phone" placeholder="Enter phone number">
                </div>
                
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				
                <button type="button" id="submit" style="
    margin-top: 25px;" name="submit" class="btn btn-primary">Update</button>
            </div>

            
                    <?php  }}
                    ?>
			
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mt-3 mb-2 text-primary">Logins Details</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="Street">User Name</label>
					<input type="text" value="<?php  echo $username  ?>" class="form-control" id="Street" placeholder="Enter Street">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="ciTy">Pasword</label>
					<input type="text"  value="<?php  echo $pass  ?>" class="form-control" id="ciTy" placeholder="Enter City">
				</div>
			</div>
		
		</div>
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12">
<a type="button"  href="<?php echo base_url('auth/user_logout') ?>" id="logout" name="logout" class="btn btn-primary">Logout</a>
</div>
</div>
</div>