<?php
/**
* Initialize the custom Theme Options.
*/
add_action( 'init', 'tanx_theme_options' );
/**
* Build the custom settings & update OptionTree.
*
* @return    void
* @since     2.0
*/
/**
 * Activates Theme Mode
 */
function tanx_theme_options() {
    /* OptionTree is not loaded yet, or this is not an admin request */
    if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
        return false;
/**
* Get a copy of the saved settings array.
*/
$saved_settings = get_option( ot_settings_id(), array() );
/**
* Custom settings array that will eventually be
* passes to the OptionTree Settings API Class.
*/
$custom_settings = array();

/*contextual help je se nalazi na settings stranici iznad ( screenshot 02)
Inline images 1
i tu cemo da stavljamo tekst, objasnjenje za korisnika, mozes vise panela da skladistis */
//potom dodajemo sekciju, id sekcije koristimo da odredimo na kojoj sekciji ce se neka komponenta nalaziti, videces kasnije, mozes da imas vise sekcija ( pogledaj u okviru naseg framework-a ( general, video, demo options ... )

// Settings Sekcije
$custom_settings['sections'] =array(
    array(
        'id'          => 'general_options',
        'title'       => __( 'General options', 'tanx' )
        ),
    array(
        'id'          => 'header_options',
        'title'       => __( 'Header options', 'tanx' )
        ),
    array('id'          => 'sidebar_options',
        'title'       => __( 'Sidebar options', 'tanx' )
        ),
    array('id'          => 'footer_options',
        'title'       => __( 'Footer options', 'tanx' )
        )
    );
if(!isset($custom_settings['settings'])){
    $custom_settings['settings'] = array();
}

/* GENERAL OPTIONS */
$custom_settings['settings'][] = array(
    'id'          => 'title_color',
    'label'       => __( 'Main Titles Color', 'tanx' ),
    'desc'        => __( 'Color of the main titles.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options',
    'std'         => '#111'
    );
$custom_settings['settings'][] = array(
    'id'          => 'body_text_color',
    'label'       => __( 'Body Text Color', 'tanx' ),
    'desc'        => __( 'Color of the body text.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options',
    'std'         => '#999'
    );
$custom_settings['settings'][] = array(
    'id'          => 'light_text_color',
    'label'       => __( 'Light Text Color', 'tanx' ),
    'desc'        => __( 'Color of the light text.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options',
    'std'         => '#bbb'
    );
$custom_settings['settings'][] = array(
    'id'          => 'primary_font',
    'label'       => __( 'Primary Font ', 'tanx' ),
    'desc'        => __( 'Primary Font.', 'tanx' ),
    'type'        => 'text',
    'section'     => 'general_options',
    'std'         => 'Montserrat'
    );
$custom_settings['settings'][] = array(
    'id'          => 'secondary_font',
    'label'       => __( 'Secondary Font ', 'tanx' ),
    'desc'        => __( 'Secondary Font.', 'tanx' ),
    'type'        => 'text',
    'section'     => 'general_options',
    'std'         => 'Merriweather'
    );
$custom_settings['settings'][] = array(
    'id'          => 'site_accent_color',
    'label'       => __( 'Site Accent Color ', 'tanx' ),
    'desc'        => __( 'Main accent color.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options',
    'std'         => '#f44336'
    );
$custom_settings['settings'][] = array(
    'id'          => 'base_font_size',
    'label'       => __( 'Base Font Size', 'tanx' ),
    'desc'        => __( 'The base font size. All other font size will scale based upon this font size.', 'tanx' ),
    'type'        => 'numeric-slider',
    'min_max_step'=> '8,36,1',
    'std'         => 16,
    'section'     => 'general_options'
    );
$custom_settings['settings'][] = array(
    'id'          => 'paragraph_font_weight',
    'label'       => __( 'Paragraph Font Weight', 'tanx' ),
    'desc'        => __( 'The font weight of all <p> elements.', 'tanx' ),
    'type'        => 'numeric-slider',
    'min_max_step'=> '100,900,100',
    'std'         => 300,
    'section'     => 'general_options'
    );
$custom_settings['settings'][] = array(
    'id'          => 'overlay_primary_color',
    'label'       => __( 'Primary Overlay Color ', 'tanx' ),
    'desc'        => __( 'Top color of the site overlay gradient.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options'
    );
$custom_settings['settings'][] = array(
    'id'          => 'overlay_secondary_color',
    'label'       => __( 'Secondary Overlay Color ', 'tanx' ),
    'desc'        => __( 'Bottom color of the site overlay gradient.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'general_options'
    );

/* HEADER OPTIONS */
$custom_settings['settings'][] = array(
    'id'          => 'website_logo',
    'label'       => __( 'Website Logo ', 'tanx' ),
    'desc'        => __( 'This will be the logo that shows up at the top of the homepage.', 'tanx' ),
    'type'        => 'upload',
    'section'     => 'header_options'
    );
$custom_settings['settings'][] = array(
    'id'          => 'website_desc',
    'label'       => __( 'Website Description ', 'tanx' ),
    'desc'        => __( 'This is the description that shows up below the logo.', 'tanx' ),
    'type'        => 'textarea',
    'section'     => 'header_options',
    'std'         => 'Website Description Goes Here'
    );
$custom_settings['settings'][] = array(
    'id'          => 'nav_background',
    'label'       => __( 'Navigation Background', 'tanx' ),
    'desc'        => __( 'Background of the navigation bar.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'header_options'
    );
$custom_settings['settings'][] = array(
    'id'          => 'nav_fixed',
    'label'       => __( 'Navigation Fixed ', 'tanx' ),
    'desc'        => __( 'Should the navigation be fixed or not?', 'tanx' ),
    'type'        => 'on_off',
    'section'     => 'header_options'
    );


/* FOOTER OPTIONS */
$custom_settings['settings'][] = array(
    'id'          => 'footer_copyright_text',
    'label'       => __( 'Footer Copyright Text ', 'tanx' ),
    'desc'        => __( 'Copyright text that will appear in the footer.', 'tanx' ),
    'type'        => 'textarea',
    'section'     => 'footer_options',
    'rows'        => '2'
    );
$custom_settings['settings'][] = array(
    'id'          => 'footer_social',
    'label'       => __( 'Footer Social Links ', 'tanx' ),
    'desc'        => __( 'Social links in the footer.', 'tanx' ),
    'type'        => 'social_links',
    'section'     => 'footer_options'
    );

/* SIDEBAR OPTIONS */
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_position',
    'label'       => __( 'Position of the sidebar.', 'tanx' ),
    'desc'        => __( 'Choose whether the sidebar is on the left or the right side.', 'tanx' ),
    'type'        => 'select',
    'section'     => 'sidebar_options',
    'choices'     => array(
            array(
              'value'       => '',
              'label'       => '-- Choose One --'
            ),
            array(
              'value'       => 'leftPos',
              'label'       => 'Left'
            ),
            array(
              'value'       => 'rightPos',
              'label'       => 'Right'
            )
        ),
    'std'         => 'rightPos'
    );
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_background',
    'label'       => __( 'Sidebar Background', 'tanx' ),
    'desc'        => __( 'Background of the main sidebar. ', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'sidebar_options',
    'std'         => '#111111'
    );
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_text_color',
    'label'       => __( 'Sidebar Text Color', 'tanx' ),
    'desc'        => __( 'Color of the text in the sidebar.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'sidebar_options',
    'std'         => '#fff'
    );
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_link_color',
    'label'       => __( 'Sidebar Link Color', 'tanx' ),
    'desc'        => __( 'Color of the links in the sidebar.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'sidebar_options',
    'std'         => 'rgba(255,255,255,0.3)'
    );
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_link_hover_color',
    'label'       => __( 'Sidebar Link Hover Color', 'tanx' ),
    'desc'        => __( 'Color of the links in the sidebar when they are hovered.', 'tanx' ),
    'type'        => 'colorpicker_opacity',
    'section'     => 'sidebar_options',
    'std'         => '#fff'
    );
$custom_settings['settings'][] = array(
    'id'          => 'sidebar_social',
    'label'       => __( 'Sidebar Social Links ', 'tanx' ),
    'desc'        => __( 'Social links in the sidebar.', 'tanx' ),
    'type'        => 'social_links',
    'section'     => 'sidebar_options'
    );
/* allow settings to be filtered before saving */
$custom_settings = apply_filters( ot_settings_id() . '_args', $custom_settings );

/* settings are not the same update the DB */
if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
}

/* Lets OptionTree know the UI Builder is being overridden */
global $ot_has_custom_theme_options;
$ot_has_custom_theme_options = true;
}

/**
* Load Theme Options
*/









add_action( 'admin_init', '_custom_meta_boxes' );

/**
* Builds the Meta Boxes.
*/
function _custom_meta_boxes() {

    $meta_args_array = array(
/*array(
'id'          => 'page_settings',
'title'       => 'Page Settings',
'pages'       => array( 'page' ),
'context'     => 'normal',
'priority'    => 'high',
'fields'      => array(
array(
'label'       => 'Portfolio Type',
'id'          => 'portfolio_type',
'type'        => 'radio',
'desc'        => 'What type of portfolio item is this?',
'choices'     => array(
array(
'label'       => 'Standard',
'value'       => 'standard'
),
array(
'label'       => 'Image',
'value'       => 'image'
),
array(
'label'       => 'Gallery',
'value'       => 'gallery'
),
array(
'label'       => 'Video',
'value'       => 'video'
)
),
'std'         => 'standard'
)
)
    ),*/
    array(
        'id'          => 'video_settings',
        'title'       => 'Video Settings',
        'pages' => array('post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Video Source',
                'id'          => 'video-source',
                'type'        => 'text',
                'desc'        => 'Source of your video.',
                'std'         => '',
                'rows'        => '5'
                ),
            array(
                'label'       => 'Aspect Ratio',
                'id'          => 'aspect-ratio',
                'type'        => 'text',
                'desc'        => 'Aspect ratio for your video. Default 16:9.',
                'std'         => '',
                'rows'        => '5'
                )
            )
        ),
    array(
        'id'          => 'page_settings',
        'title'       => 'Page Settings',
        'pages' => array('page'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Page Subtitle',
                'id'          => 'page_subtitle',
                'type'        => 'text',
                'desc'        => 'The subtitle of this page.',
                'std'         => '',
                'rows'        => '5'
                )
            )
        ),
    array(
        'id'          => 'quote_settings',
        'title'       => 'Quote Post Settings',
        'pages' => array('post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Quote Author',
                'id'          => 'quote_author',
                'type'        => 'text',
                'desc'        => 'Author of the quote.',
                'std'         => '',
                'rows'        => '1'
                )
            )
        ),
    array(
        'id'          => 'post_settings',
        'title'       => 'Post Settings',
        'pages' => array('post'),
        'context'     => 'normal',
        'priority'    => 'high',
        'fields'      => array(
            array(
                'label'       => 'Post Subtitle',
                'id'          => 'post_subtitle',
                'type'        => 'text',
                'desc'        => 'The subtitle of this post.',
                'std'         => '',
                'rows'        => '5'
                )
            )
        )
    );

/* load each metabox */
foreach( $meta_args_array as $meta_args ) {
    ot_register_meta_box( $meta_args );
}
}

?>
