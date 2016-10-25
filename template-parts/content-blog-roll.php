<div id="blog-roll" class="blog-roll">
	<div class="blog-carousel">
	    <?php
		$args = array( 'posts_per_page' => 9 );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	        	<div>
		        	<?php 
			        	$categories = get_the_category();
							if ( ! empty( $categories ) ) {
							    echo '<p class="cat">' . esc_html( $categories[0]->name ) . '</p>';
							}
					?>
		            <h4 class="post-title"><a href="<?php the_permalink(); ?>" class="post-title-link"><?php the_title(); ?></a></h4>
		            
			        <div><?php the_excerpt();  ?></div>
		            
			    	<div class="clearfix"></div>
			    
					<a class="more" href="<?php the_permalink(); ?>">Learn more...</a>
					
					<div class="clearfix"></div>
				</div>

		<?php endforeach; 
		wp_reset_postdata();?>
	</div>
</div>
