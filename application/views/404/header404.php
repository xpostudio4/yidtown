<?php ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>YidTown</title>
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/style.css">
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/jewish.css">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script>console.log('view/forum/header.php')</script>
<script>
  document.createElement('header');
  document.createElement('section');
  document.createElement('article');
  document.createElement('aside');
  document.createElement('nav');
  document.createElement('footer');
</script>
<script src="<?php echo JEWISH_URL;?>/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="<?php echo JEWISH_URL;?>/js/easyResponsiveTabs.js" type="text/javascript"></script>


</head>

<body >
<?php  //$user_log=$this->session->userdata('logged_in');
//echo $user_log['user_id'];
?>
<?php
 /* DO NOT DELETE*/
  //$city=$this->session->all_userdata( 'city_id');
   ?>
<?php /*?><script>
$(document).ready(function() {
	$('a').on('click',function(e) {
		 var city=$(".city_select").val();
		 	 if(city==''){
		     e.preventDefault();
		    var full_url=$(this).attr('href');
			 window.location = "<?php echo JEWISH_URL;?>/city/select/?redirect="+full_url;
			 }else{
				
			 }
		});
	$(".city_select option[value='<?php if(!isset($city['city_id'][0])){ echo '';}?>']").attr('selected','selected');
	<?php if(isset($city['city_id'][0]) && !empty($city['city_id'][0])){?>
	$(".city_select option[value='<?php echo $city['city_id'][0]?>']").attr('selected','selected');
	$(".city_select option[value='']").remove();
	$(".city_selectr option[value='']").remove();
	<?php }?>

});
</script>
<script>
$(document).ready(function() {
   $('<span class="nav-btn"></span>').insertBefore('.top-nav ul')
   $('.nav-btn').click(function(){
	 $('.top-nav ul').slideToggle('slow')
   });
});
</script><?php */?>
 <header>
 <div class="container">
  <figure class="logo"><a href="<?php echo JEWISH_URL;?>"><img src="<?php echo JEWISH_URL;?>/images/logo.png" alt=""></a></figure>
  <div class="search-bar">
    <?php echo form_open('/search'); ?>
    <input type="search" placeholder="Search" name="search">
    <input type="submit" value="">
    <?php form_close(); ?>
  </div>
  <ul>
      <li>
     <?php /*?> <form id="citi" method="post" action="<?php echo JEWISH_URL;?>/main/city_change/?&redirect=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">
      <select name="city_id" class="city_select" onChange="this.form.submit();">
      <option value="">Select City</option>
      <?php $get_city=$this->citymod->fetch_city();
	  foreach($get_city as $v){?>
      <option value="<?php echo $v['id']?>" ><?php echo $v['name']?></option>
      <?php }?>
      </select>
      </form><?php */?>
      </li>
<!--      <li><span>lac</span></li>
      <li><span>la</span></li>
      <li><span>sf</span></li>
      <li><span>phl</span></li>-->
   </ul>
 </div>
 </header>
  <section class="top-nav">
 	<div class="container">
    	<ul>
            <li><a href="<?php echo JEWISH_URL;?>/forum/" title="Forums">Forums</a></li>
            <li><a href="<?php echo JEWISH_URL;?>/business_directory/" title="Business Directory">Business Directory</a></li>
            <li><a href="<?php echo JEWISH_URL;?>/classified/search/housing/" title="Housing">Housing</a></li>
            <li><a href="<?php echo JEWISH_URL;?>/classified/search/job/" title="Jobs">Jobs</a></li>
            <li><a href="<?php echo JEWISH_URL;?>/classified/search/event/" title="Events">Events</a></li>
  
              <?php
	  /*$user_log=$this->session->userdata('logged_in');
		if(!isset($user_log['user_id'])){
	  ?> 
      <li class="account" style="margin-left:25%;"><a href="<?php echo JEWISH_URL;?>/login/redirect/?redirect=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>">Login or Create Account</a></li>
      <li><a href="<?php echo JEWISH_URL;?>/myaccount/messages/"><img src="<?php echo JEWISH_URL;?>/images/messager.png"/></a></li>
      <?php }else{ ?>
      <li class="account" style="margin-left:23.7%;"><a href="<?php echo JEWISH_URL;?>/myaccount/">My account</a></li>
      <li><a href="<?php echo JEWISH_URL;?>/myaccount/messages/"><img src="<?php echo JEWISH_URL;?>/images/messager.png"/></a></li>
      <!--msg.png-->
      <li><a href="<?php echo JEWISH_URL;?>/myaccount/logout" >Log Out</a></li>
      <?php }*/ ?>
        </ul>
    </div>
 </section>
 
 <?php /*?><script type="text/javascript">
    $(document).ready(function () {
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
		
	$.ajax({
			type: 'post',
			url: "<?php echo site_url('forum/sidebar'); ?>",
			data: 'mdata=dd',
			success: function (data) {
			// alert(data);
			 $(".myside").html(data);
//		    $(".loader").hide();
//			$('#'+data).hide();
//
//			alert('The thread hasbeen deleted successfully');
 			}
    });
		
		
    });
</script><?php */?>
