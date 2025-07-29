<?php 
function custom_breadcrumb() {
    // Get the global post object
    global $post;
    
    // Initialize breadcrumb array
    $breadcrumbs = array();
    
    // Home link
    $breadcrumbs[] = '<li class="breadcrumb__item"><a href="' . home_url() . '" class="breadcrumb__link">トップページ</a></li>';
    
    // Check if we're on a single post or page
    if (is_single()) {
        // Add post type archive link
        $post_type = get_post_type_object(get_post_type());
        if ($post_type && $post_type->has_archive) {
            $breadcrumbs[] = '<li class="breadcrumb__item"><a href="' . get_post_type_archive_link($post_type->name) . '" class="breadcrumb__link">' . esc_html($post_type->labels->singular_name) . '</a></li>';
        }
        // Add the current post
        $breadcrumbs[] = '<li class="breadcrumb__item active">' . get_the_title() . '</li>';
    } elseif (is_page()) {
        // Check if it's a child page
        if ($post->post_parent) {
            // Get parent pages
            $ancestors = get_post_ancestors($post->ID);
            $ancestors = array_reverse($ancestors);
            foreach ($ancestors as $ancestor) {
                $breadcrumbs[] = '<li class="breadcrumb__item"><a href="' . get_permalink($ancestor) . '" class="breadcrumb__link">' . get_the_title($ancestor) . '</a></li>';
            }
        }
        // Add the current page
        $breadcrumbs[] = '<li class="breadcrumb__item active">' . get_the_title() . '</li>';
    } elseif (is_category() || is_tag()) {
        // Add taxonomy archive
        $taxonomy = get_queried_object();
        $breadcrumbs[] = '<li class="breadcrumb__item"><a href="' . get_term_link($taxonomy) . '" class="breadcrumb__link">' . $taxonomy->name . '</a></li>';
        // Add the current term
        $breadcrumbs[] = '<li class="breadcrumb__item active">' . single_term_title('', false) . '</li>';
    } elseif (is_post_type_archive()) {
        // Post type archive
        $post_type = get_post_type_object(get_post_type());
        $breadcrumbs[] = '<li class="breadcrumb__item active">' . esc_html($post_type->labels->name) . '</li>';
    } elseif (is_home()) {
        // Blog posts page
        $breadcrumbs[] = '<li class="breadcrumb__item active">ブログ</li>';
    }

    // Output the breadcrumbs
    echo '<div class="breadcrumb"><div class="container"><ul class="breadcrumb__list">' . implode(' ', $breadcrumbs) . '</ul></div></div>';
}

?>