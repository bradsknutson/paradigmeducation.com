<?php
/**
 * Template part for displaying the first slice in the Product Information sub pages.
 *
 * Brad Knutson 9/30/2016
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>
    <div class="product-information-sub-top-slice">
        <div class="container">
            <?php
                if(get_field('left_block_content')) {
                    $content = get_field('left_block_content');
                        
                    if( have_rows('buttons') ):
                        while ( have_rows('buttons') ) : the_row();
                            $button_color = get_sub_field('button_color');
                            $button_text = get_sub_field('button_text');
                            $button_link = get_sub_field('button_link');
                            $target = get_sub_field('target');
                    
                            $button = '<a class="button" target="'. $target .'" href="'. $button_link .'">
                            <div style="color:'. $button_color .';border:2px solid '. $button_color .';">'. $button_text .'</div>
                        </a>';
                    
                            $buttons .= $button;
                    
                        endwhile;
                    
                        echo '<div class="prod-info-sub-top-slice top-slice-left col-md-8">'. $content . $buttons .'</div>';
                    
                    endif;
                    
                }
                if(get_field('right_block_image')) {
                    $image = get_field('right_block_image');
                    
                    echo '<div class="prod-info-sub-top-slice top-slice-right col-md-4"><img src="'. $image .'" /></div>';
                    
                }
            ?>
        </div>
</div>
