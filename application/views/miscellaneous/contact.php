<script>console.log('miscellaneous/about.php')</script>
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
    YidTown. You can send us a message at wecare@brightechshop.com
    or fill out the form below. We make every effort to respond to
    inquiries within 24 hours.
  </p>
</section>

<section>
<?php echo  validation_errors(); ?>


<div class="row" style="margin-right: 400px;">
					<div class="col-xs-12 col-md-8">
							<?php echo form_open('about'); ?>
							<div class="row">
								<div class="col-xs-12 col-md-2">
									<label for="contact_name">Full name*</label>
								</div>
								<div class="col-xs-12 col-md-10">
		    						<input type="text" name="contact_name" class="form-control" id="contact_name" required="">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
									<label for="contact_company">Company</label>
								</div>
								<div class="col-xs-12 col-md-10">
		    						<input type="text" name="contact_company" class="form-control" id="contact_company">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
									<label for="contact_email">E-mail*</label>
								</div>
								<div class="col-xs-12 col-md-10">
		    						<input type="email" name="contact_email" class="form-control" id="contact_email" required="">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
									<label for="contact_tel">Telephone</label>
								</div>
								<div class="col-xs-12 col-md-10">
		    						<input type="tel" name="contact_tel" class="form-control" id="contact_tel">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-xs-12 col-md-2">
									<label for="contact_message">Message*</label>
								</div>
								<div class="col-xs-12 col-md-10">
									<textarea name="contact_message" rows="5" class="form-control" id="contact_message"></textarea>
								</div>
							</div>
							<br>
							<div class="pull-right">
		    					<input type="submit" class="btn btn-new" name="contact_send" id="submit" value="Submit message">
							</div>
						</form>
					</div>
				</div>
</section>








 </div>
 </section>
</div>
