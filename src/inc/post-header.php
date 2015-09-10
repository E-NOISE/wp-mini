<header class="entry-header">
  <?php if (is_single() || is_page()) : ?>
  <h1 class="entry-title page-header">
  <?php else : ?>
  <h2 class="entry-title">
  <?php endif; ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark">
      <?php the_title(); ?>
    </a>
  <?php if (is_single() || is_page()) : ?>
  </h1>
  <?php else : ?>
  </h2>
  <?php endif; ?>
</header>

