<?php
/**
 * The template for displaying the wor page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rawthey
 */

get_header();

	get_sidebar(); ?>

	<div id="primary" class="content-area">
		
		<main id="main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'work' );

			endwhile; // End of the loop.
			?>

		</main>
	</div>

<?php
get_footer();
