    <nav class="tab-bar">
      <section class="tab-bar-section s-full-width hide-for-small">
        <div class="row">
          <ul class="menu">
<?php 

global $post; $menu_name = 'top';
if (( $locations = get_nav_menu_locations() ) && isset($locations[$menu_name])) {
  $menu = wp_get_nav_menu_object($locations[$menu_name]);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  foreach ( (array) $menu_items as $key => $menu_item ) {
    $class = ($post->ID == $menu_item->object_id) ? 'active' : '';
    if($menu_item->menu_item_parent == 0) {
      $ourmenu .= '<li class="'.$class.' menu-item menu-item-'.$menu_item->ID.'"><a href="' . $menu_item->url .'">' . $menu_item->title . '</a></li>'."\n";
    }
  }
}
echo $ourmenu;

?>
          </ul>
        </div>
      </section>
      <section class="right-small show-for-small-only">
        <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
      </section>
    </nav>
    <aside class="right-off-canvas-menu show-for-small-only">
      <ul class="off-canvas-list">
<?php echo $ourmenu; ?>
      </ul>
    </aside>