<?php
$cats = wp_get_post_categories( get_the_ID() );
if ( $cats ) :
  $related = new WP_Query( array( 'category__in' => $cats, 'post__not_in' => array( get_the_ID() ), 'posts_per_page' => 4 ) );
  if ( $related->have_posts() ) : ?>
    <aside class="related-posts">
      <h3>Related Posts</h3>
      <ul>
        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
      </ul>
    </aside>
  <?php endif; wp_reset_postdata();
endif;
?>