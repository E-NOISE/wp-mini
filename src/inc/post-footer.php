<?php
$show_author = get_theme_mod( 'wp_mini_posts_show_author', 'yes' ) == 'yes';
$show_date = get_theme_mod( 'wp_mini_posts_show_date', 'yes' ) == 'yes';
$show_categories = get_theme_mod( 'wp_mini_posts_show_categories', 'yes' ) == 'yes';
$show_tags = get_theme_mod( 'wp_mini_posts_show_tags', 'yes' ) == 'yes';
?>

<footer>

  <?php if ( $show_author || $show_date ) : ?>
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

  <?php if ( comments_open() ) : ?>
  <?php if ( is_single() ) : ?>
  <?php comments_template(); ?> 
  <?php else : ?>
  <?php comments_popup_link(); ?>
  <?php endif; ?>
  <?php endif; ?>

</footer>

