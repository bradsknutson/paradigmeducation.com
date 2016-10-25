<?php
/**
 * Template part for displaying a quote slice.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

?>
<?php if( get_field('quote') ): ?>

    <div class="quote">
        <div class="container">
            <div class="quote-content">
                <p><?php the_field('quote'); ?></p>
            </div>
            <div class="quote-attribution">
                <p>- <?php the_field('quote_attribution'); ?></p>
            </div>
        </div>
    </div>

<?php endif; ?>