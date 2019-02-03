<?php get_header(); ?>
<?php 
global $holland;
$holland_page_layout = $holland['holland_layout_page']; 
if(!isset($holland_page_layout)): $holland_page_layout = 'right'; endif;
?>
<div class="hl-content hl-<?php echo esc_attr($holland_page_layout); ?>">
  <div class="container-fluid">
    <div class="row">
      <div class="hl-main <?php if($holland_page_layout == 'full'){echo 'col-sm-12';} else {echo 'col-md-8';}?>">
        <?php if ( have_posts() ) : 
				 while ( have_posts() ) : the_post(); 
					get_template_part( 'content','page');
					if ( comments_open() || '0' != get_comments_number() ) :
					  comments_template();
					endif;
				 endwhile; 
			   endif; 
		?>
      </div>
      <?php if($holland_page_layout != 'full'): ?>
      <div class="hl-side-bar col-sm-4">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>