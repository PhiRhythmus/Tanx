<?php
/**
 * Optional: set 'ot_show_pages' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_pages', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
include_once( 'option-tree/ot-loader.php' );
/**
 * Theme Options
 */
include_once( 'includes/theme-options.php' );

require_once get_template_directory() . "/includes/class-tgm-plugin-activation.php";

add_action( 'tgmpa_register', 'tanx_register_required_plugins' );
function tanx_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Simple Share Buttons Adder',
            'slug'      => 'ssba',
            'required'  => true,
            'source'             => 'https://downloads.wordpress.org/plugin/simple-share-buttons-adder.zip',
            'external_url'       => 'https://sr.wordpress.org/plugins/simple-share-buttons-adder/', // page of my plugin
        ),
        array(
            'name'      => 'WP Google Maps',
            'slug'      => 'wpgm',
            'required'  => true,
            'source'             => 'https://downloads.wordpress.org/plugin/wp-google-maps.zip',
            'external_url'       => 'https://sr.wordpress.org/plugins/wp-google-maps/ ', // page of my plugin
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'wpcf7',
            'required'  => true,
            'source'             => 'https://downloads.wordpress.org/plugin/contact-form-7.4.4.zip',
            'external_url'       => 'https://sr.wordpress.org/plugins/contact-form-7/', // page of my plugin
        )
        
        // <snip />
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        /*
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
            'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
            // <snip>...</snip>
            'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
        */
    );
    tgmpa( $plugins, $config );
}

if ( ! isset( $content_width ) ) $content_width = 900;

//Enqueue Styles and Scripts
function tanx_enqueue_my_scripts() {
    //Styles
    wp_enqueue_style("bootstrap", get_template_directory_uri() . "/css/bootstrap.css");
    wp_enqueue_style("simple-line-icons", get_template_directory_uri() . "/css/simple-line-icons.css");
    wp_enqueue_style("et-icons", get_template_directory_uri() . "/css/et-icons.css");
    wp_enqueue_style("animate", get_template_directory_uri() . "/css/animate.css");
    wp_enqueue_style("font-awesome", 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    wp_enqueue_style("lightbox", get_template_directory_uri() . "/css/lightbox.css");
    wp_enqueue_style("socicons", "http://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css");
    wp_enqueue_style("social-fix", get_template_directory_uri() . "/css/social_fix.css");
    wp_enqueue_style("owl", get_template_directory_uri() . "/css/owl.css");
    wp_enqueue_style("main", get_template_directory_uri() . "/style.css");
    
    // Scripts
    wp_enqueue_script("owl", get_template_directory_uri() . "/js/owl.carousel.js", array('jquery'));
    wp_enqueue_script("social", get_template_directory_uri() . "/js/social.js");
    wp_enqueue_script("imagesloaded", get_template_directory_uri() . "/js/imagesloaded.min.js");
    wp_enqueue_script("bootstrap", get_template_directory_uri() . "/js/bootstrap.min.js");
    wp_enqueue_script("isotope", get_template_directory_uri() . "/js/isotope.min.js");
    wp_enqueue_script("lightbox", get_template_directory_uri() . "/js/lightbox.js");
    wp_enqueue_script("wow", get_template_directory_uri() . "/js/wow.min.js");
    wp_enqueue_script("main", get_template_directory_uri() . "/js/main.js");
}
add_action( 'wp_head', 'tanx_enqueue_my_scripts');

function tanx_init_support() {
    add_theme_support( 'post-thumbnails' ); 

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-formats', array('gallery','image','video','quote') ); 
}
add_action( "init", "tanx_init_support" );

add_action( 'init', 'tanx_create_post_type' );
//Registers the Product's post type
function tanx_create_post_type() {

    register_post_type( 'portfolio',
        array(
            'labels' => array(
                'name' => __( 'Portfolio Items', 'tanx' ),
                'singular_name' => __( 'Portfolio Item', 'tanx' ),
                'add_new_item' => __('Add New Portfolio Item', 'tanx')
            ),
            'supports' => array(
                'title', 'editor', 'thumbnail'
            ),
        'taxonomies' =>     array('portfolio_category'),
        'public' =>         true,
        'has_archive' =>    true,
        'menu_position' =>  5,
        'slug' =>           'portfolio',
        'menu_icon' =>      'dashicons-images-alt2',
        'hierarchical' =>   false
        )
    );
}

function tanx_admin_scripts() {
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css' );
}
add_action( 'admin_init', 'tanx_admin_scripts' );

function tanx_register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu', 'tanx' )
    )
  );
}
add_action( 'init', 'tanx_register_my_menus' );

function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}

if(is_admin()) {
    wp_enqueue_script('meta', get_template_directory_uri() . '/js/meta.js');
}

function tanx_register_portfolio_taxonomy() {
    $singular = 'Portfolio Category';
    $plural = 'Portfolio Categories';
    $slug = str_replace( ' ', '_', strtolower( $singular ) );
    $labels = array(
        'name'                       => $plural,
        'singular_name'              => $singular,
        'search_items'               => 'Search ' . $plural,
        'popular_items'              => 'Popular ' . $plural,
        'all_items'                  => 'All ' . $plural,
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit ' . $singular,
        'update_item'                => 'Update ' . $singular,
        'add_new_item'               => 'Add New ' . $singular,
        'new_item_name'              => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'        => 'Add or remove ' . $plural,
        'choose_from_most_used'      => 'Choose from the most used ' . $plural,
        'not_found'                  => 'No ' . $plural . ' found.',
        'menu_name'                  => $plural,
    );
    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => $slug ),
    );

    register_taxonomy('portfolio_category', 'portfolio', $args);

    $singular = 'Portfolio Tag';
    $plural = 'Portfolio Tags';
    $slug = str_replace( ' ', '_', strtolower( $singular ) );
    $labels = array(
        'name'                       => $plural,
        'singular_name'              => $singular,
        'search_items'               => 'Search ' . $plural,
        'popular_items'              => 'Popular ' . $plural,
        'all_items'                  => 'All ' . $plural,
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit ' . $singular,
        'update_item'                => 'Update ' . $singular,
        'add_new_item'               => 'Add New ' . $singular,
        'new_item_name'              => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'        => 'Add or remove ' . $plural,
        'choose_from_most_used'      => 'Choose from the most used ' . $plural,
        'not_found'                  => 'No ' . $plural . ' found.',
        'menu_name'                  => $plural,
    );
    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => $slug ),
    );

    register_taxonomy('portfolio_tag', 'portfolio', $args);
}
add_action('init', 'tanx_register_portfolio_taxonomy');





    

    function SearchFilter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }

    add_filter('pre_get_posts','SearchFilter');

    function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tanx' ); ?></em>
        <br />
    <?php endif; ?>

    <div class="comment-content">
        <?php
            /* translators: 1: date, 2: time */
            comment_text(); ?>
            <div class="comment-meta commentmetadata"> <?php
                printf( __('%1$s on: <span class="date">%2$s at %3$s</span>', 'tanx'), get_comment_author_link(), get_comment_date(),  get_comment_time() ); ?></a>
                    <span class="edit-reply">
                        <?php edit_comment_link( __( 'Edit', 'tanx' ), '  ', '' );
                        echo " ";
                        $args["reply_text"] = __('Reply', 'tanx');
                        comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </span> <?php
            ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php
}

function truncateString($string, $num) {
    if (strlen($string) > $num) {
        $string = substr($string, 0, $num) . "...";
    }
    return $string;
}

/**
 *
 * Intercept Simple Share Buttons Adder output.
 *
 */
function tanx_remove_ssba_from_content($content) {
  global $post;
  if ($post != '') {
    $post->post_content .= '[ssba_hide]';
  }
  return $content;
}
if (shortcode_exists('ssba')) {
  add_filter( 'the_content', 'tanx_remove_ssba_from_content', 9);
  add_filter( 'the_excerpt', 'tanx_remove_ssba_from_content', 9);
}

add_action( 'widgets_init', 'tanx_widgets_init' );
function tanx_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'tanx' ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'tanx' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h6 class="widgettitle">',
    'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
        'name' => __( '404 Footer', 'tanx' ),
        'id' => 'sidebar-2',
        'description' => __( 'Widgets in this area will be shown on the 404 page.', 'tanx' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s col-sm-4">',
        'after_widget'  => '</li>',
        'before_title'  => '<h6 class="widgettitle">',
        'after_title'   => '</h6>',
        'class'         => 'row'
    ) );
}

function load_posts_ajax() {
    global $post;
    $myposts = get_posts('numberposts=5&offset=' . $_REQUEST['offset'] . '&category=');
    if(empty($myposts)) {
        echo 'noposts';
        die;
    }
    foreach($myposts as $post) :
        setup_postdata($post);
        $mybool = true;
    ?>
    <div <?php
    $classes = array('post', 'animated', 'fadeInUp');
     post_class($classes); ?>>
        <?php get_template_part('content', get_post_format());  ?>
    </div> <?php endforeach;



    die;
}
add_action('wp_ajax_load_posts', 'load_posts_ajax');
add_action('wp_ajax_nopriv_load_posts', 'load_posts_ajax');

add_filter( 'comment_form_default_fields', 'tanx_comment_placeholders' );
function tanx_comment_placeholders( $fields )
{
    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="' . __("John Doe", "tanx") . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input',
        '<input placeholder="' . __("me@mail.com", "tanx") . '"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input',
        '<input placeholder="' . __("www.me.com", "tanx") . '"',
        $fields['url']
    );
    return $fields;
}
 
/* Add Placehoder in comment Form Field (Comment) */
add_filter( 'comment_form_defaults', 'tanx_textarea_placeholder' );
 
function tanx_textarea_placeholder( $fields )
{
        $fields['comment_field'] = str_replace(
            '<textarea',
            '<textarea placeholder="' . __("Your thoughts...", "tanx") . '"',
            $fields['comment_field']
        );
    return $fields;
}

require_once('shortcodes.php');
require_once('customizer.php');

function wpdocs_filter_wp_title( $title, $sep ) {
    global $paged, $page;
 
    if ( is_feed() )
        return $title;
 
    // Add the site name.
 
    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    $blogtitle = get_bloginfo( 'name' );
    $title = $blogtitle . " " . $sep . " " . $site_description;
 
    return $title;
}
add_filter( 'wp_title', 'wpdocs_filter_wp_title', 10, 2 );

// EXPERIMENTAL
function register_pbs() {
	if(function_exists('register_pb_widget')){
	register_pb_widget("Header");
    register_pb_widget("Button");
	}

}
add_action('init', 'register_pbs');

?>