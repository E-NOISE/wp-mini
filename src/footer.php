</div>
<?php get_sidebar(); ?>
</div>

<footer id="footer">
  <?php wp_nav_menu(array(
    'theme_location' => 'footer',
    'fallback_cb' => false
  )); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
