<?php get_header(); ?>

<header class="archive-header u-center">
  <h1><?php post_type_archive_title(); ?></h1>
  <p><?php echo get_post_type_object( 'service' )->description; ?></p>
</header>

<section class="services-grid">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/service-card' ); ?>
  <?php endwhile; endif; ?>
</section>

<?php the_posts_pagination( array( 'prev_text' => __( 'Previous', 'melina-wp' ), 'next_text' => __( 'Next', 'melina-wp' ) ) ); ?>

<?php get_footer(); ?>