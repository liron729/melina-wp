<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if ( has_post_thumbnail() ) : ?><div class="post-featured"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>

    <header class="entry-header">
      <h1><?php the_title(); ?></h1>
      <div class="entry-meta">
        <span class="posted-on"><?php echo get_the_date(); ?></span>
        <span class="byline"><?php the_author_posts_link(); ?></span>
        <span class="cat-links"><?php the_category( ', ' ); ?></span>
      </div>
    </header>

    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <footer class="entry-footer">
      <?php if ( get_the_tags() ) : ?><div class="post-tags"><?php the_tags(); ?></div><?php endif; ?>
    </footer>

    <?php comments_template(); ?>

    <?php get_template_part( 'template-parts/related-posts' ); ?>
  </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>