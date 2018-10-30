<?php
function tmiCustomizer( $wp_customize ) {

    $editCapability = "edit_pages";

   $tmiPanel = "";
   $tmiSection = "tmiHomeSlider";

    $wp_customize->add_section(
        $tmiSection,
        array(
            'title' => __('Home Slider','tmi'),
            'priority' => 20,
            'description' => __('Home Slider Setting','tmi'),
            'panel' => $tmiPanel,
        )
    );

    $setting = 'tmiEnableSlider';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => 1)
    );
    $wp_customize->add_control(
        $setting, array(
            'label' => __('Enable Default Theme Slider','tmi'),
            'section' => $tmiSection,
            'type' => 'checkbox',
            'priority'=>2
        )
    );
/***********************/
$tmiSection = "tmiBackground";

 $wp_customize->add_section(
     $tmiSection,
     array(
         'title' => __('Background Color','tmi'),
         'priority' => 20,
         'description' => __('Background Color settings','tmi'),
         'panel' => $tmiPanel,
     )
 );

 $setting = 'tmiTopbarBGColor';
 $wp_customize->add_setting(
     $setting,
     array( 'default' => '#fff')
 );
 $wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         $setting,
         array(
             'label'      => __( 'Topbar Background Color', 'tmi' ),
             'section'    => $tmiSection,
             'settings'   => $setting
         )
         )
     );

 $setting = 'tmiHeaderBGColor';
 $wp_customize->add_setting(
     $setting,
     array( 'default' => '#fff')
 );
 $wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         $setting,
         array(
             'label'      => __( 'Header Background Color', 'tmi' ),
             'section'    => $tmiSection,
             'settings'   => $setting
         )
     )
 );

 $setting = 'tmiBodyBGColor';
 $wp_customize->add_setting(
     $setting,
     array( 'default' => '#fff')
 );
 $wp_customize->add_control(
     new WP_Customize_Color_Control(
         $wp_customize,
         $setting,
         array(
             'label'      => __( 'Body Background Color', 'tmi' ),
             'section'    => $tmiSection,
             'settings'   => $setting
         )
     )
 );

/******************/
   $tmiSection = "tmiTopbar";

    $wp_customize->add_section(
        $tmiSection,
        array(
            'title' => __('Topbar','tmi'),
            'priority' => 20,
            'description' => __('Topbar settings','tmi'),
            'panel' => $tmiPanel,
        )
    );

    $setting = 'tmiEnableTopbar';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => 1)
    );
    $wp_customize->add_control(
        $setting, array(
            'label' => __('Enable Topbar','tmi'),
            'section' => $tmiSection,
            'type' => 'checkbox',
            'priority'=>2
        )
    );

    $setting = 'tmiTopbarFontColor';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => '#000')
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            $setting,
            array(
                'label'      => __( 'Topbar Text Color', 'tmi' ),
                'section'    => $tmiSection,
                'settings'   =>$setting,
            )
        )
    );

    /******************************/
    $tmiSection = "tmiTypeSection";
    $wp_customize->add_section(
      $tmiSection,
      array(
          'title' => __('Typography','tmi'),
          'priority' => 20,
          'description' => __('Typography settings','tmi'),
          'panel' => $tmiPanel,
      )
    );

    $setting = 'tmiGoogleFontAPIKey';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => '')
    );
    $wp_customize->add_control(
        $setting, array(
            'label' => __('Google Font API Key','tmi'),
            'section' => $tmiSection,
            'type' => 'text',
            'priority'=>10.5
        )
    );

    $setting = 'tmiBodyFont';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => 'Arial')
    );
    $wp_customize->add_control(
        new Google_Font_Dropdown_Custom_Control(
            $wp_customize,
            $setting,
            array(
                'label'      => __( 'Body Font', 'tmi' ),
                'section'    => $tmiSection,
                'settings'   => $setting,
                'priority'=>11
            )
        )
    );


    $setting = 'tmiBodyFontColor';
    $wp_customize->add_setting(
      $setting,
      array( 'default' => '#000')
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          $setting,
          array(
              'label'      => __( 'Body Text Color', 'tmi' ),
              'section'    => $tmiSection,
              'settings'   =>$setting,
              'priority'=>12
          )
      )
    );

    $setting = 'tmiBodyFontSize';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => '12px')
    );
    $wp_customize->add_control(
        $setting, array(
            'label' => __('Body Font size','tmi'),
            'section' => $tmiSection,
            'type' => 'text',
            'priority'=>13
        )
    );

    $setting = 'tmiHeadFont';
    $wp_customize->add_setting(
        $setting,
        array( 'default' => 'Arial')
    );
    $wp_customize->add_control(
        new Google_Font_Dropdown_Custom_Control(
            $wp_customize,
            $setting,
            array(
                'label'      => __( 'Heading Font', 'tmi' ),
                'section'    => $tmiSection,
                'settings'   => $setting,
                'priority'=>21
            )
        )
    );

    $setting = 'tmiHeadFontColor';
    $wp_customize->add_setting(
      $setting,
      array( 'default' => '#000')
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          $setting,
          array(
              'label'      => __( 'Heading Text Color', 'tmi' ),
              'section'    => $tmiSection,
              'settings'   =>$setting,
              'priority'=>22
          )
      )
    );

}
add_action( 'customize_register', 'tmiCustomizer' );
