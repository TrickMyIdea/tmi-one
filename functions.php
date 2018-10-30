<?php
/** Bootstrap Container for the whole site **/
define('TMI_CONTAINER', "container");

add_theme_support('post-thumbnails');


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'tmi-service-thumb', 200, 200 );
	add_image_size( 'tmi-slide', 1500, 500, true );
}

require_once get_template_directory() . "/inc/functions.php";
