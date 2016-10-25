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
			<div class="col-md-12">
				<?php if ( get_field( 'nav_icons' ) ) { ?>
					<div class="nav-boxes">
						<?php if( have_rows('nav_icons') ): ?>

	              			<?php while( have_rows('nav_icons') ): the_row();
	                  		
	                  		$icon = get_sub_field('icon');
	                  		$content = get_sub_field('content');
	                  		$link = get_sub_field('link');
	                  		$bgc = get_sub_field('color');

							?>
								<div class="col-md-4">
									<div class="wrap" style="background-image:url('<?php echo $icon; ?>');background-color:<?php echo $bgc; ?>">
										<?php echo $content; ?>
										<a href="<?php echo $link; ?>"></a>
									</div>
								</div>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					
				<?php } ?>
			</div>
		</div>
	</div>

	

</article><!-- #post-## -->
