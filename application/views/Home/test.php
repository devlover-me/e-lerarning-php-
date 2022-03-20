<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title">Quiz</h1>
                </div>
            </div>
        </section>

	<div class="cantainer" style="padding-bottom:40px;">
	
		
		<br>
		<div class="container">
  <h2  style="text-align:center;">Test</h2>
  <p  style="text-align:center;">Please select the valid input </p>
  <div class="container">
  <form action="<?php  echo base_url('user/save_test'); ?>" method = "post" onsubmit="return confirm('Are you sure you want to submit this form?');">

  <?php 
  $i=0;
  if(!empty($question)) {foreach($question as $catarr) 
  { $i++;?> 
 
      	<hr>
      	<h4>Ques.<?php echo $i." ".$catarr->question;?> </h4> (coins <?php echo $catarr->Q_coin ?> )
      	<hr>
      	  		<input type="hidden" name="quesid[]" value="<?php echo $catarr->id; ?>">
   (A)<?php echo $catarr->opt1; ?><input type="radio" name="ans<?php echo $i;?>" value="<?php echo $catarr->opt1; ?>"><br>
   (B)<?php echo $catarr->opt2; ?><input type="radio" name="ans<?php echo $i;?>" value="<?php echo $catarr->opt2; ?>"><br>
   (C)<?php echo $catarr->opt3; ?><input type="radio" name="ans<?php echo $i;?>" value="<?php echo $catarr->opt3; ?>"><br>
   (D)<?php echo $catarr->opt4; ?><input type="radio" name="ans<?php echo $i;?>" value="<?php echo $catarr->opt4; ?>"><br>
        <hr>

<?php }
?>
<button type="submit" name="submit" class="btn btn-primary" onclick="" style="margin-left: 200px">submit</button>
</form>
<?php 
}else{
	?>

	<h1>This test is not available yet</h1>
	<?php
       
}
?>

<?php ?>
	
</div>
</div>
	</div>