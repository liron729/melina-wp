<?php
/* Template Name: About Page */
get_header(); ?>

<article class="page-about">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <header class="entry-header">
      <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); endif; ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <?php
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>
  <?php endwhile; endif; ?>
</article>

<?php get_footer(); ?>