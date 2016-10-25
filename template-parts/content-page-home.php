<?php
/**
 * Template part for displaying page content in Home Page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="hero" style="background-image:url('<?php the_post_thumbnail_url() ?>');">
		<div class="container">
			<div class="col-md-8 col-md-offset-2">
				<?php the_content(); ?>
			</div>
			<div class="col-md-10 col-md-offset-1">
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
	</div><!-- .hero -->

	
	<?php if ( get_field( 'label' ) ) { ?>

		<div class="shift">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                        <h2 class="center"><?php the_field('label') ?></h2>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<?php the_field('column_1') ?>
                                <?php if ( get_field( 'column_1_link' ) ) { ?>
                                <a href="<?php echo get_field( 'column_1_link' ); ?>"></a>
                                <?php } ?>
							</div>
							<div class="col-md-4">
								<?php the_field('column_2') ?>
                                <?php if ( get_field( 'column_2_link' ) ) { ?>
                                <a href="<?php echo get_field( 'column_2_link' ); ?>"></a>
                                <?php } ?>
							</div>
							<div class="col-md-4">
								<?php the_field('column_3') ?>
                                <?php if ( get_field( 'column_3_link' ) ) { ?>
                                <a href="<?php echo get_field( 'column_3_link' ); ?>"></a>
                                <?php } ?>
							</div>

						</div>
					</div>
				</div>
			</div>
			
		</div>
	<?php } ?>

	

</article><!-- #post-## -->
