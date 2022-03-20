<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title">Quiz</h1>
                </div>
            </div>
        </section>

        <div class="container pt-5">
	<div class="row">
		<div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-duration="2000">
			<h1  style="text-align:center;" class="destinationheading">Quiz</h1>
			<p style="text-align:center;">Test your knowledge here </p>
		</div>
	</div>
</div>


	<div class="cantainer" style="padding:40px;" >
	<div class="row"  style="    margin-left: 88px;">
  <h2></h2>
  
  <?php foreach($name as $n) 
  {?>
  <div class="col-sm-4" style="padding:10px;" data-aos="fade-up" data-aos-duration="2000"  >
<div class="card" style="width:300px">
   
    <div class="card-body text-center">
      <h2> <?php echo $n->title; ?></h2>
	<a href="<?php  echo base_url('user/view_test/'.$n->title); ?>" class="btn btn-primary">Take Quiz</a>
     
    </div>
  </div>
</div>
       
     

<?php } ?>
</div>
	</div>







	