<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title">Courses </h1>
                </div>
            </div>
        </section>





        <div class="container" style="padding-top: 40px;padding-bottom:40px;">
	<div class="row pt-3 pb-3">
<?php  
$i=0;
if(!empty($details)){ foreach($details as $n){?>



		<div class="col-lg-3 col-md-3 col-12 pt-5" data-aos="fade-up" data-aos-duration="1000">
			<div class="borderr">
				<div class="imge">
        <img class="card-img-top" src="<?php echo base_url('assets/images/temp/team-member-6.jpg');?>" alt="Card image" style="width:100%">
				</div>
			
        <h4 class="distinationname pl-3 pt-5"><?php echo  $n->name;?></h4>
        <h2 class="distinationprice pt-2">
        <a href="#"  data="<?php $amount[$i]=$n->price;
      echo $amount[$i];?>" class="btn btn-primary buy"><i class="fa fa-inr" aria-hidden="true">Buy <?php $amount[$i]=$n->price;
      echo $amount[$i];?></i> </a></h2>
			

			</div>
    </div>
    
    <?php
 $i++; }
}?>

  </div>
        </div>
<!-- 
<div class="col-sm-3" style="padding-left:40px;">
<div class="card" style="width:200px">
   
    <div class="card-body">
      <h4 class="card-title"></h4>
      <p class="card-text"></p>
     
    </div>
  </div>
</div>

</div>
</div> -->
<script>

$(document).ready(function() {

 
  $(document).on('click','.buy',function(){

   
     data=$(this).attr("data");
    
    
   
    $.ajax({
					url: '<?php echo base_url('user/check_coin');?>',
			        type: "POST",
			        data:{fee:data},
			        dataType: "json",
			        success: function(result) {
						// console.log();
			            if(result.status=="true")
			            {
			            	swal({
  title: "Are you sure You want to Buy course?",
  text: "Once you click ok you can see your course in my course!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href='<?php echo base_url('user/deduct_coin/');?>';
  } else {
    
  }
});
			            	// setTimeout(function() {  $('.message-popup').removeClass('open'); }, 400);
			            }
			            else
			            {
			            	swal("Sorry!", "You do not have Enough coin. Try Again After taking the quiz!", "error");	
			            	// setTimeout(function() {  $('.message-popup').removeClass('open'); }, 400);
			            }
			        }
			    });

  }); 
});

  
</script>