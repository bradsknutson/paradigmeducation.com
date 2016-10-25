<?php
/**
 * Template part for displaying page content in content and colored boxes on top of a hero image.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hero" style="background-image:url('<?php the_post_thumbnail_url() ?>');">
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	

</article><!-- #post-## -->
