<?php
/*
Plugin Name:Custom OG Tags
Plugin URI: http://www.test.in/
Description: Custom OG Tags Display using default Title and description.
Author: Shashank Sharma
Version: 1.0.0
Author URI: http://www.test.in/
License: GPLv2 or later
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

function add_ogtags_data_header_meta() {
    
    global $post;
  	?>
    
	<meta property="og:title" content="<?php echo $post->post_title; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="<?php echo get_the_excerpt($post->ID); ?>" />
	<?php if ( has_post_thumbnail($post) ) { 
	$imageurl = get_the_post_thumbnail_url($post);
	?>
	<meta property="og:image" content="<?php echo $imageurl; ?>" />
	<?php } else { ?>
	<meta property="og:image" content="<?php echo plugin_dir_url( __FILE__ ).'img/og-placeholder-img.jpg'; ?>" />
	<?php } ?>
	<meta property="og:url" content="<?php echo get_the_permalink($post->ID); ?>" />
    
  <?php
    
}
add_action( 'wp_head', 'add_ogtags_data_header_meta' );
?>