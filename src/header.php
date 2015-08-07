<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only"><?php _e( 'Toggle navigation', $theme_name ); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <?php bloginfo('name'); ?>
      </a>
    </div>
    <?php wp_nav_menu(array(
      'theme_location' => 'main',
      'container' => 'div',
      'container_class' => 'collapse navbar-collapse',
      'container_id' => 'navbar-collapse-1',
      'menu_class' => 'nav navbar-nav',
      'fallback_cb' => false
    )); ?>
  </div>
</nav>

<div id="main" class="container">
<div id="content" class="col-md-8">

