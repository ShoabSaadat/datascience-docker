<?php
function holland_widgets()
{
    register_sidebar(array(
        'name' => esc_html__('Main Sidebar', 'holland'),
        'id' => 'holland-main-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'holland'),
        'id' => 'holland-footer-widget1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer 2', 'holland'),
        'id' => 'holland-footer-widget2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
	register_sidebar(array(
        'name' => esc_html__('Footer 3', 'holland'),
        'id' => 'holland-footer-widget3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '<hr /></h4>',
    ));
}
add_action('widgets_init', 'holland_widgets');
?>