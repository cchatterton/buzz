<?php

global $post;
//$content = apply_filters('the_content', $post->post_content );

echo '<article class="small-12 medium-9 large-9 columns">'."\n";

if ( get_post_meta( $post->ID, 'mobile_content', true) ) {

	$mobile_content = apply_filters('the_content', get_post_meta( $post->ID, 'mobile_content', true) );

	_e( '<div class="show-for-small hide-for-medium-up" >'."\n" );
	_e( $mobile_content );
	_e( '</div>'."\n" );

	_e( '<div class="hide-for-small show-for-medium-up" >'."\n" );
	_e( '	<h1>'.strtoupper( $post->post_title ).'</h1>'."\n" );

	// the content
	while ( have_posts() ) : the_post();
	the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', ns_ ) );
	endwhile;

	_e( '</div>'."\n" );

} else {

	_e( '<h1>'.strtoupper( $post->post_title ).'</h1>'."\n" );
	// the content
	while ( have_posts() ) : the_post();
	the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', ns_ ) );
	endwhile;

}

echo '</article>'."\n";
echo '<aside class="small-12 medium-3 large-3 columns">'."\n";
get_sidebar();
echo '</aside>'."\n"; ?>