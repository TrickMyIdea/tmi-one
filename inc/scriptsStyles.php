<?php

function tmiEnqueueStyle() {
  global $headFont,$bodyFont, $gFonts ;

  $tp = get_template_directory_uri() . "/thirdparty/";

  /// Selected Google fonts

  $i = get_theme_mod( 'tmiBodyFont' );
  if(isset( $gFonts[$i]) &&  $gFonts[$i] != ""){
    $font = $gFonts[$i];
    $bodyFont = "'" . $font->family . "', ". $font->category;
  }

  $gLink = "https://fonts.googleapis.com/css?family=" . tmiGetFontLink($gFonts, $i);

  if(get_theme_mod( 'tmiBodyFont' ) != get_theme_mod( 'tmiHeadFont' )){
    $i = get_theme_mod( 'tmiHeadFont' );
    $font = $gFonts[$i];
    $gLink = $gLink . "|" . tmiGetFontLink($gFonts, $i);
    $headFont = $font->family . ", ". $font->category;
  }else{
    $headFont = $bodyFont ;
  }
  wp_enqueue_style('google-fonts', $gLink, false);

  // Font Awesome
  wp_enqueue_style( 'fontawesome',$tp . "font-awesome/font-awesome.min.css", true );


  wp_enqueue_style( 'core', get_template_directory_uri() . "/css/style.css", true );
  $userCSS = "body{";
    if(!empty($bodyFont))     $userCSS .= sprintf('font-family:%s;', $bodyFont);
    $tmp = get_theme_mod( 'tmiBodyFontColor' );
    if(!empty($tmp))     $userCSS .= sprintf(' color: %s;',$tmp);
    $tmp = get_theme_mod( 'tmiBodyFontSize' );
    if(!empty($tmp))     $userCSS .= sprintf(' font-size: %s;', $tmp);
    $tmp = get_theme_mod( 'tmiBodyBGColor' );
    if(!empty($tmp))     $userCSS .= sprintf(' background: %s;', $tmp);
    $userCSS .= "}";

    $userCSS .= sprintf('h1, h2, h3, h4, h5{');
      if(!empty($headFont))     $userCSS .= sprintf('font-family:%s;', $headFont);
      $tmp = get_theme_mod( 'tmiHeadFontColor' );
      if(!empty($tmp))     $userCSS .= sprintf(' color: %s;',$tmp);
      $userCSS .= "}";

      $userCSS .= "header{";
        $tmp = get_theme_mod( 'tmiHeaderBGColor' );
        if(!empty($tmp))     $userCSS .= sprintf(' background: %s;', $tmp);
        $userCSS .= "}";
        // tmiDebug($userCSS);
        wp_add_inline_style( 'core', $userCSS);

      }

      function tmiEnqueueScript() {
        $tp = get_template_directory_uri() . "/thirdparty/";

        // Load latest jQuery
        wp_deregister_script('jquery' ); //
        wp_register_script('jquery', 'http://code.jquery.com/jquery-latest.min.js',null,false,true);

        // bootstrap
        wp_enqueue_script( 'popper', $tp .'bootstrap/popper.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'bootstrap', $tp .'bootstrap/bootstrap.min.js', array('jquery'), false, true );
        wp_enqueue_script( 'bootstrap.bundle', $tp .'bootstrap/bootstrap.bundle.min.js', array('jquery'), false, true );

        wp_enqueue_script( 'owl.carousel', $tp .'OwlCarousel2/owl.carousel.min.js', array('jquery'), false, true );

      }

      add_action( 'wp_enqueue_scripts', 'tmiEnqueueStyle' );
      add_action( 'wp_enqueue_scripts', 'tmiEnqueueScript' );

      function tmiGetFontLink($gFonts, $i){
        // tmiDebug($gFonts, $i);
        if(isset( $gFonts[$i]) &&  $gFonts[$i] != ""){
          $font = $gFonts[$i];
          $variants = $font->variants;
          $variants = implode(",", $variants);
          return $font->family . ":" . $variants;
        }else{
          return "";
        }
      }

      /**
      * Get the google fonts from the API or in the cache
      *
      * @param  integer $amount
      *
      * @return String
      */

      function tmiGetGoogleFonts( $amount = "all" ){
        $finalselectDirectory = get_stylesheet_directory().'/font-cache/';

        $fontFile = $finalselectDirectory . '/google-web-fonts.txt';

        //Total time the file will be cached in seconds, set to a week
        $cachetime = 86400 * 7;
        $gAPIKey = get_theme_mod('tmiGoogleFontAPIKey');

        if(file_exists($fontFile) && empty($gAPIKey)){
          $content = json_decode(file_get_contents($fontFile));
        }elseif(file_exists($fontFile) && $cachetime < filemtime($fontFile)){
          $content = json_decode(file_get_contents($fontFile));
        } else {

          $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=' . $gAPIKey;

          $fontContent = wp_remote_get( $googleApi, array('sslverify'   => false) );

          $fp = fopen($fontFile, 'w');
          fwrite($fp, $fontContent['body']);
          fclose($fp);

          $content = json_decode($fontContent['body']);
        }

        if($amount == 'all')
        {
          return $content->items;
        } else {
          return array_slice($content->items, 0, $amount);
        }
      }

