<?php
/*
Template Name: Index
*/
get_header();
?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<article class="posts-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php include 'inc/post-header.php'; ?>
  <?php include 'inc/post-body.php'; ?>
  <?php include 'inc/post-footer.php'; ?>
</article>

<?php endwhile; ?>
<?php endif; ?>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

<?php get_footer(); ?>

