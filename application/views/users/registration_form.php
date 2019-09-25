
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>css/datapicker/datepicker3.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/theme/'); ?>css/datapicker/colorpicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">

<div class="register-box">
	<div class="register-logo">
	<a href="<?=base_url('auth/admin_login'); ?>"><b>Step 1/2</b> Registration</a>
	<hr>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Register/Apply</p>
		
		<?php 
			if(!empty($errors)) {
				echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>'.$errors.'</strong>
					</div>';
			} 
		?>


		<form action="<?=base_url('register/register_action') ?>" method="post">
			<div class="form-group has-feedback">
				<label for="varchar">* Surname <?php echo form_error('surname') ?></label>
				<input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" value="<?php echo $surname; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* First Name <?php echo form_error('first_name') ?></label>
				<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Other Name <?php echo form_error('other_name') ?></label>
				<input type="text" class="form-control" name="other_name" id="other_name" placeholder="Other Name" value="<?php echo $other_name; ?>" />
			</div>
			<div class="form-group has-feedback">
				<label for="date">* Date of Birth <?php echo form_error('dob') ?></label>
				<input type="text" class="form-control" name="dob" id="dob" placeholder="Dob" value="<?php echo $dob; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Gender <?php echo form_error('gender') ?></label>
				<select class="form-control" name="gender" id="gender" value="<?php echo $gender; ?>" required >
					<option value=""></option>
					<option value="0">FEMALE</option>
					<option value="1">MALE</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Marital Status <?php echo form_error('marital_status') ?></label>
				<select class="form-control" name="marital_status" id="marital_status" value="<?php echo $marital_status; ?>" required >
					<option value=""></option>
					<?php 
						foreach ($marital_status as $status) {
							echo '<option value="'.$status->id.'">'.$status->name.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Country Of Birth <?php echo form_error('country_of_birth') ?></label>
				<select class="form-control" name="country_of_birth" id="country_of_birth" value="<?php echo $country_of_birth; ?>" required >
					<option value=""></option>
					<?php 
						foreach ($countries as $country) {
							echo '<option value="'.$country->id.'">'.$country->country_name.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Nationality <?php echo form_error('nationality') ?></label>
				<select class="form-control"  name="nationality" id="nationality" value="<?php echo $nationality; ?>" required >
					<option value=""></option>
					<?php 
						foreach ($countries as $country) {
							echo '<option value="'.$country->id.'">'.$country->country_name.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Are you a UWI staff member? <?php echo form_error('uwi_staff') ?></label>
				<select class="form-control" name="uwi_staff" id="uwi_staff" value="<?php echo $uwi_staff; ?>" >
					<option value=""></option>
					<option value="1">YES</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Are you a dependent of UWI staff? <?php echo form_error('uwi_dep_staff') ?></label>
				<select class="form-control" name="uwi_dep_staff" id="uwi_dep_staff" value="<?php echo $uwi_dep_staff; ?>">
					<option value=""></option>
					<option value="1">YES</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Are you a GLOMODE staff member? <?php echo form_error('glomode_staff') ?></label>
				<select class="form-control" name="glomode_staff" id="glomode_staff" value="<?php echo $glomode_staff; ?>" required >
					<option value=""></option>
					<option value="1">YES</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Are you a dependent of GLOMODE staff member?  <?php echo form_error('glomode_dep_staff') ?></label>
				<select class="form-control" name="glomode_dep_staff" id="glomode_dep_staff" value="<?php echo $glomode_dep_staff; ?>" required >
					<option value=""></option>
					<option value="1">YES</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Disability <?php echo form_error('disability') ?></label>
				<select class="form-control" name="disability" id="disability" value="<?php echo $disability; ?>" required >
					<option value=""></option>
					<option value="1">YES</option>
					<option value="0">NO</option>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Permanent Address (Apt./Street/P.O. Box) <?php echo form_error('permanent_address') ?></label>
				<textarea class="form-control" name="permanent_address" id="permanent_address" rows="3" value="<?php echo $permanent_address; ?>" required></textarea>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* City <?php echo form_error('city') ?></label>
				<select class="form-control"  name="city" id="city" value="<?php echo $city; ?>" required >
					<option value=""></option>
					<?php 
						foreach ($states as $state) {
							echo '<option value="'.$state->id.'">'.$state->capital.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="int">* Country <?php echo form_error('country') ?></label>
				<select class="form-control"  name="country" id="country" value="<?php echo $country; ?>" required >
					<option value=""></option>
					<?php 
						foreach ($countries as $country) {
							echo '<option value="'.$country->id.'">'.$country->country_name.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Email <?php echo form_error('email') ?></label>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Phone number 1 <?php echo form_error('phone1') ?></label>
				<input type="text" class="form-control" name="phone1" id="phone1" placeholder="Phone1" value="<?php echo $phone1; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">Phone number 2 <?php echo form_error('phone2') ?></label>
				<input type="text" class="form-control" name="phone2" id="phone2" placeholder="Phone2" value="<?php echo $phone2; ?>" />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Username <?php echo form_error('username') ?></label>
				<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" required />
			</div>
			<div class="form-group has-feedback">
				<label for="varchar">* Password <?php echo form_error('password') ?></label>
				<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required />
			</div>
		

		<div class="row">
			<div class="col-xs-8">
			<div class="checkbox icheck">
				<label>
				<input type="checkbox" required> I agree to the <a class="link link-warning" data-toggle="modal" href='#tandcs'>Terms</a>
				</label>
			</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
			</div>
			<!-- /.col -->
		</div>
		</form>

		<!-- <div class="social-auth-links text-center">
		<p>- OR -</p>
		<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
			Facebook</a>
		<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
			Google+</a>
		</div> -->

		<a href="#" class="text-center">I already have an account</a>
	</div>
	<!-- /.form-box -->
	</div>
	<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/theme/'); ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/theme/'); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/theme/'); ?>plugins/iCheck/icheck.min.js"></script>

<script src="<?php echo base_url('assets/theme/'); ?>js/datepicker/datepicker-active.js"></script>
<script src="<?php echo base_url('assets/theme/'); ?>js/datapicker/bootstrap-datepicker.js"></script>

<script>
	$("#dob").datepicker();
</script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>


<div class="modal fade" id="tandcs">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Terms and Conditions</h4>
			</div>
			<div class="modal-body">
				<p class="text-default">
				I confirm that the information provided is correct and acknowledge that any incorrect information provided will be grounds for the application to be rejected. I accept that only those who passed the first stage will be eligible for the second stage and those who passed the second stage will be eligible for the final stage.
				I shall abide by the rules and regulations of the scholarship/entrance eligibility/selection process and the outcome of successful candidates by the scholarship award team.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>
