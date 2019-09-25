
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
	<a href="<?=base_url('auth/admin_login'); ?>"><b>Step 2/2</b> <br> Security Questions</a>
	<hr>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">To futher secure your account, kindly provide answers to the following security questions</p>
		
		<?php 
			if(!empty($errors)) {
				echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>'.$errors.'</strong>
					</div>';
			} 
		?>

		<?php if ($this->session->flashdata('step1success')): ?>			
		<?php echo '<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>'.$this->session->flashdata('step1success').'</strong>
								</div>'; 
		?>
		<?php endif; ?>

		<form action="<?=base_url('register/security_questions_action') ?>" method="post">
			<?php
				foreach ($sqs as $sq) {
					echo '<div class="form-group has-feedback">
							<label for="varchar">* #'.$sq->id.' '. $sq->question. form_error("surname") .'</label>
							<input type="text" class="form-control" name="sq'.$sq->id.'" id="sq'.$sq->id.'" placeholder="Your answer" required />
						</div>
						';
				}
			?>
			<div class="row">
				<!-- <div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
						<input type="checkbox" required> I agree to the <a href="#">terms</a>
						</label>
					</div>
				</div> -->
				<!-- /.col -->
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-block btn-flat"><strong>Submit Answers</strong></button>
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

		<!-- <a href="#" class="text-center">I already have an account</a> -->
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
