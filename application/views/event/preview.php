<script>console.log('view/event/preview.php');</script>
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/addpost.css">



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

  <?php //echo $id;

  //echo $post_mail;?>



<?php $attributes = array('id' => 'addpost');

                   echo form_open_multipart('post/publish/', $attributes);

				   ?>

  <?php



$query = $this->db->query("SELECT * FROM post WHERE id='".$id."'");

foreach ($query->result_array() as $row){

	?>





    <div class="post_title"> <?php  echo $row['post_title']?><?php echo '( '.$this->citymod->fetch_single_city($row['geo_area']).' )'?><?php echo '( '.$row['contact_phone'].' )'?></div>

    <br/>

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

          <div class="post_content"><h2>Event Date & Duration</h2>

     <table width="" border="0" cellspacing="0" class="gradienttable">

     <tr>

     <td><p>Event Date</p></td>

     <td><p><?php echo $this->postmod->get_post_meta_event($id,'start_date')?> /

     <?php echo $this->postmod->get_post_meta_event($id,'start_month')?> / <?php echo $this->postmod->get_post_meta_event($id,'event_year')?></p></td>

     </tr>

       <tr>

     <td><p>Event Duration</p></td>

     <td><p><?php echo $this->postmod->get_post_meta_event($id,'event_duration').' &nbsp;Day(s) ';?></p></td>

     </tr>

     </table>

     </div>

     <div class="post_content"><?php echo $row['post_content']?></div>

 <?php } ?>

 <input type="hidden" name="post_id" value="<?php echo $id;?>"/>

 <input type="hidden" name="client_mail" value="<?php echo $post_mail;?>"/>

 <input type="hidden" name="type" value="event"/>

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

<?php echo  $this->allencode->encode($post_mail);?>/event/" ><input type="button" value="Edit This Post" class="edit_post_btn" /></a>

<a href="<?php echo JEWISH_URL;?>/post/delete/<?php echo $this->allencode->encode($id);?>/<?php echo $this->allencode->encode($post_mail);?>"><input type="button" value="Delete This Post" class="delete_post_btn" /></a>

<?php echo form_close();?>

</div>

</section>

</article>

</div>
