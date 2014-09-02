<?php

// create custom plugin settings menu
add_action('admin_menu', 'create_bb_google_fonts');

function create_bb_google_fonts() {

	//create new top-level menu
	// add_menu_page('Google Fonts', 'Google Fonts', 'manage_options', 'bb_google_fonts', 'bb_google_fonts_page');
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

    add_theme_page( 'Fonts', 'Fonts', 'manage_options' , ns_.'_fonts', 'theme_fonts_settings' );
    //add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function );

	//call register settings function
	add_action( 'admin_init', 'register_theme_fonts' );
}


function register_theme_fonts() {
    register_setting( 'theme_fonts_group', 'theme_fonts');
}

function theme_fonts_settings() {

    $theme_fonts = get_option('theme_fonts');
    if( !is_array( $theme_fonts ) ) $theme_fonts = array();

    echo '<div class="wrap">'."\n";
    echo '  <form method="post" action="options.php">'."\n";
    echo '      <h2>Google Fonts</h2>'."\n".'      <hr style="margin: 20px 0;border: 0; height: 1px; background:#ddd; "/>'."\n";
    echo '      <a style="font-size:0.8em;position: relative;top: -15px;" href="https://www.google.com/fonts">https://www.google.com/fonts</a>'."\n";
    bb_new_field( array( 'title' => 'Primary Font', 'group' => 'theme_fonts', 'name' => ns_.'gf1', 'type' => 'text', 'size' => '100%', 'max_width' => '600px', 'placeholder' => 'http://...', 'default' => 'http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,800,700,900') );
    bb_new_field( array( 'title' => 'Secondary Font', 'group' => 'theme_fonts', 'name' => ns_.'gf2', 'type' => 'text', 'size' => '100%', 'max_width' => '600px', 'placeholder' => 'http://...', 'default' => 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' ) );
    bb_new_field( array( 'title' => 'Tertiary Font', 'group' => 'theme_fonts', 'name' => ns_.'gf3', 'type' => 'text', 'size' => '100%', 'max_width' => '600px', 'placeholder' => 'http://...' ) );
    echo '      <h2 style="margin-top:40px;">Fonts Icons</h2>'."\n".'      <hr style="margin: 20px 0;border: 0; height: 1px; background:#ddd; "/>'."\n";
    bb_new_field( array( 'title' => 'Zurb Font Icons v3', 'group' => 'theme_fonts', 'name' => ns_.'zfi3', 'type' => 'checkbox', 'description' => '<a href="http://zurb.com/playground/foundation-icon-fonts-3">http://zurb.com/playground/foundation-icon-fonts-3</a>' ) );
    bb_new_field( array( 'title' => 'Font Awesome', 'group' => 'theme_fonts', 'name' => ns_.'fa410', 'type' => 'checkbox', 'description' => '<a href="http://zurb.com/playground/foundation-icons">http://zurb.com/playground/foundation-icons</a>' ) );

    submit_button();
    settings_fields( 'theme_fonts_group' );

    echo '  </form>'."\n";
    echo '</div>'."\n";
}

?>