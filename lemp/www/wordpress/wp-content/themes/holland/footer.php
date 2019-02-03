<?php
global $holland;
$holland_footer_widgets = $holland['holland_footer_widgets'];
if(!isset($holland_footer_widgets)): $holland_footer_widgets = 'three'; endif;
$holland_footer_copyright = $holland['holland_footer_copyright'];
$holland_footer_copyright_text = $holland['holland_footer_copyright_text'];
?>
<footer class="hl-footer">
  <?php if(($holland_footer_widgets != 'none') && (( is_active_sidebar( 'holland-footer-widget1' ) ) || ( is_active_sidebar( 'holland-footer-widget2' ) ) || ( is_active_sidebar( 'holland-footer-widget3' ) ))):?>
  <div class="hl-footer-widgets">
    <div class="container-fluid">
      <div class="row">
        <?php if($holland_footer_widgets == 'three'): ?>
        <div class="col-sm-4 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget1' ); ?>
        </div>
        <div class="col-sm-4 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget2' ); ?>
        </div>
        <div class="col-sm-4 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget3' ); ?>
        </div>
        <?php elseif($holland_footer_widgets == 'two'): ?>
        <div class="col-sm-6 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget1' ); ?>
        </div>
        <div class="col-sm-6 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget2' ); ?>
        </div>
        <?php else: ?>
        <div class="col-sm-12 holland-footer-widget">
          <?php dynamic_sidebar( 'holland-footer-widget1' ); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if($holland_footer_copyright != false):
  $holland_footer_esc_attr = array(
  	'a' => array(
  		'href' => array(),
        'title' => array(),
		'target' => array()
    ),
    'p' => array(),
    'em' => array(),
    'strong' => array(),
);
  ?>
  <div class="hl-socket">
    <div class="container-fluid">
      <div class="row">
        <div class="hl-copyright-text"> <?php echo wp_kses($holland_footer_copyright_text, $holland_footer_esc_attr ); ?> </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</footer>
</div>
<?php wp_footer(); ?>
</body></html>