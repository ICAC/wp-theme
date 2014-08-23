<?php

function wp_icac_main_nav() {
	wp_nav_menu(
		array(
			'menu_class' => 'nav navbar-nav',
			'theme_location' => 'primary', /* where in the theme it's assigned */
			'container' => false, /* container class */
			'depth' => 2,
			'walker' => new BootstrapNavWalker()
		)
	);
}

function icac_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'icac' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'icac' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'icac' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}


class BootstrapNavWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0) {	
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = '';
		
		$has_children = $args->has_children && $depth + 1 < $args->depth;
				
		if ( $has_children ) {
			$class_names = "dropdown dropdown-toggle";
		}
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	
	  $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	  $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	
		$output .= $indent . '<li' . $id . $class_names .'>';

    $atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';		
				
		$atts['data-toggle'] = $has_children ? 'dropdown' : '';
		
		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
            }
    }	
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		
		if ( $has_children ) {
			$item_output .= '<span class="caret"></span></a>';
		}
		else {
			$item_output .= '</a>';
		}
		
		$item_output .= $args->after;
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}
	
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		}
		
		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}