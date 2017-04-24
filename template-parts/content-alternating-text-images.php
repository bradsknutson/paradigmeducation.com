<?php
/**
 * Template part for displaying alternating text and images section.
 *
 * Brad Knutson 9/29/2016
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>
    <div class="alternating-content-images">
        <div class="container">
            <?php

            if( have_rows('slice') ):

                $rows = get_field('slice');
                $count = count($rows);

                for( $i = 0; $i < $count; $i++ ) {

                    $content = $rows[$i]['content'];
                    $image = $rows[$i]['image'];

                    $buttons = $rows[$i]['buttons'];
                    $button_count = count($buttons);

                    $button_html = '';
                    $slide_down_content = '';

                    $img = '';
                    if( !empty($image) ) {
                        $img = '<img src="'. $rows[$i]['image'] .'" />';
                    }

                    if($buttons['0']['button_text'] == '') {

                    } else {

                        for( $ii = 0; $ii < $button_count; $ii++ ) {

                            if( $buttons[$ii]['target'] == 'slide' ) {

                                // $button_html .= '<a class="button button-slide" id="'. $ii .'">
                                //     <i class="fa fa-plus" aria-hidden="true"></i>
                                //     <div style="color:'. $buttons[$ii]['button_color'] .';border:2px solid '. $buttons[$ii]['button_color'] .';">'. $buttons[$ii]['button_text'] .'</div>
                                // </a>';


                                //
                                //     $slide_down_content = '<div class="slide-content-'. $ii .'">'. $buttons[$ii]['slide_down_content'] .'</div>';
                                // } else {
                                //     $button_html .= '<a class="button" target="'. $buttons[$ii]['target'] .'" href="'. $buttons[$ii]['button_link'] .'">
                                //         <div style="color:'. $buttons[$ii]['button_color'] .';border:2px solid '. $buttons[$ii]['button_color'] .';">'. $buttons[$ii]['button_text'] .'</div>
                                //     </a>';
                                //
                                //     $slide_down_content = '';


                                // ------------- Create unique ids for collapsable button elements -- currently not selecting height element

                                $button_html .= '<a class="button button-slide" id="'. $i .'-'. $ii .'">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    <div style="color:'. $buttons[$ii]['button_color'] .';border:2px solid '. $buttons[$ii]['button_color'] .';">'. $buttons[$ii]['button_text'] .'</div>
                                </a>';

                                $slide_down_content = '<div class="slide-content-'. $i .'-'. $ii .'">'. $buttons[$ii]['slide_down_content'] .'</div>';
                            } else {
                                $button_html .= '<a class="button" target="'. $buttons[$ii]['target'] .'" href="'. $buttons[$ii]['button_link'] .'">
                                    <div style="color:'. $buttons[$ii]['button_color'] .';border:2px solid '. $buttons[$ii]['button_color'] .';">'. $buttons[$ii]['button_text'] .'</div>
                                </a>';

                                $slide_down_content = '';
                            }

                        }
                    }

                    $content = $content . $button_html;

                    if( $i % 2 == 0 ) {

                        echo '<div class="row row-even">
                                <div class="col-md-6 alternating-content float-swap"><div>'. $content .'</div></div>
                                <div class="col-md-6 alternating-image float-swap">'. $img .'</div>
                            </div>
                            <div class="row row-hidden row-even">
                                <div class="col-md-6 alternating-content float-swap"><div>'. $slide_down_content .'</div></div>
                                <div class="col-md-6 alternating-image float-swap"></div>
                            </div>';
                    } else {

                        echo '<div class="row row-odd">
                                <div class="col-md-6 alternating-content"><div>'. $content .'</div></div>
                                <div class="col-md-6 alternating-image">'. $img .'</div>
                            </div>
                            <div class="row row-hidden row-odd">
                                <div class="col-md-6 alternating-content"><div>'. $slide_down_content .'</div></div>
                                <div class="col-md-6 alternating-image"></div>
                            </div>';
                    }

                }
                echo '</div>';

            endif;

            ?>

        </div>
</div>
