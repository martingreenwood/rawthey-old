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
			<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $ft_image; ?>"></div>
		</header>
		
		<main id="main" class="container" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main>

		<section class="testimonials">
			<div class="slick">
			<?php
				$args = array( 'post_type' => 'testimonial', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="testimonial">
						<i class="fa fa-quote-left" aria-hidden="true"></i>
						<div class="title">
							<div class="table">
								<div class="cell middle">
									<?php the_content(); ?>
									<h3><?php the_title(); ?></h3>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata();
			?>
			</div>
		</section>

		<section class="offerings">
			<div class="container">
				<h3>What I Offer</h3>
				<p>A few things you can ask me to help with</p>
				<hr>
				<div class="clear"></div>

				<div class="column">
					<i class="fa fa-wordpress" aria-hidden="true"></i>
					<h4>WordPress Development</h4>
					
					<ul>
					<?php
					// check if the repeater field has rows of data
					if( have_rows('wordpress_services') ):

					 	// loop through the rows of data
					    while ( have_rows('wordpress_services') ) : the_row(); ?>

					        <li><?php the_sub_field('wp_service'); ?></li>

					    <?php endwhile;

					endif;

					?>
					</ul>
				</div>

				<div class="column">
					<i class="fa fa-keyboard-o" aria-hidden="true"></i>
					<h4>Front End Development</h4>
					
					<ul>
					<?php

					// check if the repeater field has rows of data
					if( have_rows('front_end_services') ):

					 	// loop through the rows of data
					    while ( have_rows('front_end_services') ) : the_row(); ?>

					        <li><?php the_sub_field('fe_service'); ?></li>

					    <?php endwhile;

					endif;

					?>
					</ul>

				</div>


			</div>
		</section>

		<section class="clients">
			<div class="container">
				<h3>My Clients</h3>
				<p>Some of the amazing people I have worked with</p>
				<hr>

				<?php $feature_clients = get_field('feature_clients'); if( $feature_clients ): ?>
				<ul>
				<?php foreach( $feature_clients as $feature_client ): ?>
					<li>
						<img src="<?php echo $feature_client['sizes']['large']; ?>" alt="<?php echo $feature_client['alt']; ?>" />
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>

			</div>
		</section>

		<?php /*<section class="wall">
			<?php echo do_shortcode('[pp_social_wall]'); ?>			
		</section>*/ ?>

	</div>


<?php
get_footer();
