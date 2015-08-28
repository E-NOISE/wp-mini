<form action="/" method="get">
  <div class="input-group">
    <input type="text" name="s" id="search"i class="form-control" value="<?php the_search_query(); ?>" />
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default"><?php _e( 'Search', 'wp-mini' ); ?></button>
    </span>
  </div>
</form>
