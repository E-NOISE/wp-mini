<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <?php bloginfo('name'); ?>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php wp_list_categories('title_li=&hide_empty=1'); ?>
        <?php wp_list_pages('title_li='); ?>
      </ul>
    </div>
  </div>
</nav>

<div id="main" class="container">
<div id="content" class="col-md-8">

