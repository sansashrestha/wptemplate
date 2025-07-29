<?php get_header(); ?>
<main id="main" class="main">

    <div class="container">
        <h1 class="pagettl-bar">お知らせ - <?php single_term_title(); ?></h1>
        <div class="blockaside">
            <div class="blockaside__lg">
                <h3>すべての記事</h3>
                <!-- NEWS -->
                <div class="news -list" id="news">
                    <div class="news__wrapper">
                    <ul class="news__list">
                        <?php
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                            // Get the current term object
                            $term = get_queried_object();

                            $args = array(
                                'post_type'              => array( 'news' ),
                                'post_status'            => array( 'publish' ),
                                'paged'                  =>  $paged,
                                'posts_per_page'         => 3,
                                'orderby' => 'menu_order',
                                'order' => 'ASC',
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'news_category',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug, // Filter by the current term's slug
                                    ),
                    ),
                            );
                            // The Query
                            $news_query = new WP_Query( $args );

                            // The Loop
                            if ( $news_query->have_posts() ) {
                                while ( $news_query->have_posts() ) {
                                    $news_query->the_post(); ?>
                                    <li class="news__itm">
                                        <a href="<?php the_permalink(); ?>" class="news__lnk">
                                            <div class="news__tag-wpr">
                                                <span class="news__date"><?php echo get_the_date("Y.m.d"); ?></span>
                                                <div class="news__tagbg">
                                                <span class="news__tag">
                                                    <?php 
                                                    $news_cat = get_the_terms( $post->ID, 'news_category' );
                                                    if ( ! empty( $news_cat ) && ! is_wp_error( $news_cat ) ) {
                                                        foreach ( $news_cat as $cat ) {
                                                            echo '<span class="single-category">' . esc_html( $cat->name ) . '</span> ';
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                                </div>
                                            </div>
                                            <p class="news__desc"><?php the_title(); ?></p>
                                        </a>
                                    </li>
                                <?php }
                            } 
                            else {
                                echo '<li>No news found in this category.</li>';
                            }
                            // Restore original Post Data
                            wp_reset_postdata();
                        ?>
                    </ul>
                    </div>
                </div>
                <!-- pagination -->
                <div class="pagination">
                <?php if( function_exists('pagination') ) { pagination($news_query->max_num_pages); } ?>
                </div>
            </div>
            <div class="blockaside__sm">
                <div class="blockaside__acc-wpr">
                    <h4 class="blockaside__acc-ttl">絞り込み</h4>
                    <div class="blockaside__acc-box">
                        <div class="blockcategory">
                            <div class="component">
                                <h5>category</h5>
                            </div>
                            <ul class="blockcategory__list">
                                <!-- <li>
                                    <a href="#" class="blockcategory__link">財団全体</a>
                                </li>
                                <li>
                                    <a href="#" class="blockcategory__link">奨学金</a>
                                </li>
                                <li>
                                    <a href="#" class="blockcategory__link">TOPIK</a>
                                </li>
                                <li>
                                    <a href="#" class="blockcategory__link">教育・研究</a>
                                </li>
                                <li>
                                    <a href="#" class="blockcategory__link">寄附</a>
                                </li> -->


                                <?php
                                $taxonomy = 'news_category'; // Your custom taxonomy name

                                $categories = get_terms( array(
                                    'taxonomy'   => $taxonomy,
                                    'hide_empty' => false, // Adjust this based on whether you want to include empty terms
                                ) );

                                if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        echo '<li><a class="blockcategory__link" href="' . esc_url( get_term_link( $category ) ) . '">' . esc_html( $category->name ) . '</a></li>';
                                    }
                                }
                                ?>


                            </ul>
                        </div>
                        <p class="blockaside__close">
                            <span>close</span>
                        </p>
                    </div>
                </div>
                <!-- <div class="blockcategory">
                    <div class="component"><h5>category</h5></div>
                    <ul class="blockcategory__list">
                       <?php 
                            $registered_categories = get_terms('news_category');
                            if($registered_categories):
                                foreach ($registered_categories as $category_name): ?>
                                    <li>
                                        <a href="<?php echo get_term_link($category_name->term_id); ?>" class="blockcategory__link"><?php echo $category_name->name; ?></a>
                                    </li>
                                <?php endforeach; 
                            endif; 
                        ?>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>