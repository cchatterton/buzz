<?php // last updated 19/07/2014

// 1. find'n replace Pages & Page (as cpt). *Remember to preseve case
// 2. add to the $includes array() in functions.php
// 3. add custom fields to page_metabox_content

function page_metabox() {
	add_meta_box( 'cpt_page_box', __( 'Page', '' ), 'page_metabox_content', 'page', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'page_metabox' );

function page_metabox_content( $post ) {

	wp_nonce_field( plugin_basename( __FILE__ ), 'page_metabox_content_nonce' );
	if( !is_array( $page_fields) ) $page_fields = array();

	// custom fields here! new line for each field
	array_push( $page_fields, bb_new_meta( 'title=title1&name=name1&size=100%&type=checkbox' ) );
	array_push( $page_fields, bb_new_meta( 'title=title2&name=name2&size=50%&type=text' ) );
	array_push( $page_fields, bb_new_meta( array( 'title' => 'title3', 'type' => 'text' ) ) );
	array_push( $page_fields, bb_new_meta( array( 'title' => 'title4', 'type' => 'textarea', 'size' => array( '100px', '100px' ) ) ) );

	$options = array(
		array( 'label' => 'aaa', 'value' => '1' ),
		array( 'label' => 'bbb', 'value' => '2' )
	);
	array_push( $page_fields, bb_new_meta( array( 'title' => 'title5', 'type' => 'select', 'options' => $options ) ) );
	array_push( $page_fields, bb_new_meta( array( 'title' => 'title6', 'type' => 'color-picker' ) ) );
	array_push( $page_fields, bb_new_meta( array( 'title' => 'title7', 'type' => 'wp-editor' ) ) );

	set_transient( 'page_fields', serialize( $page_fields ), 3600 );

}

function page_metabox_save( $post_id ) {

	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if( !wp_verify_nonce( $_POST['page_metabox_content_nonce'], plugin_basename( __FILE__ ) ) ) 	return;
	if( 'page' == $_POST['post_type'] && ( !current_user_can( 'edit_page', $post_id ) || !current_user_can( 'edit_post', $post_id ) ) ) return;
	$page_fields = unserialize( get_transient( 'page_fields' ) );
	foreach( $page_fields as $meta_field ) update_post_meta( $post_id, $meta_field, sanitize_text_field( $_POST[$meta_field] ) );
}
add_action( 'save_post', 'page_metabox_save' );

?>