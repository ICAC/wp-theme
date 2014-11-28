<!doctype html>
<!--[if IE 7]><html class="no-js ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">		
		
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
    <header class="page-header">
      <div class="brand-image" layout="row" layout-align="start end">
        <a href="<?php echo home_url(); ?>" flex>
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </a>
        <button class="menu-toggle" icac-toggle="#menu-main-menu">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
      <nav>
        <?php wp_icac_main_nav(); ?>
      </nav>
    </header>

		<main id="content" layout="column" layout-gt-md="row">