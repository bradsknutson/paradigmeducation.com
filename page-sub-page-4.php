<?php
/**
 * Template Name: Template 4: Alternating Content + 3 Information Columns
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
				get_template_part( 'template-parts/content', 'alternating-text-images' );
				get_template_part( 'template-parts/content', 'about-columns' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
