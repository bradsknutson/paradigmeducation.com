<?php
/**
 * Template part for displaying page content in the Blog page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

function postTruncate($string, $your_desired_width) {
    
    $string = strip_tags( $string );
    $string = preg_replace('/\[[^\]]*\]/', '', $string);
    
    $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
    $parts_count = count($parts);

    $length = 0;
    $last_part = 0;
    for (; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > $your_desired_width) { break; }
    }
    
    $return = implode( array_slice( $parts, 0, $last_part) );
    
    return trim($return);
}        

$content = get_the_content();

$cat_class = '';
$cat_name = '';
$categories = get_the_category();

if ( !empty( $categories ) ) {
    $cat_class .=  esc_html( $categories[0]->slug ) .' ';
    $cat_name = esc_html( $categories[0]->name );
}
$category_class = trim($cat_class);

?>

    <div class="blog-archive-container col-md-4 <?php echo $category_class; ?>">
        <div class="products-background">
            <?php 
                echo '<p class="entry-meta">'. esc_html( $cat_name ) .' | ';
                the_time('n.j.Y'); 
                echo '</p>';
                echo '<h4 class="posts-page-item-title">'. get_the_title() .'</h4>';
                echo '<p>'. postTruncate( $content, 100 ) .'...'; 

            ?>
        </div>
        <a href="<?php the_permalink(); ?>"></a>
    </div>