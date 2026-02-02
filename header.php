<?php
/**
 * Header template
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="site-header" role="banner">
    <div class="nav-wrapper">
      <div class="site-branding">
        <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : the_custom_logo(); endif; ?>
        <div class="site-identity">
          <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
          <p class="site-description"><?php echo get_bloginfo( 'description' ); ?></p>
        </div>
      </div>

      <nav class="primary-navigation" role="navigation" aria-label="Primary Menu">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false ) ); ?>
      </nav>

      <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">Menu</button>
    </div>
  </header>

  <main id="main" class="site-main" role="main">
