<aside id="secondary" class="sidebar widget-area" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : dynamic_sidebar( 'sidebar-1' ); else : ?>
    <section class="widget">
      <h3 class="widget-title">About</h3>
      <p>This is your sidebar area. Add widgets in the Customizer to display contact forms and more.</p>
    </section>
  <?php endif; ?>
</aside>