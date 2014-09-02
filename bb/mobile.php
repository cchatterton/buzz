<?php // last updated 19/07/2014

// 1. find'n replace Pages & Page (as cpt). *Remember to preseve case
// 2. add to the $includes array() in functions.php
// 3. add custom fields to mobile_metabox_content

function mobile_metabox() {
	add_meta_box( 'cpt_mobile_box', __( 'Mobile Content', '' ), 'mobile_metabox_content', 'page', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'mobile_metabox' );

function mobile_metabox_content( $post ) {
	if( !is_array( $mobile_fields) ) $mobile_fields = array();
	wp_nonce_field( plugin_basename( __FILE__ ), 'mobile_metabox_content_nonce' );

	// custom fields here! new line for each field
	// example #1	array_push( $mobile_fields, bb_new_field( 'title=title2&name=name2&size=50%&type=text' ) );
	array_push( $mobile_fields, bb_new_field( array( 'title' => 'Mobile Content', 'type' => 'wp-editor' ) ) );

	set_transient( 'mobile_fields', serialize( $mobile_fields ), 3600 );
}

function mobile_metabox_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['mobile_metabox_content_nonce'], plugin_basename( __FILE__ ) ) ) 	return;
	if ( 'page' == $_POST['post_type'] && ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ) ) ) return;
	$mobile_fields = unserialize( get_transient( 'mobile_fields' ) );
	foreach( $mobile_fields as $meta_field ) update_post_meta( $post_id, $meta_field, sanitize_text_field( $_POST[$meta_field] ) );
}
add_action( 'save_post', 'mobile_metabox_save' );

?>