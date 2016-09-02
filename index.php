<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rawthey
 */

get_header();

	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $show->ID ), 'single-post-thumbnail' ); 
	if ($image) {
		$ft_image = $image[0];
	} else {
		$ft_image = get_stylesheet_directory_uri(). 'assets/default-cover.jpg';
	}

	get_sidebar(); ?>

	<div id="primary" class="content-area">

		<header id="header" class="parallax">
			<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $ft_image; ?>"></div>
		</header>
		
		<main id="main" class="container" role="main">
			
			<div id="first">
			<?php
			$i=0;
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

					if ($i++ == 0) {
						echo "</div>";
						echo "<div id='second'>";
					}

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</div>

		</main>
	</div>

<?php
get_footer();
