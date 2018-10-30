<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head profile="http://gmpg.org/xfn/11">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php wp_title('', true,'right'); ?> - <?php echo get_bloginfo( 'site_name' ) ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
        <?php if(get_theme_mod('tmiEnableTopbar' ) == 1){ ?>
        <div id="tmiTopHeader" style="background:<?php echo get_theme_mod('tmiTopbarBGColor'); ?>;color:<?php echo get_theme_mod('tmiTopbarFontColor'); ?>">
            <div class="<?php echo TMI_CONTAINER ?>">
                <div class="row">
                    <div class="col">
                        <?php dynamic_sidebar( "header-left" );?>
                    </div>
                    <div class="col">
                        <?php dynamic_sidebar( "header-right" );?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div id="tmiheader">
        <div class="<?php echo TMI_CONTAINER ?>">
            <div class="row">
                <div class="col-12 ">
                    <nav class="navbar navbar-expand-md navbar-light bg-faded">
                        <div id="tmiLogo">
                            <?php
                            $customLogo = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_image_src( $customLogo , 'full' );
                            echo  get_custom_logo();
                            ?>
                        </div>
                       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>
                       <?php
                      echo  wp_nav_menu([
                         'theme_location'  => 'main-menu',
                         'container'       => 'div',
                         'container_id'    => 'bs4navbar',
                         'container_class' => 'collapse navbar-collapse',
                         'menu_id'         => false,
                         'menu_class'      => 'navbar-nav ml-auto',
                         'depth'           => 2,
                         'fallback_cb'     => 'bs4navwalker::fallback',
                         'walker'          => new bs4navwalker()
                       ]);
                       ?>
                     </nav>
                </div>
            </div>
        </div>
    </div>
</header>
