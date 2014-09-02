<?php

function fx_orbit(  $args ) {

  // validate provided $args
  is_array( $args ) ? extract( $args ) : parse_str( $args );
  if( !$taxonomy && !$term ) return;

  // set defaults for get_posts()
  if( !$posts_per_page ) $posts_per_page = 5;
  if( !$post_type ) $post_type = 'attachment';
  if( !$orderby ) $orderby = 'menu_order';
  if( !$order ) $order = 'ASC';
  if( !$field ) $field = 'id';

	echo '<ul class="s-orbit" data-orbit data-options="navigation_arrows:false;">'."\n";

  $args = array(
    'posts_per_page'  => $posts_per_page,
    'post_type'       => $post_type,
    'orderby'         => $orderby,
    'order'           => $order,
    'tax_query'       => array(
      array(
        'taxonomy'    => $taxonomy,
        'field'       => $field,
        'terms'       => $term
      )
    )
  );
	$slides = get_posts( $args );
	foreach ( $slides as $slide ) {
		$alt = get_post_meta( $slide->ID, '_wp_attachment_image_alt', true );
		$alt = ( strlen( $alt ) > 0 ) ? $alt : $slide->post_title ;
    $image = wp_get_attachment_image_src( $slide->ID, 'medium' );

		echo '  <li>'."\n";
		echo '    <img src="'.$image[0].'" alt="'.$alt.'" title="'.$slide->post_content.'" style=" "/>'."\n";
		echo '  </li>'."\n";
	}
	echo '</ul>'."\n";
}

?>