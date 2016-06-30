<?php
require get_template_directory() . '/inc/bootstrap_navwalker.class.php';
if ( ! isset( $content_width ) ) $content_width = 900;
function happyet_widgets_init() {
    register_sidebar(array(
    	'id' => 'sidebar-1',
        'before_widget' => '<div class="side-box %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
}
add_action( 'widgets_init', 'happyet_widgets_init' );
function happyet_load() {
    add_editor_style();
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'topbar' => __('Main Menu','lmsim'),
		'mbar' => __('Mobile Menu','lmsim')
	) );		
}
add_action( 'after_setup_theme', 'happyet_load' );

function add_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/static/css/bootstrap.min.css','','3.3.6','screen' );
	wp_enqueue_style( 'happyet', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/static/js/bootstrap.min.js',array('jquery'),'3.3.6',true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'add_scripts');

function happyet_record_views() {
    if (is_singular()) {
        global $post, $user_ID;
        $post_ID = $post->ID;
        if (empty($_COOKIE[USER_COOKIE]) && intval($user_ID) == 0) {
            if ($post_ID) {
                $post_views = (int)get_post_meta($post_ID, 'views', true);
                if (!update_post_meta($post_ID, 'views', ($post_views + 1))) {
                    add_post_meta($post_ID, 'views', 1, true);
                }
            }
        }
    }
}
add_action('wp_head', 'happyet_record_views');
function post_views($before = '', $after = '', $echo = 1) {
    global $post;
    $post_ID = $post->ID;
    $views = (int)get_post_meta($post_ID, 'views', true);
    if ($echo) {
        echo $before, number_format($views) , $after;
    } else {
        return $views;
    }
}
function lmsim_theme_views(){
	if(function_exists('the_views')) { 
		echo the_views(false); 
	}else{ 
		post_views();
	}
}

function lmsim_get_current_page_url(){
	global $wp;
	return get_option( 'permalink_structure' ) == '' ? add_query_arg( $wp->query_string, '', home_url( $wp->request ) ) : home_url( add_query_arg( array(), $wp->request ) );
}

function lmsim_excerpt_length( $length ) {
	return 120;
}
add_filter( 'excerpt_length', 'lmsim_excerpt_length' );

function lmsim_auto_excerpt_more( $more ) {
		return ' &hellip;';
}
add_filter( 'excerpt_more', 'lmsim_auto_excerpt_more' );
function lmsim_more_link($more_link, $more_link_text) {
	return str_replace($more_link_text, 'Keep reading this post', $more_link);
}
add_filter('the_content_more_link', 'my_more_link', 10, 2);

function par_pagenavi($range = 8){
	global $paged,$max_page,$wp_query;
	if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
	if($max_page > 1){
        if(!$paged) $paged = 1;
        if(get_previous_posts_link()){
            echo '<li>';
                previous_posts_link('<span class="glyphicon glyphicon-chevron-left"></span>');
            echo '</li>';
        }
    	if($paged >= 4){
            echo '<li><a href="' . get_pagenum_link(1) . '" class="extend" title="' . _e('Home','lmsim') . '">1</a></li><li class="disabled"><span>...</span></li>';
        }
        if($max_page > $range){
    		if($paged < $range){
                for($i = 1; $i <= ($range + 1); $i++){
                    echo '<li';
                    if($i==$paged) echo ' class="active"';
                    echo '><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                }
            }elseif($paged >= ($max_page - ceil(($range/2)))){
                for($i = $max_page - $range; $i <= $max_page; $i++){
                    echo '<li';
                    if($i==$paged) echo ' class="active"';
                    echo '><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                }
            }elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
                for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){
                    echo '<li';
                    if($i==$paged) echo ' class="active"';
                    echo '><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
                }
            }
        }else{
            for($i = 1; $i <= $max_page; $i++){
                echo '<li';
                if($i==$paged) echo ' class="active"';
                echo '><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
            }
        }
    	if($max_page > 5 && $paged < $max_page -2){
            echo '<li class="disabled"><span>...</span></li><li><a href="' . get_pagenum_link($max_page) . '" class="extend" title="' . _e('Last Page','lmsim') . '">' . $max_page . '</a></li>';
        }
        if(get_next_posts_link()){
            echo '<li>';
                next_posts_link('<span class="glyphicon glyphicon-chevron-right"></span>');
            echo '</li>';
        }
    }
}
function lmsim_body_classes( $classes ) {
	if ( get_background_image() ) {
		$classes[] = 'custom-background';
	}
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	return $classes;
}
add_filter( 'body_class', 'lmsim_body_classes' );
function get_ssl_avatar($avatar) {
    $avatar = str_replace(array("www.gravatar.com", "0.gravatar.com", "1.gravatar.com", "2.gravatar.com"), "cn.gravatar.com", $avatar);
    return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');