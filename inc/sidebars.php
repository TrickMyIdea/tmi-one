<?php
add_action( 'widgets_init', 'tmiRegisterSidebars' );
function tmiRegisterSidebars() {
    register_sidebar( array(
        'name' => __( 'Header Left', 'tmi' ),
        'id' => 'header-left',
        'description' => __( 'Items to be displayed on Left side of Header.', 'tmi' ),
        'before_widget' => '<div id="%1$s" class="tmi-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Header Right', 'tmi' ),
        'id' => 'header-right',
        'description' => __( 'Items to be displayed on Right side of Header.', 'tmi' ),
        'before_widget' => '<div id="%1$s" class="tmi-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Left', 'tmi' ),
        'id' => 'footer-left',
        'description' => __( 'Items to be displayed on Left side of Footer.', 'tmi' ),
        'before_widget' => '<div id="%1$s" class="tmi-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Right', 'tmi' ),
        'id' => 'footer-right',
        'description' => __( 'Items to be displayed on Right side of Footer.', 'tmi' ),
        'before_widget' => '<div id="%1$s" class="tmi-widget widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}

