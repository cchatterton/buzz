<!doctype html>
<html>
	<head>
		<title><?php bb_e( 'site_title' ) ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
// favicon
$favicon = get_theme_mod( ns_.'favicon' );
if( $favicon ) echo '		<link rel="icon" href="'.$favicon.'" type="image/png" />'."\n";

// enable font-icons from wp-admin/appearance/font settings
$theme_fonts = get_option( 'theme_fonts' );
// Zurb Font Icons V3
if( $theme_fonts[ns_."zfi3"] == 'true' ) {
		echo '		<link rel="stylesheet" href="/wp-content/themes/boilerplate/icons/foundation-icons.css" />'."\n";
		echo '		<link rel="stylesheet" href="/wp-content/themes/boilerplate/icons/foundation-icons.eot" />'."\n";
}
// Font Awesome 4.1.0
if( $theme_fonts[ns_."fa410"] == 'true' ) {
		echo '		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />'."\n";
}
?>
<?php wp_head(); ?>
	</head>
	<body>
    <!-- start everything -->
    <div class="s-everything">
		<div class="off-canvas-wrap" data-offcanvas>
  			<div class="inner-wrap">
<?php //include('includes/nav_offcanvas.php');
locate_template( array( 'sections/offcanvas.php' ), true );?>
    			<section class="main-section">
<?php //fx_theme_section( 'menu'  , '', 'section_menu.php', 2 ); ?>