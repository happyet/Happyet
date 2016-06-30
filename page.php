<?php
    get_header();
    $content_class = 'col-md-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-md-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'singlepost'); ?>>
            <h2 class="title"><?php the_title(); ?></h2>
            <ul class="list-inline post-meta">
                <li><span class="glyphicon glyphicon-time"></span>
                    <?php the_time('Y-m-d') ?>
                </li>
                <li><span class="glyphicon glyphicon-fire"></span>
                    <?php lmsim_theme_views(); ?>
                </li>
                <?php edit_post_link(__('Edit','lmsim'),'<li>','</li>'); ?>
                <li class="pull-right">
                    <?php comments_popup_link('<span class="glyphicon glyphicon-comment"></span> 0', '<span class="glyphicon glyphicon-comment"></span> 1', '<span class="glyphicon glyphicon-comment"></span> %', '', '<span class="glyphicon glyphicon-comment"></span> 评论已关闭'); ?>
                </li>
            </ul>
            <div class="entry">
                <?php 
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'lmsim' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'lmsim' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                ?>
            </div>
        </div>
        <?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
    <?php endwhile; else: ?>
        <div class="post error-404 not-found">
            <h2 class="title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lmsim' ); ?></h2>
            <div class="entry">
                <p>
                    <?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lmsim' ); ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>