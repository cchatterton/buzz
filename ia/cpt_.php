<?php

// find'n replace Mycpts & Mycpt (as cpt). *Remember to preseve case
// remember to include in functions.php

function cpt_mycpt() {
	$labels = array(
		'name'               => _x( 'Mycpts', 'post type general name' ),
		'singular_name'      => _x( 'Mycpt', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Mycpt' ),
		'add_new_item'       => __( 'Add New Mycpt' ),
		'edit_item'          => __( 'Edit Mycpt' ),
		'new_item'           => __( 'New Mycpt' ),
		'all_items'          => __( 'All Mycpts' ),
		'view_item'          => __( 'View Mycpt' ),
		'search_items'       => __( 'Search Mycpts' ),
		'not_found'          => __( 'No Mycpts found' ),
		'not_found_in_trash' => __( 'No Mycpts found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Mycpts'
	);

	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Mycpt posts',
		'public'        => true,
		'menu_position' => 20,
	 	'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
		'has_archive'   => true,
		'hierarchical' 	=> true
	);
	register_post_type( 'mycpt', $args );
}
add_action( 'init', 'cpt_mycpt' );


// Styling for the custom post type icon

function cpt_mycpt_header() {

	$menu = site_url().'/wp-content/themes/'.get_template().'/images/mycpt_menu_icon.png';
	$icon = site_url().'/wp-content/themes/'.get_template().'/images/mycpt_cpt_icon.png';

	echo '<style type="text/css" media="screen">'."\n";
	echo '	#menu-posts-mycpt post .wp-menu-image { background: url('.$menu.') no-repeat 4px -35px!important; }'."\n";
	echo '	#menu-posts-mycpt post:hover .wp-menu-image {background: url('.$menu.') no-repeat 4px -2px!important; }'."\n";
	echo '	#icon-edit.icon32-posts-mycpt post {background: url('.$icon.') no-repeat -1px 2px;}'."\n";
	echo ' #mycpt post_value {width: 50%;}'."\n";
	echo '</style>'."\n";

}
add_action( 'admin_head', 'cpt_mycpt_header' );

// Set Messages
function cpt_mycpt_messages( $messages ) {
//http://codex.wordpress.org/Function_Reference/register_post_type

  global $post, $post_ID;

  $messages['mycpt'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( __('Mycpt Post updated.', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
	2 => __('Mycpt updated.', 'your_text_domain'),
	3 => __('CMycpt deleted.', 'your_text_domain'),
	4 => __('Mycpt Post updated.', 'your_text_domain'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( __('Mycpt Post restored to revision from %s', 'your_text_domain'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( __('Mycpt Post published. <a href="%s">View Mycpt Post</a>', 'your_text_domain'), esc_url( get_permalink($post_ID) ) ),
	7 => __('Mycpt Post saved.', 'your_text_domain'),
	8 => sprintf( __('Mycpt Post submitted. <a target="_blank" href="%s">Preview Mycpt Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	9 => sprintf( __('Mycpt Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Mycpt Post</a>', 'your_text_domain'),
	  // translators: Publish box date format, see http://php.net/date
	  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( __('Mycpt Post draft updated. <a target="_blank" href="%s">Preview Mycpt Post</a>', 'your_text_domain'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'cpt_mycpt_messages' );

?>