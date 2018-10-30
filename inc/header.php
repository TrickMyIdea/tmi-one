<?php

/**** LOGO **/
add_theme_support( 'custom-logo' );
function tmiCustomLogoSetup() {
    $defaults = array(
        'width'         => 250,
        'height'        => 30,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'tmiCustomLogoSetup' );

add_filter( 'get_custom_logo', 'tmiCustomLogoClass' );
function tmiCustomLogoClass( $html ) {
    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
    $html = str_replace( 'custom-logo', 'tmi-custom-logo img-fluid', $html );
    return $html;
}

/*** MENU **/
function tmiMenuSetup() {
  register_nav_menu('main-menu',__( 'Main Menu', 'tmi' ));
}
add_action( 'init', 'tmiMenuSetup' );


/*
$headerInfo = array(
    'width'         => 980,
    'height'        => 60,
    'default-image'         => get_template_directory_uri() .'/img/default-header.png',
);
add_theme_support( 'custom-header', $headerInfo );
function tmiCustomHeaderSetup() {
    $defaults = array(
        // Default Header Image to display
        'default-image'         => get_template_directory_uri() .'/img/default-header.png',
        // Display the header text along with the image
        'header-text'           => false,
        // Header text color default
        'default-text-color'        => '000',
        // Header image width (in pixels)
        'width'             => 1000,
        // Header image height (in pixels)
        'height'            => 198,
        // Header image random rotation default
        'random-default'        => false,
        // Enable upload of image file in admin
        'uploads'       => false,
        // function to be called in theme head section
        'wp-head-callback'      => 'wphead_cb',
        //  function to be called in preview page head section
        'admin-head-callback'       => 'adminhead_cb',
        // function to produce preview markup in the admin screen
        'admin-preview-callback'    => 'adminpreview_cb',
        );
}
add_action( 'after_setup_theme', 'tmiCustomHeaderSetup' );
*/
