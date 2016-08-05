<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rawthey
 */
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
	?>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav>

	<div class="contact">
		<ul class="social">
			<li><i class="fa fa-facebook" aria-hidden="true"></i></li>
			<li><i class="fa fa-twitter" aria-hidden="true"></i></li>
			<li><i class="fa fa-google" aria-hidden="true"></i></li>
			<li><a href="mailto:<?php echo antispambot( 'studio@rawtheydigital.com' ); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
			<li>01539 621322</li>
		</ul>
	</div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
