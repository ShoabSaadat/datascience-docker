<?php 
//Pagination
function holland_pagination(){
global $holland;
$holland_blog_pagination_type = $holland['holland_blog_pagination_type'];
?>

<div class="holland-pagination">
  <?php if($holland_blog_pagination_type == 'btn'):?>
  <div class="holland-next-posts">
    <?php esc_url(next_posts_link()); ?>
  </div>
  <div class="holland-previous-posts">
    <?php esc_url(previous_posts_link()); ?>
  </div>
  <?php else: 
	the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => '&#171;',
    'next_text' => '&#187;',
) );
	endif; ?>
  <div class="clearfix"></div>
</div>
<?php	
	}
	

if ( !is_admin() ):

// Excerpt 
function holland_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'holland_excerpt_length', 999 );

// Excerpt More
function holland_excerpt_more( $more ) {
	if ( !is_admin() ):
	return '&hellip;';
	endif;
}
add_filter( 'excerpt_more', 'holland_excerpt_more' );

endif;

//Comments
function holland_comments($comment, $args, $depth) {
	?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
  <div class="holland-comment">
    <div class="author-img"> <?php echo get_avatar($comment,$args['avatar_size']); ?> </div>
    <div class="comment-text"> <span class="author"><?php echo get_comment_author_link(); ?></span> <span class="date"><?php printf(esc_html__('%1$s at %2$s', 'holland'), get_comment_date(),  get_comment_time()) ?></span> <span class="reply">
      <?php comment_reply_link(array_merge( $args, array('reply_text' => esc_attr__('Reply', 'holland'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
      <?php edit_comment_link(esc_attr__('Edit', 'holland')); ?>
      </span>
      <?php if ($comment->comment_approved == '0') : ?>
      <em><i class="icon-info-sign"></i>
      <?php esc_html_e('Comment awaiting approval', 'holland'); ?>
      </em>
      <?php endif; ?>
      <div class="comment-desc">
        <?php comment_text(); ?>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</li>
<?php 
	}
	
/* Social Links */
function holland_social(){
	global $holland;
$hollsnd_social_email = $holland['holland_social_email'];
$hollsnd_fb = $holland['holland_social_fb'];
$hollsnd_twitter = $holland['holland_social_tw'];
$hollsnd_googleplus = $holland['holland_social_gp'];
$hollsnd_instagram = $holland['holland_social_ig'];
$hollsnd_pinterest = $holland['holland_social_pin'];
$hollsnd_linkedin = $holland['holland_social_li'];
$hollsnd_tumblr = $holland['holland_social_tumblr'];
$hollsnd_flickr = $holland['holland_social_flickr'];
$hollsnd_reddit = $holland['holland_social_reddit'];
$hollsnd_youtube = $holland['holland_social_yt'];
$hollsnd_vimeo = $holland['holland_social_vimeo'];
$hollsnd_rss = $holland['holland_social_rss'];
?>
<?php if (($hollsnd_social_email != "") || ($hollsnd_fb != "") || ($hollsnd_twitter != "") || ($hollsnd_googleplus != "") || ($hollsnd_instagram != "") || ($hollsnd_pinterest != "") || ($hollsnd_linkedin != "") || ($hollsnd_tumblr != "") || ($hollsnd_flickr != "") || ($hollsnd_reddit != "") || ($hollsnd_youtube != "") || ($hollsnd_vimeo != "") || ($hollsnd_rss != "")):?>
<ul class="hl-social-icons hl-header-social">
  <?php endif; ?>
  <?php if ($hollsnd_social_email != "" ): ?>
  <li><a href="mailto:<?php echo esc_attr($hollsnd_social_email); ?>" target="_blank"><i class="fa fa-envelope"></i> </a></li>
  <?php endif; ?>
  <?php if ($hollsnd_fb != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_twitter!= "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_googleplus != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_googleplus); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_instagram != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_instagram); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_pinterest != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_pinterest); ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_linkedin != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_linkedin); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_tumblr != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_tumblr); ?>" target="_blank"><i class="fa fa-tumblr"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_flickr != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_flickr); ?>" target="_blank"><i class="fa fa-flickr"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_reddit != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_reddit); ?>" target="_blank"><i class="fa fa-reddit"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_youtube != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_youtube); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_vimeo != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_vimeo); ?>" target="_blank"><i class="fa fa-vimeo"></i></a></li>
  <?php endif; ?>
  <?php if ($hollsnd_rss != "" ): ?>
  <li><a href="<?php echo esc_url($hollsnd_rss); ?>" target="_blank"><i class="fa fa-rss"></i></a></li>
  <?php endif; ?>
  <?php if (($hollsnd_social_email != "") || ($hollsnd_fb != "") || ($hollsnd_twitter != "") || ($hollsnd_googleplus != "") || ($hollsnd_instagram != "") || ($hollsnd_pinterest != "") || ($hollsnd_linkedin != "") || ($hollsnd_tumblr != "") || ($hollsnd_flickr != "") || ($hollsnd_reddit != "") || ($hollsnd_youtube != "") || ($hollsnd_vimeo != "") || ($hollsnd_rss != "")):?>
</ul>
<?php endif; ?>
<?php  
	}
	
// Required Plugins
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function holland_register_required_plugins() {
	$plugins = array(
        array(
			'name'      		=> 'Redux Framework',
			'slug'      		=> 'redux-framework',
			'required'  		=> false,
			'version' 			=> '',
			'force_activation' 	=> false,
			'force_deactivation'=> false, 
			'external_url' 		=> '',
		),
	);
	$config = array(
		'id'           => 'holland',                 
		'default_path' => '', 
		'menu'         => 'holland-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false, 
		'message'      => '',
	);
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'holland_register_required_plugins' );

// Body Class
if ( get_header_image() ) : 
function my_body_classes( $classes ) {
    $classes[] = 'has-header-bg';  
    return $classes;   
}
add_filter( 'body_class','my_body_classes' );
endif;

// Holland Pro Offer
function holland_offer_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'More Features, More Options and Powerful theme', 'holland' ); ?> &nbsp; <a href="https://airthemes.net/holland/#compare-free-pro" class="button button-primary" target="_blank">Compare Holland Free & Premium</a></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'holland_offer_notice' );
?>