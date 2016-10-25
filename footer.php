<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradigm
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-4">
					<?php wp_nav_menu( array( 'menu' => '6' ) ); ?>
				</div>
				<div class="col-md-3 col-sm-4">
				<?php wp_nav_menu( array( 'menu' => '7' ) ); ?>
				</div>
				<div class="col-md-3 col-sm-4">
					<?php wp_nav_menu( array( 'menu' => '8' ) ); ?>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="connect">
						<h4>Connect with us</h4>
						<div class="social">
                            <?php 
                                if( have_rows('socia_channel', 132) ):
                                    while ( have_rows('socia_channel', 132) ) : the_row();
    
                                        $icon = get_sub_field('social_channel_icon');
                                        $link = get_sub_field('social_channel_link');
                                        $name = get_sub_field('social_channel_name');
                                    
                                        echo '<a href="'. $link .'" target="_blank" class="icon"><i class="fa '. $icon .'" aria-hidden="true"></i></a>';
                            
                                    endwhile;
                                endif;
                            ?>
						</div>
					</div>
				</div>
                <?php if( get_field('copyright_text', 132) ): ?>
                <div class="col-md-12 col-sm-12 copyright"><?php the_field('copyright_text', 132); ?></div>
                <?php endif; ?>
			</div>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
