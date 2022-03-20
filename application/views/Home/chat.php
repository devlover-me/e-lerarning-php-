<section class="trd-page-header">
            <div class="container">
                <div class="row">
                    <h1 class="trd-page-title">Talk with Mentors </h1>
                </div>
            </div>
        </section>

        <div class="row">
   <h2 align="center"><a href="#">Chat With mentors</a></h2>
   </div>
 <div clas="container-fluid"  style="display:flex;">
 
   
   <div class="col-md-3" style="padding-right:0;">
    <div class="panel panel-default" style="height: 700px; overflow-y: scroll;">
     <div class="panel-heading">Chat with User</div>
    
     <ul class="list-group list-group-flush">
     <?php  

if(!empty($details)){ foreach($details as $n){?>

<div class="card" style="width:200px">
    <!-- 
    <div class="card-body"> -->
        
     <li  class="list-group-item"> 
     <img class="card-img-top" src="<?php echo base_url('assets/images/temp/team-member-6.jpg');?>" alt="Card image" style="width:10%">
     <h4 class="card-title"><?php echo  $n->name;?></h4></li>
       
     
    </div>
  <!-- </div> -->
<!-- </div> -->
<?php
 }
}?>
 </ul>
</div>
     <div class="panel-body" id="chat_user_area">

     </div>
     <input type="hidden" name="hidden_receiver_id_array" id="hidden_receiver_id_array" />
    </div>

    
   
   <div class="col-md-6" style="padding-left:0; padding-right: 0;">
    <div class="panel panel-default" style="">
     <div class="panel-heading">Chat Area</div>
     <div class="panel-body">
      <div id="chat_header">
       <h2 align="center" style="margin:0; padding-bottom:16px;"><span id="dynamic_title">Welcome <?php echo $this->session->userdata('username'); ?></span></h2>
      </div>
      <div id="chat_body" style="height:406px; overflow-y: scroll;"></div>
      <div id="chat_footer" style="">
       <hr />
       <div class="form-group">
        <div id="chat_message_area" contenteditable class="form-control"></div>
       </div>
       <div class="form-group" align="right">
        <button type="button" name="send_chat" id="send_chat" class="btn btn-success btn-xs" disabled>Send</button>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="col-md-3" style="padding-left:0;">
    <div class="panel panel-default" style="height: 300px; overflow-y: scroll;">
     <div class="panel-heading">Search User</div>
     <div class="panel-body">
      <div class="row">
       <div class="col-md-8">
        <input type="text" name="search_user" id="search_user" class="form-control input-sm" placeholder="Search User" />
       </div>
       <div class="col-md-4">
        <button type="button" name="search_button" id="search_button" class="btn btn-primary btn-sm">Search</button>
       </div>
      </div>
      
      <div id="search_user_area"></div>
      
     </div>
    </div>
    <div class="panel panel-default" style="height: 380px; overflow-y: scroll;">
     <div class="panel-heading">Nofication</div>
     <div class="panel-body" id="notification_area">
      
     </div>
    </div>
   </div>

   </div>
<script>

$(document).ready(function(){

 function loading()
 {
  var output = '<div align="center"><br /><br /><br />';
  output += '<img src="<?php echo base_url(); ?>asset/loading.gif" /> Please wait...</div>';
  return output;
 }

 $(document).on('click', '#search_button', function(){
  var search_query = $.trim($('#search_user').val());
//   $('#search_user_area').html('');
  if(search_query != '')
  {
   $.ajax({
    url:"<?php echo base_url('user/search_teacher'); ?>",
    method:"POST",
    data:{search_query:search_query},
    dataType:"json",
    success:function(data)
    {
        $('#search_user_area').html('<h2>'+ data+'</h2>');

    }

   });
  }
 });




});

</script>