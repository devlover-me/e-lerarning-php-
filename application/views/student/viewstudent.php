

<div class="content" style="padding:56px;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">View center form</h4>
							</div>
							<!-- <div class="col-md-6">
								<a class="btn btn-warning" href="<?php $action='add';
								$name=$this->uri->segment(3);
								echo base_url('admin/addForm1/').$name.'/'.$action.'/'.$uid; ?>"
									style="float: right;">Add Student</a>
							</div> -->
						</div>


					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="sample_1">
								<thead class="">
									<th>S.no</th>
									<th>Image</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Batch</th>
									<th>Course</th>
									
									<th>Father Name</th>
									<th>Monther Name</th>
									<th>aadhar number</th>
									<th>aadhar number</th>
									<th>Dob</th>
									<th>Address</th>
									<th>Phone</th>
									<th>pincode</th>
									<th>Email</th>
									<th>Date</th>
									
									<th>View Application</th>
									

								</thead>
								<tbody>
									<?php
									 $i = 0;
                                    if (is_array($details) || is_object($details)) {
                                       
                                        foreach ($details as $key) { 
											$i++; ?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $key->image; ?></td>          
										<td><?php echo $key->firstName; ?></td>
										<td><?php echo $key->lastName; ?></td>
										<td><?php echo $key->batch; ?></td>
										<td><?php echo $key->course; ?></td>
										<td><?php echo $key->fatherName; ?></td>
										<td><?php echo $key->motherName; ?></td>
										<td><?php echo $key->gender; ?></td>
										<td><?php echo $key->aadharNo; ?></td>
										<td><?php echo $key->DOB; ?></td>
										<td><?php echo $key->address; ?></td>
										<td><?php echo $key->phone; ?></td>
										<td><?php echo $key->email; ?></td>
										<td><?php echo $key->postalcode; ?></td>
										<td><?php $source = $key->createdAt;	$date = new DateTime($source);
											echo $date->format('d.m.Y');?></td>	
									<td><button   data-toggle="modal" data-target="#qualificationModal"  class="btn btn-primary"> Click</button></td>

										


									
									</tr>
									<?php }
                                    } else {
                                        echo "No Menus Found";
                                    }
                                    ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ==============================Edit function ============================== -->
<script>
	function myFunction(id) {

		swal({
				title: "Are you sure?",
				text: "Once deleted, your all the data related to the center will be deleted!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location.href = "<?php echo base_url(); ?>admin/deleteCenter/" + id;

				} else {
					
				}
			});
	}

</script>
