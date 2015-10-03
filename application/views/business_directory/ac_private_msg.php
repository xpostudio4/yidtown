<script>console.log('view/business_directory/ac_private_msg.php')</script>
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/business.css">
<style>
.forums-post ul li {
  overflow: hidden;
  padding: 8px 0 9px;
  margin: 0px 0 0;
}
.forums-post ul li h4 {
  width: 373px;
}
</style>
<script>
jQuery(document).ready(function($) {
 
	$("#<?php echo $this->uri->segment(2)?>").css('background','#c0fbd8');
	$("#<?php echo $this->uri->segment(3)?> > a").css({'color':'#57e2ca','font-weight':'bold'});
	$("#<?php echo $this->uri->segment(3)?>").addClass('msg_active');
	$("#<?php echo $this->uri->segment(2)?>").addClass('msg_active_title');
	$("#<?php echo $this->uri->segment(2)?> > a").css({'font-weight':'bold'});
});
</script>
<?php
$type='';
 if($this->uri->segment(2)=='directory_message')
        { $type='BD';}else{ $type='CL';
		}
		$user_log=$this->session->userdata('logged_in');
	?>
<div class="container">
 <article class="page-content">
   <ul class="page-nav">
    <li><a href="<?php echo JEWISH_URL;?>/myaccount/">My Account</a></li>
    <li> > <a href="<?php echo JEWISH_URL;?>/myaccount/classified_message/<?php echo $this->uri->segment(3)?>/">Messages</a></li>
    <li> > <a href="<?php echo JEWISH_URL;?>/myaccount/directory_message/<?php echo $this->uri->segment(3)?>/">
	<?php echo ucfirst($this->uri->segment(3)=='read' ? 'sent' : 'received');?></a></li>
  </ul>
  <p></p>
<section class="forums-post">
 <h3> Messages </h3>
<div class="pvrm">
<div class="msg_left">
 <span class="tabber_2" id="classified_message"><a href="<?php echo JEWISH_URL;?>/myaccount/classified_message/received/" class="">CLASSIFIED </a>
 </span>
  <span class="tabber_2" id="directory_message"><a href="<?php echo JEWISH_URL;?>/myaccount/directory_message/received/" class="">BUSINESS DIRECTORY</a> </span>
  </div>
  <div class="msg_right">
  <span class="tabber" id="received"><a href="<?php echo JEWISH_URL;?>/myaccount/<?php echo $this->uri->segment(2)?>/received/" class="">Received(<b><?php echo $this->businessmod->count_comment($type,'received',$user_log['user_id'])?></b>)</a></span>
  <span class="tabber_2" id="read"><a href="<?php echo JEWISH_URL;?>/myaccount/<?php echo $this->uri->segment(2)?>/read/" class="">Sent(<b><?php echo $this->businessmod->count_comment($type,'read',$user_log['user_id'])?></b>)</a></span>
  </div>
  </div>
   
 <div class="message_wrapper">
  <ul>
 
<?php $user_log=$this->session->userdata('logged_in'); //print_r($user_log['user_id']);
 $list=$this->businessmod->get_all_first_comment($user_log['user_id'],'BD',$status);
 $x=1;
 $count='x'.$x;
 foreach($list as $v){?>
       <li id="tread_<?php echo $count;?>" class="splr" data-count="<?php echo $count;?>" data-id="<?php echo $v['id'];?>" data-user="<?php echo $user_log['user_id'];?>"><figure class="thum2"><img src="<?php echo JEWISH_URL;?>/<?php $k=$this->businessmod->get_user_picture($v['user_id']);echo $k[0]['user_image']?>" alt="" height="50" width="50"></figure>
       <h4><span><?php echo strtoupper($this->uri->segment(3)=='read' ? 'to' : 'from')?> : 
	   <?php 
	          if($v['user_id']==$user_log['user_id']){ 
			  $k=$this->businessmod->get_user_picture($v['poster_id']);
		      echo $k[0]['username'];}else{
	          $k=$this->businessmod->get_user_picture($v['user_id']);
		      echo $k[0]['username'];
			  }
		?></span>
       <?php /*?><a ><?php echo 'Messages are following click here to reply';//$v['message'];?></a><br><?php date('jS F Y', $yrdata)*/?>
       <!--<span><a href="#">buying</a></span>-->
       </h4>
       <h5><span>Reply-<?php ?></span><?php  $yrdata= strtotime($v['post_date']); echo date('m/d/Y', $yrdata);?></h5>
       </li>
       <div style="display:none" class="reply_<?php echo $count;?>" id="reply_container">
       <div class="reply_teaxtarea" id="reply_teaxtarea_<?php echo $count;?>">
   <!--    /*=======================*/-->
       <?php /*$re=$this->businessmod->get_all_innitial_comment($user_log['user_id'],'BD',$v['id']); date('jS F Y', $yrdata)
	   foreach($re as $rept){*/?>
	   <div class="box_msg" id="22">
       <p><?php
	   if($v['user_id']==$user_log['user_id']){ echo 'me';}else{
	    $k=$this->businessmod->get_user_picture($user_log['user_id']);
		echo $k[0]['username'];}?></p>
	   <?php echo $v['message'];?><p><?php  $yrdata=strtotime($v['post_date']); echo date('m/d/Y', $yrdata);?></p></div>
	   <?php /*}echo $v['message'];*/ ?>
       
   <!--    /*=======================*/-->  
   <!--    /*=======================*/-->
       <?php $reply=$this->businessmod->fetch_allreply_from_message($v['id']);
	   foreach($reply as $rep){?>
	   <div class="box_msg">
       <p><?php
	   if($user_log['user_id']==$rep['user_id']){ echo 'me';}else{
	    $k=$this->businessmod->get_user_picture($rep['user_id']);
		echo $k[0]['username'];}?></p>
	   <?php echo $rep['message_reply'];?><p><?php  $yrdata= strtotime($rep['reply_date']); echo date('m/d/Y', $yrdata);?></p></div>
	   <?php }?>
       </div>
   <!--    /*=======================*/-->  
       <form method="post" id="reply_form_<?php echo $count;?>" class="reply_form">
       <textarea name="message_reply" required="required" placeholder="Your Reply..." id="msr_<?php echo $count;?>"></textarea>
       <input type="hidden" name="message_id" value="<?php echo $this->allencode->encode($v['id'])?>"/>
       <input type="hidden" name="user_id" value="<?php echo $this->allencode->encode($v['user_id'])?>"/>
       <input type="hidden" name="poster_id" value="<?php echo $this->allencode->encode($v['poster_id']);?>"/>       
       <input type="hidden" name="post_type" value="BD"/>
       <input type="submit" name="b_submit" value="Reply" id="reply_submit">
       </form>
       
       </div>
       <script>
 $(document).ready(function() {
	 	$('#reply_form_<?php echo $count;?>').on('submit',function(kaushik){ //alert(kaushik.text());
			kaushik.preventDefault();
			var oldscrollHeight = $('#reply_teaxtarea_<?php echo $count;?>')[0].scrollHeight; //alert(oldscrollHeight);
			var message=$('#msr_<?php echo $count;?>').val();
	        var other_data = $(this).serialize(); //alert(message);
	     	$.ajax({
                      url: '<?php echo JEWISH_URL;?>'+'/business_directory/bd_private_message_reply/?'+other_data,
                      type: 'POST',
                      success: function(data){
		                    		if(data=='success'){
										$('#reply_teaxtarea_<?php echo $count;?>').append('<div class="box_msg"><p>me</p>'+message+'<p>Just Now</p></div>');
										$('#msr_<?php echo $count;?>').val('');	
										$('#msr_<?php echo $count;?>').attr('value',null);
										var newscrollHeight = $('#reply_teaxtarea_<?php echo $count;?>')[0].scrollHeight;	
										   if(newscrollHeight > oldscrollHeight){ 
                                               $('#reply_teaxtarea_<?php echo $count;?>').scrollTop($('#reply_teaxtarea_<?php echo $count;?>')[0].scrollHeight); 
                                           }
										return false;					
									}
									return false;
                             }
                  });			
			});
});
       </script>
<?php  $x++;
$count='x'.$x;
} ?>                  
   </ul>
  </div> 
   <p>&nbsp;</p>
   <p>&nbsp;</p>
  <script>
$(document).each(function() {
    $(".splr").on('click', function(){ //alert(great.type);
        var count= $(this).data('count');
		var id=$(this).data('id');
		var user=$(this).data('user');
		$('.reply_'+count).slideToggle(500); 

		<?php /*?>	$.ajax({
                      url: '<?php echo JEWISH_URL;?>'+'/business_directory/message_status/'+id+'/'+user+'/',
                      type: 'POST',
                      success: function(data){}
                  });<?php */?>
    });
 });
  </script>
</section>
</article>
</div>
