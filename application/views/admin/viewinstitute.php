<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">View Institute</h4>
							</div>
							<div class="col-md-6">
								<a class="btn btn-warning" href="<?php $action='add';
								 echo base_url('admin/institute/'.$action); ?>"
									style="float: right;">Add Institute</a>
							</div>
						</div>


					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="sample_1">
								<thead class="">
									<th>S.no</th>
									<th>Institute Name</th>
									<th>phaseyear</th>
									<th>phaseMonth</th>
									
									<th>Date</th>
									<th>status</th>
									<th>Action</th>

								</thead>
								<tbody>
									<?php
                                    if (is_array($menu) || is_object($menu)) {
                                        $i = 1;
                                        foreach ($menu as $key) { ?>
									<tr>
										<td><?php echo $i;
                                                    $i++; ?></td>
										<td><?php echo $key->instituteName; ?></td>
									
												<td><?php echo $key->phaseYear; ?></td>
												<td><?php echo $key->phaseMonth; ?></td>
												
										<td><?php $source = $key->createdAt;
												$date = new DateTime($source);
												echo $date->format('d.m.Y');
																							?></td>
										

										<td><?php if ($key->status == 0) { ?><a
												href="<?php echo base_url('admin/changeInstituteStatus/').$key->id; ?>"><i
													class="fas fa-times text-danger"
													style="font-size: 22px;"></i></a><?php }else{ ?><a
												href="<?php echo base_url('admin/changeInstituteStatus/').$key->id; ?>"><i
													class="fas fa-check text-success"
													style="font-size:22px;"></i></a><?php } ?></td>


										<td><a href="<?php $action='edit';
										echo base_url('admin/institute/').$action.'/'.$key->id; ?>"><i
													class="fas fa-edit"></i></a>
											<a id="<?php echo $key->id; ?>" value="<?php echo $key->id;?>"
												onclick="myFunction(this.id)">

												<i style="padding-left:27px;color: red;cursor: pointer;"
													class="fas fa-trash"></i></a>

										</td>
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
					window.location.href = "<?php echo base_url(); ?>admin/deleteInstitute/" + id;

				} else {
					
				}
			});
	}

</script>
