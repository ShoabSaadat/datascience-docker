<?php
/* Template Name: Full Width Page */
 get_header(); 
 ?>
<div class="hl-content hl-full">
  <div class="container-fluid">
    <div class="row">
      <div class="hl-main col-sm-12">
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
    </div>
  </div>
</div>
<?php get_footer(); ?>