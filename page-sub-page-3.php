<?php
/**
 * Template Name: Template 3: Tiled Content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'hero-content' );
				get_template_part( 'template-parts/content', 'jist-home' );
				get_template_part( 'template-parts/content', 'new-releases' );
				get_template_part( 'template-parts/content', 'signup' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
