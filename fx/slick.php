<?php // last updated: 30/06/2014

function fx_slick($args) {
  // Set some default options
  $opts = array(
    'autoplay' => 'true',
    'autoplaySpeed' => '1000',
    'fade' => 'true',
    'arrows' => 'false',
    'dots' => 'false',
    'slide' => "'li'",
  );

  // test variables and set defaults
  if( !is_array( $args ) ) $term = $args;
  else extract( $args );
  if( empty($term) ) return;

  if( empty($taxonomy) ) $taxonomy = 'media_categories';
  if( empty($posts_per_page) ) $posts_per_page = 5;
  if( empty($post_type) ) $post_type = 'attachment';
  if( empty($field) ) $field = 'id';
  if( empty($size) ) $size = 'full';

  $slide_args = array(
    'posts_per_page'  => $posts_per_page,
    'post_type'       => $post_type,
    'orderby'         => 'menu_order',
    'order'           => 'ASC',  // 0 at the top - bigger the number the lower on the page
    'tax_query'       => array(
      array(
        'taxonomy'    => $taxonomy,
        'field'       => $field,
        'terms'       => $term,
      ),
    ),
  );
  $slides = get_posts($slide_args);

  // Build the HTML
  echo '<ul class="s-slick">'."\n";
  foreach ( $slides as $slide ) {
    $alt = get_post_meta( $slide->ID, '_wp_attachment_image_alt', true );
    $alt = ( strlen( $alt ) > 0 ) ? $alt : $slide->post_title ;
    $src = wp_get_attachment_image_src( $slide->ID, $size );
    if( empty($height) ) {
      _e( '  <li>'."\n", 'tn_' );
      _e( '    <img src="'.$src[0].'" alt="'.$alt.'" title="'.$slide->post_content.'" style="width:100%;"/>'."\n", 'tn_' );
      _e( '  </li>'."\n", 'tn_' );
    } else {
      _e( '  <li style="display:block; height:'.$height.';background-image: url('.$src[0].'); background-position: center center; background-size: cover; background-repeat: no-repeat;">'."\n", 'tn_' );
    }
  }
  echo '</ul>'."\n";

  // Apply the specified options
  $opts = str_replace( '=',':', str_replace('&', ',', urldecode(http_build_query( $opts ) ) ) );

  // And outputt the JS
  echo '<script type="text/javascript">'."\n";
  echo '  jQuery(document).ready(function(){'."\n";
  echo '    slick(".s-slick").slick({'."\n";
  echo '      '.$opts."\n";
  echo '    });'."\n";
  echo '  });'."\n";
  echo '</script>'."\n";
}

?>