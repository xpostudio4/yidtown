<script>console.log('view/user_profile.php')</script>
<?php error_reporting(0);?>
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/style1.css">
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/business.css">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 
 <script>
 jQuery(document).ready(function(e){
	 
	 
   jQuery( "#tabs" ).tabs();
   jQuery('.edituser').click(function(){
   jQuery(".info").hide();	
   jQuery(".addinformation").show();	
  	 });
	$('.mydata').click(function(e){

		//alert($(this).attr('id'));

		var mdata = $(this).attr('id');

		var txt;
		
$( "#dialog-confirm" ).dialog({
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "Yes": function() {
          $( this ).dialog( "close" );
		
		
		
		
		

 
			$(".loader").show();

			$.ajax({

				type: 'post',

				url: "<?php echo site_url('forum/threaddelete'); ?>",

				data: 'mdata='+mdata,

				success: function (data) {

				// alert(data);

				$(".loader").hide();

				$('#'+data).hide();

				$("#forums-post"+mdata).hide();

			//	alert('The thread hasbeen deleted successfully');
				//location.reload();
				}

			});

 		        },

		
        No: function() {
          $( this ).dialog( "close" );
        }
      }
    });		
		
		
		
		
  	 });
	 
	 
	 
	 
	 
	 
	jQuery("#updateform").on('submit', function (e) {
		//alert($(".myform").attr('title'));
 		e.preventDefault();
		var kdd = jQuery("#updateform").serialize();
		//alert(kdd);
 			jQuery.ajax({
				type: 'post',
				url: "<?php echo site_url('myaccount/updateuser'); ?>",
				data: jQuery('#updateform').serialize(),
				success: function (data) {
				 	//alert(data);
			$( "#profileupdate" ).dialog({
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "Ok": function() {
          $( this ).dialog( "close" );
		location.reload();
		}} });					
					
//alert('Your profile hasbeen updated');
				//$("#preview_form").resetForm();
				}
			});	});	 
		 jQuery("profile").hide();
	 jQuery(".profimage").hover(function(){
		 
		 jQuery("profile").show()
		 });
 
$("#uploadForm").on('submit',(function(e){
$(".loader2").show();	
e.preventDefault();
$.ajax({
url: "<?php echo site_url('myaccount/uploadimage'); ?>",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$(".profimage").attr('src','<?php echo JEWISH_URL;?>/'+data);

$(".loader2").hide();	
 $("#ontext").show();
	 $('.btnSubmit').hide();	
},
error: function(){} 	        
});
})); 		 
		 
	$("#ontext").click(function(){
	 $('.btnSubmit').show();	
		
		
	});	 
		 
		 
	 
	});
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profimage')
                    .attr('src', e.target.result)
                    .width(100);
 			$("#ontext").hide();
					
            };

            reader.readAsDataURL(input.files[0]);
        }
    } </script>

 <?php
            if(!isset($user_image)){
 		     redirect('myaccount', 'refresh');
			 break;
			  }					/*========================================*/
 
 ?>
<div style="display:none" id="dialog-confirm" >
  <p>Do you really want to delete this thread?</p>
</div>


<div style="display:none" id="profileupdate" >
  <p>Your profile hasbeen updated</p>
</div>


<div class="container">
<article style="overflow:hidden;" class="page-content">

<div>
 <section class="community-area">
  <p style="float:right; font-family:'SegoeUIRegular'; margin-right:10px;"><?php /*?><a href="<?php echo JEWISH_URL;?>/myaccount/logout" >Log Out</a><?php */?></p>
   <h3>My Account</h3><br />
 <article style="border:0;" class="blog">
  <figure class="profileimage">
   <img class="profimage" style="width:100px;" src="<?php if($user_image){echo  JEWISH_URL.'/'.$user_image;}else{ echo JEWISH_URL;?>/images/no-user.png<?php } ?>" alt=""> 
   <br />
 <img class="loader2" style="position:absolute; left:190px;  display:none;" src="<?php echo JEWISH_URL;?>/images/ajax-loader.gif" />
 <div class="myimg" style="">
<form id="uploadForm" action="upload.php" method="post">
 <label style="font-size:14px" id="ontext" for="fusk">Change Image</label>
 <input name="userImage" id="fusk" type="file" class="inputFile" onchange="readURL(this);" style="display:none" />
 <img id="blah" style="width:100px;display:none" src="#"  />
<input type="submit" style="display:none" value="Confirm" class="btnSubmit" />
</form>  
  


 	<script type="text/javascript">
		$(document).ready(function() {
			
			$("#username").keyup(function(){  
			if($(this).val()==' '){
				$('#response').html('<i style="color:red;">Nickname Can not Blank</i>');
										$('#updaty').prop("disabled",true);
			}
	   	$.ajax({
                      url: '<?php echo JEWISH_URL;?>'+'/login/check_username/?username='+$(this).val(),
                      type: 'POST',
                      success: function(data){
		                    		if(data>0){
										$('#response').html('<i style="color:red;">Nickname Not Available, may be taken by you</i>');
									}else{
										$('#response').html('<i style="color:green;">Nickname Available</i>');								
									}
                             }
                  });
			
	   }); 
	 

 			/*$("#various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				
			});*/
			
			
			
			
			
			});
</script>

 



 


  </figure>
  <div class="blogright">
  
           <?php 
   $user_log=$this->session->userdata('logged_in');?>
   <div class="userprofile">User Information <p class="edituser">Edit</p></div>
            <article style="padding:10px 0 5px 10px;" class="page-content userdetails">
            <div class="info">
            <?php
			if($userinformation){
			  $user = unserialize($userinformation);
			}
			?>
            
            
             <ul>
              <li>
              <label>Nickname : </label>
              <div class="inform"><?php if($user['username']){echo $user['username']; }else{ $ar=$this->modlogin->fetch_username($user_log['user_id']);
			  echo $ar[0]['username']; }?></div>
              </li>
              <li>
              <label>Email : </label>
              <div class="inform"><?php echo $user_log['email'];?></div>
              </li>
              <li>
              <label>Address : </label>
              <div class="inform"><?php if($user['address']){echo $user['address']; }else{ echo 'none'; }?></div>
              </li>
              <li>
              <label>State : </label>
              <div class="inform"><?php if($user['state']){echo $user['state']; }else{ echo 'none'; }?></div>
              </li>
              <li>
              <label>Country : </label>
              <div class="inform"><?php if($user['country']){echo $user['country']; }else{ echo 'none'; }?></div>
              </li>
              <li>
              <label>About : </label>
              <div class="inform"><?php if($user['about']){echo $user['about']; }else{ echo 'none'; }?></div>
               </li>
             </ul>
             </div>
           <div class="addinformation"  style="display:none"> 
           <form action="" method="post" id="updateform" enctype="multipart/form-data">
            <ul>  
              <li>
              <label>Nickname : </label><i id="response" ></i>
              <input type="text" name="username" id="username" value="<?php if($user['username']){echo $user['username']; }else{ $ar=$this->modlogin->fetch_username($user_log['user_id']);
			  echo $ar[0]['username']; }?>" readonly="readonly"/>
              </li>
              <li>
              <label>Email : </label>
              <input type="text" name="email" readonly="readonly" id="email" value="<?php echo $user_log['email'];?>" />
              </li>
              <li>
              <label>Address : </label>
              <input type="text" name="address" id="address" value="<?php echo $user['address']; ?>" />
              </li>
              <li>
              <label>State : </label>
              <input type="text" name="state" id="state" value="<?php echo $user['state']; ?>" />
              </li>
              <li>
              <label>Country : </label>
              <input type="text" name="country" id="country" value="<?php echo $user['country']; ?>" />
              </li>
              <li>
              <label>About : </label>
              <textarea name="about" id="about"><?php echo $user['about']; ?></textarea>
               </li>
               <li><input type="submit" name="update" value="Update" id="updaty"/> </li>
            
            
            
            </ul>
           </form>
                   
           
           
           
           </div>
           
           
            
           
         
         </article>
         <br />
<div id="tabs">
  <ul>

    <li><a href="#tabs-1">Forum</a></li>
    <li><a href="#tabs-2">Classified</a></li>
    <li><a href="#tabs-3">Business Directory</a></li>
    <li><a href="#tabs-4">Change Password</a></li>
  </ul>
  <div id="tabs-1">
			<div id="paging_container3">
    <section style="position:relative;" class="forums-post">  
 <img class="loader" style="position:absolute; top:-10px; left:300px; display:none;" src="<?php echo JEWISH_URL;?>/images/ajax-loader.gif" />
  <ul class="alt_content">

 <?php
  // echo $this->uri->segment(3);
 if($forumdata>0){
    foreach($forumdata as $ky=>$val)
  {
  ?> 

  <?php
   for($i=0;$i<sizeof($forumdata[$ky]);$i++)
  {
 	    ?>
  
  
       <li id="forums-post<?php echo $forumdata[$ky][$i]['forum_id'] ?>"><figure style="display:none;" class="thum2"><img width="50" height="50" src="<?php echo JEWISH_URL;?>/<?php echo $forumdata[$ky][$i]['forum_author_image'] ; ?>" alt=""></figure>
       <h4><a href="<?php echo JEWISH_URL;?>/forum/<?php echo strtolower($ky); ?>/<?php echo $forumdata[$ky][$i]['forum_slug'] ; ?>"><?php echo $forumdata[$ky][$i]['forum_name'] ; ?></a><br><span><?php echo strtolower($ky); ?></span></h4>
       <h5>
         <img id="<?php echo $forumdata[$ky][$i]['forum_id'] ?>" class="mydata" style="float:right; margin-top:8px;" src="<?php echo JEWISH_URL;?>/images/cross.png" />
       <span><?php  echo $forumdata[$ky][$i]['forumcomment_count'] ;?></span><?php  echo $forumdata[$ky][$i]['forum_modified_date'] ;?>
       </h5>
       </li>
       <?php }?>
        <?php }}else{ ?>
 <p>Sorry no threads found.</p>
       <?php } ?>
           </ul>

</section>
<div class="alt_page_navigation"></div>
  </div>
  </div>
  <div id="tabs-2">
    <p>For your Classified profile's edite and private messages click below</p>
   <p style="color:blue;"><a href="<?php echo JEWISH_URL;?>/myaccount/classified_profilelist/">Click Here for classified listing</a></p>
   <p style="color:blue;"><a href="<?php echo JEWISH_URL;?>/myaccount/classified_message/received/">Click Here for Private Messages</a></p>
  </div>
  <div id="tabs-3">
   <p>For your Business profile's edite, review, and private messages click below</p>
   <p style="color:blue;"><a href="<?php echo JEWISH_URL;?>/myaccount/business_profilelist/">Click Here for your business listing</a></p>
   <?php /*?><p style="color:blue;"><a href="<?php echo JEWISH_URL;?>/myaccount/business_reviews/">Click Here for your reviews</a></p><?php */?>
   <p style="color:blue;"><a href="<?php echo JEWISH_URL;?>/myaccount/directory_message/received/">Click Here for Private Messages</a></p>

  </div>
  <div id="tabs-4">
  	<a href="<?php echo JEWISH_URL;?>/myaccount/change_pwd">Click here to Change Password</a>
    <?php /*?><div id="paging_container3">
    	<section style="position:relative;" class="forums-post">  
        <section class="loginBox">
                <h4 class="ban">Change Password</h4>
           <?php $attributes = array('class' => 'rpm', 'id' => 'rpsd');
                   echo form_open(JEWISH_URL.'/login/change_password/', $attributes); ?>
                <input type="hidden" name="u_id" value="<?php echo $user_log['user_id'];?>"/>
				<p>
                    <label for="inputEmail">Old Password:</label>
                    <input type="password" id="username" name="old_pwd" value="" maxlength="64" required="required">
                    <i id="response" ></i>
                </p>
                <p>
                    <label for="inputEmail">Enter Password:</label>
                    <input type="password" id="pwd" name="pwd" value="" maxlength="64" required>
                </p>
                <p>
                    <label for="inputEmail">Retype Password:</label>
                    <input type="password" id="rpwd" name="rpwd" value="" maxlength="64" required>
                </p>
                <p id="alm" style="color:red;font-weight:bold;margin-left:250px;"></p>
                <p>
                
                    <label>&nbsp;</label>
                    <button type="submit" id="resemblance">Submit</button>
                </p>
               <?php echo form_close(); ?> 
            </section>
        </section>
    </div><?php */?>
  </div>
</div>         
         
         
         
         
         
         
         
   </div>
 </article>
 
  </section>
</div>

 </article>
</div>
