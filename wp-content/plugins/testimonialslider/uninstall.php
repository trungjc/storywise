<?php
// If uninstall not called from WordPress exit
if( !defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit ();

// Delete option from options table
function nt_testimonials_delete_plugin() {
	global $wpdb;

	$posts = get_posts( array(
		'numberposts' => -1,
		'post_type' => 'nt_testimonials',
		'post_status' => 'any' ) );

	foreach ( $posts as $post )
		wp_delete_post( $post->ID, true );
}

nt_testimonials_delete_plugin();
//remove any additional options and custom tables
?>