<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $ft_image; ?>">
				
				<div class="table">
					<div class="cell middle">
						<h1>
							I'm Martin Greenwood<br>An Independent WordPress Developer, Web Designer &amp; Front End Developer.
							<br><br>
							<a class="btn outline" href="<?php echo home_url('/about'); ?>">Learn More</a><a class="btn" href="<?php echo home_url('/start-a-project'); ?>">Get in Touch</a>
						</h1>
					</div>
				</div>

			</div>
		</header>
		
		<?php /*if (have_posts()): ?>
		<main id="main" class="container" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main>
		<?php endif; */ ?>
	</div>

<?php get_footer();
