<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bunko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry__title">', '</h1>' );
		else :
			the_title( '<h2 class="entry__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( has_post_thumbnail() ) :
				the_post_thumbnail();
			endif;
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry__meta">
			<?php bunko_posted_on(); ?>
		</div><!-- .entry__meta -->
		<?php
		endif; ?>
	</header>

	<div class="entry__content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bunko' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bunko' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<footer class="entry__footer">
		<?php bunko_entry_footer(); ?>
	</footer>
</article>
