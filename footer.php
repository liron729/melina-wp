<?php
/**
 * Footer template
 */
?>
  </main>

  <footer class="site-footer" role="contentinfo">
    <div class="footer-widgets">
      <?php if ( is_active_sidebar( 'footer-1' ) ) : ?><div class="footer-col"><?php dynamic_sidebar( 'footer-1' ); ?></div><?php endif; ?>
      <?php if ( is_active_sidebar( 'footer-2' ) ) : ?><div class="footer-col"><?php dynamic_sidebar( 'footer-2' ); ?></div><?php endif; ?>
      <?php if ( is_active_sidebar( 'footer-3' ) ) : ?><div class="footer-col"><?php dynamic_sidebar( 'footer-3' ); ?></div><?php endif; ?>
    </div>

    <div class="site-info u-center">
      <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
    </div>

    <?php wp_footer(); ?>
  </footer>
</body>
</html>