<?php

// Featured Image
add_theme_support( 'post-thumbnails' );
function korea_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
  if ( is_archive() || is_search() || is_home() ) {
    $attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
  } else {
    $attr['sizes'] = '100vw';
  }
  return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'korea_post_thumbnail_sizes_attr', 10, 3 );