<?php
/**
 * Template part for displaying page content in About Page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */


// Blog Page ID
$blog_id = get_option( 'page_for_posts' );

?>
    
    <div class="about-page-under-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="three-col-h3">News</h3>
                    <?php
                        $args = array( 'posts_per_page' => 4 );

                        $myposts = get_posts( $args );
                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                        
                            <p><?php the_date('F j, Y'); ?><br />
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

                        <?php endforeach; 
                    wp_reset_postdata();?>
                    <p><a href="<?php echo get_permalink($blog_id); ?>">View more news</a></p>
                </div>
                <div class="col-md-4">
                    <h3 class="three-col-h3">Upcoming events</h3>
                    <?php the_field('events'); ?>
                </div>
                <div class="col-md-4">
                    <h3 class="three-col-h3">Frequently asked questions</h3>
                    <?php the_field('faqs'); ?>
                </div>
            </div>
        </div>
    </div>
