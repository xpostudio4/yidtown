 <script src="<?php echo JEWISH_URL;?>/js/ckeditor/ckeditor.js" type="text/javascript"></script>

<script>
 $(document).ready(function(){
	// alert('dsfsdaff');
   $(".comreply").click(function(){
   $(".comrdesc").hide();
   var comre=$(this).attr('id');
   $('.'+comre).toggle('slow');
  	  });

  $(".editme").click(function(){
 	$(".community-area").show();

	});
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   return regex.test(email);
}
	$(".checking").click(function(){
		$(".loader").show();
	 var fcomment_name = $("#fcomment_name").val();
		if(fcomment_name){
			var fcomment_email = $("#fcomment_email").val();
  			if(IsEmail(fcomment_email)){
  			  $.ajax({
				  type: 'post',
				  url: "<?php echo site_url('forum/commentlogin'); ?>",
				  data:'fcomment_name='+fcomment_name+'&fcomment_email='+fcomment_email,
				  success: function (data) {

				  //   alert(data);

  				  if(data==2)
				  {
	             $(".loader").hide();
				 $(".errorall").html('Your email id / username is mismatched');
                      return false;

				  }

				  //alert('form was submitted');
				   var extra=$(".extra").html();
				   $(".nextsection").html(extra);
				   $(".firstsection").hide();
				  $(".loader").hide();
 				  $(".comment-reply-title").hide();
				location.reload();
				   }
				  });
			}
			else{
						$(".loader").hide();
				 $(".errorall").html('Please insert  a valid email id');
  			}
		}
	 else{
	  $(".loader").hide();
      $(".errorname").html('Please insert your username');
	 }
 	});

 	$(".replysubmit").on('submit', function (e) {
		 var did =$(this).attr('id');
 		e.preventDefault();
		var kdd = $("#"+did).serialize();
	  //	alert(kdd);
 			$.ajax({
				type: 'post',
				url: "<?php echo site_url('forum/replysubmit'); ?>",
				data: $("#"+did).serialize(),
				success: function (data) {
				 //	alert(data);
				location.reload();
				//$("#preview_form").resetForm();
				}
			});
 	});



	$("#insertcomment").on('submit', function (e) {
		//alert($(".myform").attr('title'));
 		e.preventDefault();
		var kdd = $("#insertcomment").serialize();
	//	alert(kdd);
			$.ajax({
				type: 'post',
				url: "<?php echo site_url('forum/insert_forum'); ?>",
				data: $('#insertcomment').serialize(),
				success: function (data) {
				//	alert(data);
				location.reload();
				//$("#preview_form").resetForm();
				}
			});
 	});





  });




</script>



 <div class="container">
 <article class="page-content">
  <ul class="page-nav">
    <li><a href="<?php echo JEWISH_URL;?>">homepage></a></li>
    <li><a href="<?php echo JEWISH_URL;?>/forum/">community Forums</a></li>
  </ul>
<ul class="page-navi">
 <li>Community <span>Forums</span></li>
 <?php
    $this->uri->segment(2);



 //print_r($catd);
 for($i=0;$i<sizeof($catd);$i++)
 {
	 $catname = $catd[$i]->f_cat_name;
	 if($catd[$i]->f_cat_slug == $this->uri->segment(2)){
	echo "<li><a class='selected'>".$catd[$i]->f_cat_name."</a></li>" ;
	 }
	 else{
	echo "<li><a href='".JEWISH_URL."/forum/".$catd[$i]->f_cat_slug."'>".$catd[$i]->f_cat_name."</a></li>" ;
	 }
 }

 ?>


 </ul>
 <?php
 if($this->session->userdata('logged_in'))
 {
 ?>
<a href='<?php echo JEWISH_URL;?>/forum/yourthreads'><div class="yourpost">Your Threads</div></a>
<?php }
 else
 {
 ?>
<a href='<?php echo JEWISH_URL;?>/login/redirect/?redirect=<?php echo JEWISH_URL;?>/forum/yourthreads'><div class="yourpost">My Threads</div></a>
<?php }?>

<a href='<?php echo JEWISH_URL;?>/forum/newthreads'><div class="createpost">Create Post</div></a>

<div class="content-left">
<?php
  if(!$this->uri->segment(3)){

?>
 <section class="forums-post">
 <?php
  // echo $this->uri->segment(3);

    foreach($forumdata as $ky=>$val)
  {
   if($this->uri->segment(2)==strtolower($ky)){
  ?>

 <h3><a href="<?php echo JEWISH_URL;?>/forum/<?php echo strtolower($ky); ?>/"><?php echo $ky;  ?></a></h3>
  <ul>
  <?php

   for($i=0;$i<sizeof($forumdata[$ky]);$i++)
  {
 	    ?>


       <li>       <h4><a href="<?php echo JEWISH_URL;?>/forum/<?php echo strtolower($ky); ?>/<?php echo $forumdata[$ky][$i]['forum_slug'] ; ?>"><?php echo $forumdata[$ky][$i]['forum_name'] ; ?></a><br><span><?php echo strtolower($ky); ?></span></h4>
       <h5><span><?php  echo $forumdata[$ky][$i]['forumcomment_count'] ;?></span><?php
	   $yrdata= strtotime($forumdata[$ky][$i]['forum_modified_date'] ); echo date('m/d/Y', $yrdata); ?></h5>
       </li>
       <?php }} ?>
    </ul>

       <?php } ?>
</section>
<?php }
 if($this->uri->segment(3)){
	  $user_log=$this->session->userdata('logged_in');
 	 ?>
<section class="community-area">
 <p class="qus"><a href="<?php echo JEWISH_URL;?>/forum/"><?php echo $forumdata['forum_name'];?></a></p>
  <h3 style="float:left; margin-left:0; margin-bottom:10px;"><?php echo $forumdata['forum_name'];?></h3><br />
 <?php
   if($user_log['user_id']==$forumdata['forum_author_id']){
 ?>

  <div class="editme">Edit</div>
  <?php }?>

  <div style="clear:both"></div>

 <?php
  if($user_log['user_id']==$forumdata['forum_author_id']){

//echo $this->router->fetch_method();
 ?>
<section style="display:none;" class="community-area">

<div class="commentrespond">
       <?php
			//print_r($user_log); $user_log['user_id']
			 $date = date('20y-m-d h:i:s', time());

	  ?>
   <div class="borderunder"></div>

<form action="" method="post">
    <p class="comment-form-author">
        <label for="author">Topic Name <span class="required">*</span></label><br />
        <input id="author" name="forum_name" type="text" value="<?php echo $forumdata['forum_name'];?>" size="30" aria-required="true">
    </p>
     <p class="comment-form-email">
        <label for="email">Type of Topic <span class="required">*</span></label> <br />
        <select name="forum_cat">
         <option <?php if($forumdata['forum_cat']==1)echo "selected='selected'";?> value="1">Questions</option>
        <option <?php if($forumdata['forum_cat']==2)echo "selected='selected'";?> value="2">Announcements</option>
        <option <?php if($forumdata['forum_cat']==3)echo "selected='selected'";?> value="3">Discussions</option>
        <option <?php if($forumdata['forum_cat']==4)echo "selected='selected'";?> value="4">Chitchat</option>
        </select>
     </p>
   <input type="hidden" name="forum_id" value="<?php echo $forumdata['forum_id'] ?>" />
   <input type="hidden" name="forum_modified_date" value="<?php echo $date ?>" />
     <p class="comment-form-comment">
        <label for="comment">Comment</label><br />
        <textarea id="comment" required='required' name="forum_content" class="ckeditor" cols="45" rows="8" aria-required="true"><?php echo $forumdata['forum_content'];?></textarea>
    </p>
     <p class="form-submit">
    <input name="threadupdate" type="submit" id="submit" value="Update">
     </p>
</form>

</div>
<!-- <h2><span>0</span>Responses</h2>
--> </section>


  <?php }?>


 <article class="blog">
   <div class="blog-right">
   <h5><span><?php  echo $forumdata['forum_author'];  ?></span> &nbsp; <?php $yrdata= strtotime($forumdata['forum_modified_date']); echo date('m/d/Y', $yrdata); ?> </h5>
   <p><?php echo $forumdata['forum_content'];?></p>
   <!--<h6><a href="#">Translate</a></h6>-->
   </div>
 </article>
    <div>
      <?php
           $user_log=$this->session->userdata('logged_in');
			     if(isset($user_log['user_id']) && !empty($user_log['user_id'])){
       ?>
         <h3 class="m-mail"><a href="#" id="pvt_msg_but">Message <?php echo $forumdata['forum_author']; ?></a></h3>
        <?php }else {?>
          <h3 class="m-mail"><a href="<?php echo JEWISH_URL;?>/login/redirect/?redirect=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" id="">Message <?php echo $forumdata['forum_author']; ?></a></h3>
        <?php }?>
        <!--Private message-->
          <div class="private_msg" id="private_msgy" style="display:none;"> <!--<h2>Message to Advertiser</h2>-->
            <form method="post" id="prvt_msgf" >
              <textarea name="message" class="pmsg" id="msgbox" required="required"></textarea>
              <input type="hidden" name="post_id" value="<?php echo $this->allencode->encode($forumdata['forum_id'])?>"/>
              <input type="hidden" name="poster_id" value="<?php echo $this->allencode->encode($forumdata['forum_author_id']);?>"/>
              <input type="hidden" name="post_type" value="FR"/>
              <input type="submit" name="b_submit" value="Submit" id="b_submity">
            </form>
          </div>
                <p id="msp"></p>
        <!--Private message-->
    </div>

 <h2><span><?php echo sizeof($forumcomment); ?></span>Responses</h2>
 <div class="borderunder"></div>
 <?php
  if($this->uri->segment(3)){
      for($i=0;$i<sizeof($forumcomment);$i++)
  {
  ?>

    <article style="border:0px" class="blog">
        <figure class="thum1">
        <img width="40" src="<?php if($forumcomment[$i]['forum_author_image'])
		{echo $forumcomment[$i]['forum_author_image'];}else{ echo JEWISH_URL;?>/upload/nouser.png<?php }?>" alt=""></figure>
        <div class="blog-right">
            <h5><span><?php echo $forumcomment[$i]['fcomment_name']; ?></span> </h5>
            <p><?php echo $forumcomment[$i]['fcomment_desc']; ?></p>
            <p
             <?php

			 if(!$this->session->userdata('comuser_name')&&!$this->session->userdata('logged_in')) {?>
              title="Please login and reply comment"
             <?php }?>
             id="comrply<?php echo $i; ?>" class="comreply">Reply <img src="<?php echo JEWISH_URL;?>/images/arrow-d.png" /></p>
        </div>
    </article>
       <?php
		if($this->session->userdata('comuser_name')||$this->session->userdata('logged_in')){
			$sesval = $this->session->userdata('comuser_name');
            $user_log=$this->session->userdata('logged_in');
			//print_r($user_log);
	  ?>

        <div style="display:none" class="commentrespond comrdesc comrply<?php echo $i; ?>">
            <form action="" id="replysubmit<?php echo $i;?>" class="replysubmit"  method="post">
                <p class="comment-form-author">
                <!--                <label for="author">Name <span class="required">*</span></label><br />
                --><input id="author" name="reply_name" class="reply_name" type="hidden" value="<?php if($user_log['username']){echo $user_log['username'];}else{ echo $sesval['comuser_name'];  echo $user_log['username'];}?>" size="30" aria-required="true">
                </p>

                <p class="comment-form-email">
                <!--<label for="email">Email <span class="required">*</span></label> <br />
                --><input id="email" name="reply_email"  class="reply_email" type="hidden" value="<?php if($user_log['email']){echo $user_log['email'];}else {echo $sesval['comuser_email']; echo $user_log['email'];}?>" size="30" aria-required="true">
                </p>
                <input type="hidden" name="fcomment_id" class="fcomment_id"  value="<?php echo $forumcomment[$i]['fcomment_id']; ?>" /> 
                <p class="comment-form-comment">
                <label for="comment">Reply On Comment</label><br />
                <textarea id="comment" required='required' name="reply_desc" class="reply_desc cinput3_ required" cols="45" rows="8" aria-required="true"></textarea>
                </p>

                <p class="form-submit">
                <input name="replysubmit"  class="myform formreply" title="replysubmit<?php echo $i;?>" type="submit" id="<?php echo $forumcomment[$i]['fcomment_id']; ?>" value="Post Comment">
                </p>
            </form>
        </div>


   <?php } ?>

   <?php
   if($forumcomment[$i]['fcomment_reply']){
    $rp = unserialize($forumcomment[$i]['fcomment_reply']);
   for($j=0;$j<sizeof($rp);$j++){
   ?>
    <article style="border:0px; margin-left:90px; padding-bottom:15px; border-bottom:1px #f1f1f1 solid;" class="blog">
        <figure class="thum1">
        <img width="40" src="<?php //if($rp[$i]['forum_author_image'])
		//{echo $rp[$i]['forum_author_image'];}else{
		echo JEWISH_URL;?>/upload/nouser.png<?php //}?>" alt=""></figure>
        <div style="width:450px;" class="blog-right">
            <h5><span><?php echo $rp[$j]['reply_name']; ?></span> </h5>
            <p><?php echo $rp[$j]['reply_desc']; ?></p>
         </div>
    </article>
   <?php }}?>

   <div id="temp_<?php echo $forumcomment[$i]['fcomment_id']; ?>"></div>

   <div class="borderunder"></div>

 <?php }?>


<div class="commentrespond">
       <?php
 //$this->session->sess_destroy()
	//	if(isset($user_log['user_id'])||$useremail=''){
			//print_r($user_log);
  $sesval = $this->session->userdata('comuser_name');
  if(!$sesval['comuser_email']&&!$user_log['email']){
	  ?>
 <h3 class="comment-reply-title">To reply on this topic choose an option below</h3> <?php }?>
      <img class="loader" style="  position: absolute;left: 5px;top: 29px; display:none; " src="<?php echo JEWISH_URL;?>/images/ajax-loader.gif" />


<div class="m-forumcat-page-form-wrap clearfix">

<div class="m-forumcat-page-form-left">
<form action="" method="post" id="insertcomment">
<?php
  if(sizeof($this->session->userdata('comuser_name'))){
  $sesval = $this->session->userdata('comuser_name');
  $user_log=$this->session->userdata('logged_in');
  }
?>
<div class="firstsection">
   <?php if(!$sesval['comuser_email']&&!$user_log['email']){ ?>
    <p class="comment-form-author">
        <label for="author"><small style="font-size:10px;">To remain anonymous, choose a unique nickname:</small><br>Nickname <span class="required">*</span></label></p>
		<p style="color:#F00" class="errorname"></p>
		<?php }?>
        <input id="fcomment_name" required name="fcomment_name" <?php if($sesval['comuser_email']||$user_log['email']){ echo 'type="hidden"';}else{?> type="text"<?php }?> value="<?php if($sesval['comuser_name'] && $user_log['username']){echo $user_log['username'];}else{ echo $sesval['comuser_name'];  ?><?php echo $user_log['username']; } ?>" size="30" aria-required="true" style="margin:0px;">

  <?php if(!$sesval['comuser_email']&&!$user_log['email']){ ?>
    <p class="comment-form-email">
        <label for="email">Email <span class="required">*</span> <small style="font-size:10px;">Your email address will never be shown</small></label></p>
		<p style="color:#F00" class="errorall erroremail"></p>
		<?php }?>
        <input id="fcomment_email" name="fcomment_email"  <?php if($sesval['comuser_email']||$user_log['email']){ echo 'type="hidden"';}else{?> type="text"<?php }?> value="<?php if($sesval['comuser_email'] && $user_log['email']){echo $user_log['email'];}else{  echo $sesval['comuser_email'];  ?><?php echo $user_log['email']; } ?>" size="30" aria-required="true" style="margin:0 0 5px 0;">
         <?php if(!$sesval['comuser_email']&&!$user_log['email']){ ?> <!--<div class="text-or" style="float:right; margin:0px; padding-top:60px; border-left:#000 solid 2px; padding-left:50px; height:140px; top:-161px; left:104px;><span style="padding-right:5px; font-weight:bold;font-size:17px; ">OR </span> <a style="font-weight:bold; color:#57e2ca" href="<?php //echo JEWISH_URL;?>/login/redirect/?redirect=<?php //echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>"">Login</a> to your account and reply on the topic and track your comment and enable comment editing</div>--> <?php }?>

   <input type="hidden" name="forum_id" value="<?php echo $forumdata['forum_id']; ?>" />
   <?php if(!$sesval['comuser_email']&&!$user_log['email']){?> <div class="checking">Go</div><small style="font-size:10px; margin:-38px 0 0 46px; float:left;">You can login again with the same nickname and email ID combination.</small><?php } ?>
   </div>
    <div class="nextsection" >


    <?php
 	  if($sesval['comuser_email']||$user_log['email']){

		?>
    <p class="comment-form-comment">
        <label for="comment">Text</label><br />
        <textarea id="comment" required='required' name="fcomment_desc" cols="45" rows="8" aria-required="true"></textarea>
    </p>

    <p class="form-submit">
    <input name="submit" type="submit" id="submit" value="Post Comment">
     </p> <?php } ?>
     </div>
</form>
</div>

<div class="m-forumcat-page-form-right">
  <div class="text-or"><span style="padding-right:5px; font-weight:bold;font-size:17px; ">OR </span> <a style="font-weight:bold; color:#57e2ca" href="<?php echo JEWISH_URL;?>/login/redirect/?redirect=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>"">Login</a> to your account and reply on the topic and track your comment and enable comment editing</div>
</div>
</div>


<div style="display:none" class="extra">
    <p class="comment-form-comment">
        <label for="comment">Comment</label><br />
        <textarea id="comment" required='required' name="fcomment_desc" cols="45" rows="8" aria-required="true"></textarea>
    </p>						 
                                                    
    <p class="form-submit">
    <input name="submit" type="submit" id="submit" value="Post Comment">
     </p>

</div>



<?php //}
 //else{ ?>
<!-- <h3 class="comment-reply-title"><a style="color:#00F; text-decoration:underline" href="<?php echo JEWISH_URL;?>/login?redirect=<?php echo current_url(); ?>">login</a> your account and reply on the topic </h3>
-->

<?php //}?>

</div> 
<!-- <h2><span>0</span>Responses</h2>
--> </section>

<?php }

}?>




</div>
<?php include('sidebar.php'); ?>



 <div class="clear"></div>
 </article>
</div>


