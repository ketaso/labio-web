<?php
/**
 * @package WordPress
 * @subpackage LABiO
 * @since LABiO 1.0
 */

/**
 *
 */
function setup () {
	
}

add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 100, 100, true );



function show_page_number() {
    global $wp_query;

    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $max_page = $wp_query->max_num_pages;
    echo $paged;  
}

//総ページ数の取得
function max_show_page_number() {
    global $wp_query;

    $max_page = $wp_query->max_num_pages;
    echo $max_page;  
}
/**
 * ページネーションを生成。
 */
function my_paginate(){
	global $wp_rewrite;
	global $wp_query;
	global $paged;

    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    $count_posts = wp_count_posts();
    $posts = $count_posts->publish;
    $total_page = ceil($posts / 12);

    $paginate_base = get_pagenum_link(1);
    if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
        $paginate_format = '';
        $paginate_base = add_query_arg('paged','%#%');
    } else {
        $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/','paged');;
        $paginate_base .= '%_%';
    }

 	echo paginate_links(array(
		'base' => $paginate_base,
		'format' => $paginate_format,
		'total' => $total_page,
		'current' => ($paged ? $paged : 1),
		'prev_text' => '« Prev',
		'next_text' => 'Next »',
	)); 
}

/**
 * 抜粋の文字数
 */
function custom_excerpt_length( $length ) {
     return 80; 
}       
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * 抜粋の末尾
 */
function new_excerpt_more($more) {
        return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');