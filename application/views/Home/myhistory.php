<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

   

<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title"> My quiz history </h1>
                </div>
            </div>
        </section>








<div class="content">
    <div class="row" style="padding: 40px;
    margin-left: 388px;
">


<div class="container pt-5">
	<div class="row" style="text-align: center;    margin-left: -454px;">
		<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="1000">
			<h1  style="text-align:center;" class="destinationheading">Quiz History</h1>
			
		</div>
	</div>
</div>
    <div class="col-sm-8 offset-sm-4" data-aos="fade-up" data-aos-duration="2000">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>S.no</th>
            <th>Ques ID</th>
            <th>Ans</th>
            <th>Date</th>
        </tr>
    </thead>
    <?php
                  if (is_array($menu) || is_object($menu)) {
                      $i = 1;
                      foreach ($menu as $key) { ?>
					<tbody>
						<tr>
							<td><?php echo $i;$i++; ?></td>
							<td ><?php echo $key->quesId; ?></td>
							<td ><?php echo $key->sel_ans; ?></td>
							<td ><?php echo $key->createdAt; ?></td>

							
						</tr>

						<?php }
                  }
                  ?>
					</tbody>
</table>
    </div>
    </div>
</div>

</body>
</html>
