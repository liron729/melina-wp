<?php
$terms = get_the_terms( get_the_ID(), 'service_category' );
if ( $terms && ! is_wp_error( $terms ) ) :
  $term_ids = wp_list_pluck( $terms, 'term_id' );
  $related = new WP_Query( array( 'post_type' => 'service', 'tax_query' => array( array( 'taxonomy' => 'service_category', 'field' => 'term_id', 'terms' => $term_ids ) ), 'posts_per_page' => 4, 'post__not_in' => array( get_the_ID() ) ) );

  if ( $related->have_posts() ) : ?>
    <section class="related-services">
      <h3>Related Services</h3>
      <div class="services-grid">
        <?php while ( $related->have_posts() ) : $related->the_post(); ?>
          <?php get_template_part( 'template-parts/service-card' ); ?>
        <?php endwhile; ?>
      </div>
    </section>
  <?php endif; wp_reset_postdata();
endif;
?>