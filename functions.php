<?php // last updated: 18/07/2014

$includes = array(

	// theme elements
	array( 'file' => 'globals.php',         'dir' => 'bb' ), // <-- our gloabl variables
	array( 'file' => 'scripts.php',         'dir' => 'bb' ), // <-- enques our scripts to header
	array( 'file' => 'menus.php',           'dir' => 'bb' ), // <-- registers our menus
	array( 'file' => 'fonts.php',           'dir' => 'bb' ), // <-- lets us link up to three google fonts
	array( 'file' => 'functions.php',       'dir' => 'bb' ), // <-- our theme functions
	array( 'file' => 'albums.php',          'dir' => 'bb' ), // <-- aka tax_albums
	array( 'file' => 'mobile.php',          'dir' => 'bb' ), // <-- aka meta_mobile_content
	array( 'file' => 'customizer.php',      'dir' => 'bb' ), // <-- our customizer fields & settings
	array( 'file' => 'style.php', 					     'dir' => 'bb' ), // <-- our dynamic css

	// set-up sections
	array( 'file' => 'sections.php',        'dir' => 'sections' ),

	// functions -- comment/uncomment as required!
	array( 'file' => 'slick.php',           'dir' => 'fx' ),
	array( 'file' => 'hero.php',            'dir' => 'fx' ),
	array( 'file' => 'orbit.php',           'dir' => 'fx' ),
	array( 'file' => 'block_grid.php',      'dir' => 'fx' ),

	// custom posts (cpt_)
	//array( 'file' => 'cpt_.php',          'dir' => 'ia' ),

	// custom taxonomies (tax_)
	//array( 'file' => 'tax_.php',          'dir' => 'ia' ),

	// custom meta boxes (meta_)
	// array( 'file' => 'meta_.php',        'dir' => 'ia' ),

	// custom shortcodes (sc_)
	//array( 'file' => 'sc_.php',           'dir' => 'sc' ),

	// something else?
	//array( 'file' => '?.php',            'dir' => 'includes' ),

	);

foreach ($includes as $args ) bb_include( $args );

function bb_include( $args ) {
	is_array( $args ) ? extract( $args ) : parse_str( $args );
	// check for required variables
	if( !$dir && !$file ) return;
	// include required theme part
	$dir == '' ? locate_template( array( $file ), true ) : locate_template( array( $dir. '/' . $file ), true );
	return;
}

?>