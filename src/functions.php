<?php

function wp_mini_scripts() {
  $bs_css = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css';
  $bs_js = '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js';

  wp_enqueue_style( 'bootstrap', $bs_css );
  wp_enqueue_style( 'theme', get_stylesheet_uri(), array('bootstrap') );

  wp_enqueue_script( 'bootstrap', $bs_js, array('jquery'), '1.0.0', true );
  wp_enqueue_script( 'main', get_template_directory_uri() . '/main.js', array('jquery', 'bootstrap'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'wp_mini_scripts' );


$sidebar = array(
  'name'          => 'Sidebar',
  'id'            => "sidebar",
  'description'   => '',
  'class'         => '',
  'before_widget' => '<article id="%1$s" class="widget %2$s">',
  'after_widget'  => "</article>\n",
  'before_title'  => '<h2 class="widgettitle">',
  'after_title'   => "</h2>\n",
);

register_sidebar( $sidebar );


add_theme_support( 'post-thumbnails' );

