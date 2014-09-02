<?php // last updated: 18/07/2014

function bb_section( $args ){

  is_array( $args ) ? extract( $args ) : parse_str( $args );

  // check for required variables
  if ( !$name || !$file ) return;

  bb_section_start( $args ); // <-- open the wrapper
  bb_section_content ( $args ); // <-- gets the theme part
  bb_section_end ( $args );  // <-- close the wrapper
  return;

}

function bb_section_start( $args ){

  is_array( $args ) ? extract( $args ) : parse_str( $args );

  if ( !$inner_class ) $inner_class = 'full'; // other options include 'row'
  if ( !$type ) $type = 'div'; // other options include 'section', 'footer', etc...

  // setup the wrapper
  _e( "\n".'<!-- '.$name.' -->'."\n", ns_ );
  _e( '<'.$type.' id="row-'.$name.'" class="row-wrapper '.$class.'">'."\n", ns_ );
  _e( ' <div id="row-inner-'.$name.'" class="row-inner-wrapper '.$inner_class.'">'."\n", ns_ );

}

function bb_section_content( $args ){

  is_array( $args ) ? extract( $args ) : parse_str( $args );

  // check for required variables
  if ( !$dir ) $dir = 'sections'; // other options include 'row'
  locate_template( array( $dir. '/' . $file ), true );

}

function bb_section_end ( $args ){

  is_array( $args ) ? extract( $args ) : parse_str( $args );

  _e( ' </div>'."\n", ns_ );
  _e( '</'.$type.'>'."\n", ns_ );
  _e( '<!-- end '.$name.' -->'."\n", ns_ );

}

?>