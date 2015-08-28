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

