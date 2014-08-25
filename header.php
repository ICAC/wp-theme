<!doctype html>
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">		
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="navbar navbar-static-top archery-navbar" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" height="45">
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<nav class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php wp_icac_main_nav(); ?>
					<form class="navbar-form navbar-right" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default"><?php echo __( 'Search', 'icac' ); ?></button>
							</span>
						</div>
					</form>
				</nav><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</header>
		
		<div class="jumbotron banner"></div>

		<main id="content">
			<div class="container">