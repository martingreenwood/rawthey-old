<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rawthey
 */

$terms = "";
$term_names = array();
$terms = wp_get_object_terms( get_the_id(), 'type' );
foreach( $terms as $term )
	$term_names[] = "<span>" . $term->name . "</span>";

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>
	
	<div class="entry-content row">
		
		<div class="intro">
			<p><?php the_title(); ?></p>
			<div class="tags">
				<p><?php echo implode( ', ', $term_names ); ?></p>
			</div>

			<?php if (get_field('project_url')) { ?>
			<a id="projectwebsite" target="_blank" href="<?php the_field('project_url'); ?>">View Project Website</a>
			<?php } ?>

		</div>

		<div class="details">
			<?php
			the_content();
			?>
			<div class="shareme">
				<p>Like what you see? Give it a share...</p>
				<hr>
				<?php if ( function_exists( 'sharing_display' ) ) { sharing_display( '', true ); } ?>
			</div>
		</div>

	</div>

</article>
