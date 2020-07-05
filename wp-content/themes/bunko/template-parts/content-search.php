<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bunko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry__header">
		<?php the_title( sprintf( '<h2 class="entry__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry__meta">
				<?php bunko_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header>

	<div class="entry__summary">
		<?php the_excerpt(); ?>
	</div>

	<footer class="entry__footer">
		<?php bunko_entry_footer(); ?>
	</footer>
</article>
