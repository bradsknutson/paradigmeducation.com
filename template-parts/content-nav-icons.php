<?php
if ( get_field( 'navigation_icons' ) ) { ?>
    <div class="nav-icons">
        <div class="container">
            <div class="row">

                <?php if( have_rows('navigation_icons') ): ?>

                    <?php while( have_rows('navigation_icons') ): the_row(); 

                        // vars
                        $image = get_sub_field('image');
                        $content = get_sub_field('content');
                        $link = get_sub_field('link');

                        ?>
                        <div class="col-sm-4">
                            <div class="col-md-4">
                                <img src="<?php echo $image; ?>">
                            </div>
                            <div class="col-md-8">
                                <?php echo $content; ?>
                            </div>
                            <a href="<?php echo $link; ?>"></a>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php } else {
    
    if ( get_field( 'navigation_icons', 92 ) ) {
        ?>
        <div class="nav-icons">
            <div class="container">
                <div class="row">

                    <?php if( have_rows('navigation_icons', 92) ): ?>

                        <?php while( have_rows('navigation_icons', 92) ): the_row(); 

                            // vars
                            $image = get_sub_field('image');
                            $content = get_sub_field('content');
                            $link = get_sub_field('link');

                            ?>
                            <div class="col-sm-4">
                                <div class="col-md-4">
                                    <img src="<?php echo $image; ?>">
                                </div>
                                <div class="col-md-8">
                                    <?php echo $content; ?>
                                </div>
                                <a href="<?php echo $link; ?>"></a>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php }
} ?>


