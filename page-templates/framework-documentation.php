<?php
/*
Template Name: Framework Documentation
*/

get_header();

$page_id = get_the_ID();
$page_ = get_post( $page_id );

$method = isset( $_GET[ "method" ] ) && !empty( $_GET[ "method" ] ) ? sanitize_text_field( $_GET[ "method" ] ) : "";
$documentation_type = "";

if ( $page_->post_name == "brother-php" ) {
	$documentation_type = "brother_php";

	$args = array(
		"posts_per_page" => -1,
		"post_status" => "publish",
		"post_type" => "brother_php",
		"orderby" => "ID",
		"order" => "DESC"
	);
	$posts_ = get_posts( $args );
} elseif ( $page_->post_name == "brother-js" ) {
	$documentation_type = "brother_js";

	$args = array(
		"posts_per_page" => -1,
		"post_status" => "publish",
		"post_type" => "brother_js",
		"orderby" => "ID",
		"order" => "DESC"
	);
	$posts_ = get_posts( $args );
}
?>

<div id="framework-page" class="content-page">
	<div id="framework-documentation" class="framework-documentation">
		<div class="methods">
			<div id="search-container" class="search-container">
				<input type="text" id="search-box" placeholder="Search...">
			</div>
			<div id="default-list" class="list">
				<?php
				foreach ( $posts_ as $post_ ) {
					?>

					<a href="?method=<?php echo $post_->post_name; ?>" class="list-item"><?php echo $post_->post_title; ?></a>

					<?php
				}
				?>
			</div>
		</div>
		<div id="method-description" class="method-description">
			<?php
			if ( !empty( $method ) ) {
				$method_page = get_page_by_path( $method, OBJECT, $documentation_type );
				$full_function_name = get_field( "full_function_name", $method_page->ID );
				$function_parameters = get_field( "function_parameters", $method_page->ID );
				$function_positioned = get_field( "function_positioned", $method_page->ID );
				?>

				<h1 class="function-title"><?php echo $full_function_name; ?></h1>
				<div class="function-description section">
					<h1 class="section-title">Method description:</h1>
					<?php echo $method_page->post_content; ?>
				</div>
				<div class="function-parameteres section">
					<h1 class="section-title">Function parameters:</h1>
					<?php echo $function_parameters; ?>
				</div>
				<div class="function-positioned section">
					<h1 class="section-title">Function positioned at:</h1>
					<?php echo strtoupper( str_replace( "_", " ", $function_positioned ) ); ?>
				</div>

				<?php
			} else {
				?>

				<div class="documentation-explanation">
					<h1 class="documentation-title">Welcome to <?php echo $page_->post_title; ?></h1>
					<div class="documentation-description"><?php echo $page_->post_content; ?></div>
				</div>
				<div class="quickies">
					<div class="flex-container">
						<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/note.jpg); height: 15vw;">
							<a href="<?php echo get_site_url(); ?>/leave-note" class="invisible-anchor orange">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/message.png" class="icon" />
								Leave a note
							</a>
						</div>
						<?php if ( $documentation_type == "brother_php" ) { ?>
						<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/js.jpg); height: 15vw;">
							<a href="<?php echo get_site_url(); ?>/brother-js" class="invisible-anchor purple">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/game.png" class="icon" />
								Brother JS
							</a>
						</div>
						<?php } elseif ( $documentation_type == "brother_js" ) { ?>
						<div class="w49p quickie" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/php.jpg); height: 15vw;">
							<a href="<?php echo get_site_url(); ?>/brother-php" class="invisible-anchor wet-asphalt">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/music.png" class="icon" />
								Brother PHP
							</a>
						</div>
						<?php } ?>
					</div>
				</div>

				<?php
			}
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
