<?php

function fx_if_post( $ID ) {

	global $post;
	if ( $post->ID == $ID ) return true;
	if ( $post->ID != $ID ) return false;

}

?>