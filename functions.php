<?php
/**
 * AngkorHarvest functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AngkorHarvest
 */

if ( ! function_exists( 'angkorharvest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function angkorharvest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AngkorHarvest, use a find and replace
		 * to change 'angkorharvest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'angkorharvest', get_template_directory() . '/languages' );

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
		add_image_size( 'gallery-first', 500, 500 );//custom thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'gallery-first-square', 500, 500, true );//custom thumbnail
		add_image_size( 'large-image', 1000, 1000 );//custom thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'large-image-square', 1000, 1000, true );//custom thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'medium-square', 300, 300, true );//custom thumbnail
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'fhd-image', 1920, 1080);//custom thumbnail

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'angkorharvest' ),
			'footer' => 'Footer Menu',
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
		add_theme_support( 'custom-background', apply_filters( 'angkorharvest_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'angkorharvest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function angkorharvest_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'angkorharvest_content_width', 640 );
}
add_action( 'after_setup_theme', 'angkorharvest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function angkorharvest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'angkorharvest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'angkorharvest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'angkorharvest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function angkorharvest_scripts() {
	wp_enqueue_style( 'angkorharvest-style', get_stylesheet_uri() );

	wp_enqueue_script( 'angkorharvest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'angkorharvest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script ('jquery');

	if (is_front_page()){//front page js
		wp_enqueue_style('slick-css', get_template_directory_uri(). '/js/third-party/slick/slick.css');
		wp_enqueue_style('slick-css-theme', get_template_directory_uri(). '/js/third-party/slick/slick-theme.css');
		wp_enqueue_script('slick-js', get_template_directory_uri(). '/js/third-party/slick/slick.min.js', array('jquery'), '20170928', true);

		wp_enqueue_script('front-page-js', get_template_directory_uri(). '/js/front-page.js', array('slick-js'), '20170928', true);
	}

	if (is_page('About')){//about page js
		wp_enqueue_script('about-page', get_template_directory_uri(). '/js/about-page.js', array('jquery'), '20170930', true);
	}

	if (is_singular('product')){//product page js
		wp_enqueue_script('product-detail', get_template_directory_uri(). '/js/product-detail.js', array('jquery'), '20171001', true);
	}

	if (is_home() || is_category()){//product page js
		wp_enqueue_script('blog-js', get_template_directory_uri(). '/js/blog.js', array('jquery'), '20171006', true);
	}

}
add_action( 'wp_enqueue_scripts', 'angkorharvest_scripts' );

// custom excerpt
function angkorharvest_excerpt_length( $length ) {
return 50;
}

add_filter( 'excerpt_length', 'angkorharvest_excerpt_length', 999 );

function angkorharvest_excerpt_more( $more ) {
return '<a class="read-more" href="' . get_permalink() . '">...Read More</a>';
}
add_filter( 'excerpt_more', 'angkorharvest_excerpt_more' );

// require get_template_directory() . '/inc/additional.php';

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





 function angkorharvest_register_custom_post_types() {
    $labels = array(
        'name'               => _x( 'Products', 'post type general name' ),
        'singular_name'      => _x( 'Product', 'post type singular name'),
        'menu_name'          => _x( 'Products', 'admin menu' ),
        'name_admin_bar'     => _x( 'Product', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Product' ),
        'add_new_item'       => __( 'Add New Product' ),
        'new_item'           => __( 'New Product' ),
        'edit_item'          => __( 'Edit Product' ),
        'view_item'          => __( 'View Product' ),
        'all_items'          => __( 'All Products' ),
        'search_items'       => __( 'Search Products' ),
        'parent_item_colon'  => __( 'Parent Products:' ),
        'not_found'          => __( 'No Products found.' ),
        'not_found_in_trash' => __( 'No Products found in Trash.' ),
        'archives'           => __( 'Product Archives'),
        'insert_into_item'   => __( 'Uploaded to this Product'),
        'uploaded_to_this_item' => __( 'Product Archives'),
        'filter_item_list'   => __( 'Filter Products list'),
        'items_list_navigation' => __( 'Products list navigation'),
        'items_list'         => __( 'Products list'),
        'featured_image'     => __( 'Product feature image'),
        'set_featured_image' => __( 'Set Product feature image'),
        'remove_featured_image' => __( 'Remove Product feature image'),
        'use_featured_image' => __( 'Use as feature image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'          => 'dashicons-archive',
    );
    register_post_type( 'product', $args );
 }
 add_action( 'init', 'angkorharvest_register_custom_post_types' );

function angkorharvest_rewrite_flush() {
      	angkorharvest_register_custom_post_types();
        flush_rewrite_rules();
    }
    add_action( 'after_switch_theme', 'angkorharvest_rewrite_flush' );


function angkorharvest_register_taxonomies() {
    // Add Product Type taxonomy - hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Product Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Product Categories' ),
        'all_items'         => __( 'All Product Types' ),
        'parent_item'       => __( 'Parent Product Category' ),
        'parent_item_colon' => __( 'Parent Product Category:' ),
        'edit_item'         => __( 'Edit Product Category' ),
        'view_item'         => __( 'Vview Product Category' ),
        'update_item'       => __( 'Update Product Category' ),
        'add_new_item'      => __( 'Add New Product Category' ),
        'new_item_name'     => __( 'New Product Category Name' ),
        'menu_name'         => __( 'Product Category' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-categories' ),
    );
    register_taxonomy( 'product-category', array( 'product' ), $args );
 }
 add_action( 'init', 'angkorharvest_register_taxonomies');
					
// Remove dashboard primary widgets
function remove_dashboard_meta() {
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

//Remove dashboard menus
function wpexplorer_remove_menus() {
	if ( ! current_user_can( 'manage_options' ) ) {
	remove_menu_page( 'edit-comments.php' );     // Comments
	remove_menu_page( 'themes.php' );            // Appreance
	//remove_menu_page( 'tools.php' );           // Tools
	//remove_menu_page( 'options-general.php' ); // Settings
	}
}
add_action( 'admin_menu', 'wpexplorer_remove_menus' );

//Remove some sub menus on dashboard
function wpexplorer_adjust_the_wp_menu() {
	if ( ! current_user_can( 'manage_options' ) ) {
	$page_settings_discussion = remove_submenu_page( 'options-general.php', 'options-discussion.php' );
	$page_settings_media = remove_submenu_page( 'options-general.php', 'options-media.php' );
	}
}
add_action( 'admin_menu', 'wpexplorer_adjust_the_wp_menu', 999 );

//Customize WordPress footer
function wpexplorer_remove_footer_admin () {
	echo '<span id="footer-thankyou">&copy; Copyright Angkor Harvest 2017 | Designed by Claire, David, Jessica and Ke</span>';
}
add_filter( 'admin_footer_text', 'wpexplorer_remove_footer_admin' );

//Add introduction
function introduction_add_dashboard_widgets() {
	if ( ! current_user_can( 'manage_options' ) ) {
	wp_add_dashboard_widget(
		'introduction_dashboard_widget', // Widget slug.
		'Introduction',                   // Title.
		'introduction_dashboard_widget_function' // Display function.
	);
	}
}
add_action( 'wp_dashboard_setup', 'introduction_add_dashboard_widgets' );

function introduction_dashboard_widget_function() {
	echo "<p>Welcome to your website. This is a short introduction about WordPress.</p>";
	echo "<p>This indroduction will help you get general idea about your content management system of your website.</p>";
	echo "<p>On left-side-bar, you will see some menus which you can add blog posts, edit contents of each page, and upload images.</p>";
	echo "<p><strong>Blog:</strong> This is where you can add new blog posts. Under this menu, you can “Add New” post and manage your categories.</p>";
	echo "<p><strong>Products:</strong> This is where you can add new products. Under this menu, you can “Add New” product and manage your product categories.</p>";
	echo "<p><strong>Media:</strong> This is where you can upload videos, audios and images which you can use in your blog posts, pages and products.</p>";
	echo "<p><strong>Profile:</strong> This is where you can customize the style you like, also you can add your personal information.</p>";
	echo "<p><strong>Tools:</strong> This is where you can use some tools for your convenience  to manage your website.</p>";
	echo "<p>Aloso you can see some widgets on dashboard. Like '<strong>At a Glance</strong>' and '<strong>Activity</strong>' give you a preview of your recent modifications of your website. '<strong>Quick Draft</strong>' lets you edit draft blog post without going into 'Blog' editing page.</p>";
	echo "<p>You alos can customize dashboard layout by clicing '<Strong>Screen Options</Strong>' on top right corner to decide which widgets you want to show or not.</p>";
}

//Add video tutorials
function tutorials_add_dashboard_widgets() {
	if ( ! current_user_can( 'manage_options' ) ) {
	wp_add_dashboard_widget(
		'tutorials_dashboard_widget', // Widget slug.
		'Video Tutorials', // Title.
		'tutorials_dashboard_widget_function' // Display function.
	);
	}
}
add_action( 'wp_dashboard_setup', 'tutorials_add_dashboard_widgets' );

function tutorials_dashboard_widget_function() {
	echo "<p>How to add new post.<a href='https://www.youtube.com/watch?v=vX0DMAjtZZg' target='blank'>Video</a></p>";
	echo "<p>How to edit pages.<a href='https://www.youtube.com/watch?v=1QdQ-QCio9A' target='blank'>Video</a></p>";
	echo "<p>How to upload images.<a href='https://www.youtube.com/watch?v=t4WhyhWLpl0' target='blank'>Video</a></p>";
}

//Renaming Posts
function posts_change_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';//Post
}
add_action( 'admin_menu', 'posts_change_menu_label' );