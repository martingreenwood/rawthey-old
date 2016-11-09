<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rawthey
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">

		<?php //the_post_thumbnail('full'); ?>

		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="date">
				<?php rawthey_posted_on(); ?>
			</div>
			<div class="tags">
				<?php the_tags( '<span>', " ", "</span>" ); ?>
			</div>
		</div>
		<?php
		endif; ?>
	</header>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div>

</article>