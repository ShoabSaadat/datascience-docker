<?php get_header(); ?>
<?php 
global $holland;
$holland_content_layout= $holland['holland_layout_archive'];
if(!isset($holland_content_layout)): $holland_content_layout = 'right'; endif;
?>
<div class="archive-title">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h1>
          <?php the_archive_title(); ?>
        </h1>
      </div>
    </div>
  </div>
</div>
<div class="hl-content hl-<?php echo esc_attr($holland_content_layout); ?>">
  <div class="container-fluid">
    <div class="row">
      <div class="hl-main <?php if($holland_content_layout == 'full'){echo 'col-sm-12';} else {echo 'col-md-8';}?>">
        <?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post(); 
						get_template_part( 'content', get_post_format() );
					endwhile; 
					holland_pagination();
			  else : 
				  get_template_part( 'content', 'none' ); 
			  endif; ?>
      </div>
      <?php if($holland_content_layout != 'full'): ?>
      <div class="hl-side-bar col-sm-4">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
