<?php
function alternate_rows( $i ) {
  if ($i % 2) {
    echo ' class="alt"';
  } else {
    echo '';
  }
}
?>

<?php if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) : ?>
  <?php die('You can not access this page directly!'); ?>
<?php endif; ?>
  
<?php if ( !empty( $post->post_password ) ) : ?>
  <?php if( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) : ?>
    <?php die('Unauthorized'); ?>
  <?php endif; ?>
<?php endif; ?>

<h3><?php comments_number( 'No comments', 'One comment', '% comments' ); ?></h3>
<?php comments_rss_link( $link_text ); ?>

<?php if ( $comments ) : ?>
  <ol>
  <?php foreach ( $comments as $comment ) : ?>
    <li<?php alternate_rows( $i++ ); ?> id="comment-<?php comment_ID(); ?>">
      <?php if ( $comment->comment_approved == '0' ) : ?>
      <p>Your comment is awaiting approval</p>
      <?php endif; ?>
      <?php echo get_avatar( get_comment_author_email() ); ?>
      <?php comment_text(); ?>
      <cite>
        <?php comment_type(); ?> by <?php comment_author_link(); ?> on
        <?php comment_date(); ?> at <?php comment_time(); ?>
        <?php edit_comment_link(null, ' - ', $after_link); ?>
      </cite>
    </li>
  <?php endforeach; ?>
  </ol>
<?php else : ?>
  <p>No comments yet</p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
  <?php if ( get_option( 'comment_registration' ) && !$user_ID ) : ?>
  <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if ( $user_ID ) : ?>
    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
    <?php else : ?>
    <div class="form-group">
      <label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label>
      <input type="text" class="form-control" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    </div>
    <div class="form-group">
      <label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label>
      <input type="text" class="form-control" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
    </div>
    <div class="form-group">
      <label for="url"><small>Website</small></label>
      <input type="text" class="form-control" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    </div>
    <?php endif; ?>
    <div class="form-group">
      <textarea class="form-control" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
    </div>
    <div class="form-group">
      <input class="btn btn-default" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </div>

    Allowed tags: <?php echo allowed_tags(); ?>

    <?php do_action( 'comment_form', $post->ID ); ?>
  </form>
  <?php endif; ?>
<?php else : ?>
  <p>The comments are closed.</p>
<?php endif; ?>

