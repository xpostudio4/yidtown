<script>console.log('miscellaneous/contact.php')</script>
<div class="container">
<section class="page-event">
 <div class="m-description-wrap clearfix">
   <div class="m-description-top clearfix">
     <span><a href="<?php echo JEWISH_URL;?>">Homepage</a></span> >
     <span><a href="<?php echo JEWISH_URL;?>/pages/page/contact/">Contact</a></span>
   </div>

<section style="text-align: center;">
  <h1>Contact</h1>
  <p>
    Please get in touch with us if you have any questions about our
    YidTown.com. You can send us a message at info@yidtown.com
    or fill out the form below. We make every effort to respond to
    inquiries within 24 hours.
  </p>
</section>

<section>
<br/>
<div style="color: red;"><?php echo  validation_errors(); ?></div>
<br/>
<?php
$data =array(
        'contact_name' => array(
            'name' => 'contact_name',
            'value' =>set_value('contact_name'),
            'id' => 'contact_name',
            'class' => 'form-control',
            'required' => 'required'
            ),
        'contact_email' => array(
            'type' => 'email',
            'name' => 'contact_email',
            'value' =>set_value('contact_email'),
            'id' => 'contact_email',
            'class' => 'form-control',
            'required' => 'required'
            ),
        'contact_tel' => array(
            'type' => 'tel',
            'name' => 'contact_tel',
            'value' =>set_value('contact_tel'),
            'id' => 'contact_tel',
            'class' => 'form-control'
            ),
        'contact_message' => array(
            'name' => 'contact_message',
            'value' =>set_value('contact_message'),
            'id' => 'contact_message',
            'class' => 'form-control',
            'required' => 'required'
            ),
      );

?>
<?php if(!isset($valid)){ ?>
<div class="row" style="margin-right: 400px;">
					<div class="col-xs-12 col-md-8">
							<?php echo form_open('pages/page/contact'); ?>
							<div class="row">
                <div class="col-xs-12 col-md-2">
                  <?php echo form_label("Full name*", "contact_name"); ?>
								</div>
                <div class="col-xs-12 col-md-10">
                  <?php echo form_input($data['contact_name']); ?>
								</div>
							</div>
							<br>
							<div class="row">
                <div class="col-xs-12 col-md-2">
                  <?php echo form_label("E-mail*", "contact_email"); ?>
								</div>
								<div class="col-xs-12 col-md-10">
                  <?php echo form_input($data['contact_email']); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
                  <?php echo form_label("Phone Number", "contact_tel"); ?>
								</div>
								<div class="col-xs-12 col-md-10">
                  <?php echo form_input($data['contact_tel']); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
                  <?php echo form_label("Message*", "contact_message"); ?>
								</div>
                <div class="col-xs-12 col-md-10">
                  <?php echo form_textarea($data['contact_message']); ?>
								</div>
							</div>
							<br>
							<div class="pull-right">
		    					<input type="submit" class="btn btn-new" name="contact_send" id="submit" value="Contact Us!">
							</div>
            <?php  form_close(); ?>
					</div>
				</div>
<?php }else{ ?>

  <p style="text-align: center;">Thanks for contacting us, we'll be contacting you as soon as we can!</p>

<?php } ?>
</section>








 </div>
 </section>
</div>
