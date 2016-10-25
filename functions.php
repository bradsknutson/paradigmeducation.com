<?php
/**
 * jist functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paradigm
 */

if ( ! function_exists( 'jist_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jist_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jist, use a find and replace
	 * to change 'jist' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jist', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'jist' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jist_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'jist_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jist_content_width', 640 );
}
add_action( 'after_setup_theme', 'jist_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jist' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Contact Menu', 'jist' ),
		'id'            => 'contact-menu',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'jist_widgets_init' );




// Creating the widget 
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            
            // Base ID of your widget
            'jist_popular_posts_widget', 

            // Widget name will appear in UI
            __('Popular Posts', 'jist_popular_posts_widget_domain'), 

            // Widget description
            array( 'description' => __( 'Display the most recent 3 posts with meta data.', 'jist_popular_posts_widget_domain' ), ) 
        );
    }

    // Creating widget front-end
    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );
        $num_posts = $instance['num_posts'];

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        
        $post_args = array(
            'numberposts' => $num_posts,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
        );
        
        $recent_posts = wp_get_recent_posts( $post_args, ARRAY_A );
        
        function postTruncate($string, $your_desired_width) {
            
            $string = strip_tags( $string );
            
            $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
            $parts_count = count($parts);

            $length = 0;
            $last_part = 0;
            for (; $last_part < $parts_count; ++$last_part) {
                $length += strlen($parts[$last_part]);
                if ($length > $your_desired_width) { break; }
            }

            $return = implode(array_slice($parts, 0, $last_part));
            
            return trim($return);
        }        

        // Display front end widget
        echo '<div class="popular-posts">';
        foreach( $recent_posts as $recent ){
            
            $category = get_the_category( $recent['ID'] );
            $post_date = explode( ' ', $recent['post_date'] );
            $date_parts = explode( '-', $post_date[0] );
            $formatted_date = ltrim( $date_parts[1], '0' ) .'.'. ltrim( $date_parts[2], '0' ) .'.'. $date_parts[0];
            
            echo '<div class="popular-post-sidebar">
                    <p class="popular-post-meta">'. $category[0]->name .' '. $formatted_date .'</p>
                    <h4><a href="'. get_permalink( $recent['ID'] ) .'">'. $recent['post_title'] .'</a></h4>
                    <p>'. postTruncate( $recent['post_content'], 100 ) .'...</p>
                </div>';
        }
        echo '</div>';
        
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form( $instance ) {

        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Popular Posts', 'jist_popular_posts_widget_domain' );
        }
        if ( isset( $instance[ 'num_posts' ] ) ) {
            $num_posts = $instance[ 'num_posts' ];
        }
        else {
            $num_posts = __( '3', 'jist_popular_posts_widget_domain' );
        }

        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'num_posts' ); ?>"><?php _e( 'Number of Posts to display:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" type="text" value="<?php echo esc_attr( $num_posts ); ?>" />
        </p>
        <?php 
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['num_posts'] = ( ! empty( $new_instance['num_posts'] ) ) ? strip_tags( $new_instance['num_posts'] ) : '';

        return $instance;
    }
    
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

/**
 * Enqueue scripts and styles.
 */
function jist_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'jist-style', get_stylesheet_uri() );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.min.css' );


	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );
	wp_enqueue_script( 'jist-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'jist-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jist_scripts' );


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Remove Pages from Search
 
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','SearchFilter');*/

function user_content_replace($content) {
    return str_replace('<p>&nbsp;</p>','<p class="p-nbsp">&nbsp;</p>',$content);
}
add_filter('the_content','user_content_replace', 99);

// Custom Posts Navigation Text
add_filter( 'tc_list_nav_next_text' , 'my_list_nav_buttons_text');
add_filter( 'tc_list_nav_previous_text' , 'my_list_nav_buttons_text');
 
function my_list_nav_buttons_text() {
    switch ( current_filter() ) {
        case 'tc_list_nav_next_text':
            $text = '<span class="meta-nav">&larr;</span> More content';
            break;
        
        case 'tc_list_nav_previous_text':
            $text = 'More content <span class="meta-nav">&rarr;</span>';
            break;
    }
    return $text;
}

/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );






/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

function pinterest_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if(empty($first_img)) {
        $first_img = "/wp-content/themes/jist/img/logo-jist.png";
    }
    return $first_img;
}

/** Hide Author Names **/
add_action(‘template_redirect’, ‘bwp_template_redirect’);
function bwp_template_redirect() {
    if (is_author()) {
        wp_redirect( home_url() ); 
        exit;
    }
}

remove_action('wp_head', 'wp_generator');