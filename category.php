<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

$blog_id = get_option( 'page_for_posts' );
global $post;
$post_slug = $post->post_name;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="hero hero-style-a hero-major-padding" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($blog_id) ); ?>');">
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1">
                            <h1><?php echo get_the_title($blog_id); ?></h1>
                            <div class="blog-categories">
                                <?php

                                    $categories = get_categories();
                                    echo '<div class="col-md-4"><a class="category-button" href="'. get_permalink($blog_id) .'">View All</a></div>';
                                
                                    if ( ! empty( $categories ) ) {
                                        foreach ( $categories as $category ) {
                                            
                                            $current = '';
                                            if( is_category( $category->slug ) ) {
                                                $current = ' current-category';
                                                
                                            }
                                            
                                            echo '<div class="col-md-4"><a class="category-button'. $current .'" href="'. get_category_link( $category->term_id ) .'">'. $category->name .'</a></div>';
                                        }
                                    }


                                ?>
                            </div>
                        </div>
                    </div>
                </div><!-- .hero -->   
                <div class="blog-posts">
                    <div class="container">
                        <div class="row blog-posts-container">
                            <?php
                            while ( have_posts() ) : the_post();

                                get_template_part( 'template-parts/content', 'page-blog' );

                            endwhile; // End of the loop.
                            ?>
                        </div>
                    </div>
                </div>
            </article>
            <div class="blog-navigation">
                <div class="container">
                    <?php the_posts_pagination( array( 'mid_size' => -1 ) ); ?>
                </div>
            </div>
            <?php

            get_template_part( 'template-parts/content', 'signup' );

            ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();