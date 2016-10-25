<?php
if ( get_field( 'item' ) ) {
	?>
	<div class="new-releases">
		<h2><?php echo the_field('label'); ?></h2>
		<div class="new-carousel">
        	<?php if( have_rows('item') ): ?>

				<?php while( have_rows('item') ): the_row(); 

					// vars
					$link = get_sub_field('link');
					$image = get_sub_field('image');

					?>
		        	
		        	<div>
			            <a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>"></a>
					</div>
					
				<?php endwhile; ?>
            <?php endif; ?>
		</div>
	</div>
<?php }	else {
    get_template_part( 'template-parts/content', 'new-releases' );
} ?>


