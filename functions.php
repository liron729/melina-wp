<?php
/**
 * Melina Makeup theme functions and definitions
 */

if ( ! function_exists( 'melina_setup' ) ) :
  function melina_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'melina-wp' ),
      'footer'  => __( 'Footer Menu', 'melina-wp' ),
    ) );

    // Image sizes
    add_image_size( 'service-image', 330, 500, true );
  }
endif;
add_action( 'after_setup_theme', 'melina_setup' );

/* Enqueue styles and scripts ------------------------------------------- */
function melina_enqueue_scripts() {
  wp_enqueue_style( 'melina-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );
  wp_enqueue_style( 'melina-main-css', get_template_directory_uri() . '/assets/css/style.css', array(), filemtime( get_template_directory() . '/assets/css/style.css' ) );

  wp_enqueue_script( 'melina-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/js/main.js' ), true );

  wp_localize_script( 'melina-main', 'melinaData', array(
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'nonce'    => wp_create_nonce( 'melina_nonce' ),
  ) );
}
add_action( 'wp_enqueue_scripts', 'melina_enqueue_scripts' );

/* Sidebars and Widget Areas ------------------------------------------- */
function melina_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Primary Sidebar', 'melina-wp' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Main sidebar that appears on pages and posts.', 'melina-wp' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Widget Area 1', 'melina-wp' ),
    'id'            => 'footer-1',
    'description'   => __( 'First footer widget area', 'melina-wp' ),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Widget Area 2', 'melina-wp' ),
    'id'            => 'footer-2',
    'description'   => __( 'Second footer widget area', 'melina-wp' ),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Widget Area 3', 'melina-wp' ),
    'id'            => 'footer-3',
    'description'   => __( 'Third footer widget area', 'melina-wp' ),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget-title">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'melina_widgets_init' );

/* Custom body classes filter ------------------------------------------ */
function melina_body_class_filter( $classes ) {
  // Always add theme indicator
  $classes[] = 'salon-theme';

  // Add sidebar presence class
  if ( is_active_sidebar( 'sidebar-1' ) ) {
    $classes[] = 'has-sidebar';
  }

  // Add specific classes for single service and service archive
  if ( is_singular( 'service' ) ) {
    $classes[] = 'single-service-page';
  }
  if ( is_post_type_archive( 'service' ) ) {
    $classes[] = 'service-archive-page';
  }

  return $classes;
}
add_filter( 'body_class', 'melina_body_class_filter' );

/* Custom Post Type: Service ------------------------------------------- */
function melina_register_service_post_type() {
  $labels = array(
    'name'               => _x( 'Services', 'post type general name', 'melina-wp' ),
    'singular_name'      => _x( 'Service', 'post type singular name', 'melina-wp' ),
    'menu_name'          => _x( 'Services', 'admin menu', 'melina-wp' ),
    'name_admin_bar'     => _x( 'Service', 'add new on admin bar', 'melina-wp' ),
    'add_new'            => _x( 'Add New', 'service', 'melina-wp' ),
    'add_new_item'       => __( 'Add New Service', 'melina-wp' ),
    'new_item'           => __( 'New Service', 'melina-wp' ),
    'edit_item'          => __( 'Edit Service', 'melina-wp' ),
    'view_item'          => __( 'View Service', 'melina-wp' ),
    'all_items'          => __( 'All Services', 'melina-wp' ),
    'search_items'       => __( 'Search Services', 'melina-wp' ),
    'parent_item_colon'  => __( 'Parent Services:', 'melina-wp' ),
    'not_found'          => __( 'No services found.', 'melina-wp' ),
    'not_found_in_trash' => __( 'No services found in Trash.', 'melina-wp' )
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'show_in_rest'       => true,
    'rewrite'            => array( 'slug' => 'services', 'with_front' => true ),
    'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments' ),
    'menu_icon'          => 'dashicons-admin-users',
    'taxonomies'         => array( 'service_category', 'specialist', 'service_type' ),
  );

  register_post_type( 'service', $args );
}
add_action( 'init', 'melina_register_service_post_type' );

/* Custom Taxonomies --------------------------------------------------- */
function melina_register_service_taxonomies() {
  // Service Category (hierarchical)
  $labels = array(
    'name' => _x( 'Service Categories', 'taxonomy general name', 'melina-wp' ),
    'singular_name' => _x( 'Service Category', 'taxonomy singular name', 'melina-wp' ),
    'search_items' =>  __( 'Search Service Categories', 'melina-wp' ),
    'all_items' => __( 'All Service Categories', 'melina-wp' ),
    'parent_item' => __( 'Parent Service Category', 'melina-wp' ),
    'parent_item_colon' => __( 'Parent Service Category:', 'melina-wp' ),
    'edit_item' => __( 'Edit Service Category', 'melina-wp' ),
    'update_item' => __( 'Update Service Category', 'melina-wp' ),
    'add_new_item' => __( 'Add New Service Category', 'melina-wp' ),
    'new_item_name' => __( 'New Service Category Name', 'melina-wp' ),
  );

  register_taxonomy( 'service_category', array( 'service' ), array(
    'hierarchical' => true,
    'labels' => $labels,
    'rewrite' => array( 'slug' => 'service-category' ),
    'show_admin_column' => true,
    'show_in_rest' => true,
  ) );

  // Specialist (non-hierarchical)
  register_taxonomy( 'specialist', 'service', array(
    'hierarchical' => false,
    'labels' => array('name' => __( 'Specialists', 'melina-wp' )),
    'rewrite' => array( 'slug' => 'specialist' ),
    'show_admin_column' => true,
    'show_in_rest' => true,
  ) );

  // Service Type (non-hierarchical) - Consultation, Treatment, Package
  register_taxonomy( 'service_type', 'service', array(
    'hierarchical' => false,
    'labels' => array('name' => __( 'Service Types', 'melina-wp' )),
    'rewrite' => array( 'slug' => 'service-type' ),
    'show_admin_column' => true,
    'show_in_rest' => true,
  ) );
}
add_action( 'init', 'melina_register_service_taxonomies' );

/* AJAX handler placeholder for Load More Services --------------------- */
function melina_load_more_services() {
  check_ajax_referer( 'melina_nonce', 'nonce' );

  $paged = isset( $_POST['page'] ) ? intval( $_POST['page'] ) + 1 : 2;

  $query = new WP_Query( array(
    'post_type' => 'service',
    'paged' => $paged,
    'posts_per_page' => 6,
  ) );

  if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
      get_template_part( 'template-parts/service-card' );
    endwhile;
  endif;

  wp_reset_postdata();
  wp_die();
}
add_action( 'wp_ajax_melina_load_more_services', 'melina_load_more_services' );
add_action( 'wp_ajax_nopriv_melina_load_more_services', 'melina_load_more_services' );

?>