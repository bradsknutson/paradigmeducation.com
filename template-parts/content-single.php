<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

// Blog Page ID
$blog_id = get_option( 'page_for_posts' );

if( has_post_thumbnail( $post->ID ) ) {
    $pinImg = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
} else {
    $pinImg = pinterest_image();
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hero hero-style-a" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($blog_id) ); ?>');">
		<div class="container">
			<div class="row">
                <div class="col-md-10 col-md-offset-1">
				    <?php echo '<h1>'. get_the_title($blog_id) .'</h1>'; ?>
                    <a href="<?php echo get_permalink($blog_id); ?>"></a>
                </div>
			</div>
		</div>
	</div><!-- .hero -->
    <div class="secondary-page-content">
		<div class="container">
			<div class="row">
                <div class="page-content">
                    <div class="body-two-column">
                        <div class="col-md-8">
                            
                            <?php 
                            
                            if ( has_post_thumbnail() ) {
                                echo '<img src="';
                                the_post_thumbnail_url();
                                echo '" class="post-featured-img" alt="'. get_the_title() .'" />';
                            }
                            
                            $categories = get_the_category();
                            if ( ! empty( $categories ) ) {
                                echo '<p class="entry-meta">'. esc_html( $categories[0]->name ) .' | ';
                                the_time('n.j.Y'); 
                                echo '</p>';
                            }
                            echo '<h2 class="entry-title">'. get_the_title() .'</h2>';
                                
                            the_content();
                            
                            ?>
                            <div class="social-icons">
                                <i class="fa fa-facebook" aria-hidden="true">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>&t=<?php echo get_the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"></a>
                                </i>
                                <i class="fa fa-twitter" aria-hidden="true">
                                    <a href="https://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>&via=ParadigmPublish&text=<?php echo get_the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"></a>
                                </i>
                                <i class="fa fa-envelope" aria-hidden="true">
                                    <a href="mailto:?subject=I want you to check out this post on JIST.com&body=Check this out, it's worth a read. <?php echo esc_url( get_permalink() ); ?>" title="Share via email"></a>
                                </i>
                                <i class="fa fa-pinterest" aria-hidden="true">
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url( get_permalink() ); ?>&media=<?php echo esc_url( $pinImg ); ?>&description=<?php echo get_the_title(); ?>"></a>
                                </i>
                            </div>
                            <?php

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-## -->