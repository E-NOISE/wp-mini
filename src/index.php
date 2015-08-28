<?php
/*
Template Name: Index
*/
get_header();
?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

<article class="posts-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="entry-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h2>
  </header>

  <?php if ( is_single() || is_page() ) : ?>
    <div class="post-body">
      <?php the_content(); ?>
    </div>
  <?php else : ?>
    <?php if ( has_post_thumbnail() ) : ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <a href="<?php the_permalink(); ?>">
      <div class="post-featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
    </a>
    <?php endif; ?>
    <div class="entry-summary page-body">
      <?php the_excerpt(); ?>
    </div>
  <?php endif ; ?>

  <footer>
    <?php
    $show_author = get_theme_mod( 'wp_mini_posts_show_author', 'yes' ) == 'yes';
    $show_date = get_theme_mod( 'wp_mini_posts_show_date', 'yes' ) == 'yes';
    $show_categories = get_theme_mod( 'wp_mini_posts_show_categories', 'yes' ) == 'yes';
    $show_tags = get_theme_mod( 'wp_mini_posts_show_tags', 'yes' ) == 'yes';
    if ( $show_author || $show_date ) : ?>
    <div class="post-author-and-date">
      <?php _e( 'Published' , 'wp-mini' ); ?>
      <?php if ( $show_author ) : ?>
      <span class="post-author">
        <?php _e( 'by' , 'wp-mini' ); ?> 
        <?php the_author(); ?>
      </span>
      <?php endif; ?>
      <?php if ( $show_date ) : ?>
      <span class="post-date">
        <?php _e( 'on' , 'wp-mini' ); ?>
        <?php the_time("D j M Y"); ?>
      </span>
      <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if ( $show_categories ) : ?>
    <div class="post-categories">
      <?php echo __( 'Categories', 'wp-mini' ).': '.get_the_category_list( ',' ); ?>
    </div>
    <?php endif; ?>
    <?php if ( $show_tags && has_tag() ) : ?>
    <div class="post-tags">
      <?php the_tags(); ?>
    </div>
    <?php endif; ?>
    <?php if ( is_single() ) : ?>
    <?php comments_template(); ?> 
    <?php else : ?>
    <?php comments_popup_link(); ?>
    <?php endif; ?>
  </footer>
</article>

<?php endwhile; ?>
<?php endif; ?>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

<?php get_footer(); ?>

