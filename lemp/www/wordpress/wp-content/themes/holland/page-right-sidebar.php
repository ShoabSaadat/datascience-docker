<?php 
/* Template Name: Right Sidebar Page */
get_header(); 
?>
<div class="hl-content hl-right">
  <div class="container-fluid">
    <div class="row">
      <div class="hl-main col-md-8">
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
      <div class="hl-side-bar col-sm-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>