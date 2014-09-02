<?php

function fx_convert_color( $color, $as = 'string' ) {
	// converts hex to rgb or rbg to hex

	// do we have what we need for this function?
	if( strpos( $color, ',' ) ) $color = explode( ',', $color );
	if( strpos( $color, '#' ) == false || ( is_array( $color ) && count( $color ) != 3 ) ) return;
	if ( $as != 'string' && $as != 'array' ) return;

	if( strpos( $color, '#' ) ) {
	 $hex = str_replace("#", "", $color);

		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
	 $rgb = array($r, $g, $b);

	 if ( $as == 'string' ) return implode(",", $rgb); // returns the rgb values separated by commas
	 if ( $as == 'array' ) return $rgb; // returns an array with the rgb values

	} // end $from = hex

	if( is_array( $color ) && count( $color ) == 3 ) {

		$rgb = explode( ',', $color );

		$hex = "#";
  $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
  $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
  $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

  return $hex; // returns the hex value including the number sign (#)

 } // end $from = rgb

}

?>