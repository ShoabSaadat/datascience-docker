<?php 
global $holland;
$holland_blog_list_fearured = $holland['holland_blog_list_fearured'];
if(!isset($holland_blog_list_fearured)): $holland_blog_list_fearured = true; endif;
$holland_blog_list_title = $holland['holland_blog_list_title'];
if(!isset($holland_blog_list_title)): $holland_blog_list_title = true; endif;
$holland_blog_list_excerpt = $holland['holland_blog_list_excerpt'];
if(!isset($holland_blog_list_excerpt)): $holland_blog_list_excerpt = true; endif;
$holland_blog_list_category = $holland['holland_blog_list_category'];
if(!isset($holland_blog_list_category)): $holland_blog_list_category = true; endif;
$holland_blog_list_date = $holland['holland_blog_list_date'];
if(!isset($holland_blog_list_date)): $holland_blog_list_date = true; endif;
$holland_blog_list_author = $holland['holland_blog_list_author'];
if(!isset($holland_blog_list_author)): $holland_blog_list_author = true; endif;
$holland_blog_list_comment = $holland['holland_blog_list_comment'];
if(!isset($holland_blog_list_comment)): $holland_blog_list_comment = true; endif;
$holland_blog_list_readmore = $holland['holland_blog_list_readmore'];
if(!isset($holland_blog_list_readmore)): $holland_blog_list_readmore = 'Read More'; endif;

if(is_archive() || is_search()){
$holland_blog_style = $holland['holland_blog_archive_style'];
if(!isset($holland_blog_style)): $holland_blog_style = 'grid'; endif;
$holland_page_layout = $holland['holland_layout_archive'];
if(!isset($holland_page_layout)): $holland_page_layout = 'right'; endif;	
}
else{
$holland_blog_style = $holland['holland_blog_default_style'];
if(!isset($holland_blog_style)): $holland_blog_style = 'grid'; endif;
$holland_page_layout = $holland['holland_layout_home'];
if(!isset($holland_page_layout)): $holland_page_layout = 'right'; endif;	
}
if ($holland_blog_style == 'standard'): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hl-article hl-article-standard'); ?>>
  <?php if ((has_post_thumbnail()) && ($holland_blog_list_fearured != false)): ?>
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
  <div class="article-content">
    <?php if($holland_blog_list_category != false):?>
    <div class="hl-post-cat">
      <?php the_category( '' ); ?>
    </div>
    <?php endif; ?>
    <?php if($holland_blog_list_title != false):?>
    <h2 class="hl-post-title"> <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h2>
    <?php endif; ?>
    <?php if($holland_blog_list_excerpt != false):?>
    <div class="hl-post-content">
      <?php
			if( strpos( $post->post_content, '<!--more-->' ) ) {
				the_content('');
			}
			else {
				$holland_excerpt= get_the_content();
				echo wp_kses_post( wp_trim_words( $holland_excerpt, 60 ) );
			}
	  ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="hl-article-footer">
    <div class="hl-article-more"> <a href="<?php the_permalink(); ?>">
      <?php 
		if($holland_blog_list_readmore == 'Read More'):
		esc_html_e( 'Read More',  'holland' ); 
		else:
		echo esc_attr($holland_blog_list_readmore);
		endif;
		?>
      </a> </div>
    <div class="post-meta">
      <div class="meta-left">
        <?php if(($holland_blog_list_date != false) || ($holland_blog_list_author != false)): ?>
        <ul class="meta-list">
          <?php if($holland_blog_list_date != false): ?>
          <li> <span class="date"> <span class="by">
            <?php esc_html_e( 'On ',  'holland' ); ?>
            </span> <?php echo date_i18n(get_option('date_format'), strtotime($wp_query->post->post_date)); ?> </span> </li>
          <?php endif; ?>
          <?php if($holland_blog_list_author != false): ?>
          <li> <span class="author"> <span class="by">
            <?php esc_html_e( 'By ',  'holland' ); ?>
            </span>
            <?php the_author_posts_link(); ?>
            </span> </li>
          <?php endif; ?>
        </ul>
        <?php endif; ?>
      </div>
      <?php if($holland_blog_list_comment != false): ?>
      <div class="meta-right">
        <div class="meta-comment">
          <?php comments_popup_link( __( '0 Comments', 'holland' ), __( '1 Comment', 'holland' ), __( '% Comments', 'holland' ) ); ?>
        </div>
      </div>
      <?php endif; ?>
      <div class="clearfix"></div>
    </div>
  </div>
</article>
<?php
elseif($holland_blog_style == 'list'): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hl-article hl-article-list'); ?> >
  <?php if ((has_post_thumbnail()) && ($holland_blog_list_fearured != false)): ?>
  <div class="hl-post-media"> <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail("holland-list-thumb"); ?>
    </a> </div>
  <?php endif; ?>
  <div class="article-content">
    <?php if($holland_blog_list_category != false):?>
    <div class="hl-post-cat">
      <?php the_category( '' ); ?>
    </div>
    <?php endif; ?>
    <?php if($holland_blog_list_title != false):?>
    <h2 class="hl-post-title"> <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h2>
    <?php endif; ?>
    <div class="post-meta">
      <ul class="meta-list">
        <?php if($holland_blog_list_date != false): ?>
        <li> <span class="date"> <span class="by">
          <?php esc_html_e( 'On ',  'holland' ); ?>
          </span> <?php echo date_i18n(get_option('date_format'), strtotime($wp_query->post->post_date)); ?> </span> </li>
        <?php endif; ?>
        <?php if($holland_blog_list_author != false): ?>
        <li> <span class="author"> <span class="by">
          <?php esc_html_e( 'By ',  'holland' ); ?>
          </span>
          <?php the_author_posts_link(); ?>
          </span> </li>
        <?php endif; ?>
      </ul>
    </div>
    <?php if($holland_blog_list_excerpt != false):?>
    <div class="hl-post-content">
      <?php the_excerpt(); ?>
    </div>
    <?php endif; ?>
    <div class="hl-article-footer">
      <div class="hl-article-more <?php if($holland_blog_list_comment != 1): echo "no-comment-count"; endif;?>"> <a href="<?php the_permalink(); ?>">
        <?php 
			if($holland_blog_list_readmore == 'Read More'):
			esc_html_e( 'Read More',  'holland' ); 
			else:
			echo esc_attr($holland_blog_list_readmore);
			endif;
		?>
        </a> </div>
      <?php if($holland_blog_list_comment != false): ?>
      <div class="hl-list-comment">
        <?php comments_popup_link( '<i class="fa fa-comments" aria-hidden="true"></i> 0','<i class="fa fa-comments" aria-hidden="true"></i> 1','<i class="fa fa-comments" aria-hidden="true"></i> %','','<label class="list-comment-off"><i class="fa fa-comments" aria-hidden="true"></i> Off</label>' ); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</article>
<?php
else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hl-article hl-article-grid'); ?> >
  <?php if ((has_post_thumbnail()) && ($holland_blog_list_fearured != false)): ?>
  <div class="hl-post-media"> <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail("holland-grid-thumb"); ?>
    </a> </div>
  <?php endif; ?>
  <div class="article-content">
    <?php if($holland_blog_list_category != false):?>
    <div class="hl-post-cat">
      <?php the_category( '' ); ?>
    </div>
    <?php endif; ?>
    <?php if($holland_blog_list_title != false):?>
    <h2 class="hl-post-title"> <a href="<?php the_permalink(); ?>" rel="bookmark">
      <?php the_title(); ?>
      </a> </h2>
    <?php endif; ?>
    <div class="post-meta">
      <ul class="meta-list">
        <?php if($holland_blog_list_date != false): ?>
        <li> <span class="date"> <span class="by">
          <?php esc_html_e( 'On ',  'holland' ); ?>
          </span> <?php echo date_i18n(get_option('date_format'), strtotime($wp_query->post->post_date)); ?> </span> </li>
        <?php endif; ?>
        <?php if($holland_blog_list_author != false): ?>
        <li> <span class="author"> <span class="by">
          <?php esc_html_e( 'By ',  'holland' ); ?>
          </span>
          <?php the_author_posts_link(); ?>
          </span> </li>
        <?php endif; ?>
        <?php if($holland_blog_list_comment != false): ?>
        <li> <span class="meta-comment">
          <?php comments_popup_link( __( '0 Comments', 'holland' ), __( '1 Comment', 'holland' ), __( '% Comments', 'holland' ) ); ?>
          </span> </li>
        <?php endif; ?>
      </ul>
    </div>
    <?php if($holland_blog_list_excerpt != false):?>
    <div class="hl-post-content">
      <?php the_excerpt(); ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="hl-article-footer">
    <div class="hl-article-more"> <a href="<?php the_permalink(); ?>">
      <?php 
			if($holland_blog_list_readmore == 'Read More'):
			esc_html_e( 'Read More',  'holland' ); 
			else:
			echo esc_attr($holland_blog_list_readmore);
			endif;
	  ?>
      </a> </div>
  </div>
</article>
<?php endif; ?>