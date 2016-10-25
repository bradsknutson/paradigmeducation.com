<?php
/**
 * Template part for displaying Shop Online page content.
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
                        <?php if( get_field('form_id') ) {
                            $id = get_field('form_id');
                            if( function_exists( 'ninja_forms_display_form' ) ) { 
                                ninja_forms_display_form( $id ); 
                            }    
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-## -->