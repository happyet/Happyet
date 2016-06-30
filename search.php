<?php
    get_header();
    $content_class = 'col-md-8';
    if ( ! is_active_sidebar( 'sidebar-1' ) ) $content_class = 'col-md-12';
?>
<div id="content" class="<?php echo $content_class; ?>">
    <?php if (have_posts()) : ?>
        <h1 class="page-title"><span class="glyphicon glyphicon-search"></span> <?php printf( __( 'Search Results for: %s', 'lmsim' ), '<strong>' . esc_html( get_search_query() ) . '</strong>' ); ?></h1>
        <?php while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <div class="excerpt">
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
                <ul class="list-inline post-meta">
                    <li><span class="glyphicon glyphicon-time"></span>
                        <?php the_time('Y-m-d') ?>
                    </li>
                    <li><span class="glyphicon glyphicon-folder-open"></span>
                        <?php the_category(', ') ?>
                    </li>
                    <li><span class="glyphicon glyphicon-fire"></span>
                        <?php lmsim_theme_views(); ?>
                    </li>
                    <li>
                        <?php comments_popup_link('<span class="glyphicon glyphicon-comment"></span> 0', '<span class="glyphicon glyphicon-comment"></span> 1', '<span class="glyphicon glyphicon-comment"></span> %', '', '<span class="glyphicon glyphicon-comment"></span> 评论已关闭'); ?>
                    </li>
                    <?php edit_post_link(__('Edit','lmsim'),'<li>','</li>'); ?>
                    <li class="pull-right hidden-xs">
                        <a href="<?php the_permalink() ?>" rel="bookmark">阅读全文</a>
                    </li>
                </ul>
            </div>
        <?php endwhile; ?>
        <nav class="text-center">
            <?php if(!wp_is_mobile() && (get_previous_posts_link() || get_next_posts_link())){ ?>
                <ul class="pagination">
                    <?php par_pagenavi(2); ?>
                </ul>
            <?php }else{ ?>
                <ul class="pager">
                    <li class="previous">
                        <?php next_posts_link( '<span class="meta-nav">&larr;</span> Older posts' ); ?>
                    </li>
                    <li class="next">
                        <?php previous_posts_link( 'Newer posts <span class="meta-nav">&rarr;</span>' ); ?>
                    </li>
                </ul>
            <?php } ?>
        </nav>
    <?php else : ?>
        <div class="post error-404 not-found">
            <h2 class="title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lmsim' ); ?></h2>
            <div class="entry">
                <p>
                    <?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lmsim' ); ?>
                </p>
                <?php get_search_form(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>