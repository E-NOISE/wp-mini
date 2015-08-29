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
      <?php if ( has_nav_menu('main') ) : ?>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only"><?php _e( 'Toggle navigation', 'wp-mini' ); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php endif; ?>
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

<?php if ( is_home() && display_header_text() ) : ?>
<div id="tagline">
  <div class="container">
    <h4><?php bloginfo('description', 'display'); ?></h4>
  </div>
</div>
<?php endif; ?>

<div id="main" class="container">
<?php $wp_mini_layout_cols = get_theme_mod('wp_mini_layout_cols', '1-col'); ?>
<div id="content" class="col-md-<?php echo ( $wp_mini_layout_cols == '1-col' ) ? '12' : '8' ?>">

