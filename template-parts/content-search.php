<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradigm
 */

$content = get_the_content();
    
    $content = strip_tags( $content );
    $content = preg_replace('/\[[^\]]*\]/', '', $content);
    
    $parts = preg_split('/([\s\n\r]+)/', $content, null, PREG_SPLIT_DELIM_CAPTURE);
    $parts_count = count($parts);

    $length = 0;
    $last_part = 0;
    for (; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > 100) { break; }
    }
    
    $final_content = implode( array_slice( $parts, 0, $last_part) );
    
$cat_class = '';
$cat_name = '';
$categories = get_the_terms( $post->ID, 'category' );
foreach( $categories as $category ) {
    $cat_class .=  $category->slug . ' ';
    $cat_name = $category->name;
}
$category_class = trim($cat_class);

?>

<?php // Display Posts in search results ?>
<?php if ( get_post_type() === 'post' ) { ?>
    <div class="blog-archive-container search-v2 <?php echo $category_class; ?>">
        <div class="products-background">
            <?php 
                echo '<p class="entry-meta">'. esc_html( $cat_name ) .' | ';
                the_time('n.j.Y'); 
                echo '</p>';
                echo '<h4 class="posts-page-item-title">'. get_the_title() .'</h4>';
                echo '<p>'. trim( $final_content ) .'... Read more &rarr;</p>'; 

            ?>
        </div>
        <a href="<?php the_permalink(); ?>"></a>
    </div>
<?php } ?>

<?php // Display Pages in search results ?>
<?php if ( get_post_type() === 'page' ) { 
    
    // First determine if page belongs in search index
    if( get_field('search_index') != 'no' ) { ?>
        <div class="blog-archive-container search-v2 search-page">
            <div class="products-background">
                <?php 
                    echo '<p class="entry-meta">Information</p>';
                    echo '<h4 class="posts-page-item-title">'. get_the_title() .'</h4>';
                    echo '<p>'. trim( $final_content ) .'... Read more &rarr;</p>'; 

                ?>
            </div>
            <a href="<?php the_permalink(); ?>"></a>
        </div>

    <?php } ?>

<?php } ?>