<?php

function fx_debug_d( $value ) {
	fx_debug( $value );
	die();
}

function fx_debug( $value, $delimter = '<hr>' ) {
	_e( '<pre>', 'tn_' );
	var_dump( $value );
	_e( '</pre>', 'tn_' );
	_e( $delimter, 'tn_' );
}

?>