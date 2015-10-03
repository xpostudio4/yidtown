<script>console.log('view/event/editpost.php');</script>
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/addpost.css">

<script src="<?php echo JEWISH_URL;?>/js/jquery.maskedinput.js" type="text/javascript"></script>

<div class="container">

<article class="page-content">

<ul class="page-nav">

    <li><a href="<?php echo JEWISH_URL;?>">Homepage</a></li>

    <li> > <a href="<?php echo JEWISH_URL;?>/post/post_edit/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Edite Event Post</a></li>

  </ul>

<?php //echo $email;

//echo $p_id;?>

<section class="body">

<?php $attributes = array('id' => 'addpost');

                   echo form_open_multipart('post/event_postupdate/', $attributes);

				   $this->db->select('*');

				   $this->db->where('id', $p_id );

				   $this->db->where('c_email', $email );

				   $query = $this->db->get('post');

				   $data = $query->result_array();

				 //  echo $this->db->last_query();

				   /*echo '<pre>';

				   print_r( $data);

				   echo '</pre>';*/

				   ?>

 <script>

$(document).ready(function() {

	 $( "#start_month option[value='<?php echo $this->postmod->get_post_meta_event($p_id,'start_month') ?>']" ).attr('selected','selected');

	 $( "#event_duration option[value='<?php echo $this->postmod->get_post_meta_event($p_id,'event_duration') ?>']" ).attr('selected','selected');

	 $( "#event_year option[value='<?php echo $this->postmod->get_post_meta_event($p_id,'event_year') ?>']" ).attr('selected','selected');

	 $( ".city_selectr option[value='<?php echo $data[0]['geo_area'] ?>']" ).attr('selected','selected');

	 $('.select-event').on('click',function(){

	$('.event_cat').slideToggle(500);

	$('.select-event').css({'border':'1px solid #bbb','color':''});

	});



  $('#addpost').submit(function(kaushik){

	var fields=$('.event_cat').find('input[type="checkbox"]:checked');

    if (fields.length== 0)

    {

        $('.select-event').css({'border':'3px solid red','color':'red'});

		$('.select-event').html('Select at least one Event Fature, Click Here');

       kaushik.preventDefault();

    }



	});

	$("#contact_phone").mask("(999) 999-9999");

		 $('Select option').each(function(){

      $(this).text($(this).text().charAt(0).toUpperCase() + $(this).text().slice(1));

    });

	 });

</script>













        <div class="posting fields">

                 <div class="main-area">Contact Information</div>

                    <div class="top-area">

                    <label >

        <div class="label">Your Name</div>

        <input type="text" value="<?php echo $data[0]['contact_name']?>" name="contact_name" id="contact_name" size="16" maxlength="32" tabindex="1">

    </label>

                    <label >

        <div class="label">Phone</div>

        <input type="text" class="std" value="<?php echo $data[0]['contact_phone']?>" name="contact_phone" id="contact_phone" size="10" maxlength="16" tabindex="1" pattern="(?:\(\d{3}\)|\d{3})[- ]?\d{3}[- ]?\d{4}">

    </label>

                    </div>

                    <div class="top-area">

                     <label>

<div class="label">Email</div>

<input tabindex="1" type="text" class="req df dv" id="c_email" name="c_email" placeholder="Your email address" maxlength="60" autocapitalize="off"

value="<?php echo $data[0]['c_email']?>">

</label>

                     <label>

<div class="label">Confirm Email</div>

<input tabindex="1" type="text" class="req df dv" id="cc_email" name="cc_email" placeholder="Type email address again" maxlength="60" autocapitalize="off" value="<?php echo $data[0]['c_email']?>">

 </label>

                   </div>

                    <div style="clear:both;"></div>

        <input type="hidden" value="<?php ?>" name="user_id"  />

    <input type="hidden" value="<?php echo $data[0]['id']?>" name="post_id"  />

 <input type="hidden" name="id" value="<?php echo $p_id;?>"  />

<?php /*?>  <input type="hidden" name="object_id" value="<?php echo $this->postmod->get_catid_by_postid($p_id);?>"  />

  <input type="hidden" name="cat_id" value="<?php echo $this->postmod->get_catid_by_postid($p_id);?>"  /> <?php */?>



          <div class="main-area-two">



               <label class="date-start"><div class="label">Start Date</div>

                    <input min="1" max="31" type="number" name="start_date" value="<?php echo $this->postmod->get_post_meta_event($p_id,'start_date') ?>" class="sp2" required="required" style="height:31px;margin-top:0px;">

            	</label>



                <label><div class="label">Start month</div>

                    <select name="start_month" id="start_month" required="required">

                        <option value="1">Jan</option>

                        <option value="2">Feb</option>

                        <option value="3">Mar</option>

                        <option value="4">Apr</option>

                        <option value="5">May</option>

                        <option value="6">Jun</option>

                        <option value="7">Jul</option>

                        <option value="8">Aug</option>

                        <option value="9">Sep</option>

                        <option value="10">Oct</option>

                        <option value="11">Nov</option>

                        <option value="12">Dec</option>

                    </select>

                </label>

  <label> <div class="label">Event Year</div>

                    <select name="event_year" id="event_year">

                    <?php for($i=2015;$i<=2025;$i++){?>

                    <option value="<?php echo $i;?>"><?php echo $i;?></option>

                    <?php } ?>

                    </select>

                    </label>

                <label><div class="label">Event Duration</div>

                <select name="event_duration" id="event_duration" required="required">

                    <option value="1">1 day</option>

                    <option value="2">2 days</option>

                    <option value="3">3 days</option>

                    <option value="4">4 days</option>

                    <option value="5">5 days</option>

                    <option value="6">6 days</option>

                    <option value="7">7 days</option>

                    <option value="8">8 days</option>

                    <option value="9">9 days</option>

                    <option value="10">10 days</option>

                    <option value="11">11 days</option>

                    <option value="12">12 days</option>

                    <option value="13">13 days</option>

                    <option value="14">14 days</option>

                </select>

	        </label>

        </div>





            <span  id="main-area">Event Details</span>

            <div class="main-area-three">

                <label >

                    <div class="label">Posting Title</div>

                    <input tabindex="1" type="text" name="post_title" id="PostingTitle" maxlength="70" value="<?php echo $data[0]['post_title']?>">

                </label>

             </div>

              <div class="top-area">

                <label ><div class="label">City</div>

                  <select name="geo_area" class="city_selectr">

                      <option value="">Select City</option>

                      <?php $get_city=$this->citymod->fetch_city();

                      foreach($get_city as $v){?>

                      <option value="<?php echo $v['id']?>"><?php echo $v['name']?></option>

                      <?php }?>

                </select></label>

               </div>

                <div class="top-area">

                <label >

                    <div class="label">Zip</div>

                    <input type="text" id="postal_code" name="zipcode" size="6" maxlength="15" value="<?php echo $data[0]['zipcode']?>">

                </label>

            </div>

            <div class="main-area-three">

                       <label> <div class="label">State</div>

                        <input tabindex="1" type="text" name="state" id="PostingTitle" maxlength="70" value="<?php echo $data[0]['state']?>" required="required">

                        </label>

                </div>

			<div style="clear:both;"></div>

             <div class="main-area-three">

                <label>

                    <span class="label">Your Event Description</span>

                    <textarea class="req" tabindex="1" rows="10" id="PostingBody" name="post_content"><?php echo $data[0]['post_content']?></textarea>

                </label>

            </div>





<?php

                   $this->db->select('*');

				   $this->db->where('post_id', $p_id );

				   $query = $this->db->get('event_post_meta');

				   $data = $query->result_array();

				   //echo $this->db->last_query();

?>



            <div class="row fields">



            </div>







            <div class="row" id="copyAssign">



            </div>



            <div id="uploader">

            <h5 class="upl">Update Job Images</h5><br />

<input name="post_images[]" type="file" id="uploader" multiple="multiple">

<em> you can select multiple image by pressing Ctrl</em>

</div>

<script>

$(document).ready(function() {

		$(".uploaded >a").on('click',function(e){

			e.preventDefault();

			var getval=$(this).attr('name');

			var imgname=$(this).attr('data');

			//alert(imgname);

				$.ajax({

                      url: '<?php echo JEWISH_URL;?>'+'/post/delete_image/?ded='+getval+'&imgurl='+imgname,

                      type: 'POST',

                      success: function(data){



									alert('Image Deleted');

									location.reload();

		                    				// $(".list-v").html(data)



                             }

                  });



			})

	});

</script>

<div class="uploaded">

<h1>Uploaded Image</h1>



<?php



                   $this->db->select('*');

				   $this->db->where('post_id', $p_id );

				   $query = $this->db->get('images');

				   $data2 = $query->result_array();

				   //echo $this->db->last_query();

					foreach( $data2 as $l ){

?>

<img src="<?php echo JEWISH_URL;?>/upload/<?php echo $l['img']?>" height="200" width="200" /><a href="#" data="<?php echo $l['img']?>" name="<?php echo $l['id'];?>"><span class="del">X</span>

</a><?php } ?>

</div>



      <p>&nbsp;</p>

       <input type="submit" value="Update this post" name="submtadd"/>

  </div>

<?php echo form_close(); ?>



</section>

</article>

</div>
