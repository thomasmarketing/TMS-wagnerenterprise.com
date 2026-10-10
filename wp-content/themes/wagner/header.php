<!doctype html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. --> 

	<head id="<?php echo of_get_option('meta_headid'); ?>" data-template-set="html5-reset-wordpress-theme">
	
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-KVDSJ88');</script>
	<!-- End Google Tag Manager -->

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	
	<?php
		if (true == of_get_option('meta_author'))
			echo '<meta name="author" content="' . of_get_option("meta_author") . '" />';

		if (true == of_get_option('meta_google'))
			echo '<meta name="google-site-verification" content="' . of_get_option("meta_google") . '" />';
	?>

	<meta name="Copyright" content="Copyright &copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?>. All Rights Reserved.">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/library/images/favicon.png"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <!--Apple Mobile Web App Metadata-->	
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<link rel="apple-touch-startup-image" media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch4.png" />
	<link rel="apple-touch-startup-image" media="(max-device-width: 568px) and (-webkit-min-device-pixel-ratio: 2)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch5.png" />
	<link rel="apple-touch-startup-image" media="(device-width: 375px)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch6.png">
	<link rel="apple-touch-startup-image" media="(device-width: 414px)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch6plus.png">
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (orientation:landscape) and (-webkit-min-device-pixel-ratio: 2)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch-ipad-landscape.png"  />
    <link rel="apple-touch-startup-image"  media="(device-width: 768px) and (device-height: 1024px) and (orientation:portrait) and (-webkit-min-device-pixel-ratio: 2)" href="<?php echo get_template_directory_uri(); ?>/library/images/launch-ipad-portrait.png"  />
	<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/library/images/touch-icon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVDSJ88"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<header id="mobile">
		<div class="logomobile"><a href="<?php echo home_url(); ?>">Wagner Enterprise, Inc.</a></div>
		<div class="socialmobile"><?php echo do_shortcode( '[linkedin][googleplus]') ?></div>
		<div id="mobilemenu"></div>
	</header>
	<a href="tel:2488799000" class="mobilephone"><span class="tel number">248-879-9000</span><span class="click">Click to Call</span></a></a>
	
	<aside id="navsidebar">	
		<div class="navwrap">
			<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/library/images/wagner@2x.png" alt="Wagner Enterprises, Inc." /></a>
			<nav id="nav" role="navigation">
				<?php wp_nav_menu( array('menu' => 'primary') ); ?>
			</nav>
			<div class="socialicons">
				<?php echo do_shortcode( '[linkedin][googleplus]') ?>
			</div>
		</div>
	</aside>

	<div id="content">	

	<header id="header" role="banner">
		<a href="tel:2488799000"><span class="phone"><span class="number">248-879-9000</span></span></a>
		<?php get_template_part('searchform'); ?>
	</header>

