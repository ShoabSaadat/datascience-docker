<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<?php 
global $holland;
if(isset($holland['holland_slider_custom_ids'])):
$holland_posts_custom_ids = $holland['holland_slider_custom_ids']; 
endif;
$holland_post_orderby = $holland['holland_slider_posts'];
if(!isset($holland_post_orderby)): $holland_post_orderby = 'date'; endif;
$holland_posts_num = $holland['holland_slider_posts_num'];
if(!isset($holland_posts_num)): $holland_posts_num = 10; endif;
$holland_custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $holland_custom_logo_id , 'full' );
$holland_logo = $image[0];
$holland_tagline = $holland['holland_show_tagline'];
if(!isset($holland_tagline)): $holland_tagline = true; endif;
$holland_header_search = $holland['holland_header_search'];
if(!isset($holland_header_search)): $holland_header_search = true; endif;
$holland_header_social = $holland['holland_header_social'];
$holland_show_topbar = $holland['holland_show_topbar'];
if(!isset($holland_show_topbar)): $holland_show_topbar = true; endif;
$holland_on_slider = $holland['holland_on_slider'];
if(!isset($holland_on_slider)): $holland_on_slider = true; endif;
$holland_slider_meta_data = $holland['holland_slider_meta_data'];
if(!isset($holland_slider_meta_data)): $holland_slider_meta_data = true; endif;
$holland_slider_category = $holland['holland_slider_category'];
if(!isset($holland_slider_category)): $holland_slider_category = true; endif;
$holland_slider_title = $holland['holland_slider_title'];
if(!isset($holland_slider_title)): $holland_slider_title = true; endif;
if(isset($holland['holland_slider_categories'])):
$holland_slider_categories = $holland['holland_slider_categories'];
endif;
if(!isset($holland_slider_categories)): $holland_slider_categories = ''; endif;
?>
<body <?php body_class(); ?> >
<div class="main">
<header class="hl-header">
  <?php if($holland_show_topbar != false):?>
  <div class="hl-topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <?php if($holland_header_social == true):?>
          <?php holland_social(); ?>
          <?php endif; ?>
          <?php if($holland_header_search != false):?>
          <div class="hl-top-search-form">
            <?php get_search_form(); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="hl-logo-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
         <?php if (display_header_text() == true ):?>
          <div class="hl-logo">
            <?php if ( is_home()): ?>
            <h1 class="hl-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php if ($holland_logo != "" ): ?>
              <img src="<?php echo esc_url($holland_logo); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>">
              <?php  else: ?>
              <?php esc_html(bloginfo('name')); ?>
              <?php endif; ?>
              </a></h1>
            <?php if($holland_tagline != false):?>
            <h2 class="hl-tagline">
              <?php esc_html(bloginfo('description')); ?>
            </h2>
            <?php endif; ?>
            <?php else: ?>
            <h2 class="hl-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php if ($holland_logo != "" ): ?>
              <img src="<?php echo esc_url($holland_logo); ?>" alt="<?php echo esc_attr(get_bloginfo( 'name' )); ?>">
              <?php  else: ?>
              <?php bloginfo('name'); ?>
              <?php endif; ?>
              </a></h2>
            <?php if($holland_tagline != false):?>
            <h3 class="hl-tagline">
              <?php bloginfo('description'); ?>
            </h3>
            <?php endif; ?>
            <?php endif; ?>
          </div>
          <?php endif; ?>
           <?php if ( has_nav_menu( 'primary' ) ): ?>
          <div class="hl-mobile-icon">
            <div class="hl-menu-open"> <i class="fa fa-bars" aria-hidden="true"></i> </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php if ( has_nav_menu( 'primary' ) ): ?>
  <div class="hl-main-menu">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 hl-nav">
          <?php   
              $menuargs = array(
              'theme_location'  => 'primary',
              'container'       => 'nav',
              'container_class' => 'hl-nav',
              'menu_class'      => 'menu'
              );
              wp_nav_menu( $menuargs );
              ?>
        </div>
      </div>
    </div>
  </div>
  <!--Main Menu End-->
  <?php endif; ?>
  <?php if ( has_nav_menu( 'primary' ) ): ?>
  <div class="hl-mobile-menu">
    <div class="hl-mobile-container">
      <?php   
              $menuargs = array(
              'theme_location'  => 'primary',
              'container'       => 'nav',
              'container_class' => 'hl-mobile-nav',
              'menu_class'      => 'menu'
              );
              wp_nav_menu( $menuargs );
              ?>
      <div class="menu-close"> <i class="fa fa-times" aria-hidden="true"></i> </div>
    </div>
  </div>
  <!--Main Menu End-->
  <?php endif; ?>
</header>
<?php if ( is_home() && !is_paged()): ?>
<?php 
 			if($holland_post_orderby == 'custom'):	
			$args = array('post_type' => 'post','order'   => 'DESC','post__in' => $holland_posts_custom_ids,'orderby' => 'post__in','posts_per_page' => $holland_posts_num);		
			else:
			$args = array('post_type' => 'post','orderby' => $holland_post_orderby,'order' => 'DESC', 'posts_per_page' => $holland_posts_num, 'cat' => $holland_slider_categories);
			endif;
  ?>
<?php 
$the_query = new WP_Query( $args ); 
			if ( ($the_query->have_posts()) && ($holland_on_slider != false) ) :
?>
<section class="hl-slider">
  <div class="owl-carousel hl-modern-carousel owl-theme">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
			  if (has_post_thumbnail()):
			  $image_id = get_post_thumbnail_id();
			  $post_image_url = wp_get_attachment_image_src($image_id,'large', true); 
			  endif;
			  ?>
    <div class="item">
      <div class="hl-slider-block" <?php if (has_post_thumbnail()): ?>style="background-image:url('<?php echo esc_url($post_image_url[0]); ?>');" <?php endif; ?>>
        <div class="slider-mask">
          <div class="hl-slider-inner">
            <?php if($holland_slider_category != false):?>
            <div class="hl-post-cat">
              <?php the_category( '' );  ?>
            </div>
            <?php endif; ?>
            <?php if($holland_slider_title != false):?>
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark">
              <?php the_title(); ?>
              </a></h2>
            <?php endif; ?>
            <?php if($holland_slider_meta_data != false):?>
            <div class="slider-meta">
              <div class="slider-meta-data"><span>
                <?php esc_html_e( 'By','holland' ); ?>
                </span>
                <?php the_author_posts_link(); ?>
              </div>
              <span class="sep"></span>
              <div class="slider-meta-data"> <span>
                <?php esc_html_e( 'On','holland' ); ?>
                </span>
                <div class="cb-slider-date"><?php echo date_i18n( get_option( 'date_format' ), strtotime( get_the_date() ) ); ?></div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>