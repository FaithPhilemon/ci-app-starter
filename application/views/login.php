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
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN TO YOUR DASHBOARD</h3>
				<p>Start creating wealth</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                    <?php echo validation_errors(); ?>  

                    <?php 
                        if(!empty($errors)) {
                            echo '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>'.$errors.'</strong>
                                </div>';
                        } 
                    ?>

                    
                    
                    
                        <form action="<?php echo base_url('auth/login')?>" id="loginForm" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="exampleuser1" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Your password</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label>
								    <input type="checkbox" class="i-checks"> Remember me 
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="<?php echo base_url() ?>account/create">Register</a>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
                <p class="col-md-6 col-md-offset-3">
										<!-- <a href="https://rocketwares.com"><img src="<?php echo base_url() ?>assets/img/rw.png" width="200" height="100" class="img-responsive text-center" alt="Rocketwares.com Logo"></a> -->
                    &copy; <?date('Y'); ?> Glomode Edu Ltd. All rights reserved
                </p>			
            </div>
		</div>   
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
