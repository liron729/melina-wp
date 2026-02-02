<?php get_header(); ?>

<section class="hero">
  <div class="u-center">
    <h1><?php bloginfo( 'name' ); ?> — Beauty & Services</h1>
    <p class="lead">Discover the latest makeup services and curated treatments for beauty lovers.</p>
    <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="btn btn--primary cta">Browse Services</a>
  </div>
</section>

<section class="featured-services section">
  <div class="u-center">
    <h2>Featured Services</h2>
  </div>
  <div class="services-grid">
    <?php
      $featured = new WP_Query( array( 'post_type' => 'service', 'posts_per_page' => 6 ) );
      if ( $featured->have_posts() ) :
        while ( $featured->have_posts() ) : $featured->the_post();
          get_template_part( 'template-parts/service-card' );
        endwhile;
      endif;
      wp_reset_postdata();
    ?>
  </div>
</section>

<section class="about-preview section">
  <div class="u-center">
    <h2>About Us</h2>
    <p>Melina Makeup is your one-stop source for beauty tips, product reviews, and services that inspire your style.</p>
    <a class="btn btn--secondary" href="<?php echo esc_url( get_permalink( get_page_by_path( 'about' ) ) ); ?>">Learn More</a>
  </div>
</section>

<section class="cta section">
  <div class="u-center">
    <h3>Stay Informed</h3>
    <p>Sign up for updates and curated service news every month.</p>
    <a class="btn btn--primary" href="#">Subscribe</a>
  </div>
</section>

<?php get_footer(); ?>