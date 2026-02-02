<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article <?php post_class( 'single-service' ); ?> id="post-<?php the_ID(); ?>">

    <?php if ( has_post_thumbnail() ) : ?><div class="service-image"><?php the_post_thumbnail( 'service-image' ); ?></div><?php endif; ?>

    <header class="service-header">
      <h1><?php the_title(); ?></h1>
      <div class="service-meta-list">
        <div class="service-specialists"><?php echo get_the_term_list( get_the_ID(), 'specialist', '', ', ', '' ); ?></div>
        <div class="service-categories"><?php echo get_the_term_list( get_the_ID(), 'service_category', '', ', ', '' ); ?></div>
        <div class="service-types"><?php echo get_the_term_list( get_the_ID(), 'service_type', '', ', ', '' ); ?></div>
      </div>
    </header>

    <div class="service-excerpt">
      <?php the_excerpt(); ?>
    </div>

    <div class="service-content">
      <?php the_content(); ?>
    </div>

    <?php comments_template(); ?>

    <?php get_template_part( 'template-parts/related-services' ); ?>

  </article>
<?php endwhile; endif; ?>

<?php get_footer(); ?>