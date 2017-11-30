<?php
/**
 * 11hub Developers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 11hub_Developers
 */

if ( ! function_exists( 'elhub_dev_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function elhub_dev_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on 11hub Developers, use a find and replace
		 * to change 'elhub_dev' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'elhub_dev', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'elhub_dev' ),
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
		add_theme_support( 'custom-background', apply_filters( 'elhub_dev_custom_background_args', array(
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
add_action( 'after_setup_theme', 'elhub_dev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elhub_dev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elhub_dev_content_width', 640 );
}
add_action( 'after_setup_theme', 'elhub_dev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elhub_dev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'elhub_dev' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'elhub_dev' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'elhub_dev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elhub_dev_scripts() {
	wp_enqueue_style( 'elhub_dev-style', get_stylesheet_uri() );

	wp_enqueue_script( 'elhub_dev-initial', get_template_directory_uri() . '/js/initial.js', array( "jquery" ), '', true );

	wp_enqueue_script( 'elhub_dev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'elhub_dev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elhub_dev_scripts' );

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

//add_action( "init", "create_tables" );
function create_tables() {
	global $wpdb;
	$user_emails_table = $wpdb->prefix ."user_emails";
	if( $wpdb->get_var( "SHOW TABLES LIKE '$user_emails_table'" ) != $user_emails_table ) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql_ = "
		CREATE TABLE $user_emails_table (
			id INT NOT NULL AUTO_INCREMENT,
			first_name LONGTEXT,
			last_name LONGTEXT,
			email LONGTEXT,
			PRIMARY KEY(id)
		) $charset_collate;
		";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql_ );
	}
}

add_action( 'wp_ajax_nopriv_leave_note', 'leave_note' );
add_action( 'wp_ajax_leave_note', 'leave_note' );
function leave_note() {
	$first_name = isset( $_POST[ "first_name" ] ) && !empty( $_POST[ "first_name" ] ) ? sanitize_text_field( $_POST[ "first_name" ] ) : "";
	$last_name = isset( $_POST[ "last_name" ] ) && !empty( $_POST[ "last_name" ] ) ? sanitize_text_field( $_POST[ "last_name" ] ) : "";
	$email_ = isset( $_POST[ "email" ] ) && !empty( $_POST[ "email" ] ) ? sanitize_email( $_POST[ "email" ] ) : "";
	$textarea_ = isset( $_POST[ "textarea" ] ) && !empty( $_POST[ "textarea" ] ) ? sanitize_textarea_field( $_POST[ "textarea" ] ) : "";

	$response = true;

	if ( !empty( $first_name ) && !empty( $last_name ) && !empty( $email_ ) && is_email( $email_ ) ) {

	} else { $response = "Something with your details is wrong!"; }

	if ( !empty( $textarea_ ) ) {
		wp_mail( "vtm.sunrise@gmail.com", "11hub Developer Note", $textarea_ );
	} else { $response = "Something with your message is wrong!"; }

	if ( $response == true ) {
		global $wpdb;
		$user_emails_table = $wpdb->prefix ."user_emails";

		$sql_ = "SELECT email FROM $user_emails_table WHERE email='$email_' LIMIT 1";
		$results_ = $wpdb->get_results( $sql_, OBJECT );	

		if ( empty( $results_ ) ) {
			$wpdb->insert(
				$user_emails_table,
				array(
					"first_name" => $first_name,
					"last_name" => $last_name,
					"email" => $email_
				)
			);
		}
	}

	echo json_encode( $response );
	die( "" );
}
