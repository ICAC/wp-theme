<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" id="s">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><?php echo __( 'Search', 'icac' ); ?></button>
    </span>
	</div>
</form>