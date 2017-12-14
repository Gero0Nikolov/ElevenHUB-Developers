<?php
	$post_id = get_the_ID();
	$post_ = get_post( $post_id );
	wp_redirect( get_site_url() ."/brother-js/?method=". $post_->post_name );
?>
