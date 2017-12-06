<?php
/*
Template Name: Docs
*/

get_header();

$pade_id = get_the_ID();
$page_title = get_field( "page_title", $page_id );
?>

	<div id="docs" class="intro-page content-page">
		<div id="header" class="simple page-header">
			<h1 class="title"><?php echo $page_title; ?></h1>
		</div>
	</div>
	<div class="quickies">
		<div class="flex-container">
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/php.jpg);">
				<a href="<?php echo get_site_url(); ?>/brother-php" class="invisible-anchor wet-asphalt">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music.png" class="icon" />
					Brother PHP
				</a>
			</div>
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/js.jpg);">
				<a href="<?php echo get_site_url(); ?>/brother-js" class="invisible-anchor purple">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/game.png" class="icon" />
					Brother JS
				</a>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
