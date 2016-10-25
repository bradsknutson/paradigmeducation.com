<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hero hero-style-a" style="background-image:url('<?php the_post_thumbnail_url() ?>');">
		<div class="container">
			<div class="row">
                <div class="col-md-10 col-md-offset-1">
				    <?php echo '<h1>'. get_the_title() .'</h1>'; ?>
                </div>
			</div>
		</div>
	</div><!-- .hero -->
    <div class="secondary-page-content">
		<div class="container">
			<div class="row">
                <div class="page-content">
                    <div class="body-full-width-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-## -->