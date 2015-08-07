<?php

$theme_name = 'wp-mini';


function wp_mini_scripts() {
  $bs_css = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css';
  $bs_js = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js';

  wp_enqueue_style( 'bootstrap', $bs_css );
  wp_enqueue_style( 'theme', get_stylesheet_uri(), array('bootstrap') );

  wp_enqueue_script( 'bootstrap', $bs_js, array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js', array('jquery', 'bootstrap'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'wp_mini_scripts' );


register_nav_menus( array(
  'main' => 'Main Navigation Menu',
  'footer' => 'Footer Menu',
) );


register_sidebar( array(
  'name'          => 'Sidebar',
  'id'            => "sidebar",
  'description'   => '',
  'class'         => '',
  'before_widget' => '<article id="%1$s" class="widget %2$s">',
  'after_widget'  => "</article>\n",
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => "</h2>\n",
) );


add_theme_support( 'post-thumbnails' );


function wp_mini_customize_register( $wp_customize ) {
  //
  // Colours
  //
  $wp_customize->add_setting( 'wp_mini_colors_bg' , array(
    'default'    => '#fff',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_bg_control',
    array(
      'label'      => __( 'Background Color', $theme_name ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_bg',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_text' , array(
    'default'    => '#333',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_text_control',
    array(
      'label'      => __( 'Text Color', $theme_name ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_text',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_links' , array(
    'default'    => '#337ab7',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_links_control',
    array(
      'label'      => __( 'Links Color', $theme_name ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_links',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_links_hover' , array(
    'default'    => '#23527c',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_links_hover_control',
    array(
      'label'      => __( 'Links Hover Color', $theme_name ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_links_hover',
    )
  ) );

  //
  // Header Settings
  //
  $wp_customize->add_section( 'wp_mini_header_section' , array(
    'title' => __( 'Header Settings', $theme_name ),
    'priority' => 100,
    'capability' => 'edit_theme_options',
    'description' => __( 'Change header options here.', $theme_name ),
  ) );

  $wp_customize->add_setting( 'wp_mini_header_bgcolor' , array(
    'default'    => '#f8f8f8',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_header_bgcolor_control',
    array(
      'label'      => __( 'Background Color', $theme_name ),
      'section'    => 'wp_mini_header_section',
      'settings'   => 'wp_mini_header_bgcolor',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_header_textcolor' , array(
    'default'    => '#777',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_header_textcolor_control',
    array(
      'label'      => __( 'Links Color', $theme_name ),
      'section'    => 'wp_mini_header_section',
      'settings'   => 'wp_mini_header_textcolor',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_header_bordercolor' , array(
    'default'    => '#e7e7e7',
    //'transport'  => 'refresh',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_header_bordercolor_control',
    array(
      'label'      => __( 'Border Color', $theme_name ),
      'section'    => 'wp_mini_header_section',
      'settings'   => 'wp_mini_header_bordercolor',
    )
  ) );
}

add_action( 'customize_register', 'wp_mini_customize_register' );


function wp_mini_dynamic_css() {
  ?>
  <style type='text/css'>
  html, body {
    background-color: <?php echo get_theme_mod('wp_mini_colors_bg'); ?>;
    color: <?php echo get_theme_mod('wp_mini_colors_text'); ?>;
  }
  a {
    color: <?php echo get_theme_mod('wp_mini_colors_links'); ?>;
  }
  a:hover {
    color: <?php echo get_theme_mod('wp_mini_colors_links_hover'); ?>;
  }
  #main-navbar {
    background-color: <?php echo get_theme_mod('wp_mini_header_bgcolor'); ?>;
    border-color: <?php echo get_theme_mod('wp_mini_header_bordercolor'); ?>;
  }
  #main-navbar a {
    color: <?php echo get_theme_mod('wp_mini_header_textcolor'); ?>;
  }
  </style>
  <?php
}

add_action( 'wp_head' , 'wp_mini_dynamic_css' );


//
// l10n and i18n
//

load_theme_textdomain( $theme_name, templatepath.'/languages' );

