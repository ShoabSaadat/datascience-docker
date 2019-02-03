<?php get_header(); ?>
<div class="hl-content hl-404">
  <div class="container-fluid">
    <div class="row">
      <div class="page-404 col-sm-12">
        <h1><?php esc_html_e( '404',  'holland' ); ?></h1>
        <p class="content-none-note">
          <?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.',  'holland' ); ?>
        </p>
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
