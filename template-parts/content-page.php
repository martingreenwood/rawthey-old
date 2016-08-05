<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rawthey
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-header">
		<h2><?php the_field('intro_header'); ?></h2>
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

</article>
