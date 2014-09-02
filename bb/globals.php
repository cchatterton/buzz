<?php

define('ns_', 'bb_');

// decalre gloabl variables for use across the theme below
// site_...
$GLOBALS['site_name'] 												= get_bloginfo( 'name' );
$GLOBALS['site_description'] 					= get_bloginfo( 'description' );
$GLOBALS['site_title'] 											= $GLOBALS['site_name'].' &raquo; '.$GLOBALS['site_description'];
// ..._url
$GLOBALS['theme_url']													= get_template_directory_uri();
$GLOBALS['home_url']														= esc_url( home_url( '/' ) );
// ..._path
$x = get_bloginfo( 'template_directory' );
$x = substr( $x, ( strlen( $x ) - ( ( strrpos( $x, '/' ) ) ) - 1 ) * -1 );
$GLOBALS['css_path'] 													= "wp-content/themes/$x/css/";

// global variables can be called with either bb_e or bb_r
// bb_e for echo & bb_r for return

function bb_e( $variable, $domain = 'bb_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 echo bb_bb_( $variable, $domain );
}

function bb_r( $variable, $domain = 'bb_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 return bb_bb_( $variable, $domain );
}

function bb__( $variable, $domain = 'bb_' ){
	// $text (string) (required) Text to translate. Default: None
	// $domain (string) (optional) Domain to retrieve the translated text.  Default: 'default'
 return bb_bb_( $variable, $domain );
}

function bb_bb_( $variable, $domain ){
	if ( $domain == 'customizer' ) {
		$variable = get_theme_mod( $variable );
		$domain = 'bb_';
	}
	if ( $domain == 'option' ) {
		$variable = get_option( $variable, true );
		$domain = 'bb_';
	}
	if ( $GLOBALS[$variable] ) {
		return __( $GLOBALS[$variable] , $domain );
	} else {
		return __( $variable , $domain );
	}
}

?>