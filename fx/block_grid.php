<?php

function fx_block_grid( $args ) {

  // validate provided $args
  is_array( $args ) ? extract( $args ) : parse_str( $args );
  if( !$taxonomy && !$term ) return;

  // set defaults for get_posts()
  if( !$posts_per_page ) $posts_per_page = 5;
  if( !$post_type ) $post_type = 'attachment';
  if( !$orderby ) $orderby = 'menu_order';
  if( !$order ) $order = 'ASC';
  if( !$field ) $field = 'id';

  // create full $args for get_posts()
  $args = array(
   'posts_per_page'  => $posts_per_page,
   'post_type'       => $post_type,
   'orderby'         => $orderby,
   'order'           => $order,  // 0 at the top - bigger the number the lower on the page
   'tax_query'       => array(
     array(
       'taxonomy'    => $taxonomy,
       'field'       => $field,
       'terms'       => $term
     )
   )
  );

  // get tiles
  $tiles = get_posts( $args );

 // setup defaults for responsive block-grid
 if( !$small ) $small = 3;
 if( !$medium ) $medium = 8;
 if( !$large ) $large = 8;

 // setup the grid
 echo '<ul id="'.$id.'"class="small-block-grid-'.$small.' medium-block-grid-'.$medium.' large-block-grid-'.$large.' '.$class.'">'."\n";

 // for each tile -> the grid
 foreach ($tiles as $tile ) {

  // get missing meta data
  //var_dump( $tile );

  // $image = wp_get_attachment_url( $tile->ID );
  $image = wp_get_attachment_image_src( $tile->ID, 'medium' );
  // var_dump( $image );
  // var_dump( '<hr>' );

  $alt = get_post_meta( $tile->ID, '_wp_attachment_image_alt', true);
  // $image = str_replace( '.png', '-216x300.png', $image );
  //   $image = str_replace( '.jpg', '-216x300.jpg', $image );

  // the output
  echo '  <li>'."\n";
  echo '      <img src="'.$image[0].'" alt="'.$alt.'" title="'.$tile->post_excerpt.'">'."\n";
  echo '  </li>'."\n";
 }
 echo '</ul>'."\n";
}

?>