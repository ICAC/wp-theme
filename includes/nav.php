<?php

function wp_icac_main_nav() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
      'items_wrap'     => '<ul id="%1$s" class="%2$s" layout="row">%3$s</ul>',
			'depth'          => 2,
		)
	);
}

function icac_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation" layout="row">
			<div class="nav-previous" flex><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'icac' ) ); ?></div>
			<div class="nav-next" flex><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'icac' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

add_filter('nav_menu_link_attributes', 'icac_nav_flexbox', 10, 3);

function icac_nav_flexbox( $atts, $item, $args ) {
  $atts['flex'] = 'flex';

  return $atts;
}