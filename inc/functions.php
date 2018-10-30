<?php

global $headFont,$bodyFont , $gFonts;
require_once get_template_directory() . "/inc/scriptsStyles.php";
$gFonts = tmiGetGoogleFonts();


require_once get_template_directory() . "/inc/contentArea.php";
require_once get_template_directory() . "/inc/services.php";
require_once get_template_directory() . "/inc/slides.php";
require_once get_template_directory() . "/thirdparty/classes/bs4navwalker.php";
require_once get_template_directory() . "/thirdparty/classes/google-font-dropdown-custom-control.php";
require_once get_template_directory() . "/inc/header.php";
require_once get_template_directory() . "/inc/sidebars.php";
require_once get_template_directory() . "/inc/customizer.php";
