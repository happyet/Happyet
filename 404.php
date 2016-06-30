<?php 
    get_header();
    $content_class = 'col-md-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-md-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <div class="post error-404 not-found">
        <h2 class="title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lmsim' ); ?></h2>
        <div class="entry">
            <p>
                <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lmsim' ); ?>
            </p>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>