<?php
/**
 * rawthey functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rawthey
 */

if ( ! function_exists( 'rawthey_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rawthey_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rawthey, use a find and replace
	 * to change 'rawthey' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'rawthey', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'rawthey' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
endif;
add_action( 'after_setup_theme', 'rawthey_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rawthey_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rawthey_content_width', 640 );
}
add_action( 'after_setup_theme', 'rawthey_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rawthey_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rawthey' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rawthey' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rawthey_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rawthey_scripts() {
	wp_enqueue_style( 'rawthey-style', get_stylesheet_uri() );
	wp_enqueue_style( 'rawthey-fonts', '//fonts.googleapis.com/css?family=Open+Sans|Source+Sans+Pro' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'rawthey-fa', '//use.fontawesome.com/4d1c3d447b.js', array(), '4.6.3', true );
	wp_enqueue_script( 'rawthey-base', get_template_directory_uri() . '/js/base.js', array(), '1.0.0', true );
	
	if(is_page( 'work' )) {
		wp_enqueue_script( 'rawthey-macy', get_template_directory_uri() . '/js/macy.js', array(), '1.0.0', true );
	}

	if(is_home()) {
		wp_enqueue_script( 'rawthey-news', get_template_directory_uri() . '/js/macy_alt.js', array(), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'rawthey_scripts' );

/**
 * TypeKit
 */
function rawthey_head_scripts() {
?>
<script>
  (function(d) {
    var config = {
      kitId: 'nue2tim',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<!--Start of HappyFox Live Chat Script-->
<script>
 window.HFCHAT_CONFIG = {
     EMBED_TOKEN: "048914a0-12d7-11e6-a72a-199ef69542b3",
     ACCESS_TOKEN: "e823a1abce5e4c048b94401842f32fd5",
     HOST_URL: "https://happyfoxchat.com",
     ASSETS_URL: "https://d1l7z5ofrj6ab8.cloudfront.net/visitor"
 };

(function() {
  var scriptTag = document.createElement('script');
  scriptTag.type = 'text/javascript';
  scriptTag.async = true;
  scriptTag.src = window.HFCHAT_CONFIG.ASSETS_URL + '/js/widget-loader.js';

  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(scriptTag, s);
})();
</script>
<!--End of HappyFox Live Chat Script-->
<?php
}
add_action( 'wp_head', 'rawthey_head_scripts', '999' );

/*=======================================
=            Remove JP Share            =
=======================================*/

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}

add_action( 'loop_start', 'jptweak_remove_share' );

add_filter( 'pre_option_rg_gforms_disable_css', '__return_true' );

/**
 * Custom Custom Post TYpes.
 */
require get_template_directory() . '/inc/cpts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
