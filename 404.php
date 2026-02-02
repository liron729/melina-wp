<?php get_header(); ?>

<section class="error-404 not-found u-center">
  <h1>Page not found</h1>
  <p>Sorry, but the page you're looking for can't be found. Try searching or check out our recent services below.</p>

  <?php get_search_form(); ?>

  <p><a class="btn btn--secondary" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a> <a class="btn" href="<?php echo esc_url( home_url( '/services' ) ); ?>">Browse Services</a></p>

  <div class="recent-services section">
    <h2>Recent Services</h2>
    <div class="services-grid">
      <?php
        $recent = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => 4 ) );
        if ( $recent->have_posts() ) : while ( $recent->have_posts() ) : $recent->the_post();
          get_template_part( 'template-parts/service-card' );
        endwhile; endif;
        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>