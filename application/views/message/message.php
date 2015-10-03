<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/business.css">
<div class="container">
 <article class="page-content">
   <ul class="page-nav">
    <li><a href="<?php echo JEWISH_URL;?>/myaccount/">My Account</a></li>
    <li> > <a href="<?php echo JEWISH_URL;?>/myaccount/messages/">Messages</a></li>
  </ul>
  <p></p>
  <?php $user_log=$this->session->userdata('logged_in'); ?>
<section class="forums-post">
<a class="msg_block msg-btn">CLASSIFIED </a>
  <a class="msg_block msg-btn">BD</a> 
 <div class="message_wrapper">
 	<div class="private_msr">
    
    <?php echo '&nbsp;&nbsp;&nbsp;';?>
    <a href="<?php echo JEWISH_URL;?>/myaccount/classified_message/received/">Received (<b><?php echo $this->businessmod->count_comment('CL','received',$user_log['user_id'])?></b>)</a>
	<?php echo '&nbsp;&nbsp;&nbsp;';?>
    <a href="<?php echo JEWISH_URL;?>/myaccount/classified_message/read/">Sent (<b><?php echo $this->businessmod->count_comment('CL','read',$user_log['user_id'])?></b>)</a>
    </div>
    <div class="private_msr">
  
    <?php echo '&nbsp;&nbsp;&nbsp;';?>
    <a href="<?php echo JEWISH_URL;?>/myaccount/directory_message/received/">Received (<b><?php echo $this->businessmod->count_comment('BD','received',$user_log['user_id'])?></b>)</a>
    <?php echo '&nbsp;&nbsp;&nbsp;';?>
<a href="<?php echo JEWISH_URL;?>/myaccount/directory_message/read/">Sent (<b><?php echo $this->businessmod->count_comment('BD','read',$user_log['user_id'])?></b>)</a>
    </div>
 </div>
</section>
</article >
</div>
<style>
b{
	color:red;
	font-size: 12px;
}
</style>