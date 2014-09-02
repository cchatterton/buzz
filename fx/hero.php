<?php 

function fx_hero( $type = 'image') {

	global $post;
	if (has_post_thumbnail( $post->ID ) ){ 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( $type == 'image' ) echo '<img src="'.$image[0].'" alt="featured image">'."\n";
		if ( $type == 'cover' ) echo '<div id="location-featured-image" class="s-hero" style="background:url('.$image[0].'); background-size:cover; background-position:center center;" alt="featured image"></div>'."\n";
	}

}

?>