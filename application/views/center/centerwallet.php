<div class="content">
	<div class="container-fluid">
		<div class="row" style="padding-bottom:73px;">
			<div class="row col-md-8">
				<i class="fas fa-rupee-sign" style="font-size:46px;"><?php echo $wall[0]->amount?></i>
			</div>

			<div class="col-md-4">
				<div class="row">
					<div class="col-md-4" style="float:right;margin-left: 273px;">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#walletModal">Add</button>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row" style="padding-bottom:-91px;">
		<div class="col-lg-12 col-md-12">

			<div class="card">
				<div class="card-header card-header-warning">
					<h4 class="card-title">Transaction</h4>
					<p class="card-category">Recent transactions</p>
				</div>
				<div class="card-body table-responsive">

					<table class="table table-hover">
						<thead class="text-warning">
							<th>S.no </th>
							<th>Transaction Id</th>
							<th>Transaction From to </th>
							<th>Transaction Type</th>
							<th>Amount</th>
							
							<th>date</th>
						</thead>
						<?php
                  if (is_array($menu) || is_object($menu)) {
                      $i = 1;
                      foreach ($menu as $key) { ?>
						<tbody>
    	<tr>
								<td><?php echo $i;$i++; ?></td>
              	<td><?php echo $key->transactionId; ?></td>
								<td><?php echo $key->transactionFromTo; ?></td>
								<td><?php echo $key->transactionType; ?></td>
								<td><?php echo $key->amount; ?></td>
								
								<td><?php  	echo $key->updatedAt;?></td>
							</tr>
							<tr>
								<?php }
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
