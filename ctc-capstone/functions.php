<?php
/**
 * 
 * @package CTC Capstone Theme
 * @since 1.0.0
 * 
 */

 //STYLES & SCRIPTS FUNCTION
function ctc_enqueue_styles() {
	//required stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    
     //enqueue scripts:
    //wp_enqueue_script('file-name', get_template_directory_uri(), '/path/to/file.js', array('jquery'),1.1, true); 
	
}
add_action('wp_enqueue_scripts', 'ctc_enqueue_styles');

/** ADD ESSENTIAL THEME SUPPORT */
function theme_setup(){
    
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
 
    /** title tag **/
    add_theme_support( 'title-tag' );
 
    /** post formats */
    $post_formats = array('aside','image','Heritage','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
 
    /** HTML5 support */
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'Heritage', 'caption' ) );
 
    /** refresh widgets **/
    // More here: https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
    add_theme_support( 'customize-selective-refresh-widgets' );
 
    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );
 
    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );
 
    /** custom logo **/
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
}

add_action('after_setup_theme','theme_setup');


/** REGISTER MENUS */
//this menu function will allow for multiple menus :)
function register_menus() { 
    register_nav_menus(
        array(
            'main-menu' => 'Main Menu',
            'footer-1' => 'Footer 3',
            'footer-2' => 'Footer 2',
        )
    ); 
}
add_action( 'init', 'register_menus' );


// with this area you can register a number of files/objects
$dc_includes = array(
	'/widgets.php',                         // Register widget area.
);

foreach ( $dc_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

//Register Custom Post type
function create_post_type_Heritages(){
    // creates label names for the post type in the dashboard the post panel and in the toolbar.
        $labels = array(
            'name'                  => __('Heritages'),
            'singular_name'         => __('Heritage'), 
            'add_new'               => 'New Heritage', 
            'add_new_item'          => 'Add New Heritage',
            'edit_item'             => 'Edit Heritage',
            'featured_image'        => _x( 'Heritage Post Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),

        );
        // creates the post functionality that you want for a full listing
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'Heritages'),
            'menu_position'     => 20,
            'menu_icon'         => 'dashicons-edit',
            'capability_type'   => 'page',
            'taxonomies'        => array('category', 'post_tag'),
            'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
        );

        register_post_type('Heritages', $args);
    }
    // Hooking up our function to theme setup
    add_action('init', 'create_post_type_Heritages');

function create_post_type_Historys(){
        // creates label names for the post type in the dashboard the post panel and in the toolbar.
            $labels = array(
                'name'                  => __('Historys'),
                'singular_name'         => __('History'), 
                'add_new'               => 'New History', 
                'add_new_item'          => 'Add New History',
                'edit_item'             => 'Edit History',
                'featured_image'        => _x( 'History Post Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    
            );
            // creates the post functionality that you want for a full listing
            $args = array(
                'labels'            => $labels,
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array('slug' => 'Historys'),
                'menu_position'     => 20,
                'menu_icon'         => 'dashicons-edit',
                'capability_type'   => 'page',
                'taxonomies'        => array('category', 'post_tag'),
                'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
            );
    
            register_post_type('Historys', $args);
        }
        // Hooking up our function to theme setup
        add_action('init', 'create_post_type_Historys');
    
function create_post_type_SliceOfLifes(){
        // creates label names for the post type in the dashboard the post panel and in the toolbar.
            $labels = array(
                'name'                  => __('Slice Of Lifes'),
                'singular_name'         => __('Slice Of Life'), 
                'add_new'               => 'New Slice Of Life', 
                'add_new_item'          => 'Add New Slice Of Life',
                'edit_item'             => 'Edit Slice Of Life',
                'featured_image'        => _x( 'Slice Of Life Post Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
    
            );
            // creates the post functionality that you want for a full listing
            $args = array(
                'labels'            => $labels,
                'public'            => true,
                'has_archive'       => true,
                'rewrite'           => array('slug' => 'SliceOfLifes'),
                'menu_position'     => 20,
                'menu_icon'         => 'dashicons-edit',
                'capability_type'   => 'page',
                'taxonomies'        => array('category', 'post_tag'),
                'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
            );
    
            register_post_type('SliceOfLifes', $args);
        }
        // Hooking up our function to theme setup
        add_action('init', 'create_post_type_SliceOfLifes');

function create_post_type_Newss(){
            // creates label names for the post type in the dashboard the post panel and in the toolbar.
                $labels = array(
                    'name'                  => __('Newss'),
                    'singular_name'         => __('News'), 
                    'add_new'               => 'New News', 
                    'add_new_item'          => 'Add New News',
                    'edit_item'             => 'Edit News',
                    'featured_image'        => _x( 'News Post Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
                    'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        
                );
                // creates the post functionality that you want for a full listing
                $args = array(
                    'labels'            => $labels,
                    'public'            => true,
                    'has_archive'       => true,
                    'rewrite'           => array('slug' => 'Newss'),
                    'menu_position'     => 20,
                    'menu_icon'         => 'dashicons-edit',
                    'capability_type'   => 'page',
                    'taxonomies'        => array('category', 'post_tag'),
                    'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
                );
        
                register_post_type('Newss', $args);
            }
            // Hooking up our function to theme setup
            add_action('init', 'create_post_type_Newss');

function create_post_type_Highlights(){
    // creates label names for the post type in the dashboard the post panel and in the toolbar.
        $labels = array(
            'name'                  => __('Highlights'),
            'singular_name'         => __('Highlight'), 
            'add_new'               => 'New Highlight', 
            'add_new_item'          => 'Add New Highlight',
            'edit_item'             => 'Edit Highlight',
            'featured_image'        => _x( 'Highlight Post Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),

        );
        // creates the post functionality that you want for a full listing
        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'Highlights'),
            'menu_position'     => 20,
            'menu_icon'         => 'dashicons-edit',
            'capability_type'   => 'page',
            'taxonomies'        => array('category', 'post_tag'),
            'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
        );

        register_post_type('Highlights', $args);
    }
    // Hooking up our function to theme setup
            add_action('init', 'create_post_type_Highlights');
//Page Pagination
function page_pagination() {
    global $wp_query;
    
    $total_pages = $wp_query->max_num_pages; 

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text' => 'Prev',
            'next_text' => 'Next'
        ));
    }
}

//post pagination
function post_pagination() {
    global $wp_query; 
    ?>
        <nav class="pagination" role="navigation">
            <div class="prev-post-nav"> <?php previous_post_link( '%link', '&larr; Back'); ?></div>
			
            <div class="next-post-nav"> <?php next_post_link( '%link', '&larr; Newer posts'); ?></div>
        </nav>
    <?php
}