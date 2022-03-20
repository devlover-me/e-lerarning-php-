<section class="trd-page-header">
	<div class="container">
		<div class="row">
			<h1 class="trd-page-title">Wallet</h1>
		</div>
	</div>
</section>










<div class="content" style="margin-left:60px;">
	<div class="container-fluid">
		<div class="row" style="padding-bottom:73px;">
			<div class="row col-md-8">
				<p>Amount</p>
				<h1 style="font-size:46px;"><i class="fas fa-rupee-sign"> </i><?php echo $amount[0]->amount ?></h1>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
					<h1 style="text-align:center;" class="destinationheading">Transaction</h1>
					<p style="text-align:center;">Recent transaction </p>
				</div>
			</div>

		</div>

	</div>


	<div class="container" style="margin-left:12pc;">

		<div class="container pt-5">
		
		</div>

		<div class="row" style="padding:40px;    margin-left: 109px;"  data-aos="fade-up" data-aos-duration="2000">

			<div class="col-sm-12">
				<table class="table table-info table-striped">
					<thead class="">
						<th>S.no </th>
						<th style="    padding-left: 76px;">Transaction Id</th>
						<th style="    padding-left: 76px;">Transaction From to </th>
						<th style="    padding-left: 76px;">Transaction Type</th>
						<!-- <th>Amount</th> -->

						<th>date</th>
					</thead>
					<?php
                  if (is_array($menu) || is_object($menu)) {
                      $i = 1;
                      foreach ($menu as $key) { ?>
					<tbody>
						<tr>
							<td><?php echo $i;$i++; ?></td>
							<td style="    padding-left: 76px;"><?php echo $key->transactionId; ?></td>
							<td style="    padding-left: 76px;"><?php echo $key->transactionFromTo; ?></td>
							<td style="    padding-left: 76px;"><?php echo $key->transactionType; ?></td>

							<td style="    padding-left: 76px;"><?php  	echo $key->updatedAt;?></td>
						</tr>

						<?php }
                  }
                  ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
