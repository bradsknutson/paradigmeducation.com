<form action="/" method="get">
    <label class="screen-reader-text" for="search">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" class="search-field" name="s" placeholder="Search" id="search" value="<?php the_search_query(); ?>" autocomplete="off" />
    <input type="hidden" name="post_type" value="post" />
</form>