<?php
/* Template Name: Contact Page */
get_header(); ?>

<div class="page-contact layout-with-sidebar">
  <div class="content-area">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>

  <aside class="sidebar">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : dynamic_sidebar( 'sidebar-1' ); endif; ?>
  </aside>
</div>

<?php get_footer(); ?>