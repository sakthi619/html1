<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 6 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Mychedi</title>
	
	<!-- Font css  -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/fonts/fonts.css">
	
    <!-- Fontawesome css      -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/css/normalize.css">
	
    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/css/bootstrap.css">
	
    <!-- Owncarousel css      -->
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/css/owl.carousel.css">
	
	<!-- image zoom -->
	<link rel="stylesheet" href="<?php echo base_url()?>site/web/css/glasscase.css">
	<link rel="stylesheet" href="<?php echo base_url()?>site/web/css/glasscase.minf195.css">
	
    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>site/web/css/style.css" media="screen" />
	
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>site/web/css/extralayers.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>site/web/rs-plugin/css/settings.css" media="screen" />
	
    <!-- Main css   -->
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>site/web/css/responsive.css">
 
 
	<!-- jQuery latest -->
	<script type="text/javascript" src="<?php echo base_url()?>site/web/js/jQuery.2.1.4.js"></script>
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!--  HEADER-AREA  -->
	<header class="entire_header">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-5">
						<div class="user-menu">
							<ul class="list-unstyled list-inline">
			 
								 
								<li><?php echo get_lang('support');?> +91 8888 8888 88</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-7">
						<div class="header-right">
							<ul>
								<li class="last-child">
									<a class="logg" href="<?php echo base_url()?>web/change_lang/en/<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/<?php echo $this->uri->segment(3); ?>">EN</a>
								</li>
								<li class="last-child">
									/
								</li>
								<li class="last-child">
									<a class="logg" href="<?php echo base_url()?>web/change_lang/ta/<?php echo $this->uri->segment(1); ?>/<?php echo $this->uri->segment(2); ?>/<?php echo $this->uri->segment(3); ?>">TA</a>
								</li>
								<?php if(logged_in()){ ?>
								<li class="dropdown dropdown-small">
									
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
										<img class="account" src="<?php echo base_url()?>site/web/images/account.png" alt="#">
										<span class="value"><?php echo get_customer_name(); ?> </span><i class="fa fa-angle-down"></i>
									</a>									
									<ul class="dropdown-menu account-menu">
										<li><a href="<?php echo base_url()?>web/myaccount"><?php echo get_lang('my_account');?></a>
										</li>
									 
										<li><a href="<?php echo base_url()?>web/myorders"><?php echo get_lang('my_orders');?></a>
										</li>
									</ul>
									
								</li>
								<li>
									<a href="<?php echo base_url()?>web/logout"><img src="<?php echo base_url()?>site/web/images/check.png" alt="#"><?php echo get_lang('logout');?></a>
								</li>
								 <?php }else {  ?>
								<li>
									<a href="<?php echo base_url()?>web/signup"><img src="<?php echo base_url()?>site/web/images/check.png" alt="#"><?php echo get_lang('sign_up');?></a>
								</li>
								<li class="last-child">
									<a class="logg" href="<?php echo base_url()?>web/signin"><img class="login" src="<?php echo base_url()?>site/web/images/log.png" alt="#"><?php echo get_lang('login');?></a>
								</li>
								 <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header-area:END -->
		
		<!-- Logo-area -->
		<div class="logo_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-12">
						<div class="logo">
							<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>site/web/images/logo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-xs-12">
						<div class="search-area">
							<form method="get" action="<?php echo base_url()?>web/search">
								<div class="control-group">
 
									<input class="search-field" placeholder="Search here..." name="search" />
									<a class="search-button" href="#"></a>
								</div>
							</form>
						</div>
						 
					</div>
				</div>
			</div>
		</div>
		<!-- LOGO-AREA:END -->
		
		<!-- MENU-AREA -->
		<div class="menu-area">
			<div class="container" style="background:# background: #f7f7f7;  background: -moz-linear-gradient(top,  #f7f7f7 0%, #e5e5e5 51%, #dbdbdb 100%);  background: -webkit-linear-gradient(top,  #f7f7f7 0%,#e5e5e5 51%,#dbdbdb 100%);  background: linear-gradient(to bottom,  #f7f7f7 0%,#e5e5e5 51%,#dbdbdb 100%);   border:1px solid #efefef;">
				<div class="row nopadding" style="border:1px solid #cbc9c9;margin:6px;">
					 
					<div class="col-md-9 col-sm-9 col-xs-12 nopadding">
						<nav class="main-menu">
							<ul id="navigation">
								<li class="active"><a href="<?php echo base_url()?>"><?php echo get_lang('home');?> </a>
									 
								</li>
								<li><a href="#"><?php echo get_lang('create_garden');?>	 </a>
									 
								</li>
								<li><a href="<?php echo base_url()?>web/shop"><?php echo get_lang('online_shop');?> </a>
								</li>
								<li><a href="product-list.html"><?php echo get_lang('connect_with_us');?></a>
								</li>
								 
							</ul>
						</nav>
						
						<!-- Mobile Navigation -->
						<div class="only-for-mobile">
							<div class="col-xs-12">
								<ul class="ofm">
									<li class="m_nav"><i class="fa fa-bars"></i><?php echo get_lang('Navigation'); ?></li>
								</ul>

								<!-- MOBILE MENU -->
								<div class="mobi-menu">
									<div id='cssmenu'>
										<ul>
											<li class='has-sub'>
												<a href='<?php echo base_url()?>'><span><?php echo get_lang('home'); ?></span></a>
												 
											</li>
											<li class='has-sub'>
												<a href='#'><span><?php echo get_lang('create_garden'); ?></span></a>
												 
											</li>
											<li>
												<a href='about-us.html'><span><?php echo get_lang('online_shop'); ?> </span></a>
											</li>
											<li>
												<a href='product-list.html'><span> <?php echo get_lang('connect_with_us'); ?></span></a>
											</li>
										 
										 
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
						<?php
						$totalquantity = array();
						if(isset($cart) && !empty($cart)){			
							foreach($cart as $tmp){		 
								$totalquantity[] = $tmp['quantity'];
							}			
						}
						?>
					 <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
						<div class="menu_right">
						<div class="categories">
							<ul id="nav">
								<li style="border-bottom: 56px solid #1c8541;border-left: 30px solid transparent;height:0px;width:260px;padding:0px;"> 
								
							<span style="padding:15px;display:table;"><i class="fa fa-shopping-basket" aria-hidden="true"></i><?php echo get_lang('my_cart'); ?> <span class="cart_count">(<?php echo array_sum($totalquantity);?>)</span></span>
									<ul>
										<li>
										<div class="summary">
                        <?php echo $list;?>
						
					 
                    </div>
					<br>
					<button type="button" class="btn btn-default checkoutbtn"><?php echo get_lang('Checkout'); ?></button>
					  <button type="button" class="btn btn-default clearcart" style="float:right;"><?php echo get_lang('View_Cart'); ?></button>
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
		<!-- MENU-AREA:END -->
	</header>
   <style>
   .categories .summary{
	   width: 354px !important;
   }
   </style>
   
<script>
$(document).ready(function(){
	$(".checkoutbtn").click(function(){
		window.location.href = "<?php echo base_url()?>web/checkout";
	});
	$(".clearcart").click(function(){
		window.location.href = "<?php echo base_url()?>web/cart";
	});
});
</script>   