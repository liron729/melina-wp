<?php
/* Template Name: Blog Page */
get_header(); ?>

<section class="blog-archive">
  <div class="u-center"><h1>Blog</h1></div>

  <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $blog_query = new WP_Query( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => 6 ) );

    if ( $blog_query->have_posts() ) :
      echo '<div class="posts-grid">';
      while ( $blog_query->have_posts() ) : $blog_query->the_post();
        get_template_part( 'template-parts/content' );
      endwhile;
      echo '</div>';

      the_posts_pagination( array( 'prev_text' => __( 'Previous', 'melina-wp' ), 'next_text' => __( 'Next', 'melina-wp' ) ) );
    else :
      echo '<p>' . __( 'No posts found.', 'melina-wp' ) . '</p>';
    endif;

    wp_reset_postdata();
  ?>
</section>

<?php get_footer(); ?>