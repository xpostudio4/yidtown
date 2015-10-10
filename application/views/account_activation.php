<script>console.log('view/account_activation.php')</script>
<script>
jQuery(document).ready(function($) {
   $("#rpsd").submit(function(e){
	   var first_pwd=$("#pwd").val();
	   var second_pwd=$("#rpwd").val();
	   if(first_pwd!=second_pwd){
		   e.preventDefault();
		   $("#alm").html("Both password does not matched");
	   }else if($("#username").val()==''){
		   e.preventDefault();
		   $("#alm").html("Please set a Unique Nickname");
	   }
	   }); 
	$('#resemblance').prop("disabled",true);   
	$("#username").keyup(function(){  
			if($(this).val()==' '){
				$('#response').html('<i style="color:red;">Nickname Can not Blank</i>');
										$('#resemblance').prop("disabled",true);
			}
	   	$.ajax({
                      url: '<?php echo JEWISH_URL;?>'+'/login/check_username/?username='+$(this).val(),
                      type: 'POST',
                      success: function(data){
		                    		if(data>0){
										$('#response').html('<i style="color:red;">Nickname Not Available</i>');
										$('#resemblance').prop("disabled",true);
									}else{
										$('#response').html('<i style="color:green;">Nickname Available</i>');	
										$('#resemblance').prop("disabled",false);								
									}
                             }
                  });
			
	   }); 
	   
});
</script>
<div class="container">
 <article class="page-content">
 <p>Your account has been activated, please set a <strong>Nickname</strong> & <strong>password</strong> for it</p>
      <?php $attributes = array('class' => 'rpm', 'id' => 'rpsd');
                   echo form_open('login/create_password', $attributes); ?>
                   <input type="hidden" name="u_id" value="<?php echo $user_id;?>"/>
   <section class="loginBox">
                <h4 class="ban">Create a YidTown account</h4>
				<p>
                    <label for="inputEmail">&lowast;Nickname:</label>
                    <input type="text" id="username" name="username" value="" maxlength="64" >
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
                <p>&lowast; Choose a <strong>Nickname</strong> for <strong>Forum</strong> and <strong>Private Message</strong>. You may choose your real name or remain anonymous by choosing a unique Nickname.
</p>
            </section>
        <?php echo form_close(); ?>
 </article>
</div>
<style>
#response{
	float:right;margin-right: 105px;
}
</style>
