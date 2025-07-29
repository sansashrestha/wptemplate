<?php

/**
 * The main template file
 *
 */

get_header();
?>


<main id="main" class="main">
    <!--hero-->
    <section class="hero">
        <div class="hero__img">
            <picture>
                <source media="(max-width:767px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hero/hero-img-sp.png">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/hero/hero-img.png" alt="目指すのは韓日グローバル人材" width="1346" height="493"
                    class="img-fluid" loading="lazy">
            </picture>
            <h1 class="hero__ttl">目指すのは<br>韓日グローバル人材</h1>
        </div>

        <div class="hero__scroll">
            <span>scroll</span>
        </div>
    </section>

    <!-- NEWS -->
    <section class="section news" id="news">
        <div class="container">
            <div class="news__wrapper">
                <div class="text-center">
                    <h2 class="heading-primary">お知らせ</h2>
                </div>
                <ul class="news__list">

                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type'              => array( 'news' ),
                    'post_status'            => array( 'publish' ),
                    'paged'                  =>  $paged,
                    'posts_per_page'         => 3,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );
                // The Query
                $news = new WP_Query( $args );

                // The Loop
                if ( $news->have_posts() ) {
                    while ( $news->have_posts() ) {
                        $news->the_post(); ?>
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
                              <p class="news__desc"><?php the_title(); ?>…</p>
                            </a>
                        </li>
                    <?php }
                } 
                // Restore original Post Data
                wp_reset_postdata();
            ?>
                </ul>
                <div class="news__btn">
                    <a href="<?php echo home_url(); ?>/news" class="btn-line">お知らせ一覧を見る</a>
                </div>
            </div>
        </div>
    </section>
   
</main>
<?php get_footer(); ?>