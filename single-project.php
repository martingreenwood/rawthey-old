<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<div class="title">
					<div class="table">
						<div class="cell middle">
							<h1><?php the_title(); ?></h1>
							<h3><?php the_field('project_tag_line'); ?></h3>

							<a href="#main"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</header>
		
		<main id="main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'project' );

		endwhile; // End of the loop.
		?>

		</main>

		<?php if (get_field('project_challange_title')): ?>
		<section id="challange">

			<?php 
			$challange_image = get_field('challange_image');
			$size = 'full'; // (thumbnail, medium, large, full or custom size)
			if( $challange_image ) {
				echo wp_get_attachment_image( $challange_image['id'], $size );
			}
			?>

			<div class="container content">
				<header>
					<p><?php the_field('project_challange_title'); ?></p>
				</header>
				<article>
					<?php the_field('project_challange'); ?>
				</article>
			</div>

		</section>
		<?php endif; ?>

		<?php if (get_field('project_solution_title')): ?>
		<section id="solution">

			<div class="row">

				<?php 
				$solution_image = get_field('solution_image');
				?>
				<div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo $solution_image['url']; ?>"></div>

				<div class="content">
					<div class="container">
						<header>
							<p><?php the_field('project_solution_title'); ?></p>
						</header>
						<article>
							<?php the_field('project_solution'); ?>
						</article>
					</div>
				</div>

			</div>

		</section>
		<?php endif; ?>

		<?php if (get_field('feature_one_title')): ?>
		<section id="featureone">

			<div class="row">

				<div class="column image">
					<?php 
						$feature_one_image = get_field('feature_one_image');
						$size = 'full'; // (thumbnail, medium, large, full or custom size)
						if( $feature_one_image ) {
							echo wp_get_attachment_image( $feature_one_image['id'], $size );
						}
					?>
				</div>

				<div class="content">
					<div class="container">
						<header>
							<p><?php the_field('feature_one_title'); ?></p>
						</header>
						<article>
							<?php the_field('feature_one'); ?>
						</article>
					</div>
				</div>

			</div>

		</section>
		<?php endif; ?>

		<?php if (get_field('feature_two_title')): ?>
		<section id="featuretwo">

			<div class="row">

				<div class="column image">
				<?php 
					$feature_two_image = get_field('feature_two_image');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $feature_two_image ) {
						echo wp_get_attachment_image( $feature_two_image['id'], $size );
					}
				?>
				</div>

				<div class="content">
					<div class="container">
						<header>
							<p><?php the_field('feature_two_title'); ?></p>
						</header>
						<article>
							<?php the_field('feature_two'); ?>
						</article>
					</div>
				</div>

			</div>

		</section>
		<?php endif; ?>

		<section id="nextproject">
			<div class="container">
				<?php previous_post_link( '%link', '<i class="fa fa-angle-right" aria-hidden="true"></i><br>Next Project', false ); ?>
			</div>
		</section>

	</div>

<?php
get_footer();
