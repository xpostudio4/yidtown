<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/addpost.css">
<script>console.log('view/housing/preview.php')</script>
<script>
        history.forward();
		$(document).ready(function($) {
            $(".thumb > img").mouseenter(function(){
				var img_url=$(this).attr('src');
				$(".big_image > img").attr('src', img_url);
				})
        });
    </script>

 <div class="container">
 <article class="page-content">
 <section class="body" >
 <div class="posting">
  <?php //echo $id;?>

<?php $attributes = array('id' => 'addpost');
                   echo form_open_multipart('post/publish/', $attributes);
				   ?>
  <?php

$query = $this->db->query("SELECT * FROM post WHERE id='".$id."'");
foreach ($query->result_array() as $row){
	?>

    <div class="parent">
    <span class="big"> <?php
	/*echo '$-'.$this->postmod->get_post_meta($id,'ask').'  /  '; echo $this->postmod->get_post_meta($id,'sqft').'Square Footage  ';*/
	 ?><?php  echo $row['post_title']?></span><span class="small"><?php echo $this->citymod->fetch_single_city($row['geo_area']).',   ';?>
	 <?php echo ''.$row['state'].', '?><?php echo ''.$row['zipcode']?></span>
     </div>

        <?php
	$this->db->select('*');
				   $this->db->where('post_id', $id );
				   $query = $this->db->get('images');
				   $data = $query->result_array();
				   //print_r($data);
				   ?>
   <?php if(empty($data) ){?>
   <div class="big_image"><img src="<?php echo JEWISH_URL;?>/images/not-available.png" height="350" width="500"/></div>
  <?php }else{ ?>
	        <?php $q= $this->db->query("SELECT * FROM images WHERE post_id='".$id."' LIMIT 0,1");

                foreach ($q->result_array() as $img){
             // print_r($q);
?>
    <div class="big_image"><img src="<?php echo JEWISH_URL;?>/upload/<?php echo $img['img'];?>" height="350" width="500"/></div>

<?php	}
  }?>
    <div class="meta_data">



    </div>
    <div style="clear:both;"></div>
    <div class="thumb">
<?php $q= $this->db->query("SELECT * FROM images WHERE post_id='".$id."'");
foreach ($q->result_array() as $img){ ?>
     <img src="<?php echo JEWISH_URL;?>/upload/<?php echo $img['img'];?>" height="50" width="50" class="images"/>
 <?php } ?>
 	</div>
     <div style="clear:both;"></div>
     <div class="post_content"><h2>Property Details</h2><hr><?php echo $row['post_content']?></div>

 <?php } ?>
 <div class="post-btn">
 <span class="prev-button">
 <input type="hidden" name="post_id" value="<?php echo $id;?>"/>
 <input type="hidden" name="client_mail" value="<?php echo $post_mail;?>"/>
  <input type="hidden" name="type" value="housing"/>
 </span>
 <?php $qm= $this->db->query("SELECT `status` FROM post WHERE id='".$id."'");
 foreach ($qm->result_array() as $status){
if($status['status']!=1){ ?>
 <span class="next-button">
 <input type="submit" value="Publish" class="publish"/>
 </span>
<?php
}
} ?>

<a href="<?php echo JEWISH_URL;?>/post/post_edit/<?php echo  $this->allencode->encode($id);?>/
<?php echo  $this->allencode->encode($post_mail);?>/housing/" ><input type="button" value="Edit This Post" class="edit_post_btn" /></a>
<a href="<?php echo JEWISH_URL;?>/post/delete/<?php echo $this->allencode->encode($id);?>/<?php echo $this->allencode->encode($post_mail);?>"><input type="button" value="Delete This Post" class="delete_post_btn" /></a>
</div>
<?php echo form_close(); ?>
</div>
</section>
</article>
</div>
<style>
strong{
	font-weight:bold;
	text-decoration:underline;
	text-transform:capitalize;
}
</style>
<script>
$(document).each(function(santana) {
    $( "td:empty" ).parent().css('opacity','0.3');
/*  .text( "Was empty!" )*/
});
</script>
