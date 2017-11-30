<?php
/*
Template Name: Leave a message
*/

get_header();

$page_id = get_the_ID();
$page_title = get_the_title( $page_id );
$page_emoji = get_field( "page_emoji", $page_id );
?>

<div id="intro" class="intro-page content-page">
	<div id="header" class="page-header">
		<h1 class="title"><?php echo $page_title; ?></h1>
		<img src="<?php echo $page_emoji; ?>" class="page-emoji" />
	</div>
	<div id="message-sender">
		<div class="row">
			<input id="first-name" type="text" class="medium-fat" placeholder="First name">
			<input id="last-name" type="text" class="medium-fat" placeholder="Last name">
		</div>
		<div class="row">
			<input id="email" type="email" class="wide-fat" placeholder="Email">
		</div>
		<div class="row">
			<textarea id="message-content" class="wide-fat" placeholder="What do you think?"></textarea>
		</div>
		<button id="submit-message">Send</button>
	</div>
</div>

<?php get_footer(); ?>
