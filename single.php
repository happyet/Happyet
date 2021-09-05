<?php
    get_header();
    $content_class = 'col-lg-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-lg-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post singlepost my-4 pb-4">
            <h2 class="title line-title pt-2 mb-2"><?php the_title(); ?></h2>
            <ul class="list-inline post-meta small">
                        <li class="list-inline-item me-3">
                            <?php the_time('Y-m-d') ?>
                        </li>
                        <li class="list-inline-item me-3">
                            <?php the_category(', ') ?>
                        </li>
                        <li class="list-inline-item me-3"><i class="iconfont icon-browse"></i>
                            <?php lmsim_theme_views(); ?>
                        </li>
                        <li class="float-end">
                            <?php comments_popup_link('<i class="iconfont icon-chat"></i> 0', '<i class="iconfont icon-chat"></i> 1', '<i class="iconfont icon-chat"></i> %', '', '<i class="iconfont icon-chat"></i> 评论已关闭'); ?>
                        </li>
                    </ul>
            <div class="entry py-3">
                <?php 
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'lmsim' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                ?>
            </div>
            <div class="post-footer">
                <?php the_tags('<div class="tags my-3"><i class="iconfont icon-attachment"></i><span>', '</span><span>', '</span></div>'); ?> 
                <div class="about-author text-center p-3 bg-light">
                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
                    <a class="author-link d-block my-1" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><strong><?php the_author(); ?></strong></a>
                    <span class="d-block"><?php the_author_meta( 'description' ); ?></span>
                </div>
            </div>
        </div>
        <nav>
            <ul class="page my-4 d-flex">
                <li class="previous text-start">
                    <?php previous_post_link('%link') ?>
                </li>
                <li class="next text-end">
                    <?php next_post_link('%link') ?>
                </li>
            </ul>
        </nav>
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