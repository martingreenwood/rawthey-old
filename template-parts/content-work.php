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

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<div class="entry-work">
		<div id="macy">
		<?php
			$args = array( 'post_type' => 'project', 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="item">
					<a class="project-link" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'large' ); ?>
					<div class="title">
						<div class="wrapped">
							<h2><?php the_title(); ?></h2>
							<?php 
							$terms = "";
							$term_names = array();
							$terms = wp_get_object_terms( get_the_id(), 'type' );
							foreach( $terms as $term )
								$term_names[] = $term->name;
							?>
							<h4><?php echo implode( ', ', $term_names ); ?></h4>
						</div>
					</div>
					</a>
				</div>
			<?php endwhile;
		?>
		</div>
	</div>

</article>
