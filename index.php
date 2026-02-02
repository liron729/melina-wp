<?php get_header(); ?>

<section class="archive-loop">
  <?php if ( have_posts() ) : ?>
    <div class="posts-grid">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content' ); ?>
      <?php endwhile; ?>
    </div>

    <?php the_posts_pagination( array( 'prev_text' => __( 'Previous', 'melina-wp' ), 'next_text' => __( 'Next', 'melina-wp' ) ) ); ?>
  <?php else : ?>
    <p><?php _e( 'No posts found.', 'melina-wp' ); ?></p>
  <?php endif; ?>
</section>

<?php get_footer(); ?>