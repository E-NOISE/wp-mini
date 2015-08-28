<?php

function wp_mini_scripts() {
  $bs_css = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css';
  $bs_js = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js';

  wp_enqueue_style( 'bootstrap', $bs_css );
  wp_enqueue_style( 'theme', get_stylesheet_uri(), array('bootstrap') );

  wp_enqueue_script( 'bootstrap', $bs_js, array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/main.min.js', array('jquery', 'bootstrap'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'wp_mini_scripts' );


register_nav_menus( array(
  'main' => 'Main Navigation Menu',
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

register_sidebar( array(
  'name'          => 'Footer',
  'id'            => "footer",
  'description'   => '',
  'class'         => '',
  'before_widget' => '<article id="%1$s" class="widget %2$s">',
  'after_widget'  => "</article>\n",
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => "</h2>\n",
) );


function wp_mini_customize_register( $wp_customize ) {
  //
  // Colours
  //
  $wp_customize->add_setting( 'wp_mini_colors_text' , array(
    'default'    => '#333',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_text_control',
    array(
      'label'      => __( 'Text Color', 'wp-mini' ),
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
      'label'      => __( 'Links Color', 'wp-mini' ),
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
      'label'      => __( 'Links Hover Color', 'wp-mini' ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_links_hover',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_header_bg' , array(
    'default'    => '#f8f8f8',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_header_bg_control',
    array(
      'label'      => __( 'Header Background Color', 'wp-mini' ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_header_bg',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_header_border' , array(
    'default'    => '#e7e7e7',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_header_border_control',
    array(
      'label'      => __( 'Header Border Color', 'wp-mini' ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_header_border',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_colors_article_bg' , array(
    'default'    => 'transparent',
  ) );

  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'wp_mini_colors_article_bg_control',
    array(
      'label'      => __( 'Article Background Color', 'wp-mini' ),
      'section'    => 'colors',
      'settings'   => 'wp_mini_colors_article_bg',
    )
  ) );


  $wp_customize->add_section( 'wp_mini_layout', array(
    'title' => __( 'Layout', 'wp-mini' ),
  ) );

  $wp_customize->add_setting( 'wp_mini_layout_cols', array(
    'default' => '2-col',
  ) );

  $wp_customize->add_control( 'wp_mini_layout_cols_control', array(
    'label' => __( 'Layout columns', 'wp-mini' ),
    'section' => 'wp_mini_layout',
    'settings' => 'wp_mini_layout_cols',
    'type' => 'radio',
    'choices' => array(
      '1-col' => '1 column',
      '2-col' => '2 columns',
    )
  ) );


  $wp_customize->add_section( 'wp_mini_fonts', array(
    'title' => __( 'Fonts', 'wp-mini' ),
  ) );

  $wp_customize->add_setting( 'wp_mini_fonts_text_family', array(
    'default' => 'sans-serif',
  ) );

  $wp_customize->add_control( 'wp_mini_fonts_text_family_control', array(
    'label' => __( 'Text font family', 'wp-mini' ),
    'section' => 'wp_mini_fonts',
    'settings' => 'wp_mini_fonts_text_family',
    'type' => 'radio',
    'choices' => array(
      'sans-serif' => 'sans-serif',
      'serif' => 'serif',
      'monospace' => 'monospace',
    )
  ) );

  $wp_customize->add_setting( 'wp_mini_fonts_text_size', array(
    'default' => '14',
  ) );

  $wp_customize->add_control( 'wp_mini_fonts_text_size_control', array(
    'label' => __( 'Text font size', 'wp-mini' ),
    'section' => 'wp_mini_fonts',
    'settings' => 'wp_mini_fonts_text_size',
    'type' => 'number',
  ) );

  $wp_customize->add_section( 'wp_mini_posts', array(
    'title' => __( 'Posts', 'wp-mini' ),
  ) );

  $wp_customize->add_setting( 'wp_mini_posts_show_author', array(
    'default' => 'yes',
  ) );

  $wp_customize->add_control( 'wp_mini_posts_show_author_control', array(
    'label' => __( 'Show author', 'wp-mini' ),
    'section' => 'wp_mini_posts',
    'settings' => 'wp_mini_posts_show_author',
    'type' => 'radio',
    'choices' => array(
      'yes' => 'Yes',
      'no' => 'No',
    ),
  ) );

  $wp_customize->add_setting( 'wp_mini_posts_show_date', array(
    'default' => 'yes',
  ) );

  $wp_customize->add_control( 'wp_mini_posts_show_date_control', array(
    'label' => __( 'Show date', 'wp-mini' ),
    'section' => 'wp_mini_posts',
    'settings' => 'wp_mini_posts_show_date',
    'type' => 'radio',
    'choices' => array(
      'yes' => 'Yes',
      'no' => 'No',
    ),
  ) );

  $wp_customize->add_setting( 'wp_mini_posts_show_categories', array(
    'default' => 'yes',
  ) );

  $wp_customize->add_control( 'wp_mini_posts_show_categories_control', array(
    'label' => __( 'Show categories', 'wp-mini' ),
    'section' => 'wp_mini_posts',
    'settings' => 'wp_mini_posts_show_categories',
    'type' => 'radio',
    'choices' => array(
      'yes' => 'Yes',
      'no' => 'No',
    ),
  ) );

  $wp_customize->add_setting( 'wp_mini_posts_show_tags', array(
    'default' => 'yes',
  ) );

  $wp_customize->add_control( 'wp_mini_posts_show_tags_control', array(
    'label' => __( 'Show tags', 'wp-mini' ),
    'section' => 'wp_mini_posts',
    'settings' => 'wp_mini_posts_show_tags',
    'type' => 'radio',
    'choices' => array(
      'yes' => 'Yes',
      'no' => 'No',
    ),
  ) );
}

add_action( 'customize_register', 'wp_mini_customize_register' );


function wp_mini_dynamic_css() {
  $bg_repeat = get_theme_mod( 'background_repeat' );
  $bg_attachment = get_theme_mod( 'background_attachment' );
  ?>
  <style type='text/css'>
  body {
    background-color: #<?php echo get_theme_mod( 'background_color', 'fff' ); ?>;
    color: <?php echo get_theme_mod( 'wp_mini_colors_text' ); ?>;
    font-family: <?php echo get_theme_mod( 'wp_mini_fonts_text_family', 'sans-serif' ); ?>;
    font-size: <?php echo get_theme_mod( 'wp_mini_fonts_text_size', '14' ); ?>px;
  }
  <?php if ( $bg_repeat == 'no-repeat' && $bg_attachment == 'fixed' ) : ?>
  body.custom-background {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  <?php endif; ?>
  a {
    color: <?php echo get_theme_mod( 'wp_mini_colors_links' ); ?>;
  }
  a:hover {
    background-color: <?php echo get_theme_mod( 'wp_mini_colors_links' ); ?>;
    color: <?php echo get_theme_mod( 'wp_mini_colors_links_hover' ); ?>;
  }
  #main-navbar {
    background-color: <?php echo get_theme_mod( 'wp_mini_colors_header_bg' ); ?>;
    border-color: <?php echo get_theme_mod( 'wp_mini_colors_header_border' ); ?>;
  }
  #main-navbar, #main-navbar a {
    color: #<?php echo get_theme_mod( 'header_textcolor' , '777' ); ?>;
  }
  #content > article {
    background-color: <?php echo get_theme_mod( 'wp_mini_colors_article_bg', 'transparent' ); ?>;
  }
  #footer .menu-item a {
    background-color: <?php echo get_theme_mod( 'wp_mini_colors_text' ); ?>;
    color: #<?php echo get_theme_mod( 'background_color', 'fff' ); ?>;
  }
  #footer .menu-item a:hover {
    background-color: <?php echo get_theme_mod( 'wp_mini_colors_links' ); ?>;
    color: #<?php echo get_theme_mod( 'wp_mini_colors_article_bg', 'transparent' ); ?>;
  }
  </style>
  <?php
}

add_action( 'wp_head' , 'wp_mini_dynamic_css' );


//
// Theme features.
//
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
add_theme_support( 'post-formats' );


//
// l10n and i18n
//
function wp_mini_setup() {
  load_theme_textdomain( 'wp-mini', get_template_directory().'/languages' );
}

add_action('after_setup_theme', 'wp_mini_setup');

