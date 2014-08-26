	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				the_post_thumbnail();
			endif; ?>

			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'icac' ) . '</span>', __( '1 Reply', 'icac' ), __( '% Replies', 'icac' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; // comments_open() ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'icac' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'icac' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php 	
		$owners = get_users( array(
			'connected_type' => 'badge_owners',
			'connected_items' => $post
		) );
				
		$owners_count = count($owners);
		?>
		
		<?php if ( is_single() ) : ?>
			<h2>Owners</h2>
			<?php if( $owners_count == 0 ) : ?>
				<strong>No one has this badge yet! Could you be the first?</strong>
			<?php else : ?>
				<ul>
				<?php foreach($owners as $owner) : ?>
					<li>
						<?php 
							echo sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
								esc_url( get_author_posts_url( $owner->ID ) ),
								$owner->display_name
							);
						?>
					</li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php else : ?>
			<?php if( $owners_count == 0 ) : ?>
				<strong>No one has this badge yet! Could you be the first?</strong>
			<?php else : ?>
				<em><?php echo $owners_count; echo $owners_count == 1 ? " person has" : " people have" ?> this badge</em>
			<?php endif; ?>
		<?php endif; ?>
		
		<footer class="entry-meta">
			<?php icac_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'icac' ), '<span class="edit-link text-muted">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'icac_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'icac' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'icac' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
