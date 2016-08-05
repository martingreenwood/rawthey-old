<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
		<section class="error-404 not-found" style="background-image: url(<?php echo $ft_image; ?>);">
			<div class="table">

				<div class="cell middle">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rawthey' ); ?></h1>
				</div>

			</div>
		</section>
	</div>

<?php
get_footer();
