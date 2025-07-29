<?php /**
 * 
 * MISC Codes
 * 
 **/

//-----------shortcode for url-----------
function url_shortcode()
{
    return get_stylesheet_directory_uri();
}
add_shortcode('asset_path', 'url_shortcode');

function homeurl_shortcode()
{
    return home_url();
}
add_shortcode('home_url', 'homeurl_shortcode');


