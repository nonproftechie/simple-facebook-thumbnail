<?php
/*
Plugin Name:  Simple Facebook Thumbnail
Plugin URI:   https://github.com/nonproftechie/simple-facebook-thumbnail
Description:  Tells Facebook to use your featured image as the Facebook thumbnail image
Version:      1.0
Author:       Joshua Austin
Author URI:   https://github.com/nonproftechie
License:      MIT
License URI:  https://opensource.org/licenses/MIT
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function add_facebook_thumbnail_to_head () {
    global $post;

    // skip this whole thing if $post isn't available
    if ( empty ( $post ) ) {
        return;
    }

    // get the thumbnail URL
    $the_thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];

    // render it, if available
    if ( $the_thumbnail_url ) {
        ?><meta property="og:image" content="<?php echo $the_thumbnail_url; ?>" />
        <?php
    }
}

add_action( 'wp_head', 'add_facebook_thumbnail_to_head' );