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

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/bootstrap.min.css">
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/educate-custon-icon.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/responsive.css">
    <!-- modernizr JS
		============================================ -->
		<script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/vendor/modernizr-2.8.3.min.js"></script>
		
		<link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?php echo base_url()."assets/themes/kiaalap/";?>css/data-table/bootstrap-editable.css">
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo base_url()."assets/themes/kiaalap/";?>http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Header menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <!-- <a href="<?php echo base_url()."assets/themes/kiaalap/";?>index.html"><img class="main-logo" src="<?php echo base_url()."assets/themes/kiaalap/";?>img/logo/logo.png" alt="" /></a>
                <strong><a href="<?php echo base_url()."assets/themes/kiaalap/";?>index.html"><img src="<?php echo base_url()."assets/themes/kiaalap/";?>img/logo/logosn.png" alt="" /></a></strong> -->
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
						<li class="active">
                            <a title="Dashboard" href="<?php echo base_url();?>" aria-expanded="false"> <i class="fa fa-dashboard"></i> <span class="mini-click-non">Dashboard</span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="<?php echo base_url()."assets/themes/kiaalap/";?>index.html">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Account</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Weekly savings" href="<?php echo base_url('weeklypay');?>"><span class="mini-sub-pro">Pay Weekly Savings</span></a></li>
                                <li><a title="Downlines" href="<?php echo base_url('downlines');?>"><span class="mini-sub-pro">Downlines</span></a></li>
                                <!-- <li><a title="Dashboard v.3" href="<?php echo base_url()."assets/themes/kiaalap/";?>index-2.html"><span class="mini-sub-pro">Invoice/Account Status</span></a></li> -->
                                <li><a title="Manage Package" href="<?php echo base_url('upgrade');?>"><span class="mini-sub-pro">Manage Package</span></a></li>
                            </ul>
						</li>
						<li>
                            <a class="has-arrow" href="<?php echo base_url()."assets/themes/kiaalap/";?>index.html">
								   <i class="fa fa-cogs"></i>
								   <span class="mini-click-non">Help</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="View Notifications" href="<?php echo base_url('notifications');?>"><span class="mini-sub-pro">Notifications</span></a></li>
                                <li><a title="Contact Admin" href="<?php echo base_url('contact');?>"><span class="mini-sub-pro">Contact</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Header menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <!-- <a href="<?php echo base_url()."assets/themes/kiaalap/";?>index.html"><img class="main-logo" src="<?php echo base_url()."assets/themes/kiaalap/";?>img/logo/logo.png" alt="" /></a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="http://agbenulinkup.com" class="nav-link">Main Site</a>
                                                </li>
                                                <li class="nav-item"><a href="http://agbenulinkup.com/faq.php" class="nav-link">FAQ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="<?php echo base_url()."assets/themes/kiaalap/";?>#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<!-- <img src="<?php echo base_url()."assets/themes/kiaalap/";?>img/product/pro4.jpg" alt="" /> -->
                                                            <i class="fa fa-user"></i>
															<span class="admin-name"><?=$fullname ?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?php echo base_url('account');?>"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <!-- <li><a href="<?php echo base_url()."assets/themes/kiaalap/";?>#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a> -->
                                                        </li>
                                                        <!-- <li><a href="<?php echo base_url()."assets/themes/kiaalap/";?>#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                        </li>
                                                        <li><a href="<?php echo base_url()."assets/themes/kiaalap/";?>#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                        </li> -->
                                                        <li><a href="<?php echo base_url('auth/logout');?>"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a href="<?php echo base_url();?>">Dashboard</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Account <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a title="Pay weekly Savings" href="<?php echo base_url('weeklypay');?>"><span class="mini-sub-pro">Weekly Savings</span></a></li>
                                                <li><a title="View downlines" href="<?php echo base_url('downlines');?>"><span class="mini-sub-pro">Downlines</span></a></li>
                                                <!-- <li><a title="Dashboard v.3" href="<?php echo base_url();?>"><span class="mini-sub-pro">Invoice/Account Status3</span></a></li> -->
                                                <li><a title="Upgarde or downgrade package" href="<?php echo base_url('upgrade');?>"><span class="mini-sub-pro">Upgrade Package</span></a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">Help <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a title="View Notifications" href="<?php echo base_url('notifications');?>"><span class="mini-sub-pro">Notifications</span></a></li>
                                                <li><a title="Contact Admin" href="<?php echo base_url('contact');?>"><span class="mini-sub-pro">Contact</span></a></li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- Mobile Menu end -->
			
			<!-- Main content begin -->
			<?php $this->load->view($main_content); ?>
			<!-- Main content end -->
            
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2019. All rights reserved. Powered by <a href="<?php echo base_url()."assets/themes/kiaalap/";?>https://rocketwares.com/">Rocketwares</a></p>
                        </div>
                    </div>
                </div>
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
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/morrisjs/raphael-min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/morrisjs/morris.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
		<!-- <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/tawk-chat.js"></script> -->
		
		<!-- data table JS
		============================================ -->
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/tableExport.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url()."assets/themes/kiaalap/";?>js/data-table/bootstrap-table-export.js"></script>
</body>

</html>
