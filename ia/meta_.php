<?php // last updated 19/07/2014

// 1. find'n replace Mycpts & Mycpt (as cpt). *Remember to preseve case
// 2. add to the $includes array() in functions.php
// 3. add custom fields to mycpt_metabox_content

function mycpt_metabox() {
	add_meta_box( 'cpt_mycpt_box', __( 'Mycpt', '' ), 'mycpt_metabox_content', 'mycpt', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'mycpt_metabox' );

function mycpt_metabox_content( $post ) {
	if( !is_array( $mycpt_fields) ) $page_fields = array();
	wp_nonce_field( plugin_basename( __FILE__ ), 'mycpt_metabox_content_nonce' );

	// custom fields here! new line for each field
	// example #1 array_push( $mycpt_fields, bb_new_meta( 'title=title2&name=name2&size=50%&type=text' ) );
	// example #2 array_push( $mycpt_fields, bb_new_meta( array( 'title' => 'title3', 'type' => 'text' ) ) );

	set_transient( 'mycpt_fields', serialize( $mycpt_fields ), 3600 );
}

function mycpt_metabox_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( !wp_verify_nonce( $_POST['mycpt_metabox_content_nonce'], plugin_basename( __FILE__ ) ) ) 	return;
	if ( 'page' == $_POST['post_type'] && ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ) ) ) return;
	$mycpt_fields = unserialize( get_transient( 'mycpt_fields' ) );
	foreach( $mycpt_fields as $meta_field ) update_post_meta( $post_id, $meta_field, sanitize_text_field( $_POST[$meta_field] ) );
}
add_action( 'save_post', 'mycpt_metabox_save' );

?>