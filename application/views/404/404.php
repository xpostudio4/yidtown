<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/style.css">
<link rel="stylesheet" href="<?php echo JEWISH_URL;?>/css/business.css">
<header>
 <div class="container">
  <figure class="logo"><a href="<?php echo JEWISH_URL;?>/jewish_classified"><img src="http://falconc.com/jewish_classified/images/logo.png" alt=""></a></figure>
  <div class="search-bar">
    <?php echo form_open('/search/classified/', array('method' => 'get')); ?>
    <input type="search" placeholder="Search">
    <input type="submit" value="">
    <?php form_close(); ?>
  </div>
  <ul>
      <li>

      </li>
<!--      <li><span>lac</span></li>
      <li><span>la</span></li>
      <li><span>sf</span></li>
      <li><span>phl</span></li>-->
   </ul>
 </div>
 </header>
 
<div class="container">
 	<article class="page-content">
    <div class="business_title">404 Page not Found.</div>
    	<?php echo $data;?>
        <a href="<?php echo JEWISH_URL;?>" title="Go to main page." class="customBtn"><span style="margin:0 .5em;">Go to First page</span></a>
    </article>
  </div>  
