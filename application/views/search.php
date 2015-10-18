<style>


#paging_container1{
	height: 320px;	
}

#paging_container2{
	height: 356px;	
}

#paging_container3{
	height: 190px;
}

#paging_container4{
	height: 307px;
	overflow: hidden;
}
.less{
	display:none !important;
}
#paging_container8 .no_more{
    background-color: white;
    color: gray;
    cursor: default;
}

.ellipse{
	float: left;
}
.alt_page_navigation_gallery > .last{
	display:block !important;
}


.page_navigation , .alt_page_navigation{
	padding-bottom: 10px;
}
.page_navigation , .alt_page_navigation_gallery{
	padding-bottom: 10px;
}


.page_navigation a, .alt_page_navigation a{
	padding:3px 5px;
	margin:2px;
	color:white;
	text-decoration:none;
	float: left;
	font-family: Tahoma;
	font-size: 12px;
	background-color: white;
  color: #353f4d;
}
.page_navigation a, .alt_page_navigation_gallery a{
	padding:3px 5px;
	margin:2px;
	color:white;
	text-decoration:none;
	float: left;
	font-family: Tahoma;
	font-size: 12px;
	background-color: white;
  color: #353f4d;
}
.active_page{
	background-color:white !important;
	color:black !important;
}	

.content, .alt_content{
	color: black;
}
.page_link {
	display:block !important;
}
.content li, .alt_content li, .content > p{
	padding: 5px
}
</style>
<div class="container">

 <article class="page-content">

  <ul class="page-nav" id="vot">

    <li><a href="<?php echo JEWISH_URL;?>">Search Term></a></li>

     <li><?php if(isset($keyword)){ echo $keyword; } ?></li>

    <?php /*?><li>><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"><?php //echo $this->postmod->get_single_catname($_GET['cat_id']);?></a></li><?php */?>



<section class="page-event">

<div style="clear:both;border-bottom:1px #ccc solid"><br></div>
<div class="content-left">
 <section class="forums-post">
 <h3>Forums (<?php if($forums){ echo count($forums);} else { echo "0";};?> <?php if(count($forums) == 1){ echo "result";}else{ echo "results";} ?>)</h3>

 <div id="paging_container1" class="container">

   <ul class="alt_content">
       <?php if($forums){ foreach($forums as $thread){ ?>
       <li style="display: list-item;float: none;">
         <h4>
            <a href="http://yidtown.com/forum/questions/<?php echo $thread['forum_slug']; ?>">
                <?php echo $thread['forum_name']; ?>
            </a>
            <br>
         </h4>
         <h5>
         <span><?php echo $thread['forumcomment_count']; ?></span><?php echo explode(" ", $thread['forum_add_date'])[0]; ?>
         </h5>

       </li>
      <?php }}else{ ?>
      <li><span> There are no results on Forums for this term </span></li>
      <?php } ?>
    </ul>

 </div>
 <div id="tab-1" class="tab-content">
  <h3>Jobs (<?php if($jobs){ echo count($jobs);} else { echo "0";};?> <?php if(count($jobs) == 1){ echo "result";}else{ echo "results";} ?>)</h3>
     <ul class="list-v">
        <?php if($jobs){ foreach($jobs as $thread){ ?>
        <a href="/classified/single_job/<?php echo $this->allencode->encode($thread['id']); ?>" style="display: inline;">
         <li>
           <img src="http://yidtown.com/images/star1.png" alt=""><?php echo explode(" ", $thread['post_date'])[0]; ?>
  <strong><?php echo $thread['post_title']; ?></strong>
    Area -<?php echo $thread['state']; ?>
         </li>
       </a>

       <?php }}else{ ?>
       <li><span> There are no results on Forums for this term </span></li>
       <?php } ?>

     </ul>
 </div>
 <div style="clear:both;border-bottom:1px #ccc solid"><br></div>

 <div class="tab-content">
  <h3>Housing (<?php if($housing){ echo count($housing);} else { echo "0";};?> <?php if(count($housing) == 1){ echo "result";}else{ echo "results";} ?>)</h3>
     <ul class="list-v">

        <?php if($housing){ foreach($housing as $thread){ ?>

        <a href="/classified/single_housing/<?php echo $this->allencode->encode($thread['id']); ?>" style="display: inline;">
         <li>
           <img src="http://yidtown.com/images/star1.png" alt=""><?php echo explode(" ", $thread['post_date'])[0]; ?>
  <strong><?php echo $thread['post_title']; ?></strong>
          -($<?php echo $thread['ask']; ?>)
          -(<?php echo $thread['sqft']; ?>ft<sup>2</sup>)
    Area -<?php echo $thread['state']; ?>
         </li>
       </a>

       <?php }}else{ ?>

       <li><span> There are no results on Forums for this term </span></li>

       <?php } ?>

     </ul>

 </div>
</section>
</div>



<div class="event-right">

