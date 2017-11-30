<?php
/*
Template Name: Install
*/

get_header();

$page_id = get_the_ID();
$page_title = get_field( "page_title", $page_id );
$page_emoji = get_field( "title_emoji", $page_id );
$paragraph_1 = get_field( "get_your_developer_pack", $page_id );
$paragraph_2 = get_field( "set_your_development_environment", $page_id );
$paragraph_3 = get_field( "start_your_journey_with_the_brother_framework", $page_id );
?>

<div id="intro" class="intro-page content-page">
	<div id="header" class="page-header">
		<h1 class="title"><?php echo $page_title; ?></h1>
		<img src="<?php echo $page_emoji; ?>" class="page-emoji" />
	</div>
	<div class="page-emojies">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/box.png" alt="Get your developer pack!" title="Get your developer pack!" class="emojie" />
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/lift.png" alt="Set your development environment" title="Set your development environment" class="emojie" />
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/loveit.png" alt="Start your journey with the Brother Framework" title="Start your journey with the Brother Framework" class="emojie" />
	</div>
	<div class="paragraph just-text">
		<div class="text">
			<?php echo $paragraph_1; ?>
		</div>
	</div>
	<div class="paragraph just-text">
		<div class="text">
			<?php echo $paragraph_2; ?>
		</div>
	</div>
	<div class="paragraph just-text">
		<div class="text">
			<?php echo $paragraph_3; ?>
		</div>
	</div>
	<div class="quickies">
		<div class="flex-container">
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/note.jpg);">
				<a href="<?php echo get_site_url(); ?>/leave-note" class="invisible-anchor orange">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/message.png" class="icon" />
					Leave a note
				</a>
			</div>
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/path.jpg);">
				<a href="<?php echo get_site_url(); ?>/docs" class="invisible-anchor green">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/learn.png" class="icon" />
					Learn the Framework
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
