<section class="holland-content">
  <div class="container-fluid">
    <div class="row">
      <div class="holland-content-none col-xs-12">
        <h1 class="hl-second-title"><span>
          <?php esc_html_e( 'Nothing Found',  'holland' ); ?>
          </span></h1>
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
        <p class="content-none-note"><?php printf( esc_html__( 'Ready to publish your first post? %1$s Get started here. %2$s', 'holland'  ), '<a target="_blank" href="' . esc_url( admin_url( 'post-new.php' ) ) . '">', '</a>'  ); ?></p>
        <?php elseif ( is_search() ) : ?>
        <p class="content-none-note">
          <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'holland' ); ?>
        </p>
        <?php get_search_form(); ?>
        <?php else : ?>
        <p class="content-none-note">
          <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'holland' ); ?>
        </p>
        <?php get_search_form(); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>