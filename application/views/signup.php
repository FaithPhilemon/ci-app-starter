<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$title ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()."assets/themes/kiaalap/";?>img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="<?php echo base_url()."assets/themes/kiaalap/";?>https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/bootstrap.min.css">
	
	<!-- Datepicker -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/datepicker/datepicker3.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo base_url()."assets/themes/kiaalap/";?>http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center custom-login">
				<h3>Agbenu Linkup</h3>
				<p>Conneting Poeple To Make Wealth</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
					<h2 style="margin-top:0px">Register</h2>
						<form action="<?php echo $action; ?>" method="post" id="loginForm">
							<div class="form-group">
								<label for="username">Username <?php echo form_error('username') ?></label>
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
							</div>
							<div class="form-group">
								<label for="varchar">Password <?php echo form_error('password') ?></label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
							</div>

							<div class="form-group">
								<label for="confirm_password">Confirm Password <?php echo form_error('confirm_password') ?></label>
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Re-type password" value="<?php echo $password; ?>" />
							</div>

							<div class="form-group">
								<label for="email">Email <?php echo form_error('email') ?></label>
								<input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Email"/>
							</div>

							<div class="form-group">
								<label for="fname">Full Name <?php echo form_error('fname') ?></label>
								<input type="text" class="form-control" name="fname" id="fname" placeholder="Full name" value="<?php echo $fname; ?>" />
							</div>
							<div class="form-group">
								<label for="address">Address <?php echo form_error('address') ?></label>
								<textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
							</div>
							<div class="form-group">
								<label for="varchar">Date of Bith <?php echo form_error('dob') ?></label>
								<input type="text" class="form-control" name="dob" id="dob" placeholder="DOB" value="<?php echo $dob; ?>" />
							</div>
							<div class="form-group">
								<label for="country">Country <?php echo form_error('country') ?></label>
								<select name="country" id="country" class="form-control" value="<?php echo $country; ?> required="required">
									<option value="">select</option>
									<?php 
										foreach ($countries as $country) {
											echo '<option value="'.$country->country_name.'">'.$country->country_name.'</option>';
										}
									?>
								</select>
							</div> 
							<div class="form-group">
								<label for="varchar">State <?php echo form_error('state') ?></label>								
								<select name="state" id="state" class="form-control" value="<?php echo $state; ?> required="required">
									<option value="">select</option>
									<?php 
										foreach ($states as $state) {
											echo '<option value="'.$state->name.'">'.$state->name.'</option>';
										}
									?>
								</select>
								
							</div>
							<div class="form-group">
								<label for="varchar">L.G.A. <?php echo form_error('lga') ?></label>
								<select name="lga" id="lga" class="form-control" value="<?php echo $lga; ?> required="required">
									<option value="">select</option>
									<?php 
										foreach ($lgas as $lga) {
											echo '<option value="'.$lga->local_name.'">'.$lga->local_name.'</option>';
										}
									?>
								</select>
							</div>
							
							<div class="form-group">
								<label for="int">Package <?php echo form_error('package') ?></label>
								<select name="package" id="package" class="form-control" value="<?php echo $package; ?> required="required">
									<option value="">select</option>
									<?php 
										foreach ($packages as $package) {
											echo '<option value="'.$package->id.'">'.$package->name.'</option>';
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="varchar">Phone number <?php echo form_error('mobile') ?></label>
								<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
							</div>

							<div class="form-group">
								<label for="varchar">Sponsor/Referral Username <?php echo form_error('referedby') ?></label>
								<?php if(isset($_GET['reff'])): ?>
								<input type="text" class="form-control" name="referedby" id="referedby" placeholder="Referedby" value="<?php echo $_GET['reff']; ?>" disabled/>
									<?php else: ?>
								<input type="text" class="form-control" name="referedby" id="referedby" placeholder="Referedby" value="<?php echo $referedby; ?>" />
									<?php endif; ?>
							</div>
						
							<div class="checkbox col-lg-12">
								<input type="checkbox" class="i-checks" checked> I agree to terms and conditions
							</div>
								
							<div class="text-right">
							<button type="submit" class="btn btn-success loginbtn btn-block"><?php echo $button ?></button>               
								Already have an account? <a href="<?php echo base_url('auth/login') ?>" style="padding: 10px; background-color: orange;">LOGIN</a>               
              </div>
						</form>

						</div>
				</div>
			</div>
			<div class="text-center login-footer">
				<p class="col-md-6 col-md-offset-3">
					<a href="https://rocketwares.com"><img src="<?php echo base_url() ?>assets/img/rw.png" width="200" height="100" class="img-responsive text-center" alt="Rocketwares.com Logo"></a>
				</p>
			</div>

		</div> 
		<p class="text-center">Copyright © <?php echo date('Y') ?>. Agebnu Linkup. All rights reserved.</a></p>
  
	</div>


    <!-- jquery
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
	<!-- <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/tawk-chat.js"></script> -->
	
	<!-- Datepicker JS -->
	<script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/datapicker/bootstrap-datepicker.js"></script>

	<script>
		$("#dob").datepicker();
	</script>
</body>

</html>
