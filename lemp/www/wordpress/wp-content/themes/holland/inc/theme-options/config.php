<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "holland";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'holland' ),
        'page_title'           => esc_html__( 'Theme Options', 'holland' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/airthemes.net/',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );

    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
		$holland_intro_esc_attr = array(
  	'a' => array(
  		'href' => array(),
        'title' => array(),
		'target' => array()
    ),
);
		$args['intro_text'] = '';
    } else {
        $args['intro_text'] = '';
    }

    // Add content after the form.
    $args['footer_text'] = '';

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */
    $tabs = array(
        array(
            'id'      => 'holland_help_tab',
            'title'   => esc_html__( 'Online Documentation', 'holland' ),
			'content' => sprintf( esc_html__( 'It is easy to use Holland theme. %1$s Click Here to use our documentation. %2$s.', 'holland' ), '<a target="_blank" href="' . esc_url( 'https://airthemes.net/holland/documentation' ) . '">', '</a>' )),
		 array(
            'id'      => 'holland_help_tab2',
            'title'   => esc_html__( 'Email Support', 'holland' ),	
			'content' => sprintf( __( 'Go to our email support page. This option for premium users only. %1$s Click Here. %2$s.', 'holland' ), '<a target="_blank" href="' . esc_url( 'https://airthemes.net/support' ) . '">', '</a>' )),
		array(
            'id'      => 'holland_help_tab3',
            'title'   => esc_html__( 'Holland Support Forum', 'holland' ),
	   		'content' => sprintf( esc_html__( 'WordPress community-based support forum. %1$s Click Here. %2$s.', 'holland' ), '<a target="_blank" href="' . esc_url( 'https://wordpress.org/support/theme/holland' ) . '">', '</a>' )),
    );
    Redux::setHelpTab( $opt_name, $tabs );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'holland' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Manage elements of header.', 'holland' ),
		'icon'             => 'el el-heart',
        'fields'           => array(
			array(
                'id'       => 'holland_logo_margin',
                'type'     => 'spacing',
                'output'   => array( '.hl-logo' ),
                'mode'     => 'margin',
                'right'         => false,
                'left'          => false,
                'units'         => 'px',
                'title'    => esc_html__( 'Logo Margin (px):', 'holland' ),
                'default'  => array(
                    'margin-top'    => '30px',
                    'margin-bottom' => '30px'
                )
            ),
			array(
                'id'       => 'holland_logo_tag_space',
                'type'     => 'spacing',
                'output'   => array( '.hl-logo .hl-tagline' ),
                'mode'     => 'margin',
                'right'         => false,
                'bottom'        => false,
                'left'          => false,
                'units'         => 'px',
                'title'    => esc_html__( 'Margin Between Logo and Tagline (px):', 'holland' ),
                'default'  => array(
                    'margin-top'    => '10px',
                )
            ),
			array(
                'id'       => 'holland_show_tagline',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Tagline:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_header_search',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Search Form:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_show_topbar',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Top Bar:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_header_social',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Header Social Icons:', 'holland'),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Slider', 'holland' ),
        'id'               => 'slider',
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Adjust your slider settings and customize slider posts.', 'holland' ),
		'icon'             => 'el el-th-large',
        'fields'           => array(
		array(
                'id'       => 'holland_on_slider',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Slider:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_slider_posts',
                'type'     => 'radio',
                'title'    => esc_html__( 'Slider Posts', 'holland' ),
                'options'  => array(
                    'date' => esc_html__( 'Recent Posts', 'holland' ),
                    'comment_count' => esc_html__( 'Popular Posts', 'holland' ),
                    'rand' => esc_html__( 'Random Posts', 'holland' ),
					'custom' => esc_html__( 'Custom (Add Posts by IDs)', 'holland' ),
                ),
                'default'  => 'date'
            ),
			array(
                'id'       => 'holland_slider_custom_ids',
                'type'     => 'select',
				'data'     => 'posts',
				'multi'    => true,
				'args'     => array( 'numberposts' => -1 ),
                'title'    => esc_html__( 'Posts', 'holland' ),
				'placeholder' => esc_html__( 'Select your posts', 'holland' ),
				'subtitle' => esc_html__( 'Add your own posts here.', 'holland' ),
				'required' => array( 'holland_slider_posts', '=', 'custom' ),
            ),
			array(
                'id'       => 'holland_slider_categories',
                'type'     => 'select',
                'data'     => 'categories',
                'multi'    => true,
                'title'    => esc_html__( 'Slider Category', 'holland' ),
				'placeholder' => esc_html__( 'Select a Category', 'holland' ),
				'required' => array( 'holland_slider_posts', '!=', 'custom' ),
            ),
			array(
                'id'       => 'holland_slider_posts_num',
                'type'     => 'slider',
                'title'    => esc_html__( 'Number of Posts', 'holland' ),
                'subtitle' => esc_html__( 'Enter number of posts do you want show in the slider. Show all posts enter value "-1".', 'holland' ),
                'default'  => 20,
                'min'      => -1,
                'step'     => 1,
                'max'      => 100,
                'display_value' => 'text',
				'required' => array( 'holland_slider_posts', '!=', 'custom' ),
            ),
			array(
                'id'       => 'holland_slider_transition',
                'type'     => 'switch',
                'title'    => esc_html__( 'Automatically Transition:', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_slider_controls',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Slider Controls:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_slider_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide title on the slider:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_slider_meta_data',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide meta date on the slider:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			
			array(
                'id'       => 'holland_slider_category',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide categories on the slider:', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'            => 'holland_slider_speed',
                'type'          => 'slider',
                'title'         => esc_html__( 'Transition Speed (ms)', 'holland' ),
                'default'       => 1000,
                'min'           => 100,
                'step'          => 100,
                'max'           => 20000,
                'display_value' => 'text'
            ),
			array(
                'id'            => 'holland_slider_pause',
                'type'          => 'slider',
                'title'         => esc_html__( 'Pause Time (ms)', 'holland' ),
                'default'       => 5000,
                'min'           => 100,
                'step'          => 100,
                'max'           => 20000,
                'display_value' => 'text'
            ),
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Layouts', 'holland' ),
        'id'               => 'layouts',
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Select your site sidebar and content position here.', 'holland' ),
		'icon'             => 'el el-th-list',
        'fields'           => array(
		array(
                'id'            => 'holland_layout_width',
                'type'          => 'slider',
                'title'         => esc_html__( 'Content Width (px)', 'holland' ),
				'subtitle'      => esc_html__( 'Enter value between 800px and 1400px.', 'holland' ),
                'default'       => 1100,
                'min'           => 800,
                'step'          => 10,
                'max'           => 1920,
                'display_value' => 'text'
            ),
		array(
                'id'       => 'holland_layout_archive',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Archive Layout', 'holland' ),
                'options'  => array(
                    'left' => array( 
						'title' => esc_html__( 'Left Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/left_sidebar.png' ),
                    'full' => array( 
						'title' => esc_html__( 'Without Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/default_layout.png' ),
                    'right' => array( 
						'title' => esc_html__( 'Right Sidebar', 'holland' ), 
						'img' => get_template_directory_uri() . '/inc/theme-options/img/right_sidebar.png' )
                ),
                'default'  => 'right'
            ),
		array(
                'id'       => 'holland_layout_home',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Home Layout', 'holland' ),
                'options'  => array(
                    'left' => array( 
						'title' => esc_html__( 'Left Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/left_sidebar.png' ),
                    'full' => array( 
						'title' => esc_html__( 'Without Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/default_layout.png' ),
                    'right' => array( 
						'title' => esc_html__( 'Right Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/right_sidebar.png' )
                ),
                'default'  => 'right'
            ),
		array(
                'id'       => 'holland_layout_single',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Single Post Layout', 'holland' ),
                'options'  => array(
                    'left' => array( 
						'title' => esc_html__( 'Left Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/left_sidebar.png' ),
                    'full' => array( 
						'title' => esc_html__( 'Without Sidebar', 'holland' ), 
						'img' => get_template_directory_uri() . '/inc/theme-options/img/default_layout.png' ),
                    'right' => array( 
						'title' => esc_html__( 'Right Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/right_sidebar.png' )
                ),
                'default'  => 'right'
            ),
		array(
                'id'       => 'holland_layout_page',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Page Default Layout', 'holland' ),
                'options'  => array(
                    'left' => array( 
						'title' => esc_html__( 'Left Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/left_sidebar.png' ),
                    'full' => array( 
						'title' => esc_html__( 'Without Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/default_layout.png' ),
                    'right' => array( 
						'title' => esc_html__( 'Right Sidebar', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/right_sidebar.png' )
                ),
                'default'  => 'right'
            ),	
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Links', 'holland' ),
        'id'               => 'social',
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Set the URLs for your social media profiles here to be used in the header and footer. Keep the fields empty if you won\'t be using your social media profiles.', 'holland' ),
		'icon'             => 'el el-group',
        'fields'           => array(
		  array(
				'id'       => 'holland_social_email',
				'type'     => 'text',
				'title'    => esc_html__( 'Email', 'holland' ),
				'validate' => 'email',
				'msg'      => esc_html__( 'Enter your valid email address', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_fb',
				'type'     => 'text',
				'title'    => esc_html__( 'Facebook', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_tw',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_gp',
				'type'     => 'text',
				'title'    => esc_html__( 'Google +', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_ig',
				'type'     => 'text',
				'title'    => esc_html__( 'Instagram', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_pin',
				'type'     => 'text',
				'title'    => esc_html__( 'Pinterest', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_li',
				'type'     => 'text',
				'title'    => esc_html__( 'LinkedIn', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_tumblr',
				'type'     => 'text',
				'title'    => esc_html__( 'Tumblr', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_flickr',
				'type'     => 'text',
				'title'    => esc_html__( 'Flickr', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_reddit',
				'type'     => 'text',
				'title'    => esc_html__( 'Reddit', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_yt',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_vimeo',
				'type'     => 'text',
				'title'    => esc_html__( 'Vimeo', 'holland' ),
		  ),
		  array(
				'id'       => 'holland_social_rss',
				'type'     => 'text',
				'title'    => esc_html__( 'RSS Feed', 'holland' ),
		  ),	
        )
    ) );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'holland' ),
        'id'               => 'footer',
        'customizer_width' => '450px',
        'desc'             => esc_html__( 'Adjust your site\'s footer settings and widget areas to the specific number desired, and turn on or off the various parts as needed..', 'holland' ),
		'icon'             => 'el el-photo',
        'fields'           => array(
			array(
                'id'       => 'holland_footer_widgets',
                'type'     => 'radio',
                'title'    => esc_html__( 'Footer Widgets', 'holland' ),
                'options'  => array(
                    'none' => esc_html__( 'None (Disables Footer Widgets)', 'holland' ),
                    'one' => esc_html__( 'One', 'holland' ),
                    'two' => esc_html__( 'Two', 'holland' ),
					'three' => esc_html__( 'Three', 'holland' ),
                ),
                'default'  => 'three'
            ),	
			array(
                'id'       => 'holland_footer_copyright',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Footer Copyright Bar', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'      => 'holland_footer_copyright_text',
                'type'    => 'editor',
                'title'   => esc_html__( 'Copyright Content', 'holland' ),
                'default' => esc_html__( 'Copyright 2018 Holland | Theme by Airthemes.net.', 'holland' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    'teeny'         => false,
                    'tinymce' => array('a'),
                    'quicktags'     => false,
                )
            ),
        )
    ) );
	
	 // -> START Editors
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'holland' ),
        'id'               => 'blog',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Listings', 'holland' ),
        'id'         => 'blog_listings',
        'desc'       => esc_html__( 'Adjust the style and layout of your blog listings using the settings below. This will effect the posts index page, archive, category, tag, and search results pages of your blog.', 'holland'),
        'subsection' => true,
        'fields'     => array(
			array(
                'id'       => 'holland_blog_default_style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Default Style', 'holland' ),
                'options'  => array(
                    'grid' => array( 
						'title' => esc_html__( 'Grid Layout', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/grid-layout.png' ),
                    'standard' => array( 
						'title' => esc_html__( 'Standard Layout', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/standard-layout.png' ),
                    'list' => array( 
						'title' => esc_html__( 'List Layout', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/list-layout.png' )
                ),
                'default'  => 'grid'
            ),
			array(
                'id'       => 'holland_blog_archive_style',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Blog Archive Style', 'holland' ),
                'options'  => array(
                    'grid' => array( 
						'title' => esc_html__( 'Grid Layout', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/grid-layout.png' ),
                    'standard' => array( 
						'title' => esc_html__( 'Standard Layout', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/standard-layout.png' ),
                    'list' => array( 
						'title' => esc_html__( 'List Layout', 'holland' ), 
						'img' => get_template_directory_uri() . '/inc/theme-options/img/list-layout.png' )
                ),
                'default'  => 'grid'
            ),
			array(
                'id'       => 'holland_blog_pagination_type',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Pagination Type', 'holland' ),
                'options'  => array(
                    'num' => array( 
						'title' => esc_html__( 'Numeric Pagination', 'holland' ), 
						'img' => get_template_directory_uri() . '/inc/theme-options/img/pagination_numeric.png' ),
                    'btn' => array( 
						'title' => esc_html__( 'Next/Previous Button', 'holland' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/img/pagination_btn.png' )
                ),
                'default'  => 'num'
            ),
			array(
                'id'       => 'holland_blog_list_fearured',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Featured Image', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_title',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Title', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_excerpt',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Excerpt', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_category',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Category', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Date', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Author', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_blog_list_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Comment Counts ', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
    		'id'       => 'holland_blog_list_readmore',
    		'type'     => 'text',
			'title'    => esc_html__( 'Read More Text', 'holland' ),
			'default'  => esc_html__( 'Read More', 'holland' ),
		),
        ),
        ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'holland' ),
        'id'         => 'single-post',
        'subsection' => true,
        'desc'       => esc_html__( 'Adjust the style and layout of your blog listings using the settings below.', 'holland' ),
        'fields'     => array(
		  array(
                'id'       => 'holland_single_featured',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Featured Image', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_category',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Category', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_date',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Date', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_author',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Author', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_comment',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Comment Counts', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_tags',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Tags', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_bio',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Author Bio Info', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_related',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Related Posts', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
			array(
                'id'       => 'holland_single_nextpre',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show/Hide Next Previous Posts', 'holland' ),
				'on'       => esc_html__( 'Show', 'holland' ),
                'off'      => esc_html__( 'Hide', 'holland' ),
                'default'  => true,
            ),
        )
    ) );
	$holland_sec_esc_attr = array(
  	'a' => array(
  		'href' => array(),
        'title' => array(),
		'target' => array()
    ),
);
$holland_pro_link = sprintf(esc_html__( 'These Options are Available in Holland Premium Version. %1$s View Holland Premium Features %2$s', 'holland'), '<a href="https://airthemes.net/holland" target="_blank">', '</a>');
$holland_pro_link = wp_kses($holland_pro_link , $holland_sec_esc_attr );
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Styles', 'holland' ),
        'id'               => 'styles',
        'customizer_width' => '450px',
        'desc'       => $holland_pro_link,
		'icon'             => 'el el-tint',
        'fields'           => array(
		
        )
    ) );
	
	Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'holland' ),
        'id'               => 'typography',
        'customizer_width' => '450px',
        'desc'       => $holland_pro_link,
		'icon'             => 'el el-text-height',
        'fields'           => array()
    ) );


    // If Redux is running as a plugin, this will remove the demo notice and links
    add_action( 'redux/loaded', 'remove_demo' );
    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'holland' ),
                'desc'   => sprintf(esc_html__( '%1$s This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options. %2$s', 'holland' ), '<p class="description">', '</p>'),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
function holland_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'holland_removeDemoModeLink');