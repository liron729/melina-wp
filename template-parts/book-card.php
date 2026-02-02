<article <?php post_class( 'service-card' ); ?> id="post-<?php the_ID(); ?>">
  <a class="service-link" href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ) : ?><div class="service-thumb"><?php the_post_thumbnail( 'service-image' ); ?></div><?php endif; ?>
    <h3 class="service-title"><?php the_title(); ?></h3>
  </a>

  <div class="service-specialist small"><?php echo get_the_term_list( get_the_ID(), 'specialist', '', ', ', '' ); ?></div>
  <div class="service-excerpt small"><?php the_excerpt(); ?></div>
  <div class="service-category-badges">
    <?php $cats = get_the_terms( get_the_ID(), 'service_category' ); if ( $cats ) : foreach ( $cats as $cat ) : ?><span class="badge"><?php echo esc_html( $cat->name ); ?></span><?php endforeach; endif; ?>
  </div>

  <p><a class="btn" href="<?php the_permalink(); ?>">View Details</a></p>
</article>