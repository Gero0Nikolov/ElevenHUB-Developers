<?php
/*
Template Name: Intro
*/

get_header();

$page_id = get_the_ID();
$page_title = get_field( "page_title", $page_id );
$page_emoji = get_field( "title_emoji", $page_id );
$paragraph_1_emojie = get_field( "paragraph_no1_emojie", $page_id );
$paragraph_1_text = get_field( "paragraph_no1_text", $page_id );
$paragraph_2_emojie = get_field( "paragraph_no2_emojie", $page_id );
$paragraph_2_text = get_field( "paragraph_no2_text", $page_id );
?>

<div id="intro" class="intro-page content-page">
	<div id="header" class="page-header">
		<h1 class="title"><?php echo $page_title; ?></h1>
		<img src="<?php echo $page_emoji; ?>" class="page-emoji" />
	</div>
	<div class="paragraph">
		<img src="<?php echo $paragraph_1_emojie; ?>" class="emojie" />
		<div class="text"><?php echo $paragraph_1_text; ?></div>
	</div>
	<div class="paragraph">
		<div class="text"><?php echo $paragraph_2_text; ?></div>
		<img src="<?php echo $paragraph_2_emojie; ?>" class="emojie" />
	</div>
	<div class="quickies">
		<div class="flex-container">
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/note.jpg);">
				<a href="<?php echo get_site_url(); ?>/leave-note" class="invisible-anchor orange">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/message.png" class="icon" />
					Leave a note
				</a>
			</div>
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/hit.jpg);">
				<a href="<?php echo get_site_url(); ?>/install" class="invisible-anchor red">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/fist.png" class="icon" />
					First hit
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
