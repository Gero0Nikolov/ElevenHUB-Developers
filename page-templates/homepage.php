<?php
/*
Template Name: Homepage
*/

get_header();
?>

<div id="homepage-container" class="homepage">
	<div class="banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/together.jpg);">
		<div class="overlay">
			Together we can build it all!
		</div>
	</div>
	<div class="quickies">
		<div class="flex-container">
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/belt.jpg);">
				<a href="<?php echo get_site_url(); ?>/intro" class="invisible-anchor blue">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/laptop.png" class="icon" />
					Join the dojo
				</a>
			</div>
			<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/hit.jpg);">
				<a href="<?php echo get_site_url(); ?>/install" class="invisible-anchor red">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/fist.png" class="icon" />
					First hit
				</a>
			</div>
		</div>
		<div class="flex-container">
			<div class="w100p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/path.jpg);">
				<a href="<?php echo get_site_url(); ?>/docs" class="invisible-anchor green">
					<div class="icons">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/learn.png" class="icon" />
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/chill.png" class="icon" />
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/magician.png" class="icon" />
					</div>
					Learn the secret paths
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
