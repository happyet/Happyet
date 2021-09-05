<?php
    get_header();
    $content_class = 'col-lg-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-lg-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <?php if (have_posts()) : ?>
        <div class="bg-light p-3 my-4 text-center">
        <?php
            the_archive_title( '<h1 class="page-title fw-light mb-1">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description fw-light">', '</div>' );
        ?>
        </div>
        <?php while (have_posts()) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" class="post my-4 pb-4">
                    <h2 class="title line-title pt-2"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <div class="excerpt py-3">
                        <?php 
                            if(preg_match('/<!--more.*?-->/',$post->post_content)){
                                the_content('', TRUE);
                            }else{
                                if( has_post_thumbnail() ){
                                    echo '<p class="text-center">';
                                        the_post_thumbnail();
                                    echo '</p>';
                                }
                                the_excerpt();
                            }
                        ?>
                    </div>
                    <ul class="list-inline post-meta small">
                        <?php if ( is_sticky() ) : ?>
                            <li class="list-inline-item me-3">
                            <span class="sticky">推荐</span>
                            </li>
                        <?php endif; ?>
                        <li class="list-inline-item me-3">
                            <?php the_time('Y-m-d') ?>
                        </li>
                        <li class="list-inline-item me-3">
                            <?php the_category(', ') ?>
                        </li>
                        <li class="list-inline-item me-3"><i class="iconfont icon-browse"></i>
                            <?php lmsim_theme_views(); ?>
                        </li>
                        <li class="list-inline-item me-3">
                            <?php comments_popup_link('<i class="iconfont icon-chat"></i> 0', '<i class="iconfont icon-chat"></i> 1', '<i class="iconfont icon-chat"></i> %', '', '<i class="iconfont icon-chat"></i> 评论已关闭'); ?></li>
                        <li class="float-end d-lg-block d-none">
                            <a href="<?php the_permalink() ?>" rel="bookmark">...阅读全文</a>
                        </li>
                    </ul>
                </div>
            <?php endwhile; ?>
            <nav class="text-center">
                <?php if(!wp_is_mobile() && (get_previous_posts_link() || get_next_posts_link())){ ?>
                    <ul class="pagination my-4">
                        <?php par_pagenavi(2); ?>
                    </ul>
                <?php }else{ ?>
                    <ul class="pager my-4 d-flex">
                        <li class="previous">
                            <?php next_posts_link( '<i class="iconfont icon-arrow-left-bold"></i>' ); ?>
                        </li>
                        <li class="next">
                            <?php previous_posts_link( '<i class="iconfont icon-arrow-right-bold"></i>' ); ?>
                        </li>
                    </ul>
                <?php } ?>
            </nav>
        <?php else : ?>
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