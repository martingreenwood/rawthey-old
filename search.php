<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'rawthey' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</div>

<?php
get_footer();
