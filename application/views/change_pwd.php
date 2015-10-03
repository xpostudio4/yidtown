<script>
$(document).ready(function(e) {
     $("#rpsd").submit(function(e){
			var first_pwd=$("#pwd").val();
			   var second_pwd=$("#rpwd").val();
			   if(first_pwd!=second_pwd){
				   e.preventDefault();
				   $("#alm").html("Both password does not matched");
			   }/*else{
				   e.preventDefault();
				   $form_data=$(this).serialize();
				   $.ajax({
                      url: '<?php //echo JEWISH_URL;?>'+'/login/change_password/?'+$form_data,
                      type: 'POST',
					  data:  new FormData(this),
                      contentType: false,
                      cache: false,
                      processData:false,
                      success: function(data){
		                    		if(data=='not_found'){
										
										$('#alm').html('Old password doesnot match, please put a valid Old Password');
									}else{
										/*window.location.href='<?php //echo JEWISH_URL;?>/myaccount/logout';	*/						
									//}
                           //  }
                  //});
			  /* }*/
		});
});
</script>
<?php 
   $user_log=$this->session->userdata('logged_in');?>
<div class="container">
 <article class="page-content">
    	<section style="position:relative;" class="forums-post">  
        <section class="loginBox">
                <h4 class="ban">Change Password</h4>
           <?php $attributes = array('class' => 'rpm', 'id' => 'rpsd');
                   echo form_open(JEWISH_URL.'/myaccount/change_password/', $attributes); ?>
                <input type="hidden" name="u_id" value="<?php echo $user_log['user_id'];?>"/>
				<p>
                    <label for="inputEmail">Old Password:</label>
                    <input type="password" id="username" name="old_pwd" value="" maxlength="64" required="required">
                    <i id="response" ></i>
                </p>
                <p>
                    <label for="inputEmail">Enter New Password:</label>
                    <input type="password" id="pwd" name="pwd" value="" maxlength="64" required>
                </p>
                <p>
                    <label for="inputEmail">Retype New Password:</label>
                    <input type="password" id="rpwd" name="rpwd" value="" maxlength="64" required>
                </p>
                <p id="alm" style="color:red;font-weight:bold;margin-left:250px;"></p>
                <?php if(isset($alerm)){ echo '<p id="alm" style="color:red;font-weight:bold;margin-left:250px;">Old Password Does not match</p>';}?>
                <p>
                
                    <label>&nbsp;</label>
                    <button type="submit" id="resemblance">Submit</button>
                </p>
               <?php echo form_close(); ?> 
            </section>
        </section>
</article>
</div>