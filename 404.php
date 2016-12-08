<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package jist
 */

$blog_id = get_option( 'page_for_posts' );
global $post;
$post_slug = $post->post_name;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <article <?php post_class(); ?>>
                <div class="hero hero-style-a hero-major-padding" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($blog_id) ); ?>');">
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1">
                            <h1>Page not found</h1>
                        </div>
                    </div>
                </div><!-- .hero --> 
                <div class="blog-posts">
                    <div class="container">
                        <div class="row blog-posts-container search-empty">
                            <h3>Sorry, we can't find that page.</h3>
                            <p>Please try searching our site, or <a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>">check out what's new on our blog</a>.</p>

                            <form action="/" method="get">
                                <label class="screen-reader-text" for="search">Search in <?php echo home_url( '/' ); ?></label>
                                <input type="text" class="search-field" name="s" placeholder="Search" id="search" value="<?php the_search_query(); ?>" autocomplete="off" />
                            </form>
                        </div>
                    
                    </div>
                </div>
            </article>
            <?php get_template_part( 'template-parts/content', 'signup' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();