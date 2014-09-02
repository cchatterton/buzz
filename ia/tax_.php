<?php

// find'n replace Mytaxs & Mytax (as tax) and Mycpt (as cpt). *Remember to preseve case
// remember to include in functions.php

add_post_type_support( 'mycpt', 'page-attributes' );

function tax_mytax() {
	$labels = array(
		'name'              => _x( 'Mytax', 'taxonomy general name' ),
		'singular_name'     => _x( 'Mytax', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Mytaxs' ),
		'all_items'         => __( 'All Mytaxs' ),
		'parent_item'       => __( 'Parent Mytax' ),
		'parent_item_colon' => __( 'Parent Mytax:' ),
		'edit_item'         => __( 'Edit Mytax' ),
		'update_item'       => __( 'Update Mytax' ),
		'add_new_item'      => __( 'Add New Mytax' ),
		'new_item_name'     => __( 'New Mytax' ),
		'menu_name'         => __( 'Mytaxs' ),
	);
	$args = array(
		'labels'                => $labels,
		'hierarchical'          => true, // true = categories & false = tags
		'public' 		=> true,
		'show_ui' 		=> true,
		'show_tagcloud' 	=> true,
		'show_in_nav_menus' 	=> true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_generic_term_count',
		'query_var'             => 'mytax',
		'rewrite'               => array( 'slug' => 'mytax' ),
	);
	register_taxonomy( 'mytax', array( 'mycpt' ), $args );
}
add_action( 'init', 'tax_mytax', 0 );

?>