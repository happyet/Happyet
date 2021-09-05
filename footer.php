                </main>
                <footer id="footer">
                    <p class="social py-2">
                        <span><i class="iconfont icon-qq"></i></span>
                        <span><i class="iconfont icon-wechat"></i></span>
                        <span><i class="iconfont icon-alipay-circle"></i></span>
                        <span><i class="iconfont icon-weibo"></i></span>
                        <span><i class="iconfont icon-github"></i></span>
                        <span><i class="iconfont icon-facebook"></i></span>
                    </p>
				    <p>&copy; <?php the_date('Y'); ?> <a href="<?php echo home_url();?>" title="<?php echo get_bloginfo( 'name', 'display' ); ?>"><?php bloginfo( 'name' ); ?></a> <?php bloginfo('description'); ?><br />
                    Powered by <a target="_blank" href="<?php echo esc_url( __( 'https://wordpress.org/', 'lmsim' ) ); ?>">WordPress</a> Theme By <a href="https://lms.im" target="_blank">LMS</a></p>
                </footer>
            </div>
            <?php wp_footer(); ?>
        </div>
    </div>
</div>
</body>
</html>