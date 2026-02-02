<?php get_header(); ?>

<?php the_archive_title( '<header class="archive-header u-center"><h1>', '</h1>' ); ?>
<?php the_archive_description( '<div class="archive-description u-center">', '</div>' ); ?>

<section class="services-grid">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/service-card' ); ?>
  <?php endwhile; endif; ?>
</section>

<?php the_posts_pagination( array( 'prev_text' => __( 'Previous', 'melina-wp' ), 'next_text' => __( 'Next', 'melina-wp' ) ) ); ?>

<?php get_footer(); ?>