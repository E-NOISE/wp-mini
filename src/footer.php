</div>
<?php $wp_mini_layout_cols = get_theme_mod('wp_mini_layout_cols', '1-col'); ?>
<aside id="sidebar" class="col-md-<?php echo ( $wp_mini_layout_cols == '1-col' ) ? '12' : '4' ?>">
<?php dynamic_sidebar('sidebar'); ?>
</aside>
</div>

<footer id="footer" class="container">
  <div class="col-md-12">
  <?php dynamic_sidebar('footer'); ?>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
