<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bunko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<h1 class="entry__title"><?php the_title(); ?></h1>
	</header>

	<div class="entry__content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bunko' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry__content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry__footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'bunko' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry__footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
