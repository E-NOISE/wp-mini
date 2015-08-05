<?php
/*
Template Name: Index
*/
get_header();

global $query_string;

if (!is_category() && (is_home() || is_archive())) {
  query_posts($query_string . '&cat=-2');
}
?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article class="posts-article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="entry-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark">
        <?php the_title(); ?>
      </a>
    </h2>
    <p class="post-author-and-date">
      Publicado por 
      <span class="post-author"><?php the_author(); ?></span>
      el
      <span class="post-date"><?php the_time("D j M Y"); ?></span>
    </p>
  </header>

  <?php if (is_single()) : ?>
    <div class="post-body">
      <?php the_content(); ?>
    </div>
    <?php if (in_category('venta-motos-usadas')) : ?>
      <div class="vcard alert alert-info">
        Más Informes<br />
        <a class="email" href="mailto:&#102;&#114;&#097;&#118;&#101;&#108;&#097;&#114;&#100;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">
          &#102;&#114;&#097;&#118;&#101;&#108;&#097;&#114;&#100;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;
        </a><br />
        Claro <span class="tel">992653240</span><br />
        RPC <span class="tel">989567602</span>
      </div>
    <?php endif; ?>
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
    <div class="post-categories">Categorías: <?php echo get_the_category_list(','); ?></div>  
    <!--<div class="post-tags">Etiquetas: <?php the_tags(); ?></div>-->
    <?php if (is_single()) : ?>
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

