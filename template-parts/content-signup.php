<?php 
    if ( get_field( 'content', 79 ) ) { 
        $content = get_field( 'content', 79 );
        $btn_text = get_field( 'button_text', 79 );
        $btn_action = get_field( 'button_action', 79 );
        $btn_link = get_field( 'button_link', 79 );
        $id = get_field( 'modal_form_id', 79 );
?>
    <?php if( $btn_action == 'modal' ) { ?>
        <div class="signup">
            <div class="container">
                <p><?php echo $content; ?> <a class="btn white-border btn-modal-trigger" href=""><?php echo $btn_text; ?></a></p>
            </div>
        </div>
        <div class="hidden-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php

                            if( function_exists( 'ninja_forms_display_form' ) ) { 
                                ninja_forms_display_form( $id ); 
                            }        

                        ?>
                    </div>
                </div>
            </div>
            <div class="modal-close"></div>
        </div>
    <?php } elseif( $btn_action == 'replace' ) { ?>

        <div class="signup">
            <div class="container">
                <p><?php echo $content; ?> <a class="btn white-border btn-replace-trigger" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a></p>
            </div>
        </div>
        <div class="hidden-form">
            <?php

                if( function_exists( 'ninja_forms_display_form' ) ) { 
                    ninja_forms_display_form( $id ); 
                }        

            ?>
        </div>

    <?php } else { ?>

        <div class="signup">
            <div class="container">
                <p><?php echo $content; ?> <a class="btn white-border" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a></p>
            </div>
        </div>

    <?php } ?>
<?php } ?>