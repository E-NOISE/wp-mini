</div>
<?php get_sidebar(); ?>
</div>

<footer id="footer">
  <?php wp_nav_menu(array(
    'theme_location' => 'footer',
    'container' => '',
    //'menu_id' => 'navbar-collapse-1',
    //'menu_class' => 'collapse navbar-collapse',
    'fallback_cb' => false
  )); ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
