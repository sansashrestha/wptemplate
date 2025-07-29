<?php 

// news
add_action('init', 'news_register_post_type');
function news_register_post_type() {
    register_post_type('news', array(
        'labels' => array(
           'name' => 'お知らせ',
           'add_new' => '新規お知らせを追加',
           'edit_item' => 'お知らせを編集',
           'new_item' => '新規お知らせ',
           'view_item' => 'お知らせを見る',
           'search_items' => 'お知らせを検索',
           'not_found' => ' お知らせはありません。',
           'not_found_in_trash' => 'ゴミ箱にお知らせはありません。',
           'add_new_item' => '新規お知らせを追加',
        ),
        'show_in_rest' => true, // To use Gutenberg editor.
        'public' => true,
		'publicly_queryable' => true, 
		'show_ui' => true, 
		'exclude_from_search' => true,
        'supports' => array(
           'title',
           'thumbnail',
           'editor'
           // 'excerpt'     
        ),
        'menu_position' => 5,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-site-alt3',
    ));
}
// <------ news Category ------->
add_action( 'init', 'create_news_category', 0 );
function create_news_category() {
    $labels = array(
        'name'              => _x('お知らせカテゴリー', 'taxonomy general name', 'korea'),
        'singular_name'     => _x('お知らせカテゴリー', 'taxonomy singular name', 'korea'),
        'has_archive'	     => 'news',
    );
    $args = array(
       'hierarchical'      => true,
       'show_in_rest' => true, // To use Gutenberg editor.
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'news/category' ),
    );
    register_taxonomy( 'news_category', array( 'news' ), $args );
}



// // activity 
// add_action('init', 'activity_register_post_type');
// function activity_register_post_type() {
//     register_post_type('activity', array(
//         'labels' => array(
//            'name' => 'activity',
//            'add_new' => '新規activityを追加',
//            'edit_item' => 'activityを編集',
//            'new_item' => '新規activity',
//            'view_item' => 'activityを見る',
//            'search_items' => 'activityを検索',
//            'not_found' => ' activityはありません。',
//            'not_found_in_trash' => 'ゴミ箱にactivityはありません。',
//            'add_new_item' => '新規activityを追加',
//         ),
//         'show_in_rest' => true, // To use Gutenberg editor.
//         'public' => true,
// 		'publicly_queryable' => true, 
// 		'show_ui' => true, 
// 		'exclude_from_search' => true,
//         'supports' => array(
//            'title',
//            'thumbnail',
//            'editor',
//            'excerpt'     
//         ),
//         'menu_position' => 6,
//         'has_archive' => true,
//         'menu_icon' => 'dashicons-admin-site-alt2',
//     ));
// }
// // <------ activity Category ------->
// add_action( 'init', 'create_activity_category', 0 );
// function create_activity_category() {
//     $labels = array(
//         'name'              => _x('Activity Categories', 'taxonomy general name', 'korea'),
//         'singular_name'     => _x('Activity Category', 'taxonomy singular name', 'korea'),
//         'has_archive'	     => 'activity',
//     );
//     $args = array(
//        'hierarchical'      => true,
//        'show_in_rest' => true, // To use Gutenberg editor.
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'activity/category' ),
//     );
//     register_taxonomy( 'activity_category', array( 'activity' ), $args );
// }


// // <------ activity Tag ------->
// add_action( 'init', 'create_activity_tag', 0 );
// function create_activity_tag() {
//     $labels = array(
//         'name'              => _x('Activity Tags', 'taxonomy general name', 'korea'),
//         'singular_name'     => _x('Activity Tag', 'taxonomy singular name', 'korea'),
//         'search_items'      => __( 'Search Activity Tags', 'korea' ),
//         'all_items'         => __( 'All Activity Tags', 'korea' ),
//         'parent_item'       => __( 'Parent Activity Tag', 'korea' ),
//         'parent_item_colon' => __( 'Parent Activity Tag:', 'korea' ),
//         'edit_item'         => __( 'Edit Activity Tag', 'korea' ),
//         'update_item'       => __( 'Update Activity Tag', 'korea' ),
//         'add_new_item'      => __( 'Add New Activity Tag', 'korea' ),
//         'new_item_name'     => __( 'New Activity Tag Name', 'korea' ),
//         'menu_name'         => __( 'Activity Tag', 'korea' ),
//     );
//     $args = array(
//        'hierarchical'      => false,
//        'show_in_rest'      => true, // To use Gutenberg editor.
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'update_count_callback' => '_update_post_term_count',
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'activity/tag' ),
//     );
//     register_taxonomy( 'activity_tag', array( 'activity' ), $args );
// }


// // services
// add_action('init', 'services_register_post_type');
// function services_register_post_type() {
//     register_post_type('services', array(
//         'labels' => array(
//            'name' => 'services',
//            'add_new' => '新規servicesを追加',
//            'edit_item' => 'servicesを編集',
//            'new_item' => '新規services',
//            'view_item' => 'servicesを見る',
//            'search_items' => 'servicesを検索',
//            'not_found' => ' servicesはありません。',
//            'not_found_in_trash' => 'ゴミ箱にservicesはありません。',
//            'add_new_item' => '新規servicesを追加',
//         ),
//         'show_in_rest' => true, // To use Gutenberg editor.
//         'public' => true,
// 		'publicly_queryable' => true, 
// 		'show_ui' => true, 
// 		'exclude_from_search' => true,
//         'supports' => array(
//            'title',
//            'thumbnail',
//            'editor'
//            // 'excerpt'     
//         ),
//         'menu_position' => 5,
//         'has_archive' => true,
//     ));
// }