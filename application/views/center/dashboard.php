
  <!-- End Navbar -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      
      <?php $i=-1;
       if(!empty($institute)){ foreach($institute as $n){
         $i++;
        $id=$n->id; ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              
           <h3 style="margin-right:17px;margin-top: 13px;"> <a href="#" class="institute"><?php  echo $n->instituteName ?></a></h3>
           <p style="color:black;margin-top: -42px;margin-right: -82px;">Total students</p>
             <p  style="color:black;margin-top: -24px;margin-right: -41px;padding-top: 12px;">
             <?php echo $students[$i]; ?>
            </p>
             
            </div>
           
               
             
          </div>
        </div>
        <?php } }
         ?>
        
      </div>
     
    </div>
  </div>
  <script>
  $(document).ready(function () {
    $('.institute').on('click', function () {
      // $e.preventDefault();
  $('#batchModal').modal('show');
  
  
    });
  });
</script>