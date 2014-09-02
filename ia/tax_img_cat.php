<?php

// find'n replace Categories & Category (as tax) and Attachment (as cpt). *Remember to preseve case
// remember to include in functions.php

add_post_type_support( 'attachment', 'page-attributes' );

function tax_img_cat() {
	$labels = array(
		'name'              => _x( 'Category', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category' ),
		'menu_name'         => __( 'Categories' ),
	);
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true, // true = categories & false = tags
		'public' 															=> true,
		'show_ui' 														=> true,
		'show_tagcloud' 								=> true,
		'show_in_nav_menus' 				=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_generic_term_count',
		'query_var'             => 'img_cat',
		'rewrite'               => array( 'slug' => 'img_cat' ),
	);
	register_taxonomy( 'img_cat', array( 'attachment' ), $args );
}
add_action( 'init', 'tax_img_cat', 0 );

?>