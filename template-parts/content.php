<article <?php post_class( 'post-card' ); ?> id="post-<?php the_ID(); ?>">
  <?php if ( has_post_thumbnail() ) : ?><div class="post-thumb"><?php the_post_thumbnail( 'medium' ); ?></div><?php endif; ?>

  <div class="post-body">
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="entry-meta meta-small">
      <span class="posted-on"><?php echo get_the_date(); ?></span>
      <span class="byline"><?php the_author_posts_link(); ?></span>
    </div>

    <div class="excerpt small"><?php the_excerpt(); ?></div>
    <p><a class="btn" href="<?php the_permalink(); ?>">Read More</a></p>
  </div>
</article>