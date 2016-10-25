<?php
/**
 * This layout design was lifted fro the JIST.com theme.  Template part for displaying page content on main marketing landing pages 
 * (student landing * pages (student engagement, instructor support, etc) in the middle section.  This concists of a main content
 * block on the left, and 3 content blocks on the right divided into two rows - the top row having one block and the second row 
 * having 2 blocks, equal sized.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>

	<?php if ( get_field( 'main_tile' ) ) { ?>

		<div class="why">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<?php the_field('main_tile') ?>
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap top">
									<img src="<?php the_field('right_column_top_image') ?>" />
									<div class="content"><?php the_field('right_column_top_content') ?></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="wrap left">
									<img src="<?php the_field('right_column-2nd_row-1st-image') ?>" />
									<div class="content"><?php the_field('right_column-2nd_row-1st-content') ?></div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="wrap right">
									<img src="<?php the_field('right_column-2nd_row-2nd-image') ?>" />
									<div class="content"><?php the_field('right_column-2nd_row-2nd-content') ?></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			
		</div>
	<?php } ?>