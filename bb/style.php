<?php

function theme_styles(){
	// get default style
	$style  = file_get_contents( $GLOBALS['css_path'].'default.css' );
	$style .= file_get_contents( $GLOBALS['css_path'].'style.css' );

	// create dynamic style
	$style .="

/* ".ns_."/style.php */


";

	// write full style to style.css
	file_put_contents( $GLOBALS['css_path'].'theme.css', $style );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

?>