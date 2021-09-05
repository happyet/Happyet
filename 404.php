<?php 
    get_header();
    $content_class = 'col-lg-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <div class="post error-404 not-found py-4">
        <h2 class="title">404 - 页面不存在或已删除</h2>
        <div class="entry py-3">
            <p>您查看的页面不存在或已经被博主删除，可试试用关键词搜索。</p>
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>