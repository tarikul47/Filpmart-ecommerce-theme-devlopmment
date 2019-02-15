<?php
/**
 * filpmart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package filpmart
 */

if ( ! function_exists( 'filpmart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function filpmart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on filpmart, use a find and replace
		 * to change 'filpmart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'filpmart', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary', 'filpmart' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'filpmart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        add_theme_support('woocommerce');
	}
endif;
add_action( 'after_setup_theme', 'filpmart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function filpmart_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'filpmart_content_width', 640 );
}
add_action( 'after_setup_theme', 'filpmart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function filpmart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'filpmart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'filpmart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'filpmart_widgets_init' );
/**
 * Version Set
 */
define( "VERSION", time() );
define( "ASSETS_DIR", get_template_directory_uri() . "/assets/" );

/**
 * Enqueue scripts and styles.
 */
function filpmart_scripts() {
	

	$css_files = array(
        'google-fonts-roboto'      => '//fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'google-fonts-open'      => '//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800',
        'google-fonts-montserrat'      => '//fonts.googleapis.com/css?family=Montserrat:400,700',
        'bootstrap-css'         => ASSETS_DIR . 'css/bootstrap.min.css',
        'main-css'         => ASSETS_DIR . 'css/main.css',
        'blue-css'       => ASSETS_DIR . 'css/blue.css',
        'carousel-css'             => ASSETS_DIR . 'css/owl.carousel.css',
        'carousel-transitions-css'       => ASSETS_DIR . 'css/owl.transitions.css',
        'animate.min-css' => ASSETS_DIR . 'css/animate.min.css',
        'rateit-css'    => ASSETS_DIR . 'css/rateit.css',
        'bootstrap-select-css'           => ASSETS_DIR . 'css/bootstrap-select.min.css',
        'font-awesome-css'         => ASSETS_DIR . 'css/font-awesome.css',
        'woo-css'         => ASSETS_DIR . 'css/woo.css'
    );

    foreach ( $css_files as $handle => $css_file ) {
        wp_enqueue_style( $handle, $css_file, null, VERSION );
    }

	//wp_enqueue_style( 'filpmart-woo-css',  ASSETS_DIR . 'css/woo.css' );
	wp_enqueue_style( 'filpmart-style', get_stylesheet_uri() );



	$js_files = array(
        'jquery-1.11.1.min-js'            => array(
            'src' => ASSETS_DIR . 'js/jquery-1.11.1.min.js',
            'dep' => array( 'jquery' )
        ),
        'bootstrap.min-js'          => array(
            'src' => ASSETS_DIR . 'js/bootstrap.min.js',
            'dep' => array( 'jquery' )
        ),
        'bootstrap-hover-dropdown-js'       => array(
            'src' => ASSETS_DIR . 'js/bootstrap-hover-dropdown.min.js',
            'dep' => array( 'jquery' )
        ),
        'carousel.min-js'                  => array( 'src' => ASSETS_DIR . 'js/owl.carousel.min.js', 'dep' => array( 'jquery' ) ),
        'echo.min-js'              => array( 'src' => ASSETS_DIR . 'js/echo.min.js', 'dep' => array( 'jquery' ) ),
        'jquery-jquery.easing-js' => array(
            'src' => ASSETS_DIR . 'js/jquery.easing-1.3.min.js',
            'dep' => array( 'jquery' )
        ),
        'bootstrap-slider-js'              => array( 'src' => ASSETS_DIR . 'js/bootstrap-slider.min.js' ),
        'jquery.rateit-js'         => array( 'src' => ASSETS_DIR . 'js/jquery.rateit.min.js' ),
        'lightbox.min-js'                 => array( 'src' => ASSETS_DIR . 'js/lightbox.min.js', 'dep' => array( 'jquery' ) ),
        'bootstrap-select-js'                 => array( 'src' => ASSETS_DIR . 'js/bootstrap-select.min.js', 'dep' => array( 'jquery' ) ),
        'wow.min-js'                 => array( 'src' => ASSETS_DIR . 'js/wow.min.js', 'dep' => array( 'jquery' ) ),
        'scripts-js'                 => array( 'src' => ASSETS_DIR . 'js/scripts.js', 'dep' => array( 'jquery' ) ),

    );

    foreach ( $js_files as $handle => $js_file ) {
        wp_enqueue_script( $handle, $js_file['src'], $js_file['dep'], VERSION, true );
    }



	wp_enqueue_script( 'filpmart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'filpmart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'filpmart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Woocommerce action remove
 */
function woo_remove(){

    remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
    remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
    remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
    remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
}
add_action('init','woo_remove');

/**
 * Change number or products per row to 3
 */
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 3; // 3 products per row
    }
}
add_filter('loop_shop_columns', 'loop_columns', 999);

/**
 * Breadcrumb
 */

/**
 * Change several of the breadcrumb defaults
 */

function flipmart_breadcrumb() {
    return array(
        'delimiter'   => ' &#47; ',
        'wrap_before' => '<div class="breadcrumb-inner"><ul class="list-inline list-unstyled">',
        'wrap_after'  => '</ul></div>',
        'before'      => '',
        'after'       => '',
        'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
    );
}
add_filter('woocommerce_breadcrumb_defaults','flipmart_breadcrumb');

/**
 * Pagination
 */

function flipmart_pagination(){

    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return;

    $big = 9999999999;// need an unlikely integer

    $pages = paginate_links(array(
        'base'  => str_replace($big, '%#%',esc_url(get_pagenum_link($big))),
        'format'=> 'paged=%#%',
        'current'=>max(1,get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array',
        'prev_next'=>true,
        'prev_text'=>_('<i class="fa fa-angle-left"  aria-hidden="true"></i>'),
        'next_text'=>_('<i class="fa fa-angle-right"  aria-hidden="true"></i>')

    ));

    if (is_array($pages)){

        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
        foreach ($pages as $page){
            echo "<li>$page</li>";
        }
        echo '</ul></div>';
    }






}