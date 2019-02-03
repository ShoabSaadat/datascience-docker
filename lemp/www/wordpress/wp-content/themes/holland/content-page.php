<?php 
global $holland;
$holland_layout_page = $holland['holland_layout_page'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('holland-single'); ?>>
  <?php if ( has_post_thumbnail()) : ?>
  <div class="holland-post-media">
    <?php 
	   if($holland_layout_page == 'full'):
	   the_post_thumbnail("holland-full-thumb"); 
	   else:
	   the_post_thumbnail("holland-full-thumb");
	   endif;
	   ?>
  </div>
  <?php endif; ?>
  <div class="holland-page-entry">
    <div class="holland-page-header">
      <h1 class="holland-page-title">
        <?php the_title(); ?>
      </h1>
    </div>
    <div class="holland-page-content">
      <?php the_content(''); ?>
    </div>
  </div>
</article>
