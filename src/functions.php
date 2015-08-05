<?php
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

