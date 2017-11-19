<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 11hub_Developers
 */

$device = wp_is_mobile() ? "mobile" : "desktop";
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Playfair+Display" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $device ); ?>>
<div id="page" class="site">

	<nav id="header" class="site-header">
		<div class="left">
			<a href="<?php echo get_site_url(); ?>" class="invisible-anchor">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/11hub-logo.png" class="logo" />
			</a>
		</div>
		<div class="right">
			<?php wp_nav_menu( array( 'menu' => '2', 'menu_id' => '2' ) ); ?>
		</div>
	</nav>

	<div id="content" class="site-content">
