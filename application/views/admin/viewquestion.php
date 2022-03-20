<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<div class="row">
							<div class="col-md-6">
								<h4 class="card-title mt-0">View Question</h4>
							</div>
							<div class="col-md-6">
								<a class="btn btn-warning" href="<?php echo base_url('admin/question/add'); ?>"
									style="float: right;">Add Question</a>
							</div>
						</div>


					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="sample_1">
								<thead class="">
                                    <th>S.no</th>
                                    <th>Category</th>
									<th>Question</th>
									<th>Option1</th>
                                    <th>Option 2</th>
                                    <th>Option 3</th>
                                    <th>Option 4</th>
                                    <th>Answer</th>
                                    <th>Q_coin</th>
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
                                        <td><?php echo $key->category; ?></td>
                                        <td><?php echo $key->question; ?></td>
                                        <td><?php echo $key->opt1; ?></td>
                                        <td><?php echo $key->opt2; ?></td>
                                        <td><?php echo $key->opt3; ?></td>
                                    
                                        <td><?php echo $key->opt4; ?></td>
                                        <td><?php echo $key->answer; ?></td>
                                        <td><?php echo $key->Q_coin; ?></td>
                                        
									
										<td><?php $source = $key->createdAt;
												$date = new DateTime($source);
												echo $date->format('d.m.Y'); ?></td>
										
										<td><?php if ($key->status == 0) { ?><a
												href="<?php echo base_url('admin/changemenustatus/').$key->id; ?>"><i
													class="fas fa-times text-danger"
													style="font-size: 22px;"></i></a><?php }else{ ?><a
												href="<?php echo base_url('admin/changemenustatus/').$key->id; ?>"><i
													class="fas fa-check text-success"
													style="font-size:22px;"></i></a><?php } ?></td>
										<td><a href="<?php echo base_url('admin/editSubCategory/').$key->id; ?>"><i
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



<!-- ==================delete modal============= -->
<script>
	function myFunction(id) {

		swal({
				title: "Are you sure?",
				text: "Once deleted, your product will also be deleted related to this sub category!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					window.location.href = "<?php echo base_url(); ?>admin/deleteSub/" + id;

				} else {
				
				}
			});
	}

</script>
