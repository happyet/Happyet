<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
<div id="sidebar" class="col-md-4">
    <div class="side-box"><?php get_search_form(); ?></div>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</div>
<?php endif; ?>