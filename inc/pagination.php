<?php

/**
 * 
 * Pagination
 * 
 */

function pagination($pages = '', $range = 1)
{
    // $showitems = ($range * 2)+1;  
    $showitems = ($range) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        // $links[] = $paged - 2;
    }

    if (($paged + 2) <= $pages) {
        // $links[] = $paged + 2; // Upcoming
        $links[] = $paged + 1; // Next
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<ul class=\"pagination__list\">";

        // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class='mx-2'><a href='".get_pagenum_link(1)."'><i class=\"fa fa-angle-double-left\"></i></a></li>";

        if ($paged > 1 && $showitems < $pages) echo '<li class="pagination__item -prev"><a href="' . get_pagenum_link($paged - 1) . '">＜</a></li>';

        if (!in_array(1, $links)) {
            $class = 1 == $paged ? ' class="-active"' : '';

            printf('<li%s class="pagination__item"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

            if (!in_array(2, $links))
                echo '<li class="pagination__item--dots"><a>…</a></li>';
        }

        // for ($i=1; $i <= $pages; $i++)
        // {
        // 	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
        // 	{
        // 		echo ($paged == $i)? "<li class=\"pagination__item -active\"><a>".$i."</a></li>":"<li class='pagination__item'><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
        // 	}
        // }

        sort($links);
        foreach ((array) $links as $link) {
            $class = $paged == $link ? ' class="pagination__item -active"' : '';
            printf('<li%s class="pagination__item"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
        }

        /** Link to last page, plus ellipses if necessary */
        if (!in_array($pages, $links)) {
            if (!in_array($pages - 1, $links))
                echo '<li class="pagination__item--dots"><a>・・・</a></li>' . "\n";

            $class = $paged == $pages ? ' class="-active"' : '';
            printf('<li%s class="pagination__item"><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($pages)), $pages);
        }

        if ($paged < $pages && $showitems < $pages) echo '<li class="pagination__item -next"><a href="' . get_pagenum_link($paged + 1) . '">＞</a></li>';



        // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li class='mx-2'><a class='block bg-primary text-white flex justify-center items-center p-2 rounded border-primary border h-10 w-10 hover:bg-white hover:text-primary no-underline' href='".get_pagenum_link($pages)."'><i class=\"fa fa-angle-double-right\"></i></a></li>";

        echo "</ul>\n";
    }
}