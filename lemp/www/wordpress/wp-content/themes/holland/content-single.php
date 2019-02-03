<?php
global $holland;
$holland_page_layout = $holland['holland_layout_single'];
if(!isset($holland_page_layout)): $holland_page_layout = 'right'; endif;
$holland_single_featured = $holland['holland_single_featured'];
if(!isset($holland_single_featured)): $holland_single_featured = true; endif;
$holland_single_category = $holland['holland_single_category'];
if(!isset($holland_single_category)): $holland_single_category = true; endif;
$holland_single_date = $holland['holland_single_date'];
if(!isset($holland_single_date)): $holland_single_date = true; endif;
$holland_single_author = $holland['holland_single_author'];
if(!isset($holland_single_author)): $holland_single_author = true; endif;
$holland_single_comment = $holland['holland_single_comment'];
if(!isset($holland_single_comment)): $holland_single_comment = true; endif;
$holland_single_tags = $holland['holland_single_tags'];
if(!isset($holland_single_tags)): $holland_single_tags = true; endif;
$holland_single_bio = $holland['holland_single_bio'];
if(!isset($holland_single_bio)): $holland_single_bio = true; endif;
$holland_single_related = $holland['holland_single_related'];
$holland_single_nextpre = $holland['holland_single_nextpre'];
if(!isset($holland_single_nextpre)): $holland_single_nextpre = true; endif;
?>

<article class="hl-single">
  <div class="hl-single-content">
    <?php if($holland_single_category != false):?>
    <div class="hl-post-cat">
      <?php the_category( '' ); ?>
    </div>
    <?php endif; ?>
    <h1 class="hl-post-title">
      <?php the_title(); ?>
    </h1>
    <div class="post-meta">
      <ul class="meta-list">
        <?php if($holland_single_date != false):?>
        <li> <span class="date"><span class="by">
          <?php esc_html_e( 'On ',  'holland' ); ?>
          </span> <?php echo date_i18n(get_option('date_format'), strtotime($wp_query->post->post_date)); ?> </span> </li>
        <?php endif; ?>
        <?php if($holland_single_author != false):?>
        <li> <span class="author"><span class="by">
          <?php esc_html_e( 'By ',  'holland' ); ?>
          </span>
          <?php the_author_posts_link(); ?>
          </span> </li>
        <?php endif; ?>
        <?php if($holland_single_comment != false):?>
        <li> <span class="meta-comment">
          <?php comments_popup_link( esc_html__( '0 Comments', 'holland' ), esc_html__( '1 Comment', 'holland' ), esc_html__( '% Comments', 'holland' ) ); ?>
          </span> </li>
        <?php endif; ?>
      </ul>
    </div>
    <?php if (( has_post_thumbnail()) && ($holland_single_featured != false) ) : ?>
    <div class="hl-post-media"> <a href="<?php the_permalink(); ?>">
      <?php 
	   if($holland_page_layout == 'full'):
	   the_post_thumbnail("holland-full-thumb"); 
	   else:
	   the_post_thumbnail("holland-medium-thumb");
	   endif;
	   ?>
      </a> </div>
    <?php endif; ?>
    <div class="hl-single-post">
      <?php the_content(''); ?>
    </div>
  </div>
  <?php if($holland_single_tags != false):?>
  <div class="hl-post-tags">
    <?php the_tags('','',''); ?>
  </div>
  <?php endif; ?>
  <div class="hl-link-pages">
    <?php wp_link_pages( array( 'before' => '<div class="multi-page-links">',
 'after' => '</div>', 'next_or_number' => 'number','link_before' => '<span>',
		'link_after'       => '</span>',  ) );?>
  </div>
  <?php if($holland_single_bio != false):?>
  <div class="hl-about-author">
    <div class="hl-author-avatar"> <span><?php echo get_avatar( $post->post_author, 120 ); ?></span> </div>
    <div class="author-info">
      <h5><span>
        <?php esc_html_e( 'About ',  'holland' ); ?>
        </span>
        <?php the_author_posts_link(); ?>
      </h5>
      <p>
        <?php the_author_meta('description'); ?>
      </p>
    </div>
    <div class="clearfix"></div>
  </div>
  <?php endif; ?>
  <?php if($holland_single_related == true):?>
  <div class="hl-related">
    <?php 
	$orig_post = $post;
	global $post;
	$categories = get_the_category($post->ID);
	if ($categories) :
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args = array(
			'category__in'     => $category_ids,
			'post__not_in'     => array($post->ID),
			'posts_per_page'   => 3,
			'ignore_sticky_posts' => 1,
			'orderby' => 'rand'
		);
		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ): ?>
    <h4 class="hl-second-title"><span>
      <?php esc_html_e( 'You May Also Like',  'holland' ); ?>
      </span></h4>
    <?php while( $my_query->have_posts() ):
			$my_query->the_post();?>
    <div class="hl-related-grid">
      <?php if ( has_post_thumbnail()) : ?>
      <div class="hl-post-media"> <a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute( 'echo=0' ); ?>">
        <?php the_post_thumbnail("holland-grid-thumb"); ?>
        </a> </div>
      <?php endif; ?>
      <h3><a href="<?php echo esc_url(get_permalink()); ?>">
        <?php the_title(); ?>
        </a></h3>
      <span class="hl-post-date"><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_the_date() ) ); ?></span> </div>
    <?php
			endwhile;
		endif;
	endif;
	wp_reset_postdata();
	?>
    <div class="clearfix"></div>
  </div>
  <?php endif; ?>
  <?php if ((get_next_post() != '' ) || (get_previous_post() != '')): ?>
  <?php if($holland_single_nextpre != false):?>
  <div class="hl-next-pre">
    <?php
$holland_next_post = get_next_post();
if (!empty( $holland_next_post )): ?>
    <div class="hl-single-next">
    <a href="<?php echo esc_url(get_permalink( $holland_next_post->ID )); ?>">
      <div class="hl-next-pre-title">
        <?php esc_html_e( 'Up Next',  'holland' ); ?>
      </div>
      <div class="hl-next-post-link"><?php echo esc_html($holland_next_post->post_title ); ?> &nbsp; <i class="fa fa-angle-double-right" aria-hidden="true"></i></div></a>
    </div>
    <?php endif; ?>
    <?php
$holland_previous_post = get_previous_post();
if (!empty( $holland_previous_post )): ?>
    <div class="hl-single-pre"> <a href="<?php echo esc_url(get_permalink( $holland_previous_post->ID )); ?>">
      <div class="hl-next-pre-title">
        <?php esc_html_e( 'Previously',  'holland' ); ?>
      </div>
      <div class="hl-next-post-link"><i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<?php echo esc_html($holland_previous_post->post_title); ?></div>
      </a> </div>
    <?php endif; ?>
    <div class="clearfix"></div>
  </div>
  <?php endif; ?>
  <?php endif; ?>
</article>
